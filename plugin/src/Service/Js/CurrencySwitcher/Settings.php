<?php
namespace Korobochkin\WCMultiCurrency\Service\Js\CurrencySwitcher;

use Korobochkin\WCMultiCurrency\Admin\Settings\Options;

class Settings {

	public static function get() {
		$option = new Options\Rates();
		$settings = $option->get_value();

		if( is_array( $settings ) ) {
			return $settings;
		}

		return array();
	}
}
