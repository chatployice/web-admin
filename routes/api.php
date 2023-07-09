<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('request', [App\Http\Controllers\API\RequestController::class, 'request']);

Route::get('province', [App\Http\Controllers\API\CustomerController::class, 'province']);
Route::get('district/{id}', [App\Http\Controllers\API\CustomerController::class, 'district']);
Route::get('subdistrict/{id}', [App\Http\Controllers\API\CustomerController::class, 'subdistrict']);

Route::get('product', [App\Http\Controllers\API\ProductController::class, 'index']);
Route::get('product/{id}', [App\Http\Controllers\API\ProductController::class, 'show']);

Route::get('profile/{id}', [App\Http\Controllers\API\CustomerController::class, 'profile']);
Route::post('login', [App\Http\Controllers\API\CustomerController::class, 'login']);
Route::post('register', [App\Http\Controllers\API\CustomerController::class, 'register']);
Route::post('update', [App\Http\Controllers\API\CustomerController::class, 'update']);
Route::post('delete', [App\Http\Controllers\API\CustomerController::class, 'delete']);

Route::get('cart/{id}', [App\Http\Controllers\API\OrderController::class, 'cart']);


Route::get('requestcurrent/{id}', [App\Http\Controllers\API\RequestController::class, 'requestcurrent']);



Route::post('order', [App\Http\Controllers\API\OrderController::class, 'order']);
Route::get('requestlist/{id}', [App\Http\Controllers\API\RequestController::class, 'requestlist']);
Route::get('reserve/{id}', [App\Http\Controllers\API\RequestController::class, 'reserve']);
Route::get('orderinfo/{id}', [App\Http\Controllers\API\OrderController::class, 'orderinfo']);
Route::get('orderdetail/{id}', [App\Http\Controllers\API\OrderController::class, 'orderdetail']);
Route::post('confirmOrder', [App\Http\Controllers\API\OrderController::class, 'confirmOrder']);
Route::post('payment', [App\Http\Controllers\API\PaymentController::class, 'payment']);

Route::post('requestupdate', [App\Http\Controllers\API\RequestController::class, 'requestupdate']);

Route::get('requestprovider/{id}', [App\Http\Controllers\API\ProviderController::class, 'requestprovider']);
Route::get('Providerhistory/{id}', [App\Http\Controllers\API\ProviderController::class, 'Providerhistory']);
Route::post('loginprovider', [App\Http\Controllers\API\ProviderprofileController::class, 'loginprovider']);
Route::post('deleteprovider', [App\Http\Controllers\API\ProviderprofileController::class, 'deleteprovider']);
Route::post('updateprovider', [App\Http\Controllers\API\ProviderprofileController::class, 'updateprovider']);
Route::get('profileProvider/{id}', [App\Http\Controllers\API\ProviderprofileController::class, 'profileProvider']);

Route::get('provinceProvider', [App\Http\Controllers\API\ProviderprofileController::class, 'province']);
Route::get('districtProvider/{id}', [App\Http\Controllers\API\ProviderprofileController::class, 'district']);
Route::get('subdistrictProvider/{id}', [App\Http\Controllers\API\ProviderprofileController::class, 'subdistrict']);
Route::post('requestupdateProvider', [App\Http\Controllers\API\ProviderController::class, 'requestupdateProvider']);
Route::get('ProviderList/{id}', [App\Http\Controllers\API\ProviderController::class, 'ProviderList']);