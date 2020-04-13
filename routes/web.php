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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/','welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route for deposit of funds into wallet
Route::get('/deposit', 'DepositController@index')->name('deposit')->middleware(['auth']);
Route::post('/deposit/store', 'DepositController@store')->name('deposit.store')->middleware(['auth']);



//route for transfer of virtual funds
Route::get('/transfer', 'TransferController@index')->name('transfer')->middleware(['auth']);
Route::post('/transfer/store', 'TransferController@store')->name('transfer.store')->middleware(['auth']);

//route for paystack
Route::post('/paystack', 'DepositController@redirect_to_paystack')->name('funds.paystack');


