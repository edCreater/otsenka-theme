<?php

/**
 * Created by EdCreater.
 * Site: codesweet.ru
 * Email: ed.creater@gmail.com
 * Date: 04.08.2015
 */
namespace App\PostTypes;

class CS_Info
{
	function __construct(){

		$this->cs_info_posttype();
		$this->cs_info_category();

		add_filter("manage_edit-cs_info_columns", array($this, 'cs_info_columns'));
		add_filter('manage_cs_info_posts_custom_column', array($this, 'cs_info_fill_columns'), 5, 2);

	}

	function cs_info_posttype() {

		register_post_type('cs_info', array(
				'label'             => __('Info', 'cs'),
				'public'            => true,
				'show_ui'           => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
				'hierarchical'      => false,
				'has_archive'       => false,
				'rewrite'           => false,
				'supports'          => array(
					'title', 'page-attributes', 'thumbnail', 'editor', 'excerpt'
				),
			)
		);
	}

	function cs_info_category() {

		$labels = array(
			'name' => _x( 'Info categories', 'cs' ),
			'singular_name' => _x( 'Info category', 'cs' ),
			'search_items' =>  __( 'Search Info categories', 'cs' ),
			'popular_items' => __( 'Popular Info categories' ),
			'all_items' => __( 'All Info categories' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Info category' ),
			'update_item' => __( 'Update Info category' ),
			'add_new_item' => __( 'Add New Info category' ),
			'new_item_name' => __( 'New Info category' ),
			'separate_items_with_commas' => __( 'Separate Info categories with commas' ),
			'add_or_remove_items' => __( 'Add or remove Info categories' ),
			'choose_from_most_used' => __( 'Choose from the most used Info categories' ),
			'menu_name' => __( 'Info categories' ),
		);
		$args = array(
			'labels'=>$labels,
			'hierarchical' => true,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'cs_info_cats', 'cs_info', $args );

	}

	function cs_info_fill_columns( $colname, $post_id ) {
		if( $colname === 'terms' ){

			echo get_the_term_list($post_id, 'cs_info_cats');

		}
	}


	function cs_info_columns($columns) {

		$num = 2; // после какой по счету колонки вставлять новые

		$column_terms = array( 'terms' => __('Terms') );

		return array_slice( $columns, 0, $num ) + $column_terms + array_slice( $columns, $num );

	}
}
