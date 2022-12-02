<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Staf\StafController;

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
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/update-profile',[AdminController::class,'show'])->name('admin.show');

});


// staf group routes
Route::group(['prefix' => 'staf', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','admin']], function(){
    
    Route::get('update-profile',[StafController::class,'show'])->name('staf.show');

});

// staf group routes
Route::group(['prefix' => 'customer', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','admin']], function(){
    
    Route::get('/show',[CustomerController::class,'show'])->name('customer.show');

});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('staf/dashboard',[AdminController::class,'dashboard'])->name('staf.dashboard');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('customer/dashboard',[AdminController::class,'dashboard'])->name('customer.dashboard');








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