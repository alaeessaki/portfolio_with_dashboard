var gulp = require('gulp');
var sass = require('gulp-sass');
var uglifycss = require('gulp-uglifycss');
var concatCss = require('gulp-concat-css');
const imagemin = require('gulp-imagemin');
let uglify = require('gulp-uglify-es').default;


//this function copy the all needed files from src to dist
function copyHTML(done) {
    gulp.src('./src/*.php')
        .pipe(gulp.dest('./dist/'))
    done();
}
function copyadmin(done) {
    gulp.src('./src/admin/**')
        .pipe(gulp.dest('./dist/admin/'))
    done();
}
function copylib(done) {
    gulp.src('./src/lib/**')
        .pipe(gulp.dest('./dist/lib/'))
    done();
}
function copyfonts(done) {
    gulp.src('./src/assets/fonts/**')
        .pipe(gulp.dest('./dist/assets/fonts/'))
    done();
}
function copy404(done){
    gulp.src('./src/pages/404/*.html')
        .pipe(gulp.dest('./dist/pages/404/'))
    done();
}
function copyabout(done){
    gulp.src('./src/pages/about/*.php')
        .pipe(gulp.dest('./dist/pages/about/'))
    done();
}
function copycontact(done){
    gulp.src('./src/pages/contact/*.php')
        .pipe(gulp.dest('./dist/pages/contact/'))
    done();
}
function copyportfolio(done){
    gulp.src('./src/pages/portfolio/*.php')
        .pipe(gulp.dest('./dist/pages/portfolio/'))
    done();
}
function copyotherfiles(done){
    gulp.src(['./src/.htaccess','./src/*.ico'])
        .pipe(gulp.dest('./dist/'))
    done();
}

const copy = gulp.series(copyHTML, copyadmin, copyfonts, copylib, copyotherfiles);
const copypage = gulp.series(copy404, copyabout, copyportfolio, copycontact);
//this function is for compiling sass to css
function style() {
    return (
        gulp
        .src("src/sass/*.scss")
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest("./src/css/"))
    );
}
function aboutstyle(){
    return (
        gulp
        .src("src/pages/about/sass/*.scss")
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest("./src/pages/about/css/"))
    );
}
function contactstyle(){
    return (
        gulp
        .src("src/pages/contact/sass/*.scss")
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest("./src/pages/contact/css/"))
    );
}
function portfoliostyle(){
    return (
        gulp
        .src("src/pages/portfolio/sass/*.scss")
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest("./src/pages/portfolio/css/"))
    );
}

const compilesass = gulp.series(style, aboutstyle, contactstyle, portfoliostyle);
//this function is for concating css files to one css file
function concatcss() {
    return (
        gulp.src('./src/css/*.css')
        .pipe(concatCss("./main.css"))
        .pipe(gulp.dest('src/concatcss/'))
    );
};
function aboutconcatcss() {
    return (
        gulp.src('./src/pages/about/css/*.css')
        .pipe(concatCss("./about.css"))
        .pipe(gulp.dest('src/pages/about/concatcss/'))
    );
};
function contactconcatcss() {
    return (
        gulp.src('./src/pages/contact/css/*.css')
        .pipe(concatCss("./contact.css"))
        .pipe(gulp.dest('src/pages/contact/concatcss/'))
    );
};
function portfolioconcatcss() {
    return (
        gulp.src('./src/pages/portfolio/css/*.css')
        .pipe(concatCss("./portfolio.css"))
        .pipe(gulp.dest('src/pages/portfolio/concatcss/'))
    );
};

const cssconcat = gulp.series(concatcss, aboutconcatcss, contactconcatcss, portfolioconcatcss);

