<?php

namespace App\Controllers;

use function App\cs_get_lazy;
use Sober\Controller\Controller;

class PageTmplService extends Controller {

	public function promo() {

		if ( ! get_field( 'cs_promo_display' ) ) {
			return false;
		}

		$promo_fields = get_field( 'cs_promo_fields' );

		$promo = \App\template( 'partials.service.promo', [
				'description'      => ( !empty( $promo_fields['cs_promo_description'] ) ) ? $promo_fields['cs_promo_description'] : 'Введите описание',
				'thumb'            => wp_get_attachment_image_url( $promo_fields['cs_promo_image']['id'], 'big-thumb' ),
				'thumb_mobile'     => wp_get_attachment_image_url( $promo_fields['cs_promo_image_mobile']['id'], 'full' ),
				'title'            => $promo_fields['cs_promo_title'],
				'subtitle'         => $promo_fields['cs_promo_subtitle'],
				'content_title'    => $promo_fields['cs_promo_content_title'],
				'content_subtitle' => $promo_fields['cs_promo_content_subtitle'],
				'content'          => $promo_fields['cs_promo_content'],
				'price_lbl'        => $promo_fields['cs_promo_pricelbl'],
				'price_val'        => $promo_fields['cs_promo_priceval'],
			]
		);

		return $promo;

	}

	public function service_info() {

		$info_items = [];
		$info_cat   = get_field( 'cs_service_info' );

		$args = [
			'post_type' => 'cs_info',
			'tax_query' => [
				[
					'taxonomy' => 'cs_info_cats',
					'field'    => 'id',
					'terms'    => $info_cat
				]
			]
		];

		$info_posts = new \WP_Query( $args );

		while ( $info_posts->have_posts() ) {
			$info_posts->the_post();

			$info_items[ get_the_ID() ] = [
				'title'   => get_the_title(),
				'content' => get_the_content(),
			];

		}

		$info = \App\template( 'partials.service.service-info', [
				'info_items' => $info_items,
			]
		);

		wp_reset_query();

		return $info;

	}

	public function widget_projects() {
		$widgets = '';

		if ( have_rows( 'cs_service_widget_projects' ) ) {
			// loop through the rows of data
			while ( have_rows( 'cs_service_widget_projects' ) ) : the_row();

				$proejct_id = get_sub_field( 'cs_service_widget_id' );

				$widgets .= \App\template( 'partials.service.widget-project', [
						'thumb'       => get_the_post_thumbnail( $proejct_id, 'medium-thumb', [ 'class' => 'img-fluid' ] ),
						'title'       => get_the_title( $proejct_id ),
						'date'        => get_the_date( 'd.m.y', $proejct_id ),
						'description' => get_sub_field( 'cs_service_widget_content' ),
						'url'         => get_permalink( $proejct_id ),
					]
				);

			endwhile;
		}

		return $widgets;

	}

	public function projects_list() {
		$projects_list = '';
		$projects_cat  = get_field( 'cs_service_projects' );

		$args = array(
			'post_type'      => 'cs_project',
			'posts_per_page' => - 1,
			'tax_query'      => [
				[
					'taxonomy' => 'cs_project_cats',
					'field'    => 'id',
					'terms'    => $projects_cat
				]
			]
		);

		$projects = new \WP_Query( $args );

		while ( $projects->have_posts() ) {
			$projects->the_post();
			$proejct_id = get_the_ID();

			$projects_list .= \App\template( 'partials.project.project-prev', [
					'thumb'       => cs_get_lazy( get_the_post_thumbnail( $proejct_id, 'medium-thumb', [ 'class' => 'img-fluid lazy-image' ] ) ),
					'title'       => get_the_title(),
					'subtitle'    => get_post_meta( $proejct_id, 'cs_project_subtitle', true ),
					'date'        => get_the_date(),
					'description' => get_the_excerpt(),
					'url'         => get_the_permalink(),
				]
			);

		}

		wp_reset_query();

		return $projects_list;

	}

}
