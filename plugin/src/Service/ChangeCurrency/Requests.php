<?php
namespace Korobochkin\WCMultiCurrency\Service\ChangeCurrency;

use Korobochkin\WCMultiCurrency\Plugin;

class Requests {

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
}
