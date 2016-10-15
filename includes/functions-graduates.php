<?php

function get_graduate_ids($randomise = false){

  $graduates = new WP_User_Query([
    'role' => 'Author'
  ]);

  if(!$graduates->results){
    return false;
  }

  $graduate_ids = [];

  foreach($graduates->results as $graduate){
    array_push($graduate_ids, $graduate->data->ID);
  }

  if($randomise){
    shuffle($graduate_ids);
  }

  return $graduate_ids;
}

function get_graduates($ids = []){
  if(!$ids){
    return false;
  }
  $graduates = [];

  foreach($ids as $id){
    array_push($graduates, [
      'ID'          => $id,
      'first_name'  => get_user_meta($id, 'first_name', true),
      'last_name'   => get_user_meta($id, 'last_name', true),
      'full_name'   => get_user_meta($id, 'first_name', true) . ' ' . get_user_meta($id, 'last_name', true),
      'disciplines' => get_field('disciplines', 'user_'.$id),
      // 'permalink'   => get_author_posts_url($id)
    ]);
  }
  return $graduates;
}
