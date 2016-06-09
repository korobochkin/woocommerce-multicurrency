<?php
namespace Korobochkin\WCMultiCurrency\Pages;

use Korobochkin\WCMultiCurrency\Plugin;

class All {

	public static function wp_enqueue_scripts() {

		add_action( 'wp_footer', array( 'Korobochkin\WCMultiCurrency\Service\Js\CurrencySwitcher\Templates', 'render_templates' ));

		$prefix = Plugin::NAME . '-';
		wp_enqueue_script( $prefix . 'choose-currency' );
	}
}