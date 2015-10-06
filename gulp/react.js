var Elixir = require('laravel-elixir');
var gulp = require('gulp');
var gulpif = require('gulp-if');
var react = require('gulp-react');
var concat = require('gulp-concat');
var minify = require('gulp-uglify');

var Task = Elixir.Task;

Elixir.extend('jsx', function (src, dest) {
    new Task('jsx', function () {
        src = src || 'resources/assets/react/**/*.jsx';
        dest = dest || 'public/js/react';
        var doConcat = ~dest.indexOf('.js');
        return gulp.src(src)
            .pipe(react())
            .pipe(minify())
            .pipe(gulpif(doConcat, concat(dest)))
            .pipe(gulp.dest(dest))
            .pipe(new Elixir.Notification('React Compiled!'));
    })
    .watch('resources/assets/react/**/*.jsx');
});