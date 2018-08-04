'use strict';

let source = require('vinyl-source-stream'),
    gulp = require('gulp'),
    clean = require('gulp-clean'),
    sass = require('gulp-sass'),
    cache = require('gulp-cache'),
    concat = require('gulp-concat'),
    size = require('gulp-size'),
    uglify = require('gulp-uglify'),
    cleanCSS = require('gulp-clean-css'),
    sourcemaps = require('gulp-sourcemaps'),
    rename = require('gulp-rename'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcePath = './assets/',
    buildPath = './build/';

//CSS
gulp.task('sass:main', function () {
    return gulp.src(sourcePath + 'sass/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: require('node-bourbon').includePaths
        }).on('error', sass.logError))
        .pipe(rename({
            basename: "style",
        }))
        .pipe(autoprefixer({
            browsers: ['last 15 versions'],
            cascade: false
        }))
        // .pipe(cleanCSS())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'));
});

gulp.task('scss:watch', function () {
    return gulp.watch([sourcePath + 'sass/**/*.sass', sourcePath + 'sass/**/*.scss'], ['sass:main']);
});

//minify CSS
gulp.task('minify:css', ['sass:main', 'scss:backend'], function () {
    return gulp.src(buildPath + 'sass/*.css')
        .pipe(cleanCSS({
            compatibility: 'ie9',
            level: 2,
            specialComments: 0
        }))
        .pipe(size())
        .pipe(gulp.dest(buildPath + 'css'));
});

//backend
gulp.task('scss:backend', function () {
    return gulp.src('./assets/sass/backend/colors.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(buildPath + 'css'));
});

//js
gulp.task('browserify:watch', function () {
    return gulp.watch(sourcePath + 'js/**/*.js', ['minify:js']);
});

//minify JS
gulp.task('minify:js', function () {
    return gulp.src(sourcePath + 'js/common.js')
        .pipe(rename({
            suffix: '.min',
            prefix: ''
        }))
        .pipe(uglify())
        .pipe(size())
        .pipe(gulp.dest(sourcePath + 'js'));
});

gulp.task('clean', function () {
    return gulp.src([buildPath + 'css', buildPath + 'js', buildPath + 'fonts'], {read: false})
        .pipe(clean());
});

//task groups
gulp.task('default', ['copy:fonts', 'sass:main']);
gulp.task('watch', ['scss:watch', 'browserify:watch']);
gulp.task('production', ['clean'], function () {
    gulp.start('sass:main', 'scss:backend', 'minify:js', 'minify:css');
});