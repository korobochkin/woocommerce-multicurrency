<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages;

interface PageInterface {

	/*function __construct(
		// For add_submenu_page()
		$parent_slug,
		$page_title,
		$menu_title,
		$capability,
		$menu_slug,
		$function = '',

		// Option group (used in render())
		$option_group,

		// Help tabs & sidebar
		$help_tabs = array(),
		$help_sidebar = null
	);*/

	function register();

	function is_valid();


	function register_help_tabs();

	function register_help_sidebar();


	function set_parent_slug( $slug );

	function get_parent_slug();

	function is_parent_slug_valid( $slug );


	function set_page_title( $title );

	function get_page_title();

	function is_page_title_valid( $title );


	function set_menu_title( $title );

	function get_menu_title();

	function is_menu_title_valid( $title );


	function set_capability( $cap );

	function get_capability();

	function is_capability_valid( $cap );


	function set_menu_slug( $menu_slug );

	function get_menu_slug();

	function is_menu_slug_valid( $menu_slug );


	function set_help_tabs( $help_tabs );

	function set_help_tab( $help_tab );

	function get_help_tabs();

	function is_help_tab_valid( $help_tab );

	function is_help_tabs();


	function set_help_sidebar( $help_sidebar );

	function get_help_sidebar();

	function is_help_sidebar_valid( $help_sidebar );


	function set_option_group( $option_group );

	function get_option_group();

	function is_option_group_valid( $option_group );
}
