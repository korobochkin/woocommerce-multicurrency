<?php
namespace Korobochkin\WCMultiCurrencies\Admin\Settings;

class Registrator {

	/**
	 * @var \Korobochkin\WCMultiCurrencies\Admin\Settings\Options\Rates[] |\Korobochkin\WCMultiCurrencies\Admin\Settings\Prototypes\Options\DefaultOption[]
	 */
	public static $options = array();

	public static function init() {
		add_action( 'admin_menu', array( '\Korobochkin\WCMultiCurrencies\Admin\Settings\OptionsGeneral\Pages', 'register_pages' ) );
		add_action( 'admin_init', array( '\Korobochkin\WCMultiCurrencies\Admin\Settings\OptionsGeneral\Pages\General\Page', 'init' ) );

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

	public static function register_pages() {

	}
}