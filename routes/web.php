<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\brochureController;
use App\Http\Controllers\designationController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\productCategoryController;
use App\Http\Controllers\productDetailsController;
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

route::get('/login',function(){ return view('login');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('logout',[logoutController::class,'out']);


Route::group(['middleware' => ['role:super-admin|admin']], function () {
    Route::get('dashboard',[dashboardController::class,'index'])->name('dashboard');
    Route::resource('employee',employeeController::class);
    Route::resource('designation',designationController::class);
    Route::post('makeAdmin/{id}',[employeeController::class,'makeAdmin']);
    Route::get('removeadmin/{id}',[employeeController::class,'removeAdmin']);

});

Route::post('donepassword',[setPassController::class,'changepass'])->name('donepassword');
Route::middleware(['setpass'])->group(function () {  
    Route::get('/setpassword',[setPassController::class,'index'])->name('setpassword');
    Route::get('orders',[ordersController::class,'index'])->name('orders.index');
    Route::post('orderDetails/{data}',[ordersController::class,'orderDetails']);

   

    route::get('brochure',[brochureController::class,'brochure']);
    route::get('brochureDetails/{id}',[brochureController::class,'brochureDetails']);

    route::get('productCategory/{categoryData}',[productCategoryController::class,'productCategory']);
    route::get('productDetails/{id}',[productDetailsController::class,'productDetails']);

    // Export To PDF
    Route::get('/create-pdf/{id}', [ordersController::class, 'exportPDF']);

});

Route::get('/country', function () {
    $country = Storage::get('public/country.json');
    return json_decode($country, true);
    });



