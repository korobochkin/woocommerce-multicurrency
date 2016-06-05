<?php
namespace Korobochkin\WCMultiCurrency\Admin\Service\Cron;

use Korobochkin\WCMultiCurrency\Admin;
use Korobochkin\WCMultiCurrency\Plugin;
use OpenExchangeRates\OpenExchangeRates;

class UpdateRates {

	public static function run() {
		/*$exchange = new OpenExchangeRates(
			WC_MULTI_CURRENCY_APP_ID,
			OpenExchangeRates::PROTOCOL_HTTP,
			OpenExchangeRates::HTTP_CLIENT_CURL
		);
		$rates = $exchange->latest(array(
			'base' => get_woocommerce_currency()
		));*/

		$rates = array(
			'kk' => 1,
			'kk2' => 2
		);

		//$option = Admin\Settings\Registrator::$options[Plugin::NAME . '-rates'];

		update_option( Plugin::NAME . '-rates', $rates );

		$kk ='';
	}
}
