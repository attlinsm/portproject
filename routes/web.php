<?php

use App\Http\Controllers\OpenAI\OpenAIController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\UsersController;


Route::view('/', 'frontend.index')->name('welcome.page');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)
        ->prefix('admin')->group(function () {

        route::get('/logout', 'destroy')->name('admin.logout');
        route::get('/profile', 'profile')->name('admin.profile');

        route::get('/profile/edit', 'edit')->name('profile.edit');
        route::post('/profile/store', 'store')->name('profile.store');

        route::get('/password/change', 'change')->name('password.change');
        route::post('/passwords/update', 'update')->name('passwords.update');

    });
});

/*
|--------------------------------------------------------------------------
| Home slider Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(HomeSliderController::class)->group(function () {

    route::get('/home/slide', 'slide')->name('home.slide');
    route::post('/slide/{id}/update', 'update')->name('slide.update');

});

/*
|--------------------------------------------------------------------------
| About Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(AboutController::class)->group(function () {

    route::get('/about/edit', 'edit')->name('about.edit');
    route::post('/about/{id}/update', 'update')->name('about.update');

    route::get('/home/about', 'about')->name('home.about');

    route::get('/multi/image/add', 'aboutMultiImage')->name('multi.image.add');
    route::post('/multi/image/store', 'storeMultiImage')->name('multi.image.store');

    route::get('/multi/image/all', 'allMultiImage')->name('multi.image.all');

    route::get('/multi/image/{id}/edit', 'editMultiImage')->name('multi.image.edit');
    route::post('/multi/image/{id}/update', 'updateMultiImage')->name('multi.image.update');

    route::get('/multi/image/{id}/delete', 'deleteMultiImage')->name('multi.image.delete');

});

/*
|--------------------------------------------------------------------------
| Portfolio Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(PortfolioController::class)
    ->prefix('portfolio')->group(function () {

    route::get('/all', 'all')->name('portfolio.all');
    route::get('/add', 'add')->name('portfolio.add');

    route::post('/store', 'store')->name('portfolio.store');

    route::get('/{id}/edit', 'edit')->name('portfolio.edit');
    route::post('/{id}/update', 'update')->name('portfolio.update');

    route::get('/{id}/delete', 'delete')->name('portfolio.delete');

    route::get('/{id}/details', 'details')->name('portfolio.details');

});

Route::get('/home/portfolio', [PortfolioController::class, 'portfolio'])->name('home.portfolio');

/*
|--------------------------------------------------------------------------
| Blog category Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(BlogCategoryController::class)
    ->prefix('blog/category')->group(function () {

    route::get('/all', 'all')->name('blog.category.all');
    route::get('/add', 'add')->name('blog.category.add');

    route::post('/store', 'store')->name('blog.category.store');

    route::get('/{id}/edit', 'edit')->name('blog.category.edit');
    route::post('/{id}/update', 'update')->name('blog.category.update');

    route::get('/{id}/delete', 'delete')->name('blog.category.delete');

});

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(BlogController::class)
    ->prefix('blog')->group(function () {

    route::get('/all', 'all')->name('blog.all');
    route::get('/add', 'add')->name('blog.add');

    route::post('/store', 'store')->name('blog.store');

    route::get('/{id}/edit', 'edit')->name('blog.edit');
    route::post('/{id}/update', 'update')->name('blog.update');

    route::get('/{id}/delete', 'delete')->name('blog.delete');

    route::get('/{id}/details', 'details')->name('blog.details');

    route::get('/{id}/category', 'category')->name('blog.category');

});

Route::get('/home/blog', [BlogController::class, 'blog'])->name('home.blog');

/*
|--------------------------------------------------------------------------
| Footer Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(FooterController::class)
    ->prefix('footer')->group(function () {

    route::get('/setup', 'setup')->name('footer.setup');
    route::post('/{id}/update', 'update')->name('footer.update');

});

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(ContactController::class)->group(function () {

    route::post('/message/store', 'store')->name('message.store');

    route::get('/contact/message', 'message')->name('contact.message');

    route::get('/message/{id}/delete', 'delete')->name('message.delete');

});

/*
|--------------------------------------------------------------------------
| Skills Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(SkillsController::class)
    ->prefix('skills')->group(function () {

    route::get('/new', 'new')->name('skills.new');
    route::post('/store', 'store')->name('skills.store');

    route::get('/all', 'all')->name('skills.all');

    route::get('/{id}/edit', 'edit')->name('skills.edit');
    route::post('/{id}/update', 'update')->name('skills.update');

    route::get('/{id}/delete', 'delete')->name('skills.delete');

});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|
*/

Route::controller(UsersController::class)
    ->prefix('user')->group(function () {

    route::get('/all', 'all')->name('users.all');

    route::get('/{id}/edit', 'edit')->name('users.edit');
    route::get('/{id}/delete', 'delete')->name('users.delete');

    route::post('/{id}/update', 'update')->name('users.update');
});


/*
|--------------------------------------------------------------------------
| OpenAI Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(OpenAIController::class)->group(function () {

        route::get('/dashboard', 'dashboard')->name('dashboard');
        route::post('/chatgpt', 'ask')->name('chat.ask');

    });
});

require __DIR__.'/auth.php';
