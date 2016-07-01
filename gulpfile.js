//Due to Laravel Elixir having it's own Gulp file this is simply just used for setuping up the assets and watching SASS files
//Most tasks are not used anymore but simply serve as a demonstration.

var gulp = require('gulp'); 
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var minifyHTML = require('gulp-minify-html');
var concat = require('gulp-concat');
var stripDebug = require('gulp-strip-debug');
var uglify = require('gulp-uglify');
var autoprefix = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var phpMinify = require('gulp-php-minify');
var Server = require('karma').Server;
var jasmine = require('gulp-jasmine');


gulp.task('jshint', function() {
  gulp.src('./src/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

gulp.task('minify:php', () => gulp.src('src/php/**/*.php', {read: false})
  .pipe(phpMinify())
  .pipe(gulp.dest('build/php/'))
);

gulp.task('sass', function () {
  gulp.src('src/css/sass/*.scss')
    .pipe(sass({
      includePaths: require('node-bourbon').includePaths
    }).on('error', sass.logError))
    .pipe(gulp.dest('laravel/public/css/'));
});

gulp.task('imagemin', function() {
  var imgSrc = './src/imgs/**/*',
      imgDst = './build/imgs';

  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(imagemin())
    .pipe(gulp.dest(imgDst));
});

gulp.task('htmlpage', function() {
  var htmlSrc = './src/*.html',
      htmlDst = './build';

  gulp.src(htmlSrc)
    .pipe(changed(htmlDst))
    .pipe(minifyHTML())
    .pipe(gulp.dest(htmlDst));
});

gulp.task('scripts', function() {
 // gulp.src(['./src/scripts/lib.js','./src/scripts/*.js'])
   gulp.src(['./src/js/*.js'])
    .pipe(concat('script.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./build/js/'));
});

gulp.task('styles', function() {
  gulp.src(['./src/css/*.css'])
    .pipe(concat('styles.css'))
    .pipe(autoprefix('last 2 versions'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./build/css/'));
});

gulp.task('specs', function () {
    return gulp.src('assets/js/spec/lib/*.js')
        .pipe(jasmine());
});

gulp.task('test', function (done) {
  new Server({
    configFile: __dirname + '/karma.conf.js',
    singleRun: true
  }, done).start();
});

gulp.task('copy_standards', function(){
  var imgSrc = './node_modules/uswds/dist/img/**',
      fontsSrc = './node_modules/uswds/dist/fonts/**',
      cssSrc = './node_modules/uswds/dist/css/**',
      jsSrc = './node_modules/uswds/dist/js/**';

  var imgDst = './laravel/public/imgs',
      fontsDst = './laravel/public/fonts',
      cssDst = './laravel/public/css',
      jsDst = './laravel/public/js';

  gulp.src(imgSrc).pipe(gulp.dest(imgDst));

  gulp.src(fontsSrc).pipe(gulp.dest(fontsDst));
    
  gulp.src(cssSrc).pipe(gulp.dest(cssDst));

  gulp.src(jsSrc).pipe(gulp.dest(jsDst));

});

gulp.task('copy_laravel', function(){
  var laravelSrc = './laravel/**';

  var laravelDst = './build';

  gulp.src(laravelSrc).pipe(gulp.dest(laravelDst));

});



gulp.task('setup', ['copy_standards'], function(){});

gulp.task('test', ['specs','test'], function(){});

gulp.task('create_build', ['sass', 'copy_laravel'], function(){});

gulp.task('default', ['imagemin', 'htmlpage','minify:php','scripts', 'styles'], function() {

  gulp.watch('./src/*.html', function() {
    gulp.run('htmlpage');
  });

  gulp.watch('./src/js/*.js', function() {
    gulp.run('jshint', 'scripts');
  });

  gulp.watch('./src/css/*.css', function() {
    gulp.run('styles');
  });
});

gulp.task('asset_watch', ['imagemin','scripts','sass','styles'], function() {
  gulp.watch('./src/*.html', function() {
    gulp.run('htmlpage');
  });

  gulp.watch('./src/js/*.js', function() {
    gulp.run('jshint', 'scripts');
  });

  gulp.watch('./src/css/*.css', function() {
    gulp.run('styles');
  });
});

gulp.task('sass_watch', ['sass'], function(){

	gulp.watch('./src/css/sass/*.scss',['sass']);

});
