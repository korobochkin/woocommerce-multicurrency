<?php
namespace Korobochkin\WCMultiCurrency;

class Plugin {

	const NAME = 'wc-multi-currency';

	private $plugin_path = NULL;

	private $plugin_ver;

	/**
	 * Setup plugin object.
	 *
	 * @since 0.0.1
	 *
	 * @param $run_from_file string Main plugin file full path.
	 */
	public function __construct( $run_from_file ) {
		$this->plugin_path = $run_from_file;
		$this->plugin_ver = '0.0.1';
	}

	public function run() {

		if( !Service\WooCommerce::is_active() ) {
			return;
		}

		/**
		 * TODO: костыль
		 */
		if( ! defined( 'WC_MULTI_CURRENCY_APP_ID' ) ) {
			return;
		}

		// Cron tasks
		//add_action( Plugin::NAME . '-update-rates', array( __NAMESPACE__ . '\Service\Cron\UpdateRates', 'run' ) );

		if( is_admin() ) {
			Admin\Admin::run();
		}
	}
}