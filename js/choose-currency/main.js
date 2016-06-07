/* global jQuery, Backbone */

var WCMultiCurrency = {};

// Store everything globally
window.WCMultiCurrency = WCMultiCurrency;

// Models
WCMultiCurrency.model = {

    page: require('./model/page'),
    rates: require('./model/rates')
};

// Views
WCMultiCurrency.view = {

    // Main view ever
    page: require('./view/page'),

    // Select
    currencySwitcher: require('./view/currency-switcher')
};