//this function is for minifiying the css
function css(done) {
    gulp.src('./src/concatcss/*.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('./dist/css'));
    done();
};
function aboutcss(done) {
    gulp.src('./src/pages/about/concatcss/about.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('./dist/pages/about/css/'));
    done();
};
function contactcss(done) {
    gulp.src('./src/pages/contact/concatcss/contact.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('./dist/pages/contact/css/'));
    done();
};
function portfoliocss(done) {
    gulp.src('./src/pages/portfolio/concatcss/portfolio.css')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('./dist/pages/portfolio/css/'));
    done();
};

const minifycss = gulp.series(css,aboutcss,contactcss, portfoliocss); 

//this function is for minifiying the js
function uglifyjs() {
    return gulp.src("./src/js/*.js")
        .pipe(uglify())
        .pipe(gulp.dest("./dist/js/"));
};
function aboutuglifyjs() {
    return gulp.src("./src/pages/about/js/*.js")
        .pipe(uglify())
        .pipe(gulp.dest("./dist/pages/about/js/"));
};
function contactuglifyjs() {
    return gulp.src("./src/pages/contact/js/*.js")
        .pipe(uglify())
        .pipe(gulp.dest("./dist/pages/contact/js/"));
};
function portfoliouglifyjs() {
    return gulp.src("./src/pages/portfolio/js/*.js")
        .pipe(uglify())
        .pipe(gulp.dest("./dist/pages/portfolio/js/"));
};

const uglifyalljs = gulp.series(uglifyjs, aboutuglifyjs, contactuglifyjs,portfoliouglifyjs );

//this function is for minifiying the images
function images(done) {
    gulp.src(['./src/assets/imgs/*', './src/assets/projects-imgs/*'])
        .pipe(imagemin([
            imagemin.gifsicle({
                interlaced: true
            }),
            imagemin.jpegtran({
                progressive: true
            }),
            imagemin.optipng({
                optimizationLevel: 5
            }),
            imagemin.svgo({
                plugins: [{
                        removeViewBox: true
                    },
                    {
                        cleanupIDs: false
                    }
                ]
            })
        ]))
        .pipe(gulp.dest('dist/assets/imgs'))
    done();
}

//this function is for watching src files so that all of thoes funtions above can run whenever i modify the files
function watch(done) {
    //watching html and php
    gulp.watch('./src/*.php', copyHTML)
    gulp.watch('./src/pages/404/*.html', copy404)
    gulp.watch('./src/pages/about/*.php', copyabout)
    gulp.watch('./src/pages/contact/*.php', copycontact)
    gulp.watch('./src/pages/portfolio/*.php', copyportfolio)

    //watching sass
    gulp.watch('./src/sass/*.scss', style)
    gulp.watch('./src/pages/about/sass/*.scss', aboutstyle)
    gulp.watch('./src/pages/contact/sass/*.scss', contactstyle)
    gulp.watch('./src/pages/portfolio/sass/*.scss', portfoliostyle)

    //concating css
    gulp.watch('./src/css/*.css', concatcss)
    gulp.watch('./src/pages/about/css/*.css', aboutconcatcss)
    gulp.watch('./src/pages/contact/css/*.css', contactconcatcss)
    gulp.watch('./src/pages/portfolio/css/*.css', portfolioconcatcss)

    //minifying css
    gulp.watch('./src/concatcss/*.css', css)
    gulp.watch('./src/pages/about/concatcss/*.css', aboutcss)
    gulp.watch('./src/pages/contact/concatcss/*.css', contactcss)
    gulp.watch('./src/pages/portfolio/concatcss/*.css', portfoliocss)

    //uglifying js
    gulp.watch('./src/js/*.js', uglifyjs)
    gulp.watch('./src/pages/about/js/*.js', aboutuglifyjs)
    gulp.watch('./src/pages/contact/js/*.js', contactuglifyjs)
    gulp.watch('./src/pages/portfolio/js/*.js', portfoliouglifyjs)


    //minifiying images
    gulp.watch('./src/assets/imgs/*', images)
    done();
}
//const run is for creating the dist file for the watch  function
exports.watch = watch;
const run = gulp.series(copy, copypage, compilesass,cssconcat,minifycss, uglifyalljs, images);
exports.run = run;
const build = gulp.series(run, watch);
exports.default = build;