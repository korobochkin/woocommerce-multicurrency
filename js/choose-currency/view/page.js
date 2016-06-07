var WCMultiCurrency = window.WCMultiCurrency, $ = jQuery;

module.exports = Backbone.View.extend({

    views: {},

    DOM: {},

    initialize: function() {
        this.model = new WCMultiCurrency.model.page();
        this.setupDOM();
        this.createSubViews();
    },

    setupDOM: function() {
        this.DOM.html = $('html');
    },

    createSubViews: function() {
        this.views.currencySwitcher = new WCMultiCurrency.view.currencySwitcher({
            model: new WCMultiCurrency.model.rates()
        });
    }
});
