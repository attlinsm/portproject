<?php

use App\Http\Controllers\OpenAI\OpenAIController;
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
use App\Http\Controllers\Home\UsersController;
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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {

        route::get('/admin/logout', 'destroy')->name('admin.logout');
        route::get('/admin/profile', 'profile')->name('admin.profile');

        route::get('/profile/edit', 'editProfile')->name('profile.edit');
        route::post('/profile/store', 'storeProfile')->name('profile.store');

        route::get('/password/change', 'changePassword')->name('password.change');
        route::post('/passwords/update', 'updatePassword')->name('passwords.update');

    });
});

/*
|--------------------------------------------------------------------------
| Home slider Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(HomeSliderController::class)->group(function () {

    route::get('/home/slide', 'homeSlider')->name('home.slide');
    route::post('/slide/update/{id}', 'updateSlider')->name('slide.update');

});

/*
|--------------------------------------------------------------------------
| About Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(AboutController::class)->group(function () {

    route::get('/about/page', 'aboutPage')->name('about.page');
    route::post('/about/update/{id}', 'updateAbout')->name('about.update');

    route::get('/about', 'homeAbout')->name('home.about');

    route::get('/multi/image/add', 'aboutMultiImage')->name('multi.image.add');
    route::post('/multi/image/store', 'storeMultiImage')->name('multi.image.store');

    route::get('/multi/image/all', 'allMultiImage')->name('multi.image.all');

    route::get('/multi/image/edit/{id}', 'editMultiImage')->name('multi.image.edit');
    route::post('/multi/image/update/{id}', 'updateMultiImage')->name('multi.image.update');

    route::get('/multi/image/delete/{id}', 'deleteMultiImage')->name('multi.image.delete');

});

/*
|--------------------------------------------------------------------------
| Portfolio Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(PortfolioController::class)->group(function () {

    route::get('/portfolio/all', 'allPortfolio')->name('portfolio.all');
    route::get('/portfolio/add', 'addPortfolio')->name('portfolio.add');

    route::post('/portfolio/store', 'storePortfolio')->name('portfolio.store');

    route::get('/portfolio/edit/{id}', 'editPortfolio')->name('portfolio.edit');
    route::post('/portfolio/update/{id}', 'updatePortfolio')->name('portfolio.update');

    route::get('/portfolio/delete/{id}', 'deletePortfolio')->name('portfolio.delete');

    route::get('/portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');

    route::get('/portfolio', 'homePortfolio')->name('home.portfolio');

});

/*
|--------------------------------------------------------------------------
| Blog category Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(BlogCategoryController::class)->group(function () {

    route::get('blog/category/all', 'allBlogCategory')->name('blog.category.all');
    route::get('blog/category/add', 'addBlogCategory')->name('blog.category.add');

    route::post('blog/category/store', 'storeBlogCategory')->name('blog.category.store');

    route::get('/blog/category/edit/{id}', 'editBlogCategory')->name('blog.category.edit');
    route::post('/blog/category/update/{id}', 'updateBlogCategory')->name('blog.category.update');

    route::get('/blog/category/delete/{id}', 'deleteBlogCategory')->name('blog.category.delete');

});

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(BlogController::class)->group(function () {

    route::get('/blog/all', 'allBlog')->name('blog.all');
    route::get('/blog/add', 'addBlog')->name('blog.add');

    route::post('/blog/store', 'storeBlog')->name('blog.store');

    route::get('/blog/edit/{id}', 'editBlog')->name('blog.edit');
    route::post('/blog/update/{id}', 'updateBlog')->name('blog.update');

    route::get('/blog/delete/{id}', 'deleteBlog')->name('blog.delete');

    route::get('/blog/details/{id}', 'blogDetails')->name('blog.details');

    route::get('/blog/category/{id}', 'categoryBlog')->name('blog.category');

    route::get('/blog', 'homeBlog')->name('home.blog');

});

/*
|--------------------------------------------------------------------------
| Footer Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(FooterController::class)->group(function () {

    route::get('/footer/setup', 'footerSetup')->name('footer.setup');
    route::post('/footer/update/{id}', 'updateFooter')->name('footer.update');

});

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(ContactController::class)->group(function () {

    route::post('/message/store', 'storeMessage')->name('message.store');

    route::get('/contact/message', 'contactMessage')->name('contact.message');

    route::get('/message/delete/{id}', 'deleteMessage')->name('message.delete');

});

/*
|--------------------------------------------------------------------------
| Skills Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(SkillsController::class)->group(function () {

    route::get('/skills/new', 'newSkills')->name('skills.new');
    route::post('/skills/store', 'storeSkills')->name('skills.store');

    route::get('/skills/all', 'allSkills')->name('skills.all');

    route::get('/skills/edit/{id}', 'editSkills')->name('skills.edit');
    route::post('/skills/update/{id}', 'updateSkills')->name('skills.update');

    route::get('/skills/delete/{id}', 'deleteSkills')->name('skills.delete');

});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(UsersController::class)->group(function () {

    route::get('/users/all', 'allUsers')->name('users.all');

    route::get('/users/{id}/edit', 'editUsers')->name('users.edit');
    route::get('/users/{id}/delete', 'deleteUsers')->name('users.delete');

    route::post('/users/{id}/update', 'updateUsers')->name('users.update');
});


/*
|--------------------------------------------------------------------------
| OpenAI Routes
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(OpenAIController::class)->group(function () {

        route::get('/dashboard', 'showChatGpt')->name('dashboard');
        route::post('/chatgpt', 'askChatGpt')->name('chat.ask');

    });
});

require __DIR__.'/auth.php';
