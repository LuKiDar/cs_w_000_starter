'use strict';
module.exports = function(grunt) {
    const sass = require('node-sass');
    
    require('load-grunt-tasks')(grunt);
 
    grunt.initConfig({

        /*
         * Clean app folder
         */
        clean: {
            all: ['app']
        },

        /*
         * Copy node_modules libs
         */
        copy: {
            slick: {
                files: [
                    {
                        cwd: 'node_modules/slick-carousel/slick',
                        expand: true,
                        src: ['ajax-loader.gif'],
                        dest: 'img/slick'
                    },
                    {
                        cwd: 'node_modules/slick-carousel/slick/fonts',
                        expand: true,
                        src: ['*'],
                        dest: 'fonts/slick'
                    },
                    {
                        cwd: 'node_modules/slick-carousel/slick',
                        expand: true,
                        src: ['slick.scss', 'slick-theme.scss'],
                        dest: 'css/vendor/slick'
                    },
                    {
                        cwd: 'node_modules/slick-carousel/slick',
                        expand: true,
                        src: ['slick.js'],
                        dest: 'js/vendor/slick'
                    }
                ]
            }
        },
        
        /*
         * JS Validation
         */
        jshint: {
            all: [ 'Gruntfile.js', 'js/source/*.js' ],
            options: {
                "bitwise": true,
                "browser": true,
                "curly": true,
                "eqeqeq": true,
                "eqnull": true,
                "esnext": true,
                "immed": true,
                "jquery": true,
                "latedef": false,
                "newcap": false,
                "noarg": true,
                "node": true,
                "strict": false,
                "trailing": false,
                "undef": false,
                "devel": true,
                "globals": {
                    "jQuery": true,
                    "alert": true
                }
            }
        },
        
        /*
         * JS concatenation
         */
        concat: {
            options: { separator: ';\n', },
            dist: { src: ['js/vendor/*.js', 'js/vendor/*/*.js', 'js/source/*.js'], dest: 'js/build/main.js' }
        },
        
        /*
         * JS minification
         */
        uglify: {
            dist: {
                files: { 'js/build/main.min.js': ['js/build/main.js'] }
            }
        },

        /*
         * SASS compilation
         */
        sass: {
            options: {
                implementation: sass,
                precision: 5,
            },
            dist: {
                files: { 'css/build/main.css': 'css/source/global.scss' }
            }
        },

        /*
         * POSTCSS plugins
         */
        postcss: {
            prefix: {
                options: {
                    processors: [
                        require('mqpacker')(),
                        require('autoprefixer')(),
                    ]
                },
                src: 'css/build/main.css',
                dest: 'css/build/main.css'
            }/*,
            minify: {
                options: {
                    processors: [
                        require('cssnano')({
                            preset: ['default', { discardComments: { removeAll: true } }]
                        })
                    ]
                },
                src: 'css/build/main.css',
                dest: 'css/build/main.min.css'
            }*/
        },

        /*
         * Watch files for changes
         */
        watch: {
            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'concat'] //'uglify'
            },
            css: {
                files: [
                    'css/source/',
                    'css/source/*',
                    'css/source/**/*',
                    'css/vendor/',
                    'css/vendor/*',
                    'css/vendor/**/*'
                ],
                tasks: ['sass', 'postcss']
            }
        }

    });

    /*
     * Register tasks
     */
    grunt.registerTask('default', [
        'clean',
        'copy',
        'jshint',
        'concat',
        //'uglify',
        'sass',
        'postcss',
        'watch',
    ]);

};