<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General;

use Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages;

class Page extends Pages\SubMenuPage {

	public function __construct() {
		parent::__construct(
			'options-general.php',
			__( 'Multi Currency', Plugin::NAME ),
			__( 'Multi Currency', Plugin::NAME ),
			'manage_options',
			Plugin::NAME . '-general',
			//array( $this, 'render' ),

			// Option group
			Plugin::NAME . '-rates',

			// Tabs
			array( __NAMESPACE__ . '\HelpTabs\Overview' ),

			// Sidebars
			__NAMESPACE__ . '\HelpSidebars\Overview'
		);

		$this->add_section( 'Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\Sections\General\Section' );
	}
}
