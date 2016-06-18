<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Departments\OptionsGeneral\General\HelpTabs;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes;
use Korobochkin\WCMultiCurrency\Plugin;

class Overview extends Prototypes\Pages\HelpTabs\HelpTab {

	public function __construct() {
		parent::__construct(
			'overview',
			__( 'Overview', Plugin::NAME ),
			'<p>Some Content</p>'
		);
	}

	public function build_content() {}
}
