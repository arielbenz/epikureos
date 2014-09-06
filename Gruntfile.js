/* Gruntfile.js */
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
               sassDir:"sass",
               cssDir:"css",
               imagesDir:"img",
               // javascriptsDir:"site/assets/js",
               // fontsDir:"site/assets/fonts",
               outputStyle:"compressed",
               noLineComments:true,
               relativeAssets:true,
               raw: "preferred_syntax = :sass\n"
            }
        }
    },
    uglify: {
        build: {
            src:  'js/busqueda.js',
            dest: 'js/busqueda.min.js'
        }
    },
    watch: {
        styles: {
            files: ['sass/**/*.scss',],
            tasks: ['compass'],
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
 
// Default task(s).
grunt.registerTask('default', ['compass', 'uglify']);
grunt.registerTask('dev', ['watch']);
 
};