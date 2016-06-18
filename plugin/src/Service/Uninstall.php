<?php
namespace Korobochkin\WCMultiCurrency\Service;

use Korobochkin\WCMultiCurrency\Plugin;

class Uninstall {

	public static function run() {
		self::remove_cron();
	}

	public static function remove_cron() {
		wp_unschedule_event( 1, Plugin::NAME . '-update-rates' );
	}
}
