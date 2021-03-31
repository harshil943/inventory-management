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
use App\Http\Controllers\consigneeController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\rawmaterialController;
use App\Http\Controllers\employeeSalaryController;
use App\Http\Controllers\assetController;
use App\Http\Controllers\machineController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::get('/', function () { return redirect('home');});
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'aboutus']);
Route::get('/contact-us', [HomeController::class, 'contactus']);
Route::get('/quality', [HomeController::class, 'quality']);
Route::get('brochureDetails/{id}',[brochureController::class,'brochureDetails']);
Route::get('brochure',[brochureController::class,'brochure']);
Route::get('productCategory/{categoryData}',[productCategoryController::class,'productCategory']);
Route::get('productDetails/{id}',[productDetailsController::class,'productDetails']);
Auth::routes();
Route::get('logout',[logoutController::class,'out']);
Route::post('donepassword',[setPassController::class,'changepass'])->name('donepassword');
Route::post('generate-quotation',[quotationController::class,'generateQuotation'])->name('generate-quotation');
Route::get('Profile',[profileController::class,'userProfile'])->name('UserProfile');

Route::middleware(['setpass'])->group(function () {
    Route::group(['middleware' => ['role:super-admin|admin']], function () {
        Route::get('dashboard',[dashboardController::class,'index'])->name('dashboard');
        Route::resource('employee',employeeController::class);
        Route::resource('designation',designationController::class);
        Route::post('makeAdmin/{id}',[employeeController::class,'makeAdmin']);
        Route::get('removeadmin/{id}',[employeeController::class,'removeAdmin']);
        Route::resource('product', productDetailsController::class);
        Route::resource('category', productCategoryController::class);
        Route::resource('machine',machineController::class);
    });
    Route::get('/setpassword',[setPassController::class,'index'])->name('setpassword');
    Route::get('orders',[ordersController::class,'index'])->name('orders.index');
    Route::get('orderForm',[ordersController::class,'orderForm'])->name('orders.orderForm');
    Route::post('orderCreate',[ordersController::class,'orderCreate'])->name('orders.orderCreate');
    Route::post('challanForm/{id}',[ordersController::class,'challanForm'])->name('orders.challanForm');
    Route::post('challanCreate/{id}',[ordersController::class,'challanCreate'])->name('orders.challanCreate');
    Route::post('orderDetails/{id}',[ordersController::class,'orderDetails'])->name('Orderdetails');
    Route::post('orderDelete/{id}',[ordersController::class,'orderDelete'])->name('Orderdelete');
    Route::post('challanDelete/{id}',[ordersController::class,'challanDelete'])->name('Challandelete');
    Route::post('challanDetails/{id}',[ordersController::class,'challanDetails'])->name('Challandetails');
    Route::post('printinvoice/{id}/{type}', [ordersController::class, 'printInvoice'])->name('Printinvoice');
    Route::post('printchallan/{id}', [ordersController::class, 'printChallan'])->name('Printchallan');
    Route::resource('consignee', consigneeController::class);
    Route::resource('inventory', inventoryController::class);
    Route::resource('quotation',quotationController::class);
    Route::resource('rawmaterial',rawmaterialController::class);
    Route::resource('expense', expenseController::class);
    Route::resource('empsalary', employeeSalaryController::class);
    Route::resource('asset', assetController::class);
});

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

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


