<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\Sections;

use Korobochkin\WCMultiCurrency\Plugin;

class General extends \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Section {


	public function __construct( $parent ) {
		parent::__construct(
			'general',
			__( 'Section title General', Plugin::NAME ),
			$parent
		);
	}

	public function render() {
		echo 'blabla';
	}

	public function sanitize() {

	}
}
