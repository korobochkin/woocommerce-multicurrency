<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections;

use Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages;
use WP_Form_Component;
use WP_Form_View_Interface;

abstract class Section implements \WP_Form_Aggregate {

	protected $title;

	/**
	 * @var \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\SubMenuPage
	 */
	protected $parent;

	protected $elements;

	protected $errors = array();

	protected $attributes = array();

	protected $type = 'page-section';

	public function __construct( $id, $title, Pages\SubMenuPage $parent ) {
		$this->attributes = new \WP_Form_Attributes();
		$this->set_id( $id );
		$this->set_name( $id );
		$this->set_title( $title );
		$this->set_parent( $parent );
	}

	public function register() {
		if( $this->is_valid() ) {
			add_settings_section(
				//$this->get_id(),
				$this->get_name(),
				$this->get_title(),
				array( $this, 'render' ),
				$this->parent->get_menu_slug()
			);

			$this->register_fields();
		}
	}

	public function register_fields() {}

	public function get_page_menu_slug() {
		return $this->get_parent()->get_menu_slug();
	}

	final public function is_valid() {
		if( !$this->is_id_valid( $this->attributes->get_attribute('id') ) )
			return false;

		if( !$this->is_title_valid( $this->get_title() ) )
			return false;

		return true;
	}

	final public function set_id( $id ) {
		$this->attributes->set_attribute('id', $id );
		return $this;
	}

	final public function get_id() {
		return $this->attributes->get_attribute('id');
	}

	final public function is_id_valid( $id ) {
		if( is_string( $id ) && !empty( $id ) ) {
			return true;
		}
		return false;
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


	public function add_element( \WP_Form_Component $element, $key = '' ) {
		if ( empty($key) ) {
			$key = $element->get_name();
		}
		if ( empty($key) ) {
			throw new \InvalidArgumentException(__('Cannot add nameless element to form', 'wp-forms'));
		}
		$this->elements[$key] = $element;
		return $this;
	}

	public function remove_element( $key ) {
		if ( isset($this->elements[$key]) ) {
			unset($this->elements[$key]);
		}
		return $this;
	}

	public function get_element( $key ) {
		if ( !empty($this->elements[$key]) ) {
			return $this->elements[$key];
		}
		foreach ( $this->elements as $e ) {
			if ( $e instanceof \WP_Form_Aggregate ) {
				$child = $e->get_element($key);
				if ( !empty($child) ) {
					return $child;
				}
			}
		}
		return NULL;
	}

	public function set_error( $error ) {
		$this->errors[] = $error;
		return $this;
	}

	public function get_errors() {
		return $this->errors;
	}

	public function set_name( $name ) {
		$this->attributes->set_attribute('name', $name);
		return $this;
	}

	public function get_name() {
		return $this->attributes->get_attribute('name');
	}

	public function get_type() {
		return $this->type;
	}

	public function get_view() {
		return $this;
		// TODO: Implement get_view() method.
	}

	public function get_priority() {
		return 0;
	}

	public function clear_errors() {}

	/**
	 * @return \WP_Form_Component[], sorted by priority
	 */
	public function get_children() {
		$elements = \WP_Form_Element::sort_elements($this->elements);
		return $elements;
	}
}
