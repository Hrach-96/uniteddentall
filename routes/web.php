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

//Route::get('/news', 'HomeController@news')->name('news');
//Route::get('/news/{slug}', 'HomeController@singleNews')->name('news_item');
Route::get('/posts/{category}', 'HomeController@blog')->name('blog');
Route::get('/post/{category}/{slug}', 'HomeController@singleBlog')->name('blog_item');
Route::get('/gallery/office', 'HomeController@officeGallery')->name('office-gallery');
Route::get('/gallery/patients', 'HomeController@patientGallery')->name('patient-gallery');
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*'])->name('page');

Route::group(['middleware' => 'web',
    'prefix' => 'send-mail',
], function() {
    Route::post('/contact-us', 'PageController@sendmail_contact_us')->name('sendmail_contact_us');
});
