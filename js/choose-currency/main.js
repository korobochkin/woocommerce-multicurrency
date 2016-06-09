/* global jQuery, Backbone */

var WCMultiCurrency = {};

// Store everything globally
window.WCMultiCurrency = WCMultiCurrency;

// Models
WCMultiCurrency.model = {

    page: require('./model/page'),
    currency: require('./model/currency')
};

// Collections
WCMultiCurrency.collections = {

    currency: require('./collection/currency')
};

// Views
WCMultiCurrency.view = {

    // Main view ever
    page: require('./view/page'),

    // Select
    currencySwitcher: require('./view/currency-switcher')
};
jQuery(document).ready(function() {
    new WCMultiCurrency.view.page();
});
