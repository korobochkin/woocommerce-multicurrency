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
		//return $this;
	}

	public function register_fields() {
		/*$element = new Fields\FirstName( $this );
		$element->register_field();
		$this->add_element( $element );*/

		$element = new Fields\AppID( $this );
		$element->register_field();
		$this->add_element( $element );
	}

	public function render() {
		//$this->get_children();
		echo 'Section description.';
	}

	public function sanitize() {

	}
}
