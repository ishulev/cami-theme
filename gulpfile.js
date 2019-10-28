'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var babel = require('gulp-babel');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
    return gulp.src('./sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'));
});

gulp.task('js', function () {
    return gulp.src('js/plugin.js')
        .pipe(babel({
            presets: ['@babel/preset-env', '@babel/preset-react'],
            plugins: ['@babel/plugin-transform-modules-commonjs']
        }))
        .on('error', function (e) {
            console.error(e);
            // this.emit('end');
        })
        .pipe(gulp.dest('js/dist'))
});

gulp.task('sass:watch', function () {
    gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('js:watch', function () {
    gulp.watch('./js/plugin.js', ['js']);
});

gulp.task('default', ['sass', 'js', 'sass:watch', 'js:watch']);