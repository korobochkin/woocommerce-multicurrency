<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\Sections\General\Fields;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Fields\Field;

class AppID extends Field {

	public function __construct( $parent ) {
		parent::__construct( $parent );

		$this->set_wp_label('App ID');

		$this->element =
			\WP_Form_Element::create('text')
				->set_name('app_id')
				//->set_id(  $this->get_name() )
				//->set_attribute('placeholder', 'Your App ID')
				->add_class('regular-text');

		return $this;
	}
}
