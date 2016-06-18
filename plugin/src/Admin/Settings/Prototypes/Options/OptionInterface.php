<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options;

interface OptionInterface {

	public function __construct( $name, $group );

	public function register();

	public function unregister();

	public function get_name();

	public function set_name( $name );

	public function get_group();

	public function set_group( $group );

	public function get_defaults();

	public function sanitize( $instance );

	public function get_value();
}
