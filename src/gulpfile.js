'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');

sass.compiler = require('node-sass');

var config = {
    srcCSSPath: '../site/wp-content/themes/roseankh/assets/css'
}

gulp.task('cssnano', function() { 
    return gulp.src('./ng-theme/src/assets/css/main.css')
    .pipe(cssnano())
    .pipe(gulp.dest('./css/new'))
}
);

gulp.task('sass', function () {
    return gulp.src(['./assets/sass/main.scss'])
        .pipe(plumber())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
       // .pipe(cssnano())
        .pipe(gulp.dest(config.srcCSSPath));
});

gulp.task('watch', function () {

    gulp.watch('./assets/sass/**/*.scss', gulp.series('sass'));
    //gulp.watch('./js/**/*.js', gulp.series('babel'));
   // gulp.watch('./js/**/*.js', gulp.series('concat'));

});