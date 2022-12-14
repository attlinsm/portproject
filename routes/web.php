<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
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

Route::controller(DemoController::class)->group(function () {
    route::get('/about', 'AboutPage')->name('about.page')->middleware('check');
    route::get('/contact', 'ContactPage')->name('contact.page');
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

require __DIR__.'/auth.php';
