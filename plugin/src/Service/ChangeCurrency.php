<?php
namespace Korobochkin\WCMultiCurrency\Service;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Admin\Settings\Options;
use Korobochkin\WCMultiCurrency\Models\Currency;

class ChangeCurrency {

	private static $rates_obj;

	public static function handle_request() {
		if( is_admin() ) {
			return;
		}

		self::handle_get();
	}

	public static function handle_get() {
		global $wp;
		$get_name = Plugin::NAME . '-set-default-currency';

		if( isset( $_GET[$get_name] ) && is_string( $_GET[$get_name] ) ) {
			$ticker = $_GET[$get_name];
			$name = Plugin::NAME . '-currency';

			$secure = ( 'https' === parse_url( admin_url(), PHP_URL_SCHEME ) );
			setcookie( $name, $ticker, time() + YEAR_IN_SECONDS, SITECOOKIEPATH, null, $secure );

			$url = home_url( $_SERVER['REQUEST_URI'] );
			$url = remove_query_arg( $get_name, $url );

			wp_redirect( $url );
			exit;
		}
	}

	public static function is_proper_currency_available() {
		if( isset( $_COOKIE[Plugin::NAME . '-currency'] ) ) {
			$proper_currency =& $_COOKIE[Plugin::NAME . '-currency'];

			if( !self::$rates_obj ) {
				self::$rates_obj = new Options\Rates();
			}
			$rates = self::$rates_obj->get_value();

			if( isset( $rates['rates'][$proper_currency] ) ) {
				return $proper_currency;
			}
		}
		return false;
	}

	public static function woocommerce_get_price( $price, $obj ) {
		//get_price_html()

		$ticker = self::is_proper_currency_available();

		if( $ticker ) {

			$currency = new Currency( $ticker );
			return
		}

		return $price;
	}
}
