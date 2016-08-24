var gulp =          require('gulp'),
    sass =          require('gulp-sass'),
    cleanCSS =     require('gulp-clean-css'),
    autoprefixer =  require('gulp-autoprefixer'),
    rename =        require('gulp-rename'),
    notify =        require('gulp-notify'),
    gutil =         require( 'gulp-util' ),

gulp.task('default', function() {
    gulp.watch('./' + devDirectory + '/css/**/*.css',['minify-css']);
});

gulp.task('sass', function () {
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('./' + devDirectory + '/css'));
});

var cssMinifyLocation = ['./' + devDirectory + '/css/**/*.css', '!./' + devDirectory + '/css/**/*min.css'];
gulp.task('minify-css', function() {
    return gulp.src(cssMinifyLocation)
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./' + distDirectory + '/css'))
        .pipe(notify({ message: 'Styles Successfully Compiled' }));
});
