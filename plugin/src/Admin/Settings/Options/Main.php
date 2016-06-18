<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Options;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options\Option;

class Main extends Option {

	public function __construct() {
		// Construct with parent
		parent::__construct( Plugin::NAME, Plugin::NAME );
	}

	public function sanitize( $instance ) {
		//$defaults = $this->get_defaults();
		$sanitized_instance = array();

		// App ID
		if( isset( $instance['general']['general']['app_id'] ) ) {
			$sanitized_instance['general']['general']['app_id'] = sanitize_text_field( $instance['general']['general']['app_id'] );
		}

		return $sanitized_instance;
	}

	public function get_defaults() {
		return array(
			// page
			'general' => array(

				// section
				'general' => array(

					// settings
					'app_id' => ''
				)
			)
		);
	}
}
