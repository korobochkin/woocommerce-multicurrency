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

	public function run(){
		if( is_admin() ) {
			Admin\Admin::run();
		}
	}
}