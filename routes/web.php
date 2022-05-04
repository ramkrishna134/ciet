<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\WebinarController;
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

Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::get('/contact','App\Http\Controllers\PageController@contact')->name('contact');
Route::post('/contact','App\Http\Controllers\FeedbackController@store')->name('feedback');

Route::get('/dict', function () {
    return view('web.department');
})->name('dict');

Route::get('/training-calender', function () {
    return view('web.training-calender');
})->name('training-calender');

Route::get('/event-calender', function () {
    return view('web.event-calender');
})->name('event-calender');

Route::get('/initiatives', function () {
    return view('web.initiative');
})->name('initiative');

Route::get('/webiners', function () {
    return view('web.webiner');
})->name('webiner');

Route::get('/newsletter', function () {
    return view('web.newsletter');
})->name('newsletter');

Route::get('/feedback-mail', function () {
    return view('web.mail.mail-contact');
})->name('feedback-mail');

Route::get('/pmevidya','App\Http\Controllers\Pmevidya@index')->name('pmevidya');
Route::get('/pmevidya/{class}/{channel}/{category}','App\Http\Controllers\Pmevidya@schedule')->name('pmevidya.schedule');

Route::get('/people', function () {
    return view('web.people');
})->name('people');

Route::get('/announcement', function () {
    return view('web.announcement');
})->name('announcement');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth','HasPermission'])->group(function () {

//     // Route::get('/create',[CheckController::class, 'create']);
//     Route::get('/create','App\Http\Controllers\CheckController@create');
//     Route::get('/',[CheckController::class, 'index']);
//     // Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/home','App\Http\Controllers\HomeController@index');

// });

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
    Route::get('/page/create/general','App\Http\Controllers\PageController@general')->name('page.create.general');
    Route::get('/page/edit/{page}','App\Http\Controllers\PageController@edit')->name('page.edit');
    Route::put('/page/edit/{page}','App\Http\Controllers\PageController@update')->name('page.update');
    Route::get('/page/{page}','App\Http\Controllers\PageController@destroy')->name('page.destroy');


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
    Route::get('/menu/{menu}','App\Http\Controllers\MenuController@destroy')->name('menu.destroy');
    Route::post('/menuItem','App\Http\Controllers\MenuItemController@store')->name('menuItem.store');
    Route::put('/menuItem/{menuItem}','App\Http\Controllers\MenuItemController@update')->name('menuItem.update');
    Route::get('/menuItem/{menuItem}','App\Http\Controllers\MenuItemController@destroy')->name('menuItem.destroy');

    Route::get('/trainings','App\Http\Controllers\TrainingController@index')->name('training.index');
    Route::get('/training/create','App\Http\Controllers\TrainingController@create')->name('training.create');
    Route::post('/training/create','App\Http\Controllers\TrainingController@store')->name('training.store');
    Route::get('/training/{training}','App\Http\Controllers\TrainingController@edit')->name('training.edit');
    Route::put('/training/{training}','App\Http\Controllers\TrainingController@update')->name('training.update');

    Route::get('/faculties','App\Http\Controllers\FacultyController@index')->name('faculty.index');
    Route::get('/faculty/create','App\Http\Controllers\FacultyController@create')->name('faculty.create');
    Route::post('/faculty/create','App\Http\Controllers\FacultyController@store')->name('faculty.store');
    Route::get('/faculty/{faculty}','App\Http\Controllers\FacultyController@edit')->name('faculty.edit');
    Route::put('/faculty/{faculty}','App\Http\Controllers\FacultyController@update')->name('faculty.update');

    Route::get('/settings','App\Http\Controllers\SettingController@index')->name('setting.index');
    Route::post('/settings','App\Http\Controllers\SettingController@store')->name('setting.store');

    Route::get('/messages','App\Http\Controllers\MessageController@index')->name('message.index');
    Route::get('/message/create','App\Http\Controllers\MessageController@create')->name('message.create');
    Route::post('/message/create','App\Http\Controllers\MessageController@store')->name('message.store');
    Route::get('/message/{message}','App\Http\Controllers\MessageController@show')->name('message.show');
    Route::put('/message/{message}','App\Http\Controllers\MessageController@update')->name('message.update');


    Route::get('/slider','App\Http\Controllers\SliderController@index')->name('slider.index');
    Route::post('/slider','App\Http\Controllers\SliderController@store')->name('slider.store');
    Route::post('/slider/{slider}','App\Http\Controllers\SliderController@update')->name('slider.update');
    Route::get('/slide/{slider}','App\Http\Controllers\SliderController@destroy')->name('slider.delete');

    Route::get('/articals','App\Http\Controllers\ArticalController@index')->name('artical.index');
    Route::get('/artical/create','App\Http\Controllers\ArticalController@create')->name('artical.create');
    Route::post('/artical/create','App\Http\Controllers\ArticalController@store')->name('artical.store');
    Route::get('/artical/{artical}','App\Http\Controllers\ArticalController@edit')->name('artical.edit');
    Route::put('/artical/{artical}','App\Http\Controllers\ArticalController@update')->name('artical.update');
    Route::get('/articals/{artical}','App\Http\Controllers\ArticalController@destroy')->name('artical.destroy');


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


    Route::get('/webinar', 'App\Http\Controllers\WebinarController@index')->name('webinar.index');
    Route::get('/webinar/create', 'App\Http\Controllers\WebinarController@create')->name('webinar.create');
    Route::post('/webinar','App\Http\Controllers\WebinarController@store')->name('webinar.store');
    Route::put('/webinar/{webinar}','App\Http\Controllers\WebinarController@update')->name('webinar.update');
    Route::get('/webinar/{webinar}','App\Http\Controllers\WebinarController@edit')->name('webinar.edit');
    Route::get('/webinars/{webinar}','App\Http\Controllers\WebinarController@destroy')->name('webinar.destroy');

});


// Web Routes ==============================

Route::get('/{slug}','App\Http\Controllers\PageController@show')->name('page.show');



// Route::get('/demo', function () {
//     return view('admin.faculty.demo');
// });


// Web Search route =========================================

Route::post('/search', 'App\Http\Controllers\PageController@search')->name('search');



