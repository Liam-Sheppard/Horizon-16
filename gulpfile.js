var gulp =          require('gulp'),
    sass =          require('gulp-sass'),
    cleanCSS =      require('gulp-clean-css'),
    autoprefixer =  require('gulp-autoprefixer'),
    rename =        require('gulp-rename'),
    notify =        require('gulp-notify'),
    sourcemaps =    require('gulp-sourcemaps'),
    gutil =         require( 'gulp-util' ),
    concat =        require('gulp-concat'),
    jsmin =         require('gulp-jsmin'),
    iconfont =      require('gulp-iconfont'),
    gulpFile =      require('gulp-file'),
    tap     =       require('gulp-tap'),
    distDirectory = 'assets';
    devDirectory =  'dev';

const bundlejs = require('./' + devDirectory + '/js/js-package-sources.json');

gulp.task('default', function() {
    gulp.watch('./' + devDirectory + '/scss/**/*.scss', ['sass']);
    gulp.watch('./' + devDirectory + '/js/**/*.js', ['scripts']);
    gulp.watch('./' + devDirectory + '/icons/*.svg', ['icons']);
});

gulp.task('sass', function () {
    return gulp.src('./' + devDirectory + '/scss/styles.scss')
        .pipe(sourcemaps.init())
            .pipe(sass().on('error', sass.logError))
            .pipe(autoprefixer('last 7 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest('./' + distDirectory + '/css'))
        .pipe(notify({ message: 'Styles Successfully Compiled' }));
});

gulp.task('scripts', function() {
  gulp.src(bundlejs.sources)
    .pipe(sourcemaps.init())
      .pipe(concat('bundle.js'))
      .pipe(rename({
        suffix: '.min'
      }))
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('./' + distDirectory + '/js'));
});

gulp.task('deploy', function() {
  gulp.src(bundlejs.sources)
    .pipe(sourcemaps.init())
      .pipe(concat('bundle.js'))
      .pipe(jsmin())
      .pipe(rename({
        suffix: '.min'
      }))
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('./' + distDirectory + '/js'));
});

gulp.task('icons', function() {
  var iconNames = [];
  var iconCodes = [];

  var icons = gulp.src(['dev/icons/*.svg'])
    .pipe(iconfont({
      fontName: 'icon-font', // required
      prependUnicode: true, // recommended option
      formats: ['ttf', 'eot', 'woff'], // default, 'woff2' and 'svg' are available
      normalize: true,
      timestamp: Math.round(Date.now() / 1000), // recommended to get consistent builds when watching files
    }))
    .on('glyphs', function(glyphs, options) {
      /**
       * Output icon scss
       */
      var iconsScss = '';
      var files = gulp.src('dev/icons/*.svg')
          .pipe(tap(function(file, t){
            var codeStartLocation = file.path.search(/[u][A-Z][A-Z][A-Z|0-9][A-Z|0-9]/);
            var currentIconName = file.path.toString().substring(codeStartLocation + 6, file.path.toString().length-4);
            var currentIconCode = file.path.toString().substring(codeStartLocation + 1, codeStartLocation + 5);
            iconsScss += '.icon-' + currentIconName + ':after { content: \'\\' + currentIconCode + '\'; }  ';
            gulpFile('_icon-names.scss', iconsScss).pipe(gulp.dest('dev/scss'));
          }));
    })
    .pipe(gulp.dest(distDirectory + '/fonts'));

  return icons;
});
