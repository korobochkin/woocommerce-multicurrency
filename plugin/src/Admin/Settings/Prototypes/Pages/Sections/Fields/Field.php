<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Fields;

use WP_Form_Component;
use WP_Form_View_Interface;

abstract class Field implements \WP_Form_Component {

	protected $wp_label;

	/**
	 * @var \WP_Form_Element
	 */
	protected $element;

	/**
	 * @var \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Section
	 */
	protected $parent;

	public function __construct( \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Sections\Section $parent ) {
		$this->set_parent( $parent );
	}

	public function register_field() {
		add_settings_field(
			$this->get_name(),
			$this->get_wp_label(),
			array( $this, 'render' ),
			$this->get_parent_page_menu_slug(),
			$this->get_parent_section_name(),
			array(
				'label_for' => $this->get_name()
			)
		);
	}

	final public function set_parent( $parent ) {
		$this->parent = $parent;
	}

	final public function get_parent() {
		return $this->parent;
	}

	public function get_parent_page_menu_slug() {
		return $this->get_parent()->get_page_menu_slug();
	}

	public function get_parent_section_name() {
		return $this->get_parent()->get_id();
	}

	public function render() {
		echo $this->element->render();
	}

	public function get_type() {
		return $this->element->get_type();
	}

	public function get_id() {
		return $this->element->get_id();
	}

	public function get_name() {
		return $this->element->get_name();
	}

	public function get_pre_name() {
		return $this->get_parent_page_menu_slug() . '[' . $this->get_parent_section_name() . ']';
	}

	public function get_view() {
		return $this->element->get_view();
	}

	public function get_priority() {
		return $this->element->get_priority();
	}

	public function get_errors() {
		return $this->element->get_errors();
	}

	public function set_error( $error ) {
		return $this->element->set_error( $error );
	}

	public function clear_errors() {
		return $this->element->clear_errors();
	}

	public function set_wp_label( $label ) {
		if( is_string( $label ) ) {
			$this->wp_label = $label;
		}
	}

	public function get_wp_label() {
		return $this->wp_label;
	}
}
