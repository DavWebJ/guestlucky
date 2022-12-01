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




// admin group routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','admin']], function(){

    Route::get('list',[AdminController::class,'adminlist'])->name('admin.list');
    Route::get('staf/list',[AdminController::class,'staflist'])->name('staf.list');
    Route::get('customer/list',[AdminController::class,'customerlist'])->name('customer.list');
    Route::get('/add-super',[AdminController::class,'create'])->name('admin.create');
    Route::post('/create-super',[AdminController::class,'store'])->name('admin.store');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/update-profile',[AdminController::class,'updateProfil'])->name('admin.updateprofile');

});


// staf group routes
Route::group(['prefix' => 'staf', 'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','staf']], function(){
    
    Route::get('update-profile',[StafController::class,'updateProfil'])->name('staf.updateprofile');

});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','staf'])->get('staf/dashboard',[StafController::class,'dashboard'])->name('staf.dashboard');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->get('dashboard',[CustomerController::class,'dashboard'])->name('dashboard');





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