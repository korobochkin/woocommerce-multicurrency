# WooCommerce Multi Currency

This plugin allows you bring currency switcher on frontend.

## How to build this plugin?

Required tools for plugin building: Composer, NPM, Grunt.

```
npm install
composer install
grunt
```
After running this commands fully working version of plugin will appear in `plugin` folder. You can mount the `plugin` folder on your webserver as `wp-content/plugins/woocommerce-multi-currency/`.

To make plugin works you can also need to define `WC_MULTI_CURRENCY_APP_ID` in `wp-config.php`.

```
define( 'WC_MULTI_CURRENCY_APP_ID', 'YOUR_APP_ID' );
```
