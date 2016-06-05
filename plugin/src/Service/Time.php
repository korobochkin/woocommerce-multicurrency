<?php
namespace Korobochkin\WCMultiCurrency\Service;

class Time {

	public static function is_timestamp( $s ) {
		return ((string) (int) $s === $s)
		       && ($s <= PHP_INT_MAX)
		       && ($s>= ~PHP_INT_MAX);
	}
}