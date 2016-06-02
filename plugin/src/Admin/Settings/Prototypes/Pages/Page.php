<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages;

abstract class Page {

	private $parent_slug = null;

	private $page_title = null;

	private $menu_title = null;

	private $capability = null;

	private $menu_slug = null;

	private $function = null;

	private $option_group = null;

	/**
	 * @var \Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\HelpTabs\HelpTab[]
	 */
	private $help_tabs = array();

	private $help_sidebar = null;

	public function __construct(
		// For add_submenu_page()
		$parent_slug,
		$page_title,
		$menu_title,
		$capability,
		$menu_slug,
		$function = '',

		// Option group (used in render())
		$option_group,

		// Help tabs & sidebar
		$help_tabs = array(),
		$help_sidebar = null
	) {
		$this->set_parent_slug( $parent_slug );
		$this->set_page_title( $page_title );
		$this->set_menu_title( $menu_title );
		$this->set_capability( $capability );
		$this->set_menu_slug( $menu_slug );
		$this->set_function( $function );

		$this->set_option_group( $option_group );

		$this->set_help_tabs( $help_tabs );
		$this->set_help_sidebar( $help_sidebar );
	}

	public function register() {
		if( $this->is_valid() ) {
			$page = add_submenu_page(
				$this->get_parent_slug(),
				$this->get_page_title(),
				$this->get_menu_title(),
				$this->get_capability(),
				$this->get_menu_slug(),
				$this->get_function()
			);
			if( $page ) {
				add_action( 'load-' . $page, array( $this, 'register_help_tabs' ) );
			}
		}
	}

	public function register_help_tabs() {
		if( $this->is_help_tabs() ) {
			foreach( $this->help_tabs as $help_tab ) {
				$help_tab->register();
			}

			// Help Sidebar
			$this->register_help_sidebar();
		}
	}

	public function register_help_sidebar() {
		if( $this->is_help_sidebar_valid( $this->help_sidebar ) ) {
			$this->help_sidebar->register();
		}
	}

	final public function is_valid() {
		if( !$this->is_parent_slug_valid( $this->parent_slug ) )
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

		if( !$this->is_option_group_valid( $this->option_group ) )
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

	final public function set_help_tabs( $help_tabs ) {
		if( is_array( $help_tabs ) && !empty( $help_tabs ) ) {
			foreach ( $help_tabs as $help_tab ) {
				$this->set_help_tab( $help_tab );
			}
			return $this->is_help_tabs();
		}
		return false;
	}

	final public function set_help_tab( $help_tab ) {
		if( class_exists( $help_tab ) ) {
			$try = new $help_tab();

			if( $this->is_help_tab_valid( $try ) ) {
				$this->help_tabs[$try->get_id()] = $try;
				return true;
			}
		}

		return false;
	}

	final public function get_help_tabs() {
		return $this->help_tabs;
	}

	final public function is_help_tab_valid( $help_tab ) {
		if( is_a( $help_tab, '\Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\HelpTabs\HelpTab' ) ) {
			return $help_tab->is_valid();
		}
		return false;
	}

	final public function is_help_tabs() {
		if( !empty( $this->help_tabs ) ) {
			return true;
		}
		return false;
	}

	final public function set_help_sidebar( $help_sidebar ) {
		if( class_exists( $help_sidebar ) ) {
			$try = new $help_sidebar();

			if( $this->is_help_sidebar_valid( $try ) ) {
				$this->help_sidebar = $try;
				return true;
			}
		}

		return false;
	}

	final public function get_help_sidebar() {
		return $this->help_sidebar;
	}

	final public function is_help_sidebar_valid( $help_sidebar ) {
		if( is_a( $help_sidebar, 'Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\HelpSidebars\HelpSidebar' ) ) {
			return $help_sidebar->is_valid();
		}
		return false;
	}

	final public function set_option_group( $option_group ) {
		if( $this->is_option_group_valid( $option_group ) ) {
			$this->option_group = $option_group;
			return true;
		}
		return false;
	}

	final public function get_option_group() {
		return $this->option_group;
	}

	final public function is_option_group_valid( $option_group ) {
		if( is_string( $option_group ) && !empty( $option_group ) ) {
			return true;
		}
		return false;
	}

	public function render() {
		?><div class="wrap">
		<h2><?php echo $this->get_page_title(); ?></h2>
		<form action="options.php" method="post">
			<?php
			settings_fields( $this->get_option_group() );
			do_settings_sections( $this->get_menu_slug() );
			submit_button();
			?>
		</form>
		</div><?php
	}

	public function get_url() {
		return admin_url( $this->get_parent_slug() . '?page=' . self::get_menu_slug() );
	}
}
