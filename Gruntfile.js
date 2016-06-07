module.exports = function(grunt) {
    'use strict';

    // Force use of Unix newlines
    grunt.util.linefeed = '\n';

    grunt.initConfig({

        copy: {
            composer: {
                expand: true,
                src: 'vendor/**',
                dest: 'plugin/'
            }
        },

        browserify: {
            chooseCurrency: {
                src: 'js/choose-currency/main.js',
                dest: 'plugin/js/choose-currency/choose-currency.js',
                options: {
                    //require: ['jquery']
                }
            }
        }

    });

    require('load-grunt-tasks')(grunt, { scope: 'devDependencies' });

    grunt.registerTask('default', [
        'copy:composer',
        'scriptsChooseCurrency'
    ]);

    grunt.registerTask('scriptsChooseCurrency', [
        'browserify:chooseCurrency'
    ]);
};
