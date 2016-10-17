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

    /*
     Get Disciplines
     */
    $disciplines = get_field('disciplines', 'user_'.$id);
    if($disciplines){
      $disciplines_labels = [];
      foreach($disciplines as $discipline){
        array_push($disciplines_labels, $discipline['label']);
      }
      $disciplines_values = [];
      foreach($disciplines as $discipline){
        array_push($disciplines_values, $discipline['value']);
      }
    }


    array_push($graduates, [
      'ID'          => $id,
      'first_name'  => get_user_meta($id, 'first_name', true),
      'last_name'   => get_user_meta($id, 'last_name', true),
      'full_name'   => get_user_meta($id, 'first_name', true) . ' ' . get_user_meta($id, 'last_name', true),
      'disciplines' => isset($disciplines) ? $disciplines : null,
      'disciplines_values' => isset($disciplines_values) ? $disciplines_values : null,
      'disciplines_labels' => isset($disciplines_labels) ? $disciplines_labels : null,
      'social_links'  => get_field('social_links', 'user_' . $id) ? get_field('social_links', 'user_' . $id) : null,
      'portfolio'     => get_userdata($id)->user_url,
      'bio'           => get_userdata($id)->description,
      'permalink'   => get_author_posts_url($id)
    ]);
  }
  return $graduates;
}

function get_next_graduate($current_graduate_id){
    $all_graduate_ids = get_graduate_ids(false);
    $graduate_count = count($all_graduate_ids);
    $current_graduate_place = array_search($current_graduate_id, $all_graduate_ids);
    $next_graduate = ($current_graduate_place != $graduate_count - 1)
      ? get_graduates([$all_graduate_ids[$current_graduate_place + 1]])[0]
      : get_graduates([$all_graduate_ids[0]])[0];
    return $next_graduate;
}


add_action('init', 'graduate_base');
function graduate_base() {
    global $wp_rewrite;
    $author_slug = 'graduate'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}
