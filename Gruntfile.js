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
            src:  'js/analytics.js',
            dest: 'js/analytics.min.js'
        }
    },
    concat: {
    	options: {
        	separator: "\n\n", 
      	},
        js: {
            src: ["js/starrr.min.js", "js/owl.carousel.min.js", "js/lugar.min.js"],
        	  dest: "js/all.lugar.js"
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
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-imagemin');
 
// Default task(s).
grunt.registerTask('default', ['compass', 'uglify', 'concat']);
grunt.registerTask('dev', ['watch']);
 
};