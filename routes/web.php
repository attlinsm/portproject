<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('welcome.page');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin all routes
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {

        route::get('/admin/logout', 'destroy')->name('admin.logout');
        route::get('/admin/profile', 'Profile')->name('admin.profile');

        route::get('/profile/edit', 'EditProfile')->name('profile.edit');
        route::post('/profile/store', 'StoreProfile')->name('profile.store');

        route::get('/password/change', 'ChangePassword')->name('password.change');
        route::post('/passwords/update', 'UpdatePassword')->name('passwords.update');

    });
});

// Home slider all routes
Route::controller(HomeSliderController::class)->group(function () {

    route::get('/home/slide', 'HomeSlider')->name('home.slide');
    route::post('/slide/update/{id}', 'UpdateSlider')->name('slide.update');

});

// About page all routes
Route::controller(AboutController::class)->group(function () {

    route::get('/about/page', 'AboutPage')->name('about.page');
    route::post('/about/update/{id}', 'UpdateAbout')->name('about.update');

    route::get('/about', 'HomeAbout')->name('home.about');

    route::get('/multi/image/add', 'AboutMultiImage')->name('multi.image.add');
    route::post('/multi/image/store', 'StoreMultiImage')->name('multi.image.store');

    route::get('/multi/image/all', 'AllMultiImage')->name('multi.image.all');

    route::get('/multi/image/edit/{id}', 'EditMultiImage')->name('multi.image.edit');
    route::post('/multi/image/update/{id}', 'UpdateMultiImage')->name('multi.image.update');

    route::get('/multi/image/delete/{id}', 'DeleteMultiImage')->name('multi.image.delete');

});

// Portfolio all routes
Route::controller(PortfolioController::class)->group(function () {

    route::get('/portfolio/all', 'AllPortfolio')->name('portfolio.all');
    route::get('/portfolio/add', 'AddPortfolio')->name('portfolio.add');

    route::post('/portfolio/store', 'StorePortfolio')->name('portfolio.store');

    route::get('/portfolio/edit/{id}', 'EditPortfolio')->name('portfolio.edit');
    route::post('/portfolio/update/{id}', 'UpdatePortfolio')->name('portfolio.update');

    route::get('/portfolio/delete/{id}', 'DeletePortfolio')->name('portfolio.delete');

    route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');

    route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');

});

// Blog category all routes
Route::controller(BlogCategoryController::class)->group(function () {

    route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');

    route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');

    route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');

    route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');

});

// Blog all routes
Route::controller(BlogController::class)->group(function () {

    route::get('/all/blog', 'AllBlog')->name('all.blog');
    route::get('/add/blog', 'AddBlog')->name('add.blog');

    route::post('/store/blog', 'StoreBlog')->name('store.blog');

    route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    route::post('/update/blog/{id}', 'UpdateBlog')->name('update.blog');

    route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

    route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');

    route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');

    route::get('/blog', 'HomeBlog')->name('home.blog');

});

// Footer all routes
Route::controller(FooterController::class)->group(function () {

    route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    route::post('/update/footer/{id}', 'UpdateFooter')->name('update.footer');

});

// Contact all routes
Route::controller(ContactController::class)->group(function () {

    route::post('/store/message', 'StoreMessage')->name('store.message');

    route::get('/contact/message', 'ContactMessage')->name('contact.message');

    route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');

});

require __DIR__.'/auth.php';
