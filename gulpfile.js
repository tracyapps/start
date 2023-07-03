const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const svgSprite = require('gulp-svg-sprite');
const browserSync = require('browser-sync').create();

// Compile Sass files
gulp.task('sass', () => {
	return gulp.src('assets/scss/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('assets/css'))
		.pipe(browserSync.stream());
});

// Concatenate and minify JavaScript files
gulp.task('scripts', () => {
	return gulp.src('assets/js/scripts/*.js')
		.pipe(concat('bundle.js'))
		.pipe(uglify())
		.pipe(gulp.dest('assets/js'))
		.pipe(browserSync.stream());
});

// Generate SVG sprite
gulp.task('svg', () => {
	return gulp.src('assets/svg/originals/*.svg')
		.pipe(svgSprite({
			mode: {
				symbol: {
					dest: '.',
					sprite: 'icons.svg'
				}
			},
			svg: {
				xmlDeclaration: false,
				doctypeDeclaration: false
			},
			template: 'assets/svg/icon-template.scss'
		}))
		.pipe(gulp.dest('assets/svg'))
		.pipe(browserSync.stream());
});

// Watch for changes and reload browser
gulp.task('watch', () => {
	browserSync.init({
		proxy: 'http://start.local/', // Change this to match your local server
		notify: false
	});

	gulp.watch('assets/scss/**/*.scss', gulp.series('sass'));
	gulp.watch('assets/js/scripts/*.js', gulp.series('scripts'));
	gulp.watch('assets/svg/originals/*.svg', gulp.series('svg'));
	gulp.watch('**/*.php').on('change', browserSync.reload);
});

// Default task
gulp.task('default', gulp.parallel('sass', 'scripts', 'svg'));