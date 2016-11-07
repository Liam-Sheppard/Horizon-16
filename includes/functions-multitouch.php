<?php

function check_if_multitouch(){
  if(!isset($_GET["multitouch"])){
    if( isset($_COOKIE['bullshit']) && $_COOKIE['bullshit'] == 1){
      $GLOBALS['bullshit'] = 1;
    } else {
      $GLOBALS['bullshit'] = 0;
    }
  } else {
    $multitouch = $_GET["multitouch"];
    if($multitouch == 1){
      setcookie('bullshit', 1, time() + (300000), "/");
      $GLOBALS['bullshit'] = 1;
    } else if(!isset($_COOKIE['bullshit']) && $_COOKIE['bullshit'] == 1) {
      $GLOBALS['bullshit'] = 1;
    } else {
      $GLOBALS['bullshit'] = 0;
    }
  }
}
check_if_multitouch();
function is_multitouch(){
  if( isset($GLOBALS['bullshit']) &&  $GLOBALS['bullshit'] == 1 ){
    return true;
  }
  return false;
}
function multitouch_body_class($classes){
  $classes[] = 'multitouch';
  return $classes;
}
if(is_multitouch()){
  add_filter('body_class', 'multitouch_body_class');
}
