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

Route::get('bill_categories', function () {
    return view('Billing_file.billing_categories');
});

Route::any('categories',[billingController::class,'bill_categories']);

Route::get('operators', function () {
    return view('Billing_file.operators');
});
Route::any('Opratores_set',[billingController::class,'category']);

Route::any('oprate',[billingController::class,'operators']);

Route::get('payment_units', function () {
    return view('Billing_file.payment_units');
});
Route::any('pay_units',[billingController::class,'payment_units']);

Route::get('relation', function () {
    return view('Billing_file.Relationship_number');
});
Route::any('relation_set',[billingController::class,'opt']);

Route::any('relation_no',[billingController::class,'relation_no']);

Route::get('emp', function () {
    return view('Billing_file.EMP');
});
Route::any('emp_user',[billingController::class,'emp']);

Route::get('branch', function () {
    return view('Billing_file.Branches');
});
Route::any('branch_add',[billingController::class,'branches']);


//////////////////////////////////////////////////////////////////show master data in pop_up//////////////////////////////////////
Route::any('show',[billingController::class,'show']);
Route::any('popup/{id}',[billingController::class,'popup']);

///////////////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});