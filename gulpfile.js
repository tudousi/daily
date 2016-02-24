var gulp = require('gulp');
var gulpSequence = require('gulp-sequence').use(gulp);
var less = require('gulp-less');
var concat = require('gulp-concat');
var rename = require("gulp-rename");
var cssmin = require("gulp-cssmin");
//var uglify = require('gulp-uglify');
var path = require('path');

// 提供各个页面的样式
gulp.task('common', function() {
    var stream = gulp.src('./src/less/common.less')
        .pipe(less({
            //paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});
// 提供各个页面的样式
gulp.task('index', function() {
    var stream = gulp.src('./src/less/index.less')
        .pipe(less({
            //paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});

// 字体库
gulp.task('fa', function() {
    return gulp.src(['./src/less/fontawesome/font-awesome.less'])
        .pipe(less({
            //paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./dist/css'))
});




gulp.task('product', function() {
    var stream = gulp.src('./dist/css/app.css')
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});



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


/*
// 放弃这种办法，把字体库移出来
gulp.task('concat-index', function() {
    var stream = gulp.src(['./dist/css/index.css', './dist/css/font-awesome.css'])
        .pipe(concat('index.css'))
        .pipe(gulp.dest('./dist/css'));
    return stream;
});
*/
// 对各个页面进行编译
//gulp.task('build-index', gulpSequence('index', 'concat-index')); // 对index进行编译
