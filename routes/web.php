<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\HomeController;
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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'laraberg', 'middleware' => ['web', 'auth']], function() {
    Route::apiResource('blocks', 'VanOns\Laraberg\Http\Controllers\BlockController');
    Route::get('oembed', 'VanOns\Laraberg\Http\Controllers\OEmbedController');
  });


// Admin Routes ====================================

Route::middleware(['auth','HasPermission'])->prefix('admin')->group(function () {

    Route::get('/media','App\Http\Controllers\PageController@media')->name('media');
    Route::get('/custom-css','App\Http\Controllers\PageController@css')->name('css');

    Route::get('/dashboard','App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('/permissions','App\Http\Controllers\PermissionController@index')->name('permission.index');
    Route::post('/permissions','App\Http\Controllers\PermissionController@store')->name('permission.store');
    Route::get('/permission/{permission}','App\Http\Controllers\PermissionController@edit')->name('permission.edit');

    Route::get('/roles','App\Http\Controllers\RoleController@index')->name('role.index');
    Route::post('/roles','App\Http\Controllers\RoleController@store')->name('role.store');

    Route::get('/users','App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/user/create','App\Http\Controllers\UserController@edit')->name('user.create');
    Route::get('/user/{user}','App\Http\Controllers\UserController@show')->name('user.show');
    Route::put('/user/{user}','App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/user/{user}','App\Http\Controllers\UserController@assignRole')->name('user.assign');
    Route::post('/create','App\Http\Controllers\UserController@store')->name('user.store');

    Route::get('/permission-role','App\Http\Controllers\PermissionController@showRole')->name('permission.showRole');
    Route::post('/permission-role','App\Http\Controllers\PermissionController@attachRole')->name('permission.attachRole');


    Route::get('/pages','App\Http\Controllers\PageController@index')->name('page.index');
    Route::get('/page/create','App\Http\Controllers\PageController@create')->name('page.create');
    Route::post('/page/create','App\Http\Controllers\PageController@store')->name('page.store');
    Route::get('/page/edit/{page}','App\Http\Controllers\PageController@edit')->name('page.edit');
    Route::put('/page/edit/{page}','App\Http\Controllers\PageController@update')->name('page.update');


    Route::get('/departments','App\Http\Controllers\DepartmentController@index')->name('department.index');
    Route::get('/department/create','App\Http\Controllers\DepartmentController@create')->name('department.create');
    Route::post('/department/create','App\Http\Controllers\DepartmentController@store')->name('department.store');
    Route::get('/department/{department}','App\Http\Controllers\DepartmentController@edit')->name('department.edit');
    Route::put('/department/{department}','App\Http\Controllers\DepartmentController@update')->name('department.update');

    Route::get('/meta/{meta}','App\Http\Controllers\MetaController@destroy')->name('meta.delete');

    Route::get('/events','App\Http\Controllers\EventController@index')->name('event.index');
    Route::get('/event/create','App\Http\Controllers\EventController@create')->name('event.create');
    Route::post('/event/create','App\Http\Controllers\EventController@store')->name('event.store');
    Route::get('/event/{event}','App\Http\Controllers\EventController@edit')->name('event.edit');
    Route::put('/event/{event}','App\Http\Controllers\EventController@update')->name('event.update');

    Route::get('/menu','App\Http\Controllers\MenuController@index')->name('menu');
    Route::post('/menu','App\Http\Controllers\MenuController@store')->name('menu.store');
    Route::post('/menuItem','App\Http\Controllers\MenuItemController@store')->name('menuItem.store');
    Route::put('/menuItem/{menuItem}','App\Http\Controllers\MenuItemController@update')->name('menuItem.update');

});


// Web Routes ==============================

Route::get('/{slug}/{local}','App\Http\Controllers\PageController@show')->name('page.show');


