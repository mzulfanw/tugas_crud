<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasterDataController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::group([
    'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'
], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class,'index'])->name('users');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users/store', [UserController::class,'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class,'destroy'])->name('users.destroy');

    Route::get('/master-data', [MasterDataController::class,'index'])->name('master-data.index');
    Route::get('/master-data/create', [MasterDataController::class,'create'])->name('master-data.create');
    Route::post('/master-data/store', [MasterDataController::class,'store'])->name('master-data.store');
    Route::get('/master-data/edit/{id}', [MasterDataController::class,'edit'])->name('master-data.edit');
    Route::delete('/master-data/{id}', [MasterDataController::class,'destroy'])->name('master-data.destroy');
});
