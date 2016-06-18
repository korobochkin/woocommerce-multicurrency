<?php
namespace Korobochkin\WCMultiCurrency\Admin;

class Admin {

	public static function run() {
		Settings\Registrator::init();

		//add_action( 'admin_init', array( __NAMESPACE__ . '\Service\Cron\UpdateRates', 'run' ) );
	}
}
