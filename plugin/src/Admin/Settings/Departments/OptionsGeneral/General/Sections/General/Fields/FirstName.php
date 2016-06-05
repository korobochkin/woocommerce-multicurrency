<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\Sections\General\Fields;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Fields\Field;

class FirstName extends Field {

	public function __construct( $parent ) {
		parent::__construct( $parent );

		$this->element =
			\WP_Form_Element::create('text')
				->set_name('first_name')
				->set_label('First Name')
				->set_attribute('placeholder', 'Your Name Here')
				->set_description('This is where you put your first name');

		return $this;
	}
}
