var WCMultiCurrency = window.WCMultiCurrency, $ = jQuery;

module.exports = Backbone.View.extend({

    events: {
        'change select': 'onSelectChange'
    },

    DOM: {},

    TPL: {},

    initialize: function() {
        this.TPL.main = $('#wc-multi-currency-tmpl-currency-switcher');
        this.TPL.option = $('#wc-multi-currency-tmpl-currency-switcher-select-option');

        _.bindAll(this, 'onSelectChange');
    },

    render: function() {

        /*if(!$.contains(this.$el, document)) {
            this.$el
        }*/

        this.$el.html(this.TPL.main.html());

        this.collection.each(this._render_option, this);

        /*this.$el.html(
            _.template(template, {options: options})
        );*/
        return this;
    },

    _render_option: function(element, index, list) {
        var ticker = element.get('ticker');
        var price =  element.get('price');

        this.$('select').append(
            _.template(this.TPL.option.html()) ({ticker: ticker, price: price })
        );
    },

    onSelectChange: function(event) {
        this.trigger('currencyChanged', event.target.value);
    }
});
