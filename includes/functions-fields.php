<?php

// function register_work_contributors_field(){
//     acf_add_local_field_group(array(
//     	'key' => 'works_fields',
//     	'title' => 'Works Properties',
//     	'fields' => array (
//     		array (
//     			'key' => 'contributors',
//     			'label' => 'Contributors',
//     			'name' => 'contributors',
//     			'type' => 'repeater',
//           'button_label' => 'Add Contributor',
//           'sub_fields' => [
//               [
//                 'key' => 'contributor',
//                 'label' => 'Contributor',
//                 'name' => 'contributor',
//                 'type' => 'select',
//                 'choices' => get_graduate_names(get_graduate_ids())
//                 ]
//             ]
//     		)
//     	),
//       'position' => 'side',
//     	'location' => array (
//     		array (
//     			array (
//     				'param' => 'post_type',
//     				'operator' => '==',
//     				'value' => 'work',
//     			),
//     		),
//     	),
//     ));
// }
//
//
//
// if( function_exists('acf_add_local_field_group') ) {
//   register_work_contributors_field();
// }
