<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages;

abstract class Section {

	private $id;

	private $title;

	/**
	 * @var \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Page
	 */
	private $parent;

	public function __construct( $id, $title, Pages\Page $parent ) {
		$this->set_id( $id );
		$this->set_title( $title );
		$this->set_parent( $parent );
	}

	public function register() {
		if( $this->is_valid() ) {
			add_settings_section(
				$this->get_id(),
				$this->get_title(),
				array( $this, 'render' ),
				$this->parent->get_menu_slug()
			);
		}
	}

	public function register_fields() {

	}

	final public function is_valid() {
		if( !$this->is_id_valid( $this->id ) )
			return false;

		if( !$this->is_title_valid( $this->title ) )
			return false;

		return true;
	}

	final public function set_id( $id ) {
		if( $this->is_id_valid( $id ) ) {
			$this->id = $id;
			return true;
		}
		return false;
	}

	final public function is_id_valid( $id ) {
		if( is_string( $id ) && !empty( $id ) ) {
			return true;
		}
		return false;
	}

	final public function get_id() {
		return $this->id;
	}




	final public function set_title( $title ) {
		if( $this->is_title_valid( $title ) ) {
			$this->title = $title;
			return true;
		}
		return false;
	}

	final public function is_title_valid( $title ) {
		if( is_string( $title ) && !empty( $title ) ) {
			return true;
		}
		return false;
	}

	final public function get_title() {
		return $this->title;
	}






	final public function set_parent( $parent ) {
		$this->parent = $parent;
	}

	final public function get_parent() {
		return $this->parent;
	}

	/*final public function get_help_sidebar() {
		return $this->parent;
	}*/

	abstract public function render();

	abstract public function sanitize();
}
