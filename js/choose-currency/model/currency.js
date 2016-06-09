
module.exports = Backbone.Model.extend({

    defaults: {
        ticker: '',
        price: 0
    },

    validate: function (attrs) {
        var errors = {};

        if( _.has(attrs, 'ticker') ) {
            if( attrs.ticker.length != 3 ) {
                errors.ticker = 'Ticker not valid';
            }
        }
        else {
            errors.ticker = 'Currency need a ticker';
        }

        if(_.has(attrs, 'price')) {
            if(!_.isFinite_(attrs.price) || attrs.price < 0) {
                errors.price = 'Currency price seems incorrect';
            }
        }

        if (!_.isEmpty(errors)) return errors;
    }
});
