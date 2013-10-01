module.exports = function(grunt) {

  return grunt.initConfig({

    pkg: grunt.file.readJSON("package.json"),

    paths: {
      "static": "./public/static/"
    },

    concat: {
      scripts: {
        src: [
            "<%= paths.static %>js/lib/jquery.js",
            "<%= paths.static %>js/lib/*.js",
            "<%= paths.static %>js/*.js",
            "!<%= paths.static %>js/lib/modernizr.js"
        ],
        dest: "<%= paths.static %>js/build/build.js"
      }
    },

    uglify: {
      options: {
        banner: "/*!\n" +
          "Built <%= grunt.template.today('dd-mm-yyyy') %>\n" +
          "<%= pkg.homepage %>\n" +
          "Copyright (c) <%= grunt.template.today('yyyy') %>" +
          "<%= pkg.author.name %>\n" +
          "*/\n",
        mangle: false,
        compress: true,
        preserveComments: false
      },
      dist: {
        files: [
          {
            src: [
                "<%= paths.static %>js/lib/jquery.js",
                "<%= paths.static %>js/lib/*.js",
                "<%= paths.static %>js/*.js",
                "!<%= paths.static %>js/lib/modernizr.js"
            ],
            dest: "<%= paths.static %>js/build/build.js"
          }
        ]
      }
    },

    livereload: {
      port: 35729
    },

    connect: {
      livereload: {
        options: {
          port: 9001
        }
      }
    },

    sass: {
      dev: {
        options: {
          style: "expanded"
        },
        files: [
          {
            expand: true,
            cwd: "<%= paths.static %>scss/",
            src: [
                "**/*.scss",
                "!**/_*.scss"
            ],
            dest: "<%= paths.static %>css/",
            ext: ".css"
          }
        ]
      },
      dist: {
        options: {
          style: "compressed"
        },
        files: [
          {
            expand: true,
            cwd: "<%= paths.static %>scss/",
            src: [
                "**/*.scss",
                "!**/_*.scss"
            ],
            dest: "<%= paths.static %>css/",
            ext: ".css"
          }
        ]
      }
    },

    regarde: {
      css: {
        files: "<%= paths.static %>css/*.css",
        tasks: ["livereload"]
      },
      js: {
        files: [
            "<%= paths.static %>js/**/*.js",
            "!<%= paths.static %>js/build/*.js"
        ],
        tasks: ["concat", "livereload"]
      },
      html: {
        files: "./templates/**/*.html",
        tasks: ["livereload"]
      },
      img: {
        files: ["<%= paths.static %>images/*.*"],
        tasks: ["livereload"]
      },
      scss: {
        files: ["<%= paths.static %>scss/**/*.scss"],
        tasks: ["sass:dev", "concat", "livereload"]
      }
    }

  },

  grunt.loadNpmTasks("grunt-regarde"),
  grunt.loadNpmTasks("grunt-contrib-sass"),
  grunt.loadNpmTasks("grunt-contrib-concat"),
  grunt.loadNpmTasks("grunt-contrib-uglify"),
  grunt.loadNpmTasks("grunt-contrib-connect"),
  grunt.loadNpmTasks("grunt-contrib-livereload"),

  grunt.registerTask("build", ["sass:dist", "uglify"]),
  grunt.registerTask("dev", "dev", function() {
    var tasks = ["livereload-start", "connect", "regarde"];
    grunt.option('force', true);
    grunt.task.run(tasks);
  })

)};