<?php
namespace Korobochkin\WCMultiCurrency\Admin\Settings\Prototypes\Pages\Views;

class SubMenuPage {

	public function render( \WP_Form_Component $element ) {
		$type = $element->get_type();
		if ( method_exists( $this, $type ) ) {
			call_user_func( array( $this, $type ), $element );
		} elseif ( $element instanceof \WP_Form_Element ) {
			$this->page($element); // fallback to generic <input />
		}
		//return '';
	}

	protected function page( \WP_Form_Element $element ) {
		?><div class="wrap">
		<h2><?php echo $element->get_page_title(); ?></h2>
		<form action="options.php" method="post">
			<?php
			settings_fields( $element->get_option_group() );
			do_settings_sections( $element->get_menu_slug() );
			submit_button();
			?>
		</form>
		</div><?php
	}
}
