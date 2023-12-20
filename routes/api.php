<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCredentialsController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API

Route::controller(UserCredentialsController::class)->group(function () {
    Route::get('/user/credentials',         'index');
    Route::get('/user/credentials/{id}',    'show')->name('user.show');
    Route::post('/user/credentials',        'store')->name('user.store');
    Route::put('/user/username/{id}',       'updateUsername')->name('user.updateUsername');
    Route::put('/user/email/{id}',          'updateEmail')->name('user.updateEmail');
    Route::put('/user/password/{id}',          'updatePassword')->name('user.updatePassword');
    Route::put('/user/contact/{id}',          'updateContact')->name('user.updateContact');
});

Route::controller(UserRoleController::class)->group(function () {
    Route::get('/user/roles',     'index');
    Route::post('/user/roles',    'store')->name('user.store');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user',          'index');
    Route::get('/user/{id}',     'show')->name('user.show');
    Route::post('/user',         'store')->name('user.store');
    Route::put('/user/{id}',     'update')->name('user.update');
    Route::delete('/user/{id}',  'destroy')->name('user.destroy');
});

Route::controller(AdminController::class)->group(function () {
   Route::get('/admin', 'index');
   Route::get('/admin/{id}', 'show')->name('admin.show');
   Route::post('/admin', 'store')->name('admin.store');
});

// Private API
Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    
    return $request->user();
});