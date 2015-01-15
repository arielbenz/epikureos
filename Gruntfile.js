module.exports = function(grunt) {
 
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
     
        compass: {
            dev: {
                options: {
                   /* Either use your config.rb for settings, or state them here */
                   //config: 'config.rb'
                   require:['susy', 'breakpoint'],
                   httpPath:"/",
                   sassDir:"assets/sass",
                   cssDir:"assets/css",
                   imagesDir:"assets/img",
                   // javascriptsDir:"site/assets/js",
                   // fontsDir:"site/assets/fonts",
                   outputStyle:"compressed",
                   noLineComments:true,
                   relativeAssets:true,
                   raw: "preferred_syntax = :sass\n"
                }
            }
        },
        
        // Concat
        concat: {
            options: {
                separator: "\n\n\n"
            },
            basic: {
                src: ['assets/js/lib/jquery-1.11.1.min.js','assets/js/lib/modernizr.min.js', 'assets/js/lib/sweet-alert.min.js', 'assets/js/src/facebook.js'],
                dest: 'assets/js/src/baselib.js'
            },
            dist: {
                src: ['assets/js/lib/starrr.min.js', 'assets/js/lib/owl.carousel.min.js', 'assets/js/src/lugar.js'],
                dest: 'assets/js/src/baselib-lugar.js'
            }
        },

        // Uglify
        uglify: {
            base: {
                src:  'assets/js/src/baselib.js',
                dest: 'assets/js/dist/baselib.min.js'
            },
            lugar: {
                src:  'assets/js/src/baselib-lugar.js',
                dest: 'assets/js/dist/baselib-lugar.min.js'
            },
            busqueda: {
                src:  'assets/js/src/busqueda.js',
                dest: 'assets/js/dist/baselib-busqueda.min.js'
            }
        },

        // Watch
        watch: {
            styles: {
                files: ['assets/sass/**/*.scss',],
                tasks: ['compass'],
                options: {
                    spawn: false,
                },
            },
            js: {
                files: ['assets/js/**/*.js',],
                tasks: ['js-task'],
                options: {
                    spawn: false,
                },
            },
        }
    });
     
    // Load plugins here
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
     
    // Default task(s).
    grunt.registerTask('default', ['compass', 'concat', 'uglify']);
    grunt.registerTask('dev', ['watch']);
    grunt.registerTask('js-task', ['concat', 'uglify']);
 
};