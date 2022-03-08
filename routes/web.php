<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AppController;
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


Route::middleware(['auth','HasPermission'])->prefix('admin')->group(function () {

    Route::get('/media','App\Http\Controllers\PageController@media')->name('media');

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



    Route::get('/infrastructure/create', 'App\Http\Controllers\InfrastructureController@create')->name('infrastructure.create');
    Route::get('/infrastructures', 'App\Http\Controllers\InfrastructureController@index')->name('infrastructure.index');
    Route::get('/infrastructure/{infrastructure}','App\Http\Controllers\InfrastructureController@edit')->name('infrastructure.edit');
    Route::put('/infrastructure/{infrastructure}','App\Http\Controllers\InfrastructureController@update')->name('infrastructure.update');
    Route::post('/infrastructure','App\Http\Controllers\InfrastructureController@store')->name('infrastructure.store');
    Route::get('/infrastructures/{infrastructure}','App\Http\Controllers\InfrastructureController@destroy')->name('infrastructure.destroy');
    


    Route::get('/permission-role','App\Http\Controllers\PermissionController@showRole')->name('permission.showRole');
    Route::post('/permission-role','App\Http\Controllers\PermissionController@attachRole')->name('permission.attachRole');


    Route::get('/pages','App\Http\Controllers\PageController@index')->name('page.index');
    Route::get('/page/create','App\Http\Controllers\PageController@create')->name('page.create');
    Route::post('/page/create','App\Http\Controllers\PageController@store')->name('page.store');
    Route::get('/page/edit/{page}','App\Http\Controllers\PageController@edit')->name('page.edit');
    Route::put('/page/edit/{page}','App\Http\Controllers\PageController@update')->name('page.update');


    Route::get('/announcement', 'App\Http\Controllers\AnnouncementsController@index')->name('announcements.index');
    Route::get('/announcement/create', 'App\Http\Controllers\AnnouncementsController@create')->name('announcements.create');
    Route::post('/announcement/create', 'App\Http\Controllers\AnnouncementsController@store')->name('announcement.store');
    Route::get('/announcement/{announcement}','App\Http\Controllers\AnnouncementsController@edit')->name('announcements.edit');
    Route::put('/announcement/{announcement}','App\Http\Controllers\AnnouncementsController@update')->name('announcements.update');
    Route::get('/announcements/{announcement}','App\Http\Controllers\AnnouncementsController@destroy')->name('announcements.destroy');



    Route::get('/app', 'App\Http\Controllers\AppController@index')->name('app.index');
    Route::get('/app/create', 'App\Http\Controllers\AppController@create')->name('app.create');
    Route::post('/app/create','App\Http\Controllers\AppController@store')->name('app.store');
    Route::put('/app/{application}','App\Http\Controllers\AppController@update')->name('app.update');
    Route::get('/app/{application}','App\Http\Controllers\AppController@edit')->name('app.edit');
    Route::get('/apps/{application}','App\Http\Controllers\AppController@destroy')->name('app.destroy');

});

Route::get('/{slug}/{local}','App\Http\Controllers\PageController@show')->name('page.show');
