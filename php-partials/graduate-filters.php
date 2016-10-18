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
      'id'    => 'ui-ux',
      'label' => 'UI/UX',
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
      'id'    => 'illustration',
      'label' => 'Illustration',
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
      'id'    => 'typography',
      'label' => 'Typography',
    ],
    [
      'id'    => 'ftv',
      'label' => 'Film &amp; TV',
    ],
    [
      'id'    => 'animation',
      'label' => 'Animation',
    ],
    [
      'id'    => 'tangible-media',
      'label' => 'Tangible Media',
    ],
    [
      'id'    => 'production',
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
<div class="graduate-filters-container">

  <a href="javascript:void(0)" class="button button--small toggle-graduate-filters">Filter: All</a>

  <div class="graduate-filters-wrapper">
    <div class="inline-v-align">

          <h3 class="filter-title">Filter by Discipline</h3>

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
            } ?>
          </ul>

          <a href="javascript:void(0)"><i class="icon-close toggle-graduate-filters"></i></a>

    </div>
  </div>

</div>
