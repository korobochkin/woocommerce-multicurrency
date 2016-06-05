<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\Sections\General\Fields;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Fields\Field;

class FirstName extends Field {

	public function __construct( $parent ) {
		parent::__construct( $parent );

		$this->set_wp_label('First Name');

		$this->element =
			\WP_Form_Element::create('text')
				->set_name($this->get_pre_name() . 'first_name')
				->set_id(  $this->get_pre_name() . 'first_name')
				//->set_label('First Name')
				->set_attribute('placeholder', 'Your Name Here')
				//->set_description('This is where you put your first name')
				->add_class('regular-text');

		//add_filter( 'wp_forms_default_decorators_callback', array($this, 'apply_decorators') );

		return $this;
	}

	public function apply_decorators( $self ) {
		//if(  )
		//$this->add_decorator( $class, $args );
	}
}
