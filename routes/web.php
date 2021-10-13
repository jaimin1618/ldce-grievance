<?php

// use App\Http\Controllers\Home;

use App\Http\Controllers\Profile;
use App\Http\Controllers\Complain;
use App\Http\Controllers\Contactus;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Department;
use App\Http\Controllers\ManageUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Auth::routes();
// Route::get('/', [Home::class,'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('H');
Route::post('complain/add/',[App\Http\Controllers\Complain::class,'insert'])->name('addComplain');
Route::post('complain/update/',[Complain::class,'updateStatus'])->name('updateStatus');
Route::post('complain/get-data/',[Complain::class,'get_data'])->name('getData');
Route::post('complain/get-count/',[Complain::class,'get_complain_counts'])->name('getCount');
Route::post("complain/get-data/export",[Complain::class,'get_data'])->name('export');
Route::get('add-grivance',[Complain::class,'addComplain'])->name('addGrivanceView');
Route::post('add-grivance/add',[Complain::class,'insert'])->name('addGrivance');

Route::get('dashboard',[Dashboard::class,'index'])->name('dashboard');

// MANAGE DEPARTMENTS SECTION - departments_page
Route::get('department',[Department::class,'index'])->name('department');
Route::get('get_data/{id}', [Department::class, 'show'])->name('department.show');
Route::post('department/add-dept/', [Department::class, 'store'])->name('dept.add');
Route::post('department/delete-dept/', [Department::class, 'delete'])->name('dept.delete');
Route::post('department/edit-dept/', [Department::class, 'update'])->name('dept.update');

Route::get('manage-users',[ManageUser::class,'index'])->name('manageUsers');
Route::get('profile',[Profile::class,'index'])->name('profile');
Route::post('user/save',[Profile::class,'saveData'])->name('saveUser');
Route::view('aboutus', 'pages/aboutus')->name('aboutus');

Route::post('contactus/save',[Contactus::class,'insert'])->name('saveContactUs');
Route::get('contactus',[Contactus::class,'index'])->name('contactUs');
Auth::routes();


