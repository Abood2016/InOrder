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


Route::group(['namespace' => 'BackEnd','prefix' => 'admin'],function (){
	Route::group(['middleware' => ['auth:admin']], function () {

	Route::get('/home', 'HomeController@index')->name('dashboard.index');
	Route::resource('/categories', 'CategoryController');
	Route::resource('/admins', 'AdminController');
	Route::get('/all', 'AdminController@index')->name('admins.index');
	Route::resource('/settings', 'SettingController');
	Route::resource('/sizes', 'SizeController');
	Route::resource('/colors', 'ColorController');
	Route::resource('/brands', 'BrandController');
	Route::resource('/products', 'ProductController');
	Route::resource('messages','MessageController');
	Route::post('messeges/replay/{id}', 'MessageController@replay')->name('message.replay');
	Route::post('product/comments','ProductController@commentStore')->name('comment.store');	
	Route::delete('comments/delete/{id}','ProductController@destroyComment')->name('comment.destroy');
	Route::post('comments/update/{id}','ProductController@UpdateComment')->name('comment.update');


	Route::middleware('auth')->group(function(){
	Route::get('/profile/{id}/{slug?}', 'AdminController@profile')->name('profile.index');
	Route::put('/profile/update/', 'AdminController@Updateprofile')->name('profile.update');
});


	Route::get('logout','LoginController@logout')->name('logout');
});
	//login routes
	Route::get('/login','LoginController@login')->name('admin.login');
	Route::post('login','LoginController@store')->name('login.store'); 

});
  
  //front-end routes
  Route::get('/home','HomeController@index')->name('home'); 
  Route::get('/','HomeController@welcome')->name('landing.index'); 
  Route::get('/product/{id}','HomeController@product')->name('landing.product'); 
  Route::get('/category/{id}', 'HomeController@category')->name('product.category');
  Route::get('/contact', 'HomeController@showMessege')->name('contact.create');
  Route::post('/contact/store', 'HomeController@storeMessege')->name('contact.store');
  Route::resource('cart', 'CartController');
  Route::delete('cart/destroy/{id}', ['as' => 'cart.destroy' , 'uses' => 'CartController@destroy']);
  
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
