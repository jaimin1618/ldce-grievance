<?php

// use App\Http\Controllers\Home;

use App\Http\Controllers\Complain;
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
Route::get('dashboard',[Dashboard::class,'index'])->name('dashboard');

Route::get('department',[Department::class,'index'])->name('department');



Route::get('manage-users',[ManageUser::class,'index'])->name('manageUsers');
Route::view('aboutus', 'pages/aboutus')->name('aboutus');
Auth::routes();


