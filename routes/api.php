<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('WhatsApiHint', [ApiController::class, 'WhatsApiHint'])->name('WhatsApiHint');
// Route::post('WhatsApiHint', 'SlackController@WhatsApiHint')->middleware('guest');

Route::post('token', [ApiController::class, 'requestToken']);
Route::post('clearall', [ApiController::class, 'clearall']);
Route::post('/aws_pic_ai', [App\Http\Controllers\ApiController::class, 'aws_pic_ai'])->name('aws.pic.ai')->middleware('auth:sanctum');
Route::post('/attendance_log', [App\Http\Controllers\ApiController::class, 'attendance_log'])->name('attendance.log')->middleware('auth:sanctum');
Route::post('/send-sms', [App\Http\Controllers\ApiController::class, 'send_sms'])->name('send_sms');
Route::post('/SecretApi', [App\Http\Controllers\ApiController::class, 'SecretApi'])->name('SecretApi');
Route::post('/SecretApi2', [App\Http\Controllers\ApiController::class, 'SecretApi2'])->name('SecretApi2');
Route::post('/SecretData', [App\Http\Controllers\ApiController::class, 'SecretData'])->name('SecretData');
Route::post('/CheckAuth', [App\Http\Controllers\ApiController::class, 'CheckAuth'])->name('CheckAuth');
Route::group(['prefix' => 'agent','middleware' => 'auth:sanctum'], function () {
    Route::post('/user-data', [App\Http\Controllers\ApiController::class, 'mydata'])->name('mydata')->middleware('auth:sanctum');
});
