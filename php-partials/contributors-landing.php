<?php

$emojis = array(
  '&#128512;',
  '&#128514;',
  '&#128513;',
  '&#128515;',
  '&#128516;',
  '&#128517;',
  '&#128518;',
  '&#128519;',
  '&#128521;',
  '&#128524;',
  '&#128525;',
  '&#128526;',
  '&#128527;',
  '&#128528;',
  '&#128533;',
  '&#128539;',
  '&#128541;'
);


$contributors = [
  [
    'first_name' => 'Alex',
    'last_name' => 'Levonis',
  ],
  [
    'first_name' => 'Tracey',
    'last_name' => 'Constable',
  ],
  [
    'first_name' => 'Kristie',
    'last_name' => 'Lund',
  ],
  [
    'first_name' => 'Ali',
    'last_name' => 'Dark',
  ],
  [
    'first_name' => 'Peter',
    'last_name' => 'Chan',
  ],
  [
    'first_name' => 'Mark',
    'last_name' => 'Lappin',
  ],
  [
    'first_name' => 'Megan',
    'last_name' => 'Trotter',
  ],
  [
    'first_name' => 'Peter',
    'last_name' => 'Davis',
  ],
  [
    'first_name' => 'Pamela',
    'last_name' => 'V',
  ],
  [
    'first_name' => 'Barry',
    'last_name' => 'Voevodin',
  ],
  [
    'first_name' => 'Julie',
    'last_name' => 'Voevodin',
  ],
  [
    'first_name' => 'Lyndal',
    'last_name' => 'McNulty',
  ],
  [
    'first_name' => 'Matt',
    'last_name' => 'Keliher',
  ],
  [
    'first_name' => 'Kelly',
    'last_name' => 'Paterson',
  ],
  [
    'first_name' => 'Dr David',
    'last_name' => 'Saltissi',
  ],
  [
    'first_name' => 'Jordie',
    'last_name' => 'Peters',
  ],
  [
    'first_name' => 'Liz',
    'last_name' => 'Iacopetta',
  ],
  [
    'first_name' => 'Liam',
    'last_name' => 'Sheppard',
  ],
  [
    'first_name' => 'Jordie',
    'last_name' => 'Peters',
  ],
  [
    'first_name' => 'Anita',
    'last_name' => 'Edmondson',
  ],
  [
    'first_name' => 'Michael',
    'last_name' => 'Vandersande',
  ],
  [
    'first_name' => 'Chloe',
    'last_name' => 'McFarlane',
  ],
  [
    'first_name' => 'Jordie',
    'last_name' => 'Peters',
  ],
  [
    'first_name' => 'Michael',
    'last_name' => 'Schmidt',
  ],
];

 ?>

<div class="panel-bridge"></div>

<div class="panel panel--pozible-contributors">
  <h2>And Our Generous Supporters</h2>
  <ul class="pozible-contributors-list">
    <?php
    shuffle($contributors);
    foreach($contributors as $contributor){
      echo '<li class="pozible-contributor"><span class="emoji">' . $emojis[array_rand($emojis)] . '</span> <span class="first" data-first-of-last="' . substr($contributor['last_name'], 0, 1) . '">' . $contributor['first_name'] . ' </span><span class="last">' . $contributor['last_name'] . '</span></li>';
    }
    echo '<li class="pozible-contributor pozible-anons"><span class="emoji">&#128521;</span> +4 anons (you know who you are) <span class="emoji">&#128521;</span></li>'
    ?>
  </ul>

</div>
