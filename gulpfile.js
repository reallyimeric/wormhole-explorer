var gulp = require('gulp')
var clean = require('gulp-clean')

gulp.task('build', ['css', 'js', 'img', 'CI','apache', 'fonts']);

gulp.task('apache', () => {
    gulp.src('src/.htaccess')
    .pipe(gulp.dest('wormholeexplorer/'))
})

gulp.task('CI', () => {
    gulp.src('src/index.php')
    .pipe(gulp.dest('wormholeexplorer/'))
    gulp.src('src/CI/**/*')
    .pipe(gulp.dest('wormholeexplorer/CI/'))
    gulp.src('vendor/codeigniter/framework/system/**/*')
    .pipe(gulp.dest('wormholeexplorer/system/'))
})

gulp.task('fonts', () => {
    gulp.src('node_modules/bootstrap/dist/fonts/**/*')
    .pipe(gulp.dest('wormholeexplorer/fonts/'))
})

gulp.task('css', () => {
    gulp.src('src/css/**/*')
    .pipe(gulp.dest('wormholeexplorer/css/'))
    gulp.src('node_modules/jquery.fancytree/dist/skin-bootstrap/ui.fancytree.min.css')
    .pipe(gulp.dest('wormholeexplorer/css/'))
    gulp.src('node_modules/bootstrap/dist/css/bootstrap.min.css')
    .pipe(gulp.dest('wormholeexplorer/css/'))
})

gulp.task('js', () => {
    gulp.src('src/js/**/*')
    .pipe(gulp.dest('wormholeexplorer/js/'))
    gulp.src('node_modules/jquery.fancytree/dist/jquery.fancytree.min.js')
    .pipe(gulp.dest('wormholeexplorer/js/'))
    gulp.src('node_modules/jquery.fancytree/dist/src/jquery.fancytree.edit.js')
    .pipe(gulp.dest('wormholeexplorer/js/'))
    gulp.src('node_modules/jquery.fancytree/dist/src/jquery.fancytree.glyph.js')
    .pipe(gulp.dest('wormholeexplorer/js/'))
    gulp.src('node_modules/jqueryui/jquery-ui.min.js')
    .pipe(gulp.dest('wormholeexplorer/js/'))
    gulp.src('node_modules/jquery/dist/jquery.min.js')
    .pipe(gulp.dest('wormholeexplorer/js/'))
    gulp.src('node_modules/bootstrap/dist/js/bootstrap.min.js')
    .pipe(gulp.dest('wormholeexplorer/js/'))
})

gulp.task('img', () => {
    gulp.src('src/image/**/*')
    .pipe(gulp.dest('wormholeexplorer/image/'))
    gulp.src('src/favicon.ico')
    .pipe(gulp.dest('wormholeexplorer/'))
})

gulp.task('clean', () => {
    gulp.src('wormholeexplorer/', {read: false})
	.pipe(clean())
})
