<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Options;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Options\Option;
use Korobochkin\WCMultiCurrency\Service\Time;

class Rates extends Option {

	public function __construct() {
		// Construct with parent
		parent::__construct( Plugin::NAME . '-rates', Plugin::NAME . '-rates' );
	}

	public function sanitize( $instance ) {
		//$defaults = $this->get_defaults();
		$sanitized_instance = array();

		if( is_object( $instance ) ) {

			// Проверка достаточно простая потому все, что надо, в принципе, проверяет API и выбрасывает исключение, если
			// что-то не так (мы его ловим внутри Cron).
			if( property_exists( $instance, 'timestamp' ) ) {

				if( property_exists( $instance, 'base' ) && is_string( $instance->base ) && !empty( $instance->base ) ) {

					if( property_exists( $instance, 'rates' ) ) {

						$rates = get_object_vars( $instance->rates );

						if( is_array( $rates ) && !empty( $rates ) ) {

							$sanitized_instance['timestamp'] = $instance->timestamp;

							$sanitized_instance['base'] = $instance->base;

							$sanitized_instance['rates'] = $rates;
						}
					}
				}
			}
		}
		elseif( is_array( $instance ) ) {
			if( isset( $instance['timestamp'] ) ) {
				if( isset( $instance['base'] ) && is_string( $instance['base'] ) && !empty( $instance['base'] ) ) {
					if( isset( $instance['rates'] ) && is_array( $instance['rates'] ) && !empty(  $instance['rates'] ) ) {

						$sanitized_instance['timestamp'] = $instance['timestamp'];

						$sanitized_instance['base'] = $instance['base'];

						$sanitized_instance['rates'] = $instance['rates'];
					}
				}
			}
		}

		return $sanitized_instance;
	}

	public function get_defaults() {
		return false;
	}

	public function get_value() {
		return get_option( $this->get_name(), $this->get_defaults() );
	}
}
