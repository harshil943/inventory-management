<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\brochureController;
use App\Http\Controllers\designationController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\productCategoryController;
use App\Http\Controllers\productDetailsController;
use App\Http\Controllers\quotationController;
use App\Http\Controllers\setPassController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { return view('home');});

Route::get('/login',function(){ return view('login');});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('brochureDetails/{id}',[brochureController::class,'brochureDetails']);
Route::get('brochure',[brochureController::class,'brochure']);
Route::get('productCategory/{categoryData}',[productCategoryController::class,'productCategory']);
Route::get('productDetails/{id}',[productDetailsController::class,'productDetails']);

Route::get('logout',[logoutController::class,'out']);

Route::post('donepassword',[setPassController::class,'changepass'])->name('donepassword');

Route::middleware(['setpass'])->group(function () {  
    Route::group(['middleware' => ['role:super-admin|admin']], function () {
        Route::get('dashboard',[dashboardController::class,'index'])->name('dashboard');
        Route::resource('employee',employeeController::class);
        Route::resource('designation',designationController::class);
        Route::post('makeAdmin/{id}',[employeeController::class,'makeAdmin']);
        Route::get('removeadmin/{id}',[employeeController::class,'removeAdmin']);
        Route::resource('product', productDetailsController::class);
        Route::resource('category', productCategoryController::class);
    });
    Route::get('/setpassword',[setPassController::class,'index'])->name('setpassword');
    Route::get('orders',[ordersController::class,'index'])->name('orders.index');
    Route::post('orderDetails/{data}',[ordersController::class,'orderDetails']);
    Route::get('orderForm',[ordersController::class,'orderForm'])->name('orders.orderForm');
    Route::post('orderCreate',[ordersController::class,'orderCreate'])->name('orders.orderCreate');
    Route::post('createPdf/{id}/{type}', [ordersController::class, 'exportPDF']);
});

Route::post('Quotation',[quotationController::class,'quotationCreate'])->name('quotation');
Route::get('/country', function () {
    $country = Storage::get('public/country.json');
    return json_decode($country, true);
});

Route::get('/hsn', function () {
    $hsn = Storage::get('public/hsn.json');
    return json_decode($hsn, true);
});

Route::get('/state', function () {
    $state = Storage::get('public/state.json');
    return json_decode($state, true);
});

Route::get('/unit', function () {
    $unit = Storage::get('public/unit.json');
    return json_decode($unit, true);
});