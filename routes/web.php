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
use App\Http\Controllers\Home\SkillsController;
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

// Admin routes
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

// Home slider routes
Route::controller(HomeSliderController::class)->group(function () {

    route::get('/home/slide', 'HomeSlider')->name('home.slide');
    route::post('/slide/update/{id}', 'UpdateSlider')->name('slide.update');

});

// About page routes
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

// Portfolio routes
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

// Blog category routes
Route::controller(BlogCategoryController::class)->group(function () {

    route::get('blog/category/all', 'AllBlogCategory')->name('blog.category.all');
    route::get('blog/category/add', 'AddBlogCategory')->name('blog.category.add');

    route::post('blog/category/store', 'StoreBlogCategory')->name('blog.category.store');

    route::get('/blog/category/edit/{id}', 'EditBlogCategory')->name('blog.category.edit');
    route::post('/blog/category/update/{id}', 'UpdateBlogCategory')->name('blog.category.update');

    route::get('/blog/category/delete/{id}', 'DeleteBlogCategory')->name('blog.category.delete');

});

// Blog routes
Route::controller(BlogController::class)->group(function () {

    route::get('/blog/all', 'AllBlog')->name('blog.all');
    route::get('/blog/add', 'AddBlog')->name('blog.add');

    route::post('/blog/store', 'StoreBlog')->name('blog.store');

    route::get('/blog/edit/{id}', 'EditBlog')->name('blog.edit');
    route::post('/blog/update/{id}', 'UpdateBlog')->name('blog.update');

    route::get('/blog/delete/{id}', 'DeleteBlog')->name('blog.delete');

    route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');

    route::get('/blog/category/{id}', 'CategoryBlog')->name('blog.category');

    route::get('/blog', 'HomeBlog')->name('home.blog');

});

// Footer routes
Route::controller(FooterController::class)->group(function () {

    route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    route::post('/footer/update/{id}', 'UpdateFooter')->name('footer.update');

});

// Contact routes
Route::controller(ContactController::class)->group(function () {

    route::post('/message/store', 'StoreMessage')->name('message.store');

    route::get('/contact/message', 'ContactMessage')->name('contact.message');

    route::get('/message/delete/{id}', 'DeleteMessage')->name('message.delete');

});

//Skills routes
Route::controller(SkillsController::class)->group(function () {

    route::get('/skills/new', 'NewSkills')->name('skills.new');
    route::post('/skills/store', 'StoreSkills')->name('skills.store');

    route::get('/skills/all', 'AllSkills')->name('skills.all');

    route::get('/skills/edit/{id}', 'EditSkills')->name('skills.edit');
    route::post('/skills/update/{id}', 'UpdateSkills')->name('skills.update');

    route::get('/skills/delete/{id}', 'DeleteSkills')->name('skills.delete');

});

require __DIR__.'/auth.php';
