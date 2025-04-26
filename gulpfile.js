import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import dartSass from 'sass';

const sass = gulpSass(dartSass);

export function sassTask() {
  return gulp.src('resources/sass/**/*.sass')
    .pipe(sass())
    .pipe(gulp.dest('public/css'));
}

export function watchTask() {
  gulp.watch('resources/sass/**/*.sass', sassTask);
}

export default gulp.series(sassTask, watchTask);