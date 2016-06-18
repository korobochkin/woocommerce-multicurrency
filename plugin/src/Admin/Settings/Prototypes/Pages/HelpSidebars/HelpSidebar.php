<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\HelpSidebars;

abstract class HelpSidebar {

	private $content = '';

	public function __construct( $content ) {
		$this->set_content( $content );
	}

	final public function register() {
		$screen = get_current_screen();
		$screen->set_help_sidebar( $this->get_content() );
	}

	final public function set_content( $content ) {
		if( $this->is_content_valid( $content ) ) {
			$this->content = $content;
			return true;
		}
		return false;
	}

	final public function get_content() {
		return $this->content;
	}

	final public function is_valid() {
		if( !$this->is_content_valid( $this->content ) )
			return false;

		return true;
	}

	final public function is_content_valid( $content ) {
		if( is_string( $content ) ) {
			return true;
		}
		return false;
	}
}
