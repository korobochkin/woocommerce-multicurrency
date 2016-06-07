<?php
namespace Korobochkin\WCMultiCurrency\Service;

use Korobochkin\WCMultiCurrency\Plugin;

class ScriptsStyles {

	public static function register() {

		$prefix = Plugin::NAME . '-';
		$url = plugin_dir_url( $GLOBALS['WCMultiCurrencyPlugin']->get_plugin_path() );
		$version = $GLOBALS['WCMultiCurrencyPlugin']->get_plugin_ver();

		wp_register_script(
			$prefix . 'choose-currency',
			$url . 'js/choose-currency/choose-currency.js',
			array( 'backbone', 'jquery' ),
			$version,
			true
		);
		wp_localize_script( 'choose-currency', 'chooseCurrencyL10n', Js\CurrencySwitcher\Translations::get() );
	}
}
