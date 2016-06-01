<?php
namespace Korobochkin\WCMultiCurrencies\Admin\Settings\Prototypes\Pages;

use \Korobochkin\WCMultiCurrencies\Plugin;

abstract class Page {

	private $parent_slug = null;

	private $page_title = null;

	private $menu_title = null;

	private $capability = null;

	private $menu_slug = null;

	private $function = null;

	public function __construct( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '' ) {
		$this->set_parent_slug( $parent_slug );
		$this->set_page_title( $page_title );
		$this->set_menu_title( $menu_title );
		$this->set_capability( $capability );
		$this->set_menu_slug( $menu_slug );
		$this->set_function( $function );
	}

	public function register() {
		$page = add_submenu_page(
			$this->get_parent_slug(),
			$this->get_page_title(),
			$this->get_menu_title(),
			$this->get_capability(),
			$this->get_full_page_menu_slug(),
			array( '\Setka\WPGridEditor\Admin\Settings\OptionsGeneral\Pages\General\Page', 'render' )
		);
		if( $page ) {
			add_action( 'load-' . $page, array( '\Setka\WPGridEditor\Admin\Settings\OptionsGeneral\Pages\General\Page', 'register_help_tabs' ) );
		}
	}

	final public function is_valid() {
		if( !$this->is_parent_slug_valid( $this->get_parent_slug() ) )
			return false;

		if( !$this->is_page_title_valid( $this->page_title ) )
			return false;

		if( !$this->is_menu_title_valid( $this->menu_title ) )
			return false;

		if( !$this->is_capability_valid( $this->capability ) )
			return false;

		if( !$this->is_menu_slug_valid( $this->menu_slug ) )
			return false;

		if( !$this->is_function_valid( $this->function ) )
			return false;

		return true;
	}

	final public function set_parent_slug( $slug ) {
		if( $this->is_parent_slug_valid( $slug ) ) {
			$this->parent_slug = $slug;
			return true;
		}
		return false;
	}

	final public function get_parent_slug() {
		return $this->parent_slug;
	}

	final public function is_parent_slug_valid( $slug ) {
		if( is_string( $slug ) && !empty( $slug ) ) {
			return true;
		}
		return false;
	}

	final public function set_page_title( $title ) {
		if( $this->is_page_title_valid( $title ) ) {
			$this->page_title = $title;
			return true;
		}
		return false;
	}

	final public function get_page_title() {
		return $this->page_title;
	}

	final public function is_page_title_valid( $title ) {
		if( is_string( $title ) && !empty( $title ) ) {
			return true;
		}
		return false;
	}

	final public function set_menu_title( $title ) {
		if( $this->is_menu_title_valid( $title ) ) {
			$this->menu_title = $title;
			return true;
		}
		return false;
	}

	final public function get_menu_title() {
		return $this->menu_title;
	}

	final public function is_menu_title_valid( $title ) {
		if( is_string( $title ) && !empty( $title ) ) {
			return true;
		}
		return false;
	}

	final public function set_capability( $cap ) {
		if( $this->is_capability_valid( $cap ) ) {
			$this->capability = $cap;
			return true;
		}
		return false;
	}

	final public function get_capability() {
		return $this->capability;
	}

	final public function is_capability_valid( $cap ) {
		if( is_string( $cap ) && !empty( $cap ) ) {
			return true;
		}
		return false;
	}

	final public function set_menu_slug( $menu_slug ) {
		if( $this->is_menu_slug_valid( $menu_slug ) ) {
			$this->menu_slug = $menu_slug;
			return true;
		}
		return false;
	}

	final public function get_menu_slug() {
		return $this->menu_slug;
	}

	final public function is_menu_slug_valid( $menu_slug ) {
		if( is_string( $menu_slug ) && !empty( $menu_slug ) ) {
			return true;
		}
		return false;
	}

	final public function get_full_page_menu_slug() {
		return Plugin::NAME . '-' . $this->get_menu_slug();
	}

	final public function set_function( $callback ) {
		if( $this->is_function_valid( $callback ) ) {
			$this->function = $callback;
			return true;
		}
		return false;
	}

	final public function get_function() {
		return $this->function;
	}

	final public function is_function_valid( $callback ) {
		if( is_callable( $callback ) ) {
			return true;
		}
		return false;
	}
}
