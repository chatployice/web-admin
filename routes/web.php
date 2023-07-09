<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PayController;
use App\Models\Pay;
use App\Models\User;
use App\Models\Customer;
use App\Models\Provider;
use App\Models\Admin;
use App\Models\Request;
// use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::post('/customer/update/{custID}', [CustomerController::class, 'update']);
});

//หน้าแรก
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () { Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});


//หน้าผู้ใช้บริการ
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::get('/customer/all',[CustomerController::class,'index'])->name('customer');
    Route::post('/customer/add',[CustomerController::class,'store'])->name('addCustomer');
    Route::get('/customer/edit/{custID}', [CustomerController::class, 'edit']);
    Route::post('/customer/update/{custID}', [CustomerController::class, 'update']);
    Route::get('/customer/delete/{custID}', [CustomerController::class, 'destroy']);
});


//หน้าพนักงาน
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::get('/provider/all',[ProviderController::class,'index'])->name('provider');
    Route::post('/provider/add',[ProviderController::class,'store'])->name('addProvider');
    Route::get('/provider/edit/{providerID}', [ProviderController::class, 'edit']);
    Route::post('/provider/update/{providerID}', [ProviderController::class, 'update']);
    Route::get('/provider/delete/{providerID}', [ProviderController::class, 'destroy']);

});

//หน้าแอดมิน
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::get('/admin/all',[AdminController::class,'index'])->name('admin');
    Route::post('/admin/add',[AdminController::class,'store'])->name('addAdmin');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/admin/update/{id}', [AdminController::class, 'update']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/show', [AdminController::class, 'show'])->name('show');
});

//หน้ายืนยัน
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::get('/pay',[PayController::class,'index'])->name('pay');
    Route::get('/pay/edit/{payID}', [PayController::class, 'edit']);
    Route::post('/pay/update/{payID}',[PayController::class,'update']);
    
});








