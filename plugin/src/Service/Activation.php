<?php
namespace Korobochkin\WCMultiCurrency\Service;

use Korobochkin\WCMultiCurrency\Plugin;

class Activation {

	public static function run() {
		self::setup_cron();
	}

	public static function setup_cron() {
		wp_schedule_event( time(), 'hourly', Plugin::NAME . '-update-rates' );
	}
}
