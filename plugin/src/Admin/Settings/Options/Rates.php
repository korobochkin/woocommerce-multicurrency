<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Options;

use \Korobochkin\WCMultiCurrency\Plugin;
use \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options\Option;

class Rates extends Option {

	public function __construct() {
		// Construct with parent
		parent::__construct( Plugin::NAME . '-rates', Plugin::NAME . '-rates' );
	}

	public function sanitize( $instance ) {
		//$defaults = $this->get_defaults();
		$sanitized_instance = array();

		return $sanitized_instance;
	}

	public function get_defaults() {
		return array();
	}

	public function get_value() {
		return get_option( $this->get_name(), $this->get_defaults() );
	}
}
