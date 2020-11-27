<?php
use App\Http\Controllers\UserController;

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

Route::get('/', 'ProductController@index');
Route::get('/home', 'ProductController@index');
Route::post('/home', 'CartController@inputCart');

Route::get('/signin', 'UserController@signinpage');
Route::post('/signin', 'UserController@signin');

Route::get('/signout', 'UserController@signout');

Route::get('/register', 'UserController@registerpage');
Route::post('/register', 'UserController@register');

Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@updateProfile');
Route::get('/manageuser', 'UserController@viewManageUser');
Route::get('/insertadmin','UserController@insertadminpage');
Route::post('/insertadmin','UserController@insertadmin');
Route::get('/updatemanageuser/{id_user}','UserController@updateManageUserView');
Route::post('/updatemanageuser','UserController@updateManageUser');
Route::get('/deleteuser/{id_user}', 'UserController@deleteuser');


Route::get('/insert', 'ProductController@insertPage');
Route::post('/insert', 'ProductController@insert');
Route::get('/managefigure', 'ProductController@viewManageFigure');
Route::get('/updatefigure/{id_product}', 'ProductController@updatePage');
Route::post('/updatefigure','ProductController@update');
Route::get('/deletefigure/{id_product}', 'ProductController@deletefigure');


Route::get('/managecategory', 'CategoryController@index');
Route::get('/insertcategory','CategoryController@insertpage');
Route::post('/insertcategory','CategoryController@insert');
Route::get('/updatecategory/{id_category}','CategoryController@updatepage');
Route::post('/updatecategory','CategoryController@update');
Route::get('/deletecategory/{id_category}', 'CategoryController@deleteCategory');


Route::get('/detail/{id_product}', 'ProductController@detail');


Route::get('/feedbackUser','FeedbackController@feedbackUser');
Route::post('/feedbackUser','FeedbackController@insertfeedbackUser');


Route::get('/manageFeedback','FeedbackController@feedbackAdmin');
Route::post('/updatestatus/{id_feedback}','FeedbackController@updateStatus');


Route::get('/cart', "CartController@cart");
Route::post('/cart', 'CartController@updateCart');
Route::post('/home', "CartController@inputCart");

Route::get('/transaction','TransactionController@index');
Route::get('/transactionadmin','TransactionController@index');

Route::get('/session', 'UserController@tampilkanSession');