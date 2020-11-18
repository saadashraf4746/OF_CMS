var gulp = require('gulp');
const { series, parallel, watch } = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
const minifyCSS = require('gulp-minify-css');

//var CssSourcemapPlugin = require('css-sourcemaps-webpack-plugin');

var styleSRC = './src/scss/**/*.scss';
var styleDIST = './dist/css/';

function sassCompile(cb) {
	gulp.src(styleSRC)
	.pipe(sourcemaps.init())
	.pipe(sass({
		errorLogToConsole: true,
		outputStyle: 'compact'
	}).on('error', console.error.bind(console)))
	.pipe( rename( { suffix: '.min' } ) )
	.pipe(minifyCSS())
	.pipe(sourcemaps.write())
	.pipe(gulp.dest(styleDIST));	

	cb();
}

  watch(styleSRC, sassCompile);

  exports.sassCompile = sassCompile;
  exports.default = parallel(sassCompile);
