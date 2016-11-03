<div class="panel-bridge"></div>

<div class="panel panel--fam-strips">

  <h2>Meet the talent</h2>

  <div class='strip-wrapper'>
    <ul class='strip-container'>
      <?php
      $graduate_ids = get_graduate_ids(true);
      shuffle($graduate_ids);
      $graduates = get_graduates(array_chunk($graduate_ids,6)[0]); ?>
      <div class="strip">
          <?php
          foreach ($graduates as $current_graduate) {
            partial('graduate', [
              'name' => isset($current_graduate['full_name']) ? $current_graduate['full_name'] : '',
              'image' => get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/graduate-' . $current_graduate['ID'] . '.png',
              'disciplines' => isset($current_graduate['disciplines_values']) ? $current_graduate['disciplines_values'] : '',
              'permalink' => $current_graduate['permalink']
            ]);
          }

          ?>
      </div>
    </ul>
  </div>
  <a class='strip-homepage-text' href='<?= get_home_url() ?>/graduates' >
    See all Graduates<br><span>( There are 46 of us! )</span>
  </a>
  <!-- <a class="homepage-grad-button" href='<?= get_home_url() ?>/graduates'>See all graduates<br><span>( There's 46 of us! )</span></a> -->

</div>
