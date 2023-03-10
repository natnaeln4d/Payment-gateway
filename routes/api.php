<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GuzTestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('pay',[\App\Http\Controllers\payment::class,'init']);
Route::get('check',function () {
    return response()->json([
        'status'=>true,
        'msg'=>'working'
    ]);
});
// Route::post('/',function (Request $request){
//     $data = [
//         'outTradeNo' => $re,
//         'subject' => $this->subject,
//         'totalAmount' => $this->totalAmount,
//         'shortCode' => $this->shortCode,
//         'notifyUrl' => $this->notifyUrl,
//         'returnUrl' => $this->returnUrl,
//         'receiveName' => $this->receiveName,
//         'appId' => $this->appId,
//         'timeoutExpress' => $this->timeoutExpress,
//         'nonce' => $result,
//         'timestamp' => $nonce,
//         'appKey' => $this->appKey
//     ];

//     $order=new GuzTestController()
// });
Route::get('callback/{reference}',[\App\Http\Controllers\payment::class,'init']);
