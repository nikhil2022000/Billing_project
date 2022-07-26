<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\billingController;
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
    return view('auth.login');
});
Route::get('dashboard', function () {
    return view('Billing_file.Dashboard');
});
Route::any('master_form',[billingController::class,'master_form']);

Route::any('bill_categories',[billingController::class,'show_catg']);
Route::any('categories',[billingController::class,'bill_categories']);

Route::any('Opratores_set',[billingController::class,'category']);
Route::any('oprate',[billingController::class,'operators']);

Route::any('payment_units',[billingController::class,'units']);
Route::any('pay_units',[billingController::class,'payment_units']);


Route::any('relation_set',[billingController::class,'opt']);
Route::any('relation_no',[billingController::class,'relation_no']);

Route::any('emp',[billingController::class,'emp_user']);
Route::any('emp_user',[billingController::class,'emp']);

Route::any('branch',[billingController::class,'show_branches']);
Route::any('branch_add',[billingController::class,'branches']);


//////////////////////////////////////////////////////////////////show master data in pop_up//////////////////////////////////////
Route::any('show',[billingController::class,'show']);
Route::any('popup/{id}',[billingController::class,'popup']);

///////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('show_number_details',[billingController::class,'show_details']);
Route::any('mini_master',[billingController::class,'mini_master']);

Route::any('mini_insert',[billingController::class,'mini_insert']);

Route::any('append_data',[billingController::class,'append_data']);
Route::any('mini_int',[billingController::class,'mini_int']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});