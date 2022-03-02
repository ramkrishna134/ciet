<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfrastructureController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','HasPermission'])->group(function () {

    // Route::get('/create',[CheckController::class, 'create']);
    Route::get('/create','App\Http\Controllers\CheckController@create');
    Route::get('/',[CheckController::class, 'index']);
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home','App\Http\Controllers\HomeController@index');

});


Route::middleware(['auth','HasPermission'])->prefix('admin')->group(function () {

    Route::get('/dashboard','App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('/dashboard/permissions','App\Http\Controllers\PermissionController@index')->name('permission.index');
    Route::post('/dashboard/permissions','App\Http\Controllers\PermissionController@store')->name('permission.store');
    Route::get('/dashboard/permission/{permission}','App\Http\Controllers\PermissionController@edit')->name('permission.edit');

    Route::get('/dashboard/roles','App\Http\Controllers\RoleController@index')->name('role.index');
    Route::post('/dashboard/roles','App\Http\Controllers\RoleController@store')->name('role.store');

    Route::get('/dashboard/users','App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/dashboard/user/create','App\Http\Controllers\UserController@edit')->name('user.create');
    Route::get('/dashboard/user/{user}','App\Http\Controllers\UserController@show')->name('user.show');
    Route::put('/dashboard/user/{user}','App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/dashboard/user/{user}','App\Http\Controllers\UserController@assignRole')->name('user.assign');
    Route::post('/dashboard/create','App\Http\Controllers\UserController@store')->name('user.store');

    Route::get('/dashboard/permission-role','App\Http\Controllers\PermissionController@showRole')->name('permission.showRole');
    Route::post('/dashboard/permission-role','App\Http\Controllers\PermissionController@attachRole')->name('permission.attachRole');

    Route::get('/dashboard/infrastructure/create', 'App\Http\Controllers\InfrastructureController@edit')->name('infrastructure.create');
    

});
