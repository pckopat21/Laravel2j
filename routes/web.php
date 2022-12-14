<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {return view('welcome');});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function ()
{Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');});





//Admin

Route::middleware('auth')->prefix('admin')->group(function () {

    #Admin role
    //Route::middleware('admin')->group(function () {

        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');
        # Category
        Route::get('personel', [\App\Http\Controllers\Admin\PersonelController::class, 'index'])->name('admin_personel');
        Route::get('personel/add', [\App\Http\Controllers\Admin\PersonelController::class, 'add'])->name('admin_personel_add');
        Route::post('personel/create', [\App\Http\Controllers\Admin\PersonelController::class, 'create'])->name('admin_personel_create');
        Route::get('personel/edit/{id}', [\App\Http\Controllers\Admin\PersonelController::class, 'edit'])->name('admin_personel_edit');
        Route::post('personel/update/{id}', [\App\Http\Controllers\Admin\PersonelController::class, 'update'])->name('admin_personel_update');
        Route::get('personel/delete/{id}', [\App\Http\Controllers\Admin\PersonelController::class, 'destroy'])->name('admin_personel_delete');
        Route::get('personel/show', [\App\Http\Controllers\Admin\PersonelController::class, 'show'])->name('admin_personel_show');
    });







Route::get('/admin/login',[HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[HomeController::class, 'logout'])->name('admin_logout');

Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function (){
    return view('dashboard');
})->name('dashboard');
