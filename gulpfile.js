var gulp = require('gulp');
var gulpSequence = require('gulp-sequence').use(gulp);
var less = require('gulp-less');
var concat = require('gulp-concat');
var rename = require("gulp-rename");
var cssmin = require("gulp-cssmin");
//var uglify = require('gulp-uglify');
var path = require('path');

gulp.task('base', function() {
    var stream = gulp.src('./src/less/base.less')
        .pipe(less({
            //paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});
gulp.task('fa', function() {
    return gulp.src(['./src/less/fontawesome/font-awesome.less'])
        .pipe(less({
            //paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./dist/css'))
});
gulp.task('concat', function() {
    var stream = gulp.src(['./dist/css/base.css', './dist/css/font-awesome.css'])
        .pipe(concat('app.css'))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});
gulp.task('product', function() {
    var stream = gulp.src('./dist/css/app.css')
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});

gulp.task('buildApp', gulpSequence('base', 'concat'));

gulp.task('devApp', function() {
    var watcher = gulp.watch('src/**/*.less', ['buildApp']);
    watcher.on('change', function(event) {
        console.log('[devApp] File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
})
gulp.task('default', function() {
    var watcher = gulp.watch('src/**/*.less', ['base', 'concat', 'product']);
    watcher.on('change', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
})
