<?php
namespace Korobochkin\WCMultiCurrency\Admin\Service\Cron;

use Korobochkin\WCMultiCurrency\Admin;
use Korobochkin\WCMultiCurrency\Plugin;
use OpenExchangeRates\OpenExchangeRates;

class UpdateRates {

	public static function run() {
		try {
			$exchange = new OpenExchangeRates(
				WC_MULTI_CURRENCY_APP_ID,
				OpenExchangeRates::PROTOCOL_HTTP,
				OpenExchangeRates::HTTP_CLIENT_CURL
			);

			$rates = $exchange->latest();
			update_option( Plugin::NAME . '-rates', $rates );
		}
		catch(\Exception $e) {
			// TODO: надо бы показывать пользователю что случилось где-нибудь в виде Notice в административной части WP
		}
	}
}
