<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General;

use \Korobochkin\WCMultiCurrency\Plugin;
use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages;

class Page extends Pages\Page {

	public function __construct() {
		parent::__construct(
			'options-general.php',
			__( 'Multi Currency', Plugin::NAME ),
			__( 'Multi Currency', Plugin::NAME ),
			'manage_options',
			Plugin::NAME . '-general',
			array( $this, 'render' ),

			Plugin::NAME . '-rates',

			array(
				'\Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\HelpTabs\Overview'
			)
		);
	}
}
