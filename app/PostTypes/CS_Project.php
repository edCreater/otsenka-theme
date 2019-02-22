<?php

/**
 * Created by EdCreater.
 * Site: codesweet.ru
 * Email: ed.creater@gmail.com
 * Date: 04.08.2015
 */
namespace App\PostTypes;

class CS_Project
{
	function __construct(){

		$this->cs_project_posttype();
		$this->cs_project_category();

		add_filter("manage_edit-cs_project_columns", array($this, 'cs_project_columns'));
		add_filter('manage_cs_project_posts_custom_column', array($this, 'cs_project_fill_columns'), 5, 2);

	}

	function cs_project_posttype() {

		register_post_type('cs_project', array(
				'label'             => __('Projects', 'cs'),
				'public'            => true,
				'show_ui'           => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
				'hierarchical'      => false,
				'has_archive'       => false,
				'rewrite'           => ['slug' => 'project'],
				'supports'          => array(
					'title', 'page-attributes', 'editor', 'excerpt', 'thumbnail'
				),
			)
		);
	}

	function cs_project_category() {

		$labels = array(
			'name' => _x( 'Project categories', 'cs' ),
			'singular_name' => _x( 'Project category', 'cs' ),
			'search_items' =>  __( 'Search Project categories', 'cs' ),
			'popular_items' => __( 'Popular Project categories' ),
			'all_items' => __( 'All Project categories' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Project category' ),
			'update_item' => __( 'Update Project category' ),
			'add_new_item' => __( 'Add New Project category' ),
			'new_item_name' => __( 'New Project category' ),
			'separate_items_with_commas' => __( 'Separate Project categories with commas' ),
			'add_or_remove_items' => __( 'Add or remove Project categories' ),
			'choose_from_most_used' => __( 'Choose from the most used Project categories' ),
			'menu_name' => __( 'Project categories' ),
		);
		$args = array(
			'labels'=>$labels,
			'hierarchical' => true,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'cs_project_cats', 'cs_project', $args );

	}

	function cs_project_fill_columns( $colname, $post_id ) {
		if( $colname === 'terms' ){

			echo get_the_term_list($post_id, 'cs_project_cats');

		}
	}


	function cs_project_columns($columns) {

		$num = 2; // после какой по счету колонки вставлять новые

		$column_terms = array( 'terms' => __('Terms') );

		return array_slice( $columns, 0, $num ) + $column_terms + array_slice( $columns, $num );

	}
}
