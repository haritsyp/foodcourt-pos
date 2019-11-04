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

Route::get('/', function () {
    return view('authStand.login');
});



Route::group(['middleware' => 'auth'], function()
{
  Route::get('/viewsale/{id}', 'SaleController@viewSale');
  Route::get('/viewsales/{id}', 'SaleController@viewSales');
  Route::get('/balance', 'TopupController@balance');
  Route::resource('payment','PaymentController');
  Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
  Route::get('/launcher', function () {
    return view('menu');
});

});
Auth::routes();
Route::resource('tpstand','TpstandController');
Route::resource('topup','TopupController');
Route::resource('tarik','WithdrawController');
Route::resource('wdstand','WdstandController');
Route::get('signin', 'SigninController@form')->name('signin.form');
Route::post('attempt', 'SigninController@attempt')->name('signin.attempt');
Route::resource('stand','StandController');
Route::resource('food','FoodController');
Route::resource('sale','SaleController');
Route::get('/paymentview/{id}', 'SaleController@paymentview');

Route::get('sales/report', 'SaleController@report');
Route::get('admin/report/{id}', 'SaleController@reportStand');
Route::get('admin/report', 'SaleController@reportStand');

Route::get('/sale/menu/', 'SaleController@menu');
Route::get('/sale/menu/{id}', 'SaleController@menu');
Route::get('/paymentview/checkPay/{id}', 'PaymentController@checkPay');

Route::get('/api/sale/{id}', 'PaymentController@sale');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('qr-code', function () 
{
  return QRCode::text('QR Code Generator for Laravel!')->png();    
});

Route::get('/dashboard', 'DashboardController@index');

Route::get('/api/sales', 'DashboardController@getSales');
Route::get('/api/salesstand', 'DashboardController@getSalesPerStand');
Route::get('/api/salesmenu', 'DashboardController@getSalesPerMenu');
Route::get('/api/topup', 'DashboardController@getTopUp');



