<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

//Route::get('/', function () {
//    return redirect()->route('login');
//});
//
//Route::get('/dashboard', DashboardController::class)
//    ->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::group(['middleware' => ['auth', 'access.control.list']], function () {
//    Route::get('/profiles', [ProfileController::class, 'index'])->name('profile.index');
//    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
//    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
//    Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile/delete/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
//    Route::resource('role', RoleController::class);
//});

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::resource('role', 'App\Http\Controllers\RoleController', ['except' => ['show']]);
	Route::resource('news', 'App\Http\Controllers\NewsController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

