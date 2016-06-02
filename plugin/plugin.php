<?php
namespace Korobochkin\WCMultiCurrency;
/*
Plugin Name: WooCommerce multi currencies
Plugin URI: https://www.woothemes.com
Description: WooCommerce multi currencies
Author: Kolya Korobochkin
Author URI: http://korobochkin.com/
Version: 0.0.1
Text Domain: wc-multi-currencies
Domain Path: /languages/
Requires at least: 4.4.2
Tested up to: 4.4.2
License: GPLv2 or later
*/

/**
 * Autoloader for all classes.
 *
 * @since 0.0.1
 */
require_once 'vendor/autoload.php';
$GLOBALS['WCMultiCurrencyPlugin'] = new Plugin( __FILE__ );
$GLOBALS['WCMultiCurrencyPlugin']->run();

/**
 * Activation. WordPress call this when user click "Activate" link.
 *
 * @since 0.0.1
 */
//register_activation_hook( __FILE__, array( '\Korobochkin\WCMultiCurrency\Service\Activation', 'run' ) );

/**
 * Uninstall. WordPress call this when user click "Delete" link.
 *
 * @since 0.0.1
 */
//register_uninstall_hook( __FILE__, array( '\Korobochkin\WCMultiCurrency\Service\Uninstall', 'run' ) );
