<?php
namespace Korobochkin\WCMulticurrencies;
/*
Plugin Name: WooCommerce Multicurrencies
Plugin URI: https://www.woothemes.com
Description: WooCommerce Multicurrencies
Author: Kolya Korobochkin
Author URI: http://korobochkin.com/
Version: 0.0.1
Text Domain: wcmulticurrencies
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
$GLOBALS['WCMulticurrenciesPlugin'] = new Plugin( __FILE__ );
$GLOBALS['WCMulticurrenciesPlugin']->run();

/**
 * Activation. WordPress call this when user click "Activate" link.
 *
 * @since 0.0.1
 */
//register_activation_hook( __FILE__, array( '\Korobochkin\WCMulticurrencies\Service\Activation', 'run' ) );

/**
 * Uninstall. WordPress call this when user click "Delete" link.
 *
 * @since 0.0.1
 */
//register_uninstall_hook( __FILE__, array( '\Korobochkin\WCMulticurrencies\Service\Uninstall', 'run' ) );
