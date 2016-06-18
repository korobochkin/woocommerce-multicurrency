<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\HelpSidebars;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes;

class Overview extends Prototypes\Pages\HelpSidebars\HelpSidebar {

	public function __construct() {
		parent::__construct( '<p>Some content in sidebar.</p>' );
	}
}
