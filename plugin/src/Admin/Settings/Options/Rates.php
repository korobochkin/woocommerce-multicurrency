<?php
namespace Korobochkin\WCMultiCurrencies\Admin\Settings\Options;

use \Korobochkin\WCMultiCurrencies\Plugin;
use \Korobochkin\WCMultiCurrencies\Admin\Settings\Prototypes\Options\DefaultOption;

class Rates extends DefaultOption {

	public function __construct() {
		// Construct with parent
		parent::__construct( Plugin::NAME . '-rates', Plugin::NAME . '-rates' );
	}

	/*public static function register() {
		self::set_name(Plugin::NAME . '-rates');
		self::set_group(Plugin::NAME . '-rates');
	}*/

	public function sanitize( $instance ) {
		return $instance;
	}

	public function get_defaults() {
		return array();
	}
}
