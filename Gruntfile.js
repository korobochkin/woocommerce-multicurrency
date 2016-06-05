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
        }

    });

    require('load-grunt-tasks')(grunt, { scope: 'devDependencies' });

    grunt.registerTask('default', [
        'copy:composer'
    ]);
};
