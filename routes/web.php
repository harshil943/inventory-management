<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ordersController;
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
    return view('home');
});




route::get('/login',function(){
    return view('login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('logout',[logoutController::class,'out']);


// Route::group(['middleware' => ['role:super-admin']], function () {
//     Route::get('dashboard',[dashboardController::class,'index']);
    
// });
Route::get('dashboard',[dashboardController::class,'index']);

Route::get('orders',[ordersController::class,'index']);


Route::post('orderDetails/{data}',[ordersController::class,'details']);

Route::get('/country', function () {
    $country = Storage::get('public/country.json');
    return json_decode($country, true);
});

route::get('brochureDetails',function(){return view('client.brochure');});