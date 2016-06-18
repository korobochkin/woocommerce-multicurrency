<?php
namespace Korobochkin\WCMultiCurrency\Service;

class WooCommerce {

	public static function is_active() {
		return in_array(
			'woocommerce/woocommerce.php', get_option( 'active_plugins' )
		);
	}
}