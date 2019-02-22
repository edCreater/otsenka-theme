<?php
namespace App\Admin;

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux_Framework_sample_config' ) ) {

	class Redux_Framework_Options {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {

			if ( !class_exists( 'ReduxFramework' ) && file_exists( APP_DIR . '/Libs/ReduxCore/framework.php' ) ) {
				require_once( APP_DIR . '/Libs/ReduxCore/framework.php' );
			}

			// This is needed. Bah WordPress bugs.  ;)
			$this->initSettings();

		}

		public function initSettings() {

			// Set the default arguments
			$this->setArguments();

			// Set a few help tabs so you can see how it's done
			$this->setHelpTabs();

			// Create the sections and fields
			$this->setSections();

			if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
				return;
			}

			$this->ReduxFramework = new \ReduxFramework( $this->sections, $this->args );
		}


		public function setHelpTabs() {

			// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			$this->args['help_tabs'][] = array(
				'id'      => 'redux-help-tab-1',
				'title'   => esc_html__( 'Theme Information 1', 'wp-puro' ),
				'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'wp-puro' )
			);

			$this->args['help_tabs'][] = array(
				'id'      => 'redux-help-tab-2',
				'title'   => esc_html__( 'Theme Information 2', 'wp-puro' ),
				'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'wp-puro' )
			);

			// Set the help sidebar
			$this->args['help_sidebar'] = esc_html__( 'This is the sidebar content, HTML is allowed.', 'wp-puro' );
		}

		/**
		 * All the possible arguments for Redux.
		 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 * */
		public function setArguments() {

			$theme = wp_get_theme(); // For use with some settings. Not necessary.

			$this->args = array(
				// TYPICAL -> Change these values as you need/desire
				'opt_name'           => 'smof_data',
				// This is where your data is stored in the database and also becomes your global variable name.
				'display_name'       => esc_html__('Theme Options', 'wp-puro'),
				// Name that appears at the top of your panel
				'display_version'    => 'V'.$theme->get( 'Version' ),
				// Version that appears at the top of your panel
				'menu_type'          => 'menu',
				//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu'     => true,
				// Show the sections below the admin menu item or not
				'menu_title'         => esc_html__('Theme Options', 'bahia'),
				'page_title'         => esc_html__('Theme Options', 'bahia'),
				// You will need to generate a Google API key to use this feature.
				// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
				'google_api_key'     => '',
				// Must be defined to add google fonts to the typography module

				'async_typography'   => false,
				// Use a asynchronous font on the front end or font string
				'admin_bar'          => true,
				// Show the panel pages on the admin bar
				'global_variable'    => '',
				// Set a different name for your global variable other than the opt_name
				'dev_mode'           => false,
				// Show the time the page took to load, etc
				'customizer'         => true,
				// Enable basic customizer support

				// OPTIONAL -> Give you extra features
				'page_priority'      => null,
				// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent'        => 'themes.php',
				// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
				'page_permissions'   => 'manage_options',
				// Permissions needed to access the options panel.
				'menu_icon'          => 'dashicons-art',
				// Specify a custom URL to an icon
				'last_tab'           => '',
				// Force your panel to always open to a specific tab (by id)
				'page_icon'          => 'icon-themes',
				// Icon displayed in the admin panel next to your menu_title
				'page_slug'          => '_options',
				// Page slug used to denote the panel
				'save_defaults'      => true,
				// On load save the defaults to DB before user clicks save or not
				'default_show'       => false,
				// If true, shows the default value next to each field that is not the default value.
				'default_mark'       => '',
				// What to print by the field's title if the value shown is default. Suggested: *
				'show_import_export' => true,
				// Shows the Import/Export panel when not used as a field.

				// CAREFUL -> These options are for advanced use only
				'transient_time'     => 60 * MINUTE_IN_SECONDS,
				'output'             => true,
				// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag'         => true,
				// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

				// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
				'database'           => '',
				// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
				'system_info'        => false,
				// REMOVE

				// HINTS
				'hints'              => array(
					'icon'          => 'icon-question-sign',
					'icon_position' => 'right',
					'icon_color'    => 'lightgray',
					'icon_size'     => 'normal',
					'tip_style'     => array(
						'color'   => 'light',
						'shadow'  => true,
						'rounded' => false,
						'style'   => '',
					),
					'tip_position'  => array(
						'my' => 'top left',
						'at' => 'bottom right',
					),
					'tip_effect'    => array(
						'show' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'mouseover',
						),
						'hide' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'click mouseleave',
						),
					),
				)
			);


			// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
			$this->args['share_icons'][] = array(
				'url'   => '#',
				'title' => 'Visit us on GitHub',
				'icon'  => 'el el-icon-github'
				//'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
			);
			$this->args['share_icons'][] = array(
				'url'   => '#',
				'title' => 'Like us on Facebook',
				'icon'  => 'el el-icon-facebook'
			);
			$this->args['share_icons'][] = array(
				'url'   => '#',
				'title' => 'Follow us on Twitter',
				'icon'  => 'el el-icon-twitter'
			);

			// Panel Intro text -> before the form
			if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
				if ( ! empty( $this->args['global_variable'] ) ) {
					$v = $this->args['global_variable'];
				} else {
					$v = str_replace( '-', '_', $this->args['opt_name'] );
				}
				$this->args['intro_text'] = "";
			} else {
				$this->args['intro_text'] = "";
			}

			// Add content after the form.
			$this->args['footer_text'] = "";
		}

		public function setSections () {

			/**
			 * Contacts
			 */
			$this->sections[] = [
				'title'  => esc_html__( 'Контакты', 'cs' ),
				'icon'   => 'el-icon-credit-card',
				'fields' => [
					[
						'id'      => 'cs_phone',
						'type'    => 'text',
						'title'   => __( 'Phone', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_address',
						'type'    => 'text',
						'title'   => __( 'Address', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_work_time',
						'type'    => 'text',
						'title'   => __( 'Work time', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_email',
						'type'    => 'text',
						'title'   => __( 'Email', 'cs' ),
						'default' => '',
					],
				],
			];

			/**
			 * Social Options
			 */
			$this->sections[] = [
				'title'  => esc_html__( 'Socials', 'cs' ),
				'icon'   => 'el-icon-credit-card',
				'fields' => [
					[
						'id'      => 'cs_social_group_insta',
						'type'    => 'textarea',
						'title'   => __( 'Instagramm link', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_social_group_vk',
						'type'    => 'textarea',
						'title'   => __( 'Vkontakte link', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_social_group_vimeo',
						'type'    => 'textarea',
						'title'   => __( 'Vimeo link', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_social_group_youtube',
						'type'    => 'textarea',
						'title'   => __( 'Youtube link', 'cs' ),
						'default' => '',
					],
				],
			];
			/**
			 * Header Options
			 */
			$this->sections[] = [
				'title'  => esc_html__( 'Header', 'cs' ),
				'icon'   => 'el-icon-credit-card',
				'fields' => [
					[
						'title'    => esc_html__( 'Select Logo', 'cs' ),
						'subtitle' => esc_html__( 'Select an image file for your logo.', 'cs' ),
						'id'       => 'cs_main_logo',
						'type'     => 'media',
						'url'      => true,
						'default'  => [
							'url' => THEME_DIR_URI . '/assets/img/logo.png',
						],
					],
				],
			];

			/**
			 * Consultant options
			 */
			$this->sections[] = [
				'title'  => esc_html__( 'Consultant block', 'cs' ),
				'icon'   => 'el-icon-credit-card',
				'fields' => [
					[
						'title'    => esc_html__( 'Consultant avatar', 'cs' ),
						'id'       => 'cs_consultant_thumb',
						'type'     => 'media',
						'url'      => true,
					],
					[
						'id'       => 'cs_consultant_name',
						'type'     => 'text',
						'title'    => __( 'Name', 'cs' ),
						'default'  => '',
					],
					[
						'id'       => 'cs_consultant_position',
						'type'     => 'text',
						'title'    => __( 'Position', 'cs' ),
						'default'  => '',
					],
					[
						'id'       => 'cs_consultant_email',
						'type'     => 'text',
						'title'    => __( 'Email', 'cs' ),
						'default'  => '',
					],
					[
						'id'       => 'cs_consultant_phone',
						'type'     => 'text',
						'title'    => __( 'Phone', 'cs' ),
						'default'  => '',
					],
					[
						'id'      => 'cs_consultant_content',
						'type'    => 'editor',
						'title'   => __( 'Content', 'cs' ),
						'default' => '',
					],
				],
			];

			/**
			 * 404 Options
			 */
			$this->sections[] = [
				'title'  => esc_html__( '404', 'cs' ),
				'icon'   => 'el-icon-credit-card',
				'fields' => [
					[
						'id'       => 'cs_404_title',
						'type'     => 'text',
						'title'    => __( '404 title', 'cs' ),
						'subtitle' => __( '404 title', 'cs' ),
						'desc'     => __( '404 title', 'cs' ),
						'default'  => 'Error 404',
					],
					[
						'id'      => 'cs_404_content',
						'type'    => 'editor',
						'title'   => __( '404 content', 'cs' ),
						'default' => 'Page not found',
					],
				],
			];

			/**
			 * Footer
			 *
			 * @author Chinh Duong Manh
			 */
			$this->sections[] = [
				'title'  => esc_html__( 'Footer', 'cs' ),
				'icon'   => 'el-icon-credit-card',
				'fields' => [
					[
						'id'      => 'cs_footer_info',
						'type'    => 'editor',
						'title'   => __( 'Footer info', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_copyright',
						'type'    => 'text',
						'title'   => __( 'Copyright', 'cs' ),
						'default' => '',
					],
					[
						'id'      => 'cs_counters',
						'type'    => 'textarea',
						'title'   => __( 'Counters', 'cs' ),
						'default' => '',
					],

				],
			];

		}

	}


}