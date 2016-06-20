<?php
namespace Korobochkin\WCMultiCurrency;

class Plugin {

	const NAME = 'wc-multi-currency';

	private $path = NULL;

	private $version;

	/**
	 * Setup plugin object.
	 *
	 * @since 0.0.1
	 *
	 * @param $run_from_file string Main plugin file full path.
	 */
	public function __construct( $run_from_file ) {
		$this->path = $run_from_file;
		$this->version = '0.0.2';
	}

	public function run() {
		// Cron tasks
		//add_action( Plugin::NAME . '-update-rates', array( 'Korobochkin\WCMultiCurrency\Admin\Service\Cron\UpdateRates', 'run' ));

		if( !Service\WooCommerce::is_active() ) {
			return;
		}

		/**
		 * TODO: костыль
		 */
		if( ! defined( 'WC_MULTI_CURRENCY_APP_ID' ) ) {
			return;
		}

		// Allow users switch currency on frontend
		Service\ChangeCurrency\Loader::init();
		Service\ChangeCurrency\Loader::add_actions();


		add_action( 'wp_enqueue_scripts', array( __NAMESPACE__ . '\Service\ScriptsStyles', 'register' ) );
		add_action( 'wp_enqueue_scripts', array( __NAMESPACE__ . '\Pages\All', 'wp_enqueue_scripts' ) );

		// Cron tasks
		add_action( Plugin::NAME . '-update-rates', array( __NAMESPACE__ . '\Service\Cron\UpdateRates', 'run' ) );

		if( is_admin() ) {
			Admin\Admin::run();
		}

		//wp_schedule_single_event( time(), Plugin::NAME . '-update-rates' );
		// wc-multi-currency-update-rates
	}

	public function get_plugin_path() {
		return $this->path;
	}

	public function get_plugin_ver() {
		return $this->version;
	}
}