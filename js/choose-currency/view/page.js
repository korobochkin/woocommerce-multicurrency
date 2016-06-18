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

        var requestedCurrency = Cookies.get('wc-multi-currency-currency');
        if( requestedCurrency !== 'undefined' ) {
            this.model.set('currency', requestedCurrency);
        }

        _.bindAll(this, 'setDefaultCurrency', 'refresh');

        this.setupDOM();
        this.createSubViews();
        this.listenEvents();
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

    listenEvents: function() {
        this.listenTo(this.views.currencySwitcher, 'currencyChanged', this.setDefaultCurrency);
        this.model.on('change:currency', this.refresh);
    },

    render: function() {
        this.views.currencySwitcher.render();
        $('.price').append(this.views.currencySwitcher.$el);
    },

    _prepareCurrencyCollection: function(element, index, list) {
        this.collection.add(new WCMultiCurrency.model.currency({ticker: index, price: element}));
    },

    setDefaultCurrency: function(ticker) {
        var finder = this.collection.findWhere({'ticker': ticker});
        if( finder !== 'undefined' ) {
            this.model.set('currency', ticker);
        }
    },

    refresh: function() {
        var redirect =
            URI(window.location.href)
                .addQuery('wc-multi-currency-set-default-currency', this.model.get('currency'));

        window.location.href = redirect.href();
    }
});
