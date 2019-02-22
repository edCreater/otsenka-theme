<?php

/**
 * Created by EdCreater.
 * Site: codesweet.ru
 * Email: ed.creater@gmail.com
 * Date: 04.08.2015
 */
namespace App\PostTypes;

class CS_Document
{
	function __construct(){

		$this->cs_document_posttype();

	}

	function cs_document_posttype() {

		register_post_type('cs_document', array(
				'label'             => __('Documents', 'cs'),
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

}
