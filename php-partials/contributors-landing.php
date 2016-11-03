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
  'Alex Levonis',
  'Tracey Constable',
  'Kristie Lund',
  'Ali Dark',
  'Peter Chan',
  'Mark Lappin',
  'Megan Trotter',
  'Peter Davis',
  'Pamela V',
  'Barry Voevodin',
  'Julie Voevodin',
  'Lyndal McNulty',
  'Matt Keliher',
  'Kelly Paterson',
  'Dr David Saltissi',
  'Jordie Peters',
  'Liz Iacopetta',
  'Liam Sheppard',
  'Jordie Peters',
  'Anita Edmondson',
  'Michael Vandersande',
  'Chloe McFarlane',
  'Peter Chan',
  'Ali Dark',
  'Tracey Constable',
  'Alex Levonis',
];

 ?>

<div class="panel-bridge"></div>

<div class="panel panel--pozible-contributors">
  <h2>And Our Generous Supporters</h2>
  <ul class="pozible-contributors-list">
    <?php
    shuffle($contributors);
    foreach($contributors as $contributor){
      echo '<li class="pozible-contributor"><span class="emoji">' . $emojis[array_rand($emojis)] . '</span> ' . $contributor . '</li>';
    }
    echo '<li class="pozible-contributor pozible-anons"><span class="emoji">&#128521;</span> +4 anons (you know who you are) <span class="emoji">&#128521;</span></li>'
    ?>
  </ul>

</div>
