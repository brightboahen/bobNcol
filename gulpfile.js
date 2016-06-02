/**
 * Created by Bright on 02/06/2016.
 */
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync').create(),
    useRef = require('gulp-useref'),
    uglify = require('gulp-uglify'),
    gulpIf = require('gulp-if'),
    // imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    cssnano = require('gulp-cssnano'),
    del = require('del'),
    runSequence = require('run-sequence').use(gulp);

gulp.task('browserSync', function(){
    browserSync.init({
        server: {
            baseDir: 'app'
        }
    })
});

gulp.task('sass',function(){
    return gulp.src('app/scss/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('app/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('watch',['browserSync'], function(){
    gulp.watch('app/scss/**/*.scss',['sass']);
    gulp.watch('app/*.html', browserSync.reload);
    gulp.watch('app/js/**/*.js', browserSync.reload);
});

gulp.task('useref', function(){
    return gulp.src('app/*.html')
        .pipe(useRef())
        .pipe(gulpIf('*.js', uglify()))
        .pipe(gulpIf('*.css', cssnano()))
        .pipe(gulp.dest('build'))
});

// gulp.task('images', function(){
//     return gulp.src('app/images/**/*.+(png|jpg|gif|svg)')
//         .pipe(cache(imagemin({
//             interlaced: true
//         })))
//         .pipe(gulp.dest('build/images'));
// });

gulp.task('clean', function(){
    console.log('cleaning files');
    return del.sync('build');
});

gulp.task('build', function(callback){
    console.log('building files');
    runSequence(['clean','sass','useref'], callback);
});

gulp.task('default', function(callback){
    runSequence(['sass','browserSync', 'watch'], callback)
});

