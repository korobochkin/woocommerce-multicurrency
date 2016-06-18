<?php
namespace Korobochkin\WCMultiCurrency\Service;

use Korobochkin\WCMultiCurrency\Plugin;

class ScriptsStyles {

	public static function register() {

		$prefix = Plugin::NAME . '-';
		$url = plugin_dir_url( $GLOBALS['WCMultiCurrencyPlugin']->get_plugin_path() );
		$version = $GLOBALS['WCMultiCurrencyPlugin']->get_plugin_ver();

		wp_register_script(
			'uri',
			$url . 'js/uri-js/URI.min.js',
			array(),
			'1.18.1',
			true
		);

		wp_register_script(
			'js-cookie',
			$url . 'js/js-cookie/js.cookie.js',
			array(),
			'2.1.2',
			true
		);

		wp_register_script(
			$prefix . 'choose-currency',
			$url . 'js/choose-currency/choose-currency.js',
			array( 'backbone', 'jquery', 'uri', 'js-cookie' ),
			$version,
			true
		);
		wp_localize_script( $prefix . 'choose-currency', 'chooseCurrencyL10n', Js\CurrencySwitcher\Translations::get() );
	}
}
