<?php

class Instagram {
  private $api_location = 'https://api.instagram.com/v1/';
  private $endpoint;
  private $args;
  private $api_parameters;
  private $method;
  private $secret;
  private $signature;
  public $response;

  function __construct($args){
    $this->endpoint = $args['endpoint'];
    $this->method = $args['method'];
    $this->args = $args['api_parameters'];
    ksort($args);
    $this->secret = $this->args['secret'];
    $this->signature = $this->generate_signature();
    $this->response = $this->get_response();
    var_dump($this->response);
  }

  private function get_access_token(){

  }

  private function generate_signature(){
    $sig = $this->endpoint;
    foreach ($this->args as $key => $val) {
      $sig .= "|$key=$val";
    }
    return hash_hmac('sha256', $sig, $this->secret, false);
  }

  private function get_response(){
        $curl = curl_init();
        switch ($this->method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($this->args)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $this->args);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($this->args)
                    $url = sprintf("%s?%s", $this->endpoint, http_build_query($this->args));
        }
        // Optional Authentication:
        // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $this->endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
  }

}



/*



                $args = array(
                  'access_token'  => '247202537.cb5bc3a.d39af61485054d579844a419b893e22f',
                  'secret'        => '169332adba83399672ea61586dc5c0654459049e7df68325f78eb554c8ebc37c',
                );
                var_dump(  json_decode( callapi('GET', 'https://api.instagram.com/v1/users/247202537/media/recent', $args) )->data[1]  );


              */
