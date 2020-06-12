<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','PageViewController@index')->name('home');
Route::get('/menu','PageViewController@productmenu')->name('menu');

Auth::routes();

Route::get('/dac-login','Auth\LoginController@showLoginForm')->name('dac-login');
Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/app-menu-banner-img','PageViewController@ajaxmenubannarimgget')->name('app-menu-banner-img');
Route::get('/app-banner-img','PageViewController@ajaxbannarimgget')->name('app-banner-img');
Route::get('/welcome-about-get','PageViewController@ajaxwelcomeareaget')->name('welcome-about-get');
Route::get('/contact','PageViewController@ajaxcontactget')->name('contact');
Route::get('/order-prosid','OrderProductController@process')->name('order-prosid');
Route::get('/delivery-area','CountryController@index')->name('delivery-area');

Route::resource('proudct','ProductController');
Route::post('/proudct-edit','ProductController@edit')->name('proudct-edit');
Route::post('/proudct-update/{id}','ProductController@update')->name('proudct-update');
Route::post('/proudct-destroy/{id}','ProductController@destroy')->name('proudct-destroy');
Route::post('/proudcts-bulk-destroy','ProductController@bulkdestroy')->name('proudcts-bulk-destroy');

Route::post('/app-logo','AppImgController@logostore')->name('app-logo');
Route::post('/app-welcome','AppImgController@welcomeAreaImgstore')->name('app-welcome');
Route::post('/app-banner','BannerController@mainbannerstore')->name('app-banner');
Route::post('/app-menu-banner','AppImgController@menubannerstore')->name('app-menu-banner');
Route::post('/app-banner2','BannerController@secondbannarstore')->name('app-banner2');
Route::post('/welcome-about','AboutUsController@welcomearea')->name('welcome-about');
Route::post('/food-about','AboutUsController@foodarea')->name('food-about');
Route::post('/deshes-about','AboutUsController@deshesarea')->name('deshes-about');
Route::post('/footer-about','AboutUsController@footerarea')->name('footer-about');
Route::post('/contact-us','ContactUsController@contactstore')->name('contact-us');
Route::post('/quick-view','PageViewController@ajaxquickview')->name('quick-view');
Route::post('/make-order','OrderProductController@prosid')->name('make-order');
Route::post('/order-store','OrderProductController@store')->name('order-store');
Route::post('/delivery-countrystore','CountryController@countrystore')->name('delivery-countrystore');
Route::post('/delivery-districtstore','CountryController@districtstore')->name('delivery-districtstore');
Route::post('/delivery-thanastore','CountryController@thanastore')->name('delivery-thanastore');
Route::post('/delivery-countrydestroy/{id}','CountryController@countrydestroy')->name('delivery-countrydestroy');
Route::post('/delivery-districtdestroy/{id}','CountryController@districtdestroy')->name('delivery-districtdestroy');
Route::post('/delivery-thanadestroy/{id}','CountryController@thanadestroy')->name('delivery-thanadestroy');
Route::post('/countrybulkdestroy','CountryController@countrybulkdestroy')->name('countrybulkdestroy');
Route::post('/districtbulkdestroy','CountryController@districtbulkdestroy')->name('districtbulkdestroy');
Route::post('/thanabulkdestroy','CountryController@thanabulkdestroy')->name('thanabulkdestroy');
Route::post('/order-approve/{id}','OrderProductController@update')->name('order-approve');
