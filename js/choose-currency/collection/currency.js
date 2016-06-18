var WCMultiCurrency = window.WCMultiCurrency;

module.exports = Backbone.Collection.extend({
    model: WCMultiCurrency.model.currency
});
