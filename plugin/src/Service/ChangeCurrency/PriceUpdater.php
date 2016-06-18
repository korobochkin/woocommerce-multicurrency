<?php
namespace Korobochkin\WCMultiCurrency\Service\ChangeCurrency;

use Korobochkin\WCMultiCurrency\Models\Currency;

class PriceUpdater {

	/**
	 * @var \Korobochkin\WCMultiCurrency\Models\Currency
	 */
	private $requested_currency;

	private $self_request;

	private $requested_rate;

	public function __construct( $requested_ticker ) {
		$this->set_requested_currency( $requested_ticker );
	}

	public function set_requested_currency( $ticker ) {
		$this->requested_currency = new Currency( $ticker );
	}

	public function get_requested_currency() {
		return $this->requested_currency;
	}

	/*public function is_requested_ticker_available() {
		if( $this->requester_ticker_obj ) {
			self::$currency = new Currency( $ticker );
		}
	}*/

	public function woocommerce_get_price( $price, $obj ) {
		$this->prepare_requested_rate();

		if( is_numeric( $this->requested_rate ) ) {
			$requested_price = (int)$price;

			if( $requested_price > 0 ) {
				return $requested_price * $this->requested_rate;
			}
		}

		return $price;
	}

	public function woocommerce_currency( $default_ticker ) {
		if( $this->self_request ) {
			// Do nothing if we doing request
			return $default_ticker;
		}

		$this->prepare_requested_rate();
		if( is_numeric( $this->requested_rate ) ) {
			return $this->requested_currency->get_ticker();
		}
	}

	public function prepare_requested_rate() {
		if( !$this->requested_rate && $this->requested_rate !== false ) {
			$this->self_request = true;
			$default_ticker = get_woocommerce_currency();
			$this->self_request = false;

			$new_currency = new Currency( $this->get_requested_currency()->get_ticker()  );
			$requested_rate = $new_currency->get_rate( $default_ticker );
			$this->requested_rate = $requested_rate;
		}
	}
}
