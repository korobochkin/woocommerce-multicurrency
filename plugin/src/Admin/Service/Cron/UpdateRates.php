<?php
namespace Korobochkin\WCMultiCurrency\Admin\Service\Cron;

use Korobochkin\WCMultiCurrency\Admin;
use Korobochkin\WCMultiCurrency\Plugin;
use OpenExchangeRates\OpenExchangeRates;
use Korobochkin\WCMultiCurrency\Admin\Settings\Options;

class UpdateRates {

	public static function run() {
		try {
			$exchange = new OpenExchangeRates(
				WC_MULTI_CURRENCY_APP_ID,
				OpenExchangeRates::PROTOCOL_HTTP,
				OpenExchangeRates::HTTP_CLIENT_CURL
			);

			/**
			 * На бесплатном тарифе за основную валюту можно взять лишь доллар :)
			 */
			$rates = $exchange->latest();

			$option = new Options\Rates();
			$rates = $option::sanitize( $rates );
			update_option( $option->get_name(), $rates );
		}
		catch(\Exception $e) {
			// TODO: надо бы показывать пользователю что случилось где-нибудь в виде Notice в административной части WP
		}
	}
}
