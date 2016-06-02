<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings;

class Registrator {

	/**
	 * @var \Korobochkin\WCMultiCurrency\Admin\Settings\Options\Rates[] | \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options\DefaultOption[]
	 */
	public static $options = array();

	/**
	 * @var \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Page[]
	 */
	public static $pages = array();

	public static function init() {

		add_action( 'admin_menu', array( __CLASS__, 'before_register_pages' ) );
		add_action( 'admin_menu', array( __CLASS__, 'register_pages' ) );

		// Before register settings
		add_action( 'admin_init', array( __CLASS__, 'before_register_settings' ) );
		// Register settings
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
	}

	/**
	 * Init settings objects.
	 *
	 * @since 0.0.2
	 */
	public static function before_register_settings() {
		$option = new Options\Rates();
		$option_name = $option->get_name();
		if( $option_name ) {
			self::$options[$option_name] = $option;
		}
	}

	/**
	 * Register settings in WordPress.
	 *
	 * @since 0.0.2
	 */
	public static function register_settings() {
		if( !empty( self::$options ) && is_array( self::$options ) ) {
			foreach( self::$options as $option ) {
				$option->register();
			}
		}
	}

	public static function before_register_pages() {
		$page = new Departments\OptionsGeneral\General\Page();
		$page_name = $page->get_full_page_menu_slug();
		if( $page_name ) {
			self::$pages[$page_name] = $page;
		}
	}

	public static function register_pages() {
		if( !empty( self::$pages ) && is_array( self::$pages ) ) {
			foreach( self::$pages as $page ) {
				$page->register();
			}
		}
	}
}