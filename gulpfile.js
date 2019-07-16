var gulp         = require( 'gulp' );
var rename       = require( 'gulp-rename' );
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var browserify   = require( 'browserify' );
var babelify     = require( 'babelify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var uglify       = require( 'gulp-uglify' );
var browserSync  = require( 'browser-sync' ).create();
var reload       = browserSync.reload;
var paths = {
	styleWatch:{
		src:'assets/src/scss/**/*.scss'
	},
	scriptWatch:{
		src:'assets/src/js/**/*.js'
	},
	styles:{
		src:'assets/src/scss/main.scss',
		dest:'./assets/dist/css'
	},
	scripts:{
		src:'assets/src/js/main.js',
		dest:'./assets/dist/js'
	},
	 jsFolder:{
	    src: 'assets/src/js/'
	}
};
var jsFiles   = [paths.scripts.src];
var htmlWatch = '**/*.html';
var phpWatch  = '**/*.php';

function sync(cb){
  browserSync.init({
      open: true,
      injectChanges: true,
      // proxy: 'http://www.wp2.com',
      // http:{
      //   key: 'User/http://www.wp2.com/wp-content/themes/TierFive/index.html.key',
      //   cert: 'User/http://www.wp2.com/wp-content/themes/TierFive/index.html.crt'
      // }
  });
  cb();
}

// CSS
function styles(cb){
	return gulp.src(paths.styles.src)
		       .pipe(sourcemaps.init())
		       .pipe(sass({
		       	errorLogToConsole: true,
		       	outputStyle: 'compressed'
		       }))
		       .on('error', console.error.bind(console))
		       .pipe(autoprefixer({
		       	browsers: ['last 2 versions'],
		       	cascade: false
		       }))
		       .pipe(rename({suffix: '.min'}))
		       .pipe(sourcemaps.write('./'))
		       .pipe(gulp.dest(paths.styles.dest))
		       .pipe(browserSync.stream());
	cb();
}

// JS
// function scripts(cb){
// 	 jsFiles.map(function(entry){
// 	    return browserify({
// 	      entries: [paths.jsFolder.src + entry]
// 	    })
// 	    .transform(babelify, {presets: ['env']})
// 	    .bundle()
// 	    .pipe(source(entry))
// 	    .pipe(rename({extname: '.min.js'}))
// 	    .pipe(buffer())
// 	    .pipe(sourcemaps.init({loadMaps: true}))
// 	    .pipe(uglify())
// 	    .pipe(sourcemaps.write('./'))
// 	    .pipe(gulp.dest(paths.scripts.dest))
// 	    .pipe(browserSync.stream())
// 	  });
// 	cb();
// }

function watch(cb){
  // watch files
  gulp.watch(paths.styleWatch.src, styles, reload);
  // gulp.watch(paths.scriptWatch.src, scripts, reload);
  gulp.watch(htmlWatch).on('change', reload);
  gulp.watch(phpWatch).on('change', reload);
  cb();
}

exports.default = gulp.series(styles, watch, sync);