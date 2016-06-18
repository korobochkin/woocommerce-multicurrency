<?php
namespace Korobochkin\WCMultiCurrency\Service\ChangeCurrency;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Models\Currency;

class PricesRecalculate {

	private static $me = false;

	/**
	 * @var \Korobochkin\WCMultiCurrency\Models\Currency
	 */
	private static $currency;

	private static $requested_currency;

	public static function is_proper_currency_available() {

		if( !self::$requested_currency ) {
			if( !isset( $_COOKIE[Plugin::NAME . '-currency'] ) ) {
				return false;
			}

			$requested =& $_COOKIE[Plugin::NAME . '-currency'];

			self::prepare_currency( $requested );
			if( self::$currency->get_rate( $requested ) ) {
				return $proper_currency;
			}
		}
		return self::$requested_currency;
	}

	public static function prepare_currency( $ticker ) {
		if( !self::$currency ) {
			self::$currency = new Currency( $ticker );
		}
	}

	public static function woocommerce_get_price( $price, $obj ) {
		//get_price_html()

		$ticker = self::is_proper_currency_available();

		if( $ticker ) {

			$default_ticker = get_woocommerce_currency();
			$currency = new Currency( $default_ticker );
			$rate = $currency->get_rate( $ticker );

			if( is_numeric( $rate ) ) {
				return $rate * $price;
			}
		}

		return $price;
	}

	public static function woocommerce_currency( $ticker ) {

		$ticker = self::is_proper_currency_available();

		if( $ticker ) {
			return $ticker;
		}

		return $ticker;
	}
}
