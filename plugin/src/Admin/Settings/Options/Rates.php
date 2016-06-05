<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Options;

use \Korobochkin\WCMultiCurrency\Plugin;
use \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options\Option;
use Korobochkin\WCMultiCurrency\Service\Time;

class Rates extends Option {

	public function __construct() {
		// Construct with parent
		parent::__construct( Plugin::NAME . '-rates', Plugin::NAME . '-rates' );
	}

	public function sanitize( $instance ) {
		//$defaults = $this->get_defaults();
		$sanitized_instance = array();

		// $instance from API
		if( isset( $instance['timestamp'] ) && Time::is_timestamp( $instance['timestamp'] ) ) {

			if( isset( $instance['base'] ) && is_string( $instance['base'] ) && !empty( $instance['base'] ) ) {

				if( isset( $instance['rates'] ) && is_array( $instance['rates'] ) && !empty( $instance['rates'] ) ) {

					$sanitized_instance['timestamp'] = $instance['timestamp'];

					$sanitized_instance['base'] = $instance['timestamp'];

					$sanitized_instance['rates'] = $instance['rates'];
				}
			}
		}

		return $sanitized_instance;
	}

	public function get_defaults() {
		return false;
	}

	public function get_value() {
		return get_option( $this->get_name(), $this->get_defaults() );
	}
}
