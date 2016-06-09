/* global chooseCurrencyL10n */

var WCMultiCurrency = window.WCMultiCurrency, $ = jQuery;

module.exports = Backbone.View.extend({

    views: {},

    DOM: {},

    initialize: function() {
        this.model = new WCMultiCurrency.model.page();
        this.collection = new WCMultiCurrency.collections.currency();

        _.each(chooseCurrencyL10n.rates, this._prepareCurrencyCollection, this);
        this.collection.add(new WCMultiCurrency.model.currency({price: 1, ticker: chooseCurrencyL10n.base}));

        this.setupDOM();
        this.createSubViews();
        this.render();
    },

    setupDOM: function() {
        this.DOM.html = $('html');
    },

    createSubViews: function() {
        this.views.currencySwitcher = new WCMultiCurrency.view.currencySwitcher({
            model: this.model,
            collection: this.collection
        });
    },

    render: function() {
        this.views.currencySwitcher.render();
        $('.price').append(this.views.currencySwitcher.$el);
    },

    _prepareCurrencyCollection: function(element, index, list) {
        this.collection.add(new WCMultiCurrency.model.currency({ticker: index, price: element}));
    }
});
