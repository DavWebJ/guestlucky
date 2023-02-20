<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Staf\StafController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Customer\CustomerController;
use App\Models\Booking;

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

Route::get('/',[MainController::class,'index'])->name('home');
Route::get('/switch',[MainController::class,'switch'])->name('switch');



// admin group routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','admin']], function(){

    Route::get('list',[AdminController::class,'adminlist'])->name('admin.list');
    Route::get('staf/list',[AdminController::class,'staflist'])->name('staf.list');
    Route::get('customer/list',[AdminController::class,'customerlist'])->name('customer.list');
    Route::get('/add-super',[AdminController::class,'create'])->name('admin.create');
    Route::post('/create-super',[AdminController::class,'store'])->name('admin.store');
    Route::get('/profil',[AdminController::class,'show'])->name('admin.show');
    Route::get('/properties',[AdminController::class,'showProperties'])->name('properties.list');
    Route::get('/create-prop-key',[PropertyController::class,'createPropKey'])->name('properties.create.propkey');
    Route::post('/create-prop-key',[PropertyController::class,'storeKey'])->name('properties.store.propkey');
    Route::get('/manage-token',[AdminController::class,'showTokenManger'])->name('token.show');
    Route::get('/getBookings',[AdminController::class,'getBookings'])->name('getBookings');
    Route::get('/save-properties',[MainController::class,'SaveProperties']);
    Route::post('/create-token',[AdminController::class,'storetoken'])->name('admin.store.token');
    Route::get('/refresh',[AdminController::class,'resetAll'])->name('admin.refresh');
    Route::get('booking/{booking}',[BookingController::class,'show'])->name('admin.booking.show');
    Route::post('send-messge',[AdminController::class,'sendmessages'])->name('admin.send');
    Route::get('/invoices',[AdminController::class,'getBookingsInvoices']);
    Route::resources([
        'messages' => MessageController::class,
    ]);

});



// staf group routes
Route::group(['prefix' => 'staf', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','admin']], function(){
    
    Route::get('/profil',[StafController::class,'show'])->name('staf.show');

});

// staf group routes
Route::group(['prefix' => 'customer', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','admin']], function(){
    
    Route::get('/profil',[CustomerController::class,'show'])->name('customer.show');

});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('staf/dashboard',[AdminController::class,'dashboard'])->name('staf.dashboard');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('customer/dashboard',[AdminController::class,'dashboard'])->name('customer.dashboard');




// seed table properties



Route::get('/404', function(){
    return view('errors.404');
})->name('404');

Route::get('/500', function(){
    return view('errors.500');
})->name('500');

Route::get('/302', function(){
    return view('errors.302');
})->name('302');

Route::get('/403',function(){
    return view('errors.403');
})->name('403');