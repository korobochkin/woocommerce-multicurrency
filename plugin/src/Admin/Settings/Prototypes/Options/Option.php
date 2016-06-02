<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options;

abstract class DefaultOption {

	private $name = null;

	private $group = null;

	public function __construct( $name, $group ) {
		$this->set_name( $name );
		$this->set_group( $group );
	}

	public function register() {
		register_setting(
			$this->get_group(),
			$this->get_name(),
			array( $this, 'sanitize' )
		);
	}

	public function unregister() {
		unregister_setting(
			$this->get_group(),
			$this->get_name(),
			array( $this, 'sanitize')
		);
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name( $name ) {
		if( is_string( $name ) && $name != '' ) {
			$this->name = $name;
			return true;
		}
		return false;
	}

	public function get_group() {
		return $this->group;
	}

	public function set_group( $group ) {
		if( is_string( $group ) && $group != '' ) {
			$this->group = $group;
			return true;
		}
		return false;
	}

	abstract public function get_defaults();

	abstract public function sanitize( $instance );

	public function get_value() {
		$settings = get_option( $this->get_name(), array() );
		$defaults = $this->get_defaults();

		// pages
		foreach( $defaults as $page_key => $page_value ) {

			// sections
			foreach( $page_value as $section_key => $section_value ) {

				// settings
				foreach( $section_value as $setting_key => $setting_value ) {
					if( !isset( $settings[$page_key][$section_key][$setting_key] ) ) {
						$settings[$page_key][$section_key][$setting_key] = $defaults[$page_key][$section_key][$setting_key];
					}
				}
			}
		}

		return $settings;
	}
}
