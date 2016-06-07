<?php
namespace Korobochkin\WCMultiCurrency\Models;

use Korobochkin\WCMultiCurrency\Admin\Settings\Options;

class Currency {

	private $ticker;

	/**
	 * @var Options\Rates
	 */
	protected $option;

	public function __construct( $ticker ) {
		$this->set_ticker( $ticker );
	}

	public function set_ticker( $ticker ) {
		$this->option = new Options\Rates();
		$rates = $this->option->get_value();

		if( !$rates ) {
			return false;
		}

		if( is_string( $ticker ) && !empty( $ticker ) ) {
			if( isset( $rates['rates'][$ticker] ) || $rates['base'] === $ticker ) {
				$this->ticker = $ticker;
				return true;
			}
		}

		return false;
	}

	public function get_rate( $cross_ticker ) {
		$option = $this->option->get_value();

		if( !$option ) {
			return false;
		}

		if( isset( $option['rates'][$cross_ticker] ) ) {
			$cross_rate = $option['rates'][$cross_ticker];
		}
		elseif( $option['base'] === $cross_ticker ) {
			$cross_rate = 1;
		}
		else {
			return false;
		}

		if( isset( $option['rates'][$this->ticker] ) ) {
			$base_rate = $option['rates'][$this->ticker];
		}
		elseif( $option['base'] === $this->ticker ) {
			$base_rate = 1;
		}
		else {
			return false;
		}

		/**
		 * Считаем всегда по одной формуле
		 */
		return $base_rate / $cross_rate;
	}

	public function get_update_datetime() {
		$option = $this->option->get_value();

		// Get current timezone from WordPress
		$timezone_offset = get_option( 'gmt_offset' ) * HOUR_IN_SECONDS;
		$timezone = timezone_name_from_abbr( '', $timezone_offset, 1 );

		if( $option && $timezone ) {

			try {
				$datetime_obj = new \DateTime( null, new \DateTimeZone( $timezone ));
			} catch (\Exception $e) {
				return false;
			}

			if( isset( $option['timestamp'] ) ) {
				$datetime_obj->setTimestamp( $option['timestamp'] );
				return $datetime_obj;
			}
		}
		return false;
	}
}
