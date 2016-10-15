<?php
  $filters = [
    [
      'id'    => 'graphic-design',
      'label' => 'Graphic Design',
    ],
    [
      'id'    => 'web-design',
      'label' => 'Web Design',
    ],
    [
      'id'    => 'animation',
      'label' => 'Animation',
    ],
    [
      'id'    => 'ui-ux',
      'label' => 'UI/UX',
    ],
    [
      'id'    => 'typography',
      'label' => 'Typography',
    ],
    [
      'id'    => 'print-design',
      'label' => 'Print',
    ],
    [
      'id'    => 'visual-art',
      'label' => 'Visual Art',
    ],
    [
      'id'    => 'branding',
      'label' => 'Branding',
    ],
    [
      'id'    => 'photography',
      'label' => 'Photography',
    ],
    [
      'id'    => 'tangible-media',
      'label' => 'Tangible Media',
    ],
    [
      'id'    => 'ftv',
      'label' => 'Film &amp; TV',
    ],
    [
      'id'    => 'production-design',
      'label' => 'Production',
    ],
    [
      'id'    => 'sustainable',
      'label' => 'Sustainable Design',
    ],
    [
      'id'    => 'interior-design',
      'label' => 'Interior Design',
    ],
  ];
?>

<ul class="graduate-filters">
  <li class="menu-item filter-item active" data-filter-class="all">
    <a href="javascript:void(0)">All</a>
  </li>
  <?php
  foreach($filters as $filter){ ?>
    <li class="menu-item filter-item" data-filter-class="<?= $filter['id'] ?>">
      <a href="javascript:void(0)"><?= $filter['label'] ?></a>
    </li>
  <?php
  }
echo '</ul>';
