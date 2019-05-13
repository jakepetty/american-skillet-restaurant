<?php

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


Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('photos', 'PhotoController');

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::post('/photos/reorder', 'PhotoController@reorder')->name('photos.reorder');
    Route::resource('menu_categories', 'MenuCategoryController');
    Route::resource('employees', 'EmployeeController');
    Route::post('/employees/reorder', 'EmployeeController@reorder')->name('employees.reorder');
    Route::resource('menu_items', 'MenuItemController');
    Route::resource('events', 'EventController');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/menu', 'MenuCategoryController@all')->name('menu');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@send')->name('contact.send');
Route::get('/gallery', 'PhotoController@gallery')->name('gallery');
Route::get('/menu/{menu_category}/{slug?}', 'MenuCategoryController@show')->name('menu.show');
