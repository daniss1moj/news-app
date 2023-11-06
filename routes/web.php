<?php

use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.login');
});


Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'check.role:admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main');
    });

    Route::resource('news', AdminNewsController::class)->names('admin.news');
});


Route::get('/login', fn() => to_route('auth.login'))->name('login');
Route::delete('/logout', fn() => to_route('auth.logout'))->name('logout');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'create'])->name('auth.login');
    Route::post('/', [AuthController::class, 'store'])->name('auth.store')->middleware('auth.redirect');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
});

Route::middleware(['auth', 'check.role:user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
