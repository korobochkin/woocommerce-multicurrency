<?php
namespace Korobochkin\WCMultiCurrency\Service\ChangeCurrency;

class Loader {

	public static function add_actions() {
		// Check for _GET variable and set cookie
		add_action( 'plugins_loaded', array( 'Korobochkin\WCMultiCurrency\Service\ChangeCurrency\Requests', 'handle_request' ) );

		// Handle WooCommerce get_price_* functions
		add_filter( 'woocommerce_get_price', array( __CLASS__, 'woocommerce_get_price' ), 10, 2 );
		add_filter( 'woocommerce_currency', array( __CLASS__, 'woocommerce_currency' ) );
	}
}
