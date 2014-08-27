// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// Lint Task
// checks any JavaScript file in our js/ directory and makes sure there are no errors in our code.
gulp.task('lint', function() {
    return gulp.src('www_root/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
// compiles any of our Sass files in our scss/ directory into .css and saves the compiled .css file in our css/ directory
gulp.task('sass', function() {
    return gulp.src('www_root/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('css'));
});

// Concatenate & Minify JS
// concatenates all JavaScript files in our js/ directory and saves the ouput to our dist/ directory.
// Then gulp takes that concatenated file, minifies it, renames it and saves it to the dist/ directory alongside the concatenated file
gulp.task('scripts', function() {
    return gulp.src('www_root/js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist'));
});

// Watch Files For Changes
// used to run tasks as we make changes to our files
gulp.task('watch', function() {
    gulp.watch('www_root/js/*.js', ['lint', 'scripts']);
    gulp.watch('www_root/scss/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'watch']);