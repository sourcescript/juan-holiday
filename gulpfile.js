/**
 * Directories
 */
var
	_public			= './public/',
	_assets 		= _public + 'assets/',
	_js				= _assets + 'js/',
	_vendor			= _assets + 'vendor/',
	_app			= _public + 'app/';


/**
 * Node modules
 */
var
	gulp 			= require('gulp'),
	concat			= require('gulp-concat'),
	uglify 			= require('gulp-uglify'),
	browserify 		= require('browserify'),
	source 			= require('vinyl-source-stream');

gulp.task('bundle-app', function() {
	return browserify(_app + 'build.js')
		.bundle()
		.pipe(source('build.js'))
		.pipe(gulp.dest(_js));
});

gulp.task('concat-libs', function() {
	return gulp.src([
		_vendor + 'jquery/dist/jquery.js',
		_vendor + 'jquery-ui/ui/jquery-ui.js',
		_vendor + 'bootstrap/dist/js/bootstrap.js',
		_vendor + 'angular/angular.js',
		_vendor + 'angular-ui-router/release/angular-ui-router.js',
		_vendor + 'angular-ui-calendar/src/calendar.js',
		_vendor + 'fullcalendar/fullcalendar.js',
		_vendor + 'fullcalendar/gcal.js'
	])
		.pipe(concat('libs.js'))
		.pipe(gulp.dest(_js));
});

gulp.task('default', function() {
	gulp.run('concat-libs');
	gulp.run('bundle-app');

	gulp.watch(_app + '**/*.js', ['bundle-app']);
	gulp.watch(_vendor + '**/*.js', ['concat-libs']);
});