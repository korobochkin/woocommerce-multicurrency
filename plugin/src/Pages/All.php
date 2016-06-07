<?php
namespace Korobochkin\WCMultiCurrency\Pages;

use Korobochkin\WCMultiCurrency\Plugin;

class All {

	public static function wp_enqueue_scripts() {
		$prefix = Plugin::NAME . '-';
		wp_enqueue_script( $prefix . 'choose-currency' );
	}
}