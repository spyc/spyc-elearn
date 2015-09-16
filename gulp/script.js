var elixir = require('laravel-elixir');
var gulp = require('gulp');
var gulpif = require('gulp-if');
var concat = require('gulp-concat');
var minify = require('gulp-uglify');

var Task = elixir.Task;

elixir.extend('js', function (src, dest) {
    new Task('js', function () {
        src = src || 'resources/assets/scripts/**/*.js';
        dest = dest || 'public/js';
        var doConcat = ~dest.indexOf('.js');
        return gulp.src(src)
            .pipe(minify())
            .pipe(gulpif(doConcat, concat(dest)))
            .pipe(gulp.dest(dest));
    })
        .watch(src);
});