<?php
namespace Korobochkin\WCMultiCurrency\Service\Js\CurrencySwitcher;

use Korobochkin\WCMultiCurrency\Plugin;

class Templates {

	public static function render_templates() {
		?>
		<script type="text/html" id="<?php echo esc_attr( Plugin::NAME ); ?>-tmpl-currency-switcher">
			<div class="<?php echo esc_attr( Plugin::NAME ); ?> currency-switcher">
				<select class="currency-switcher-select">
				</select>
			</div>
		</script>
		<script type="text/html" id="<?php echo esc_attr( Plugin::NAME ); ?>-tmpl-currency-switcher-select-option">
			<option value="<%- ticker %>"><%- ticker %> (<%- price %>)</option>
		</script>
		<?php
	}
}