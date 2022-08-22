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
Route::any('master_import',[billingController::class,'master_import']);
Route::any('master_Export',[billingController::class,'master_Export']);

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
Route::any('emp_import',[billingController::class,'emp_import']);

Route::any('branch',[billingController::class,'show_branches']);
Route::any('branch_add',[billingController::class,'branches']);


//////////////////////////////////////////////////////////////////show master data in pop_up//////////////////////////////////////
Route::any('show',[billingController::class,'show']);
Route::any('popup/{id}',[billingController::class,'popup']);
Route::any('edit_popup/{id}',[billingController::class,'edit_popup']);
Route::any('editting',[billingController::class,'editting']);

///////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('show_number_details',[billingController::class,'show_details']);
Route::any('mini_master',[billingController::class,'mini_master']);
Route::any('import',[billingController::class,'mini_import']);
Route::any('mini_Export',[billingController::class,'mini_Export']);
Route::any('mini_popup/{id}',[billingController::class,'minipopup']);
Route::any('updatemini',[billingController::class,'updatemini']);

Route::any('mini_insert',[billingController::class,'mini_insert']);

Route::any('append_data',[billingController::class,'append_data']);

Route::any('mini_int',[billingController::class,'mini_int']);
Route::any('full_details',[billingController::class,'full_details']);
/////////////////////////////////////////////////////////////////////////Monthly table show///////////////////////
Route::get('monthly_table_show', function () {
    return view('Billing_file.monthly_table');
});

Route::any('monthly_table_data',[billingController::class,'monthly_table_data']);

Route::any('monthlya_data_save',[billingController::class,'monthlya_data_save']);
Route::any('img_show',[billingController::class,'img_show']);
Route::any('master_sample',[billingController::class,'master_sample']);
Route::any('number_details_sample',[billingController::class,'number_details_sample']);
Route::any('user_sample',[billingController::class,'user_sample']);



///////////////////////////////////////////////////////////////////////End monthly table////////////////////////////////////////
Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});