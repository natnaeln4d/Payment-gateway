<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GuzTestController;


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

Route::post('pay',[\App\Http\Controllers\PaymentController::class,'initialize'])->name('pay');
Route::get('check',function () {
    return response()->json([
        'status'=>true,
        'msg'=>'working'
    ]);
});
Route::get('callback/{reference}',[\App\Http\Controllers\PaymentController::class,'callback'])->name('callback');

Auth::routes();
Route::get('/',[GuzTestController::class,'getPyamentUrl']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, ''])->name('home');
