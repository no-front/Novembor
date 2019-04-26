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
Route::get('login', 'AccountController@login');
Route::post('login', 'AccountController@signIn');
Route::get('register', 'AccountController@register');
Route::post('register', 'AccountController@signUp');

Route::get('/', 'NovemborController@home');
// Route::get('alone', 'HomeController@alone');
// Route::get('duo', 'HomeController@duo');
// Route::get('group', 'HomeController@group');
// Route::get('requirelocation', 'HomeController@requirelocation');
// Route::get('marklocation', 'HomeController@marklocation');
Route::get('myorder', 'HomeController@myorder');

Route::get('listproduct/{cate}', 'NovemborController@listproduct');
Route::get('dataproduct', 'NovemborController@dataproduct');
Route::get('vieworder', 'NovemborController@vieworder');
Route::get('requirelocation', 'NovemborController@requirelocation');
Route::get('listorder', 'NovemborController@listorder');
Route::post('insertorder/{data}', 'NovemborController@insertorder');
Route::post('successorder', 'NovemborController@successorder');
Route::get('marklocation', 'NovemborController@marklocation');
Route::get('mylocation', 'NovemborController@mylocation');
Route::get('getlocation', 'NovemborController@getlocation');

// Route::get('dataproduct', function(){
// 	return 'Hello World';
// });



Route::middleware(['auth'])->group(function () {
	Route::get('profile', 'ProfileController@index');

	Route::get('logout', 'AccountController@logout');
});

Route::prefix('admin/')->group(function () {
	Route::get('/', 'BackofficeController@admin');
	Route::post('/', 'BackofficeController@adminLogin');

    Route::middleware(['admin'])->group(function () {
    Route::get('home', 'BackofficeController@backoffice');
		Route::get('orderinformation', 'BackofficeController@orderinformation');
		Route::get('manageproducts', 'BackofficeController@manageproducts');
		Route::get('productdetail/{id}', 'BackofficeController@productdetail');
		Route::get('addproduct', 'BackofficeController@addproduct');
		Route::get('editproduct/{id}', 'BackofficeController@editproduct');
		Route::get('datauser', 'BackofficeController@datauser');
		Route::get('logout', 'BackofficeController@adminLogout');

		Route::post('editproductsuccess/{data}', 'BackofficeController@editproductsuccess');
		Route::post('addproductdata/{data}', 'BackofficeController@addproductdata');
		Route::get('deleteproduct/{id}', 'BackofficeController@deleteproduct');
		Route::get('viewnotification/{id}', 'BackofficeController@viewnotification');

    });
});








