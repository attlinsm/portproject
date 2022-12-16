<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin all routes
Route::controller(AdminController::class)->group(function () {

    route::get('/admin/logout', 'destroy')->name('admin.logout');
    route::get('/admin/profile', 'Profile')->name('admin.profile');

    route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    route::post('/store/profile', 'StoreProfile')->name('store.profile');

    route::get('/change/password', 'ChangePassword')->name('change.password');
    route::post('/update/password', 'UpdatePassword')->name('update.password');

});

// Home slider all routes
Route::controller(HomeSliderController::class)->group(function () {

    route::get('/home/slide', 'HomeSlider')->name('home.slide');
    route::post('/update/slide', 'UpdateSlider')->name('update.slide');

});

// About page all routes
Route::controller(AboutController::class)->group(function () {

    route::get('/about/page', 'AboutPage')->name('about.page');
    route::post('/update/about', 'UpdateAbout')->name('update.about');

    route::get('/about', 'HomeAbout')->name('home.about');

    route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');

    route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');


});

require __DIR__.'/auth.php';
