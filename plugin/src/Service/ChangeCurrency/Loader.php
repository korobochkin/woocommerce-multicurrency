<?php
namespace Korobochkin\WCMultiCurrency\Service\ChangeCurrency;

use Korobochkin\WCMultiCurrency\Plugin;

class Loader {

	private static $priceUpdater;

	public static function init() {
		$requested_ticker = self::get_requested_ticker();

		if( $requested_ticker ) {
			self::$priceUpdater = new PriceUpdater( $requested_ticker );
		}
	}

	public static function add_actions() {
		// Check for _GET variable and set cookie
		add_action( 'plugins_loaded', array( 'Korobochkin\WCMultiCurrency\Service\ChangeCurrency\Requests', 'handle_request' ) );

		if( self::$priceUpdater ) {
			// Handle WooCommerce get_price_* functions
			add_filter( 'woocommerce_get_price', array( self::$priceUpdater, 'woocommerce_get_price' ), 10, 2 );
			add_filter( 'woocommerce_currency', array( self::$priceUpdater, 'woocommerce_currency' ) );
		}
	}

	public static function get_requested_ticker() {
		return self::get_requested_ticker_from_cookie();
	}

	public static function get_requested_ticker_from_cookie() {
		$cookie = Plugin::NAME . '-currency';
		if( !isset( $_COOKIE[$cookie] ) ) {
			return false;
		}
		return $_COOKIE[$cookie];
	}

	public function get_price_updater() {
		return self::$priceUpdater;
	}
}
