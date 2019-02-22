<?php

namespace App\Controllers;

use function App\cs_get_lazy;
use App\Modules\CS_Breadcrumbs;
use Sober\Controller\Controller;

class App extends Controller {
	public function siteName() {
		return get_bloginfo( 'name' );
	}

	public static function title() {
		if ( is_home() ) {
			if ( $home = get_option( 'page_for_posts', true ) ) {
				return get_the_title( $home );
			}

			return __( 'Latest Posts', 'sage' );
		}
		if ( is_archive() ) {
			return get_the_archive_title();
		}
		if ( is_search() ) {
			return sprintf( __( 'Search Results for %s', 'sage' ), get_search_query() );
		}
		if ( is_404() ) {
			return __( 'Not Found', 'sage' );
		}

		return get_the_title();
	}

	public function breadcrumbs() {
		if ( is_home() ) {
			return __( 'Latest Posts', 'sage' );
		}

		ob_start();

		CS_Breadcrumbs::display_breadcrumbs();

		$breadcrumbs = ob_get_contents();

		ob_end_clean();

		return $breadcrumbs;
	}

	public function last_news() {
		$news_arr = [];

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
		);

		$news = new \WP_Query( $args );

		while ( $news->have_posts() ) {
			$news->the_post();
			$news_id = get_the_ID();

			$news_arr[] = \App\template( 'partials.news.news-prev', [
					'thumb'       => get_the_post_thumbnail( $news_id, 'medium-thumb-2', [ 'class' => 'img-fluid' ] ),
					'title'       => get_the_title(),
					'subtitle'    => get_post_meta( $news_id, 'cs_project_subtitle', true ),
					'date'        => get_the_date(),
					'description' => get_the_excerpt(),
				]
			);
		}

		$last_news = \App\template( 'partials.commons.last-news', [
				'news_items' => $news_arr,
			]
		);

		wp_reset_query();

		return $last_news;

	}

	public function resources() {
		$documents_arr = [];
		$reviews_arr   = [];

		$args = array(
			'post_type'      => 'cs_document',
			'posts_per_page' => 8,
		);

		$documents = new \WP_Query( $args );
		while ( $documents->have_posts() ) {
			$documents->the_post();
			$document_id = get_the_ID();

			$documents_arr[] = \App\template( 'partials.document.document-prev', [
					'thumb'       => cs_get_lazy( get_the_post_thumbnail( $document_id, 'resources-thumb', [ 'class' => 'img-fluid lazy-image' ] ) ),
					'title'       => get_the_title(),
					'ext'         => get_post_meta( $document_id, 'cs_document_date', true ),
					'description' => get_the_excerpt(),
					'url'         => get_the_post_thumbnail_url( $document_id, 'full' ),
				]
			);
		}

		$args = array(
			'post_type'      => 'cs_review',
			'posts_per_page' => 8,
		);

		$reviews = new \WP_Query( $args );
		while ( $reviews->have_posts() ) {
			$reviews->the_post();
			$review_id = get_the_ID();

			$reviews_arr[] = \App\template( 'partials.document.document-prev', [
					'thumb'       => cs_get_lazy( get_the_post_thumbnail( $review_id, 'resources-thumb', [ 'class' => 'img-fluid lazy-image' ] ) ),
					'title'       => get_the_title(),
					'ext'         => get_post_meta( $review_id, 'cs_review_industry', true ),
					'description' => get_the_excerpt(),
					'url'         => get_the_post_thumbnail_url( $review_id, 'full' ),
				]
			);
		}

		$resources = \App\template( 'partials.commons.resources', [
				'documents_items' => $documents_arr,
				'reviews_items'   => $reviews_arr,
			]
		);

		wp_reset_query();

		return $resources;

	}
}
