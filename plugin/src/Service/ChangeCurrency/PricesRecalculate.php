<?php
namespace Korobochkin\WCMultiCurrency\Service\ChangeCurrency;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Models\Currency;

class PricesRecalculate {

	/**
	 * @var \Korobochkin\WCMultiCurrency\Models\Currency
	 */
	private static $currency;

	public static function is_proper_currency_available() {
		if( isset( $_COOKIE[Plugin::NAME . '-currency'] ) ) {
			$proper_currency =& $_COOKIE[Plugin::NAME . '-currency'];

			self::prepare_currency( $proper_currency );
			if( self::$currency->get_rate( $proper_currency ) ) {
				return $proper_currency;
			}
		}
		return false;
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
