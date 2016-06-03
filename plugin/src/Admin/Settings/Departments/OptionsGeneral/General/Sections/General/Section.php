<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\Sections\General;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes;

class Section extends Prototypes\Pages\Sections\Section {


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
