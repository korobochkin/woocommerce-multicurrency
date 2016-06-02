<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Options;

use \Korobochkin\WCMultiCurrency\Plugin;
use \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options\DefaultOption;

class Rates extends DefaultOption {

	public function __construct() {
		// Construct with parent
		parent::__construct( Plugin::NAME . '-rates', Plugin::NAME . '-rates' );
	}

	public function sanitize( $instance ) {
		return $instance;
	}

	public function get_defaults() {
		return array();
	}
}
