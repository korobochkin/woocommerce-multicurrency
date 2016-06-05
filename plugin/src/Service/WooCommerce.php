<?php
namespace Korobochkin\WCMultiCurrency\Service;

class WooCommerce {

	public static function is_active() {
		if(
			in_array(
				'woocommerce/woocommerce.php', get_option( 'active_plugins' )
			)
		) {
			return true;
		}
		return false;
	}
}