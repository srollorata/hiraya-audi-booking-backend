<?php

use App\Http\Controllers\UserDetailController;
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

// public api

Route::controller(UserDetailController::class)->group(function () {
   Route::get('/userdetails',                    'index')->name('userdetails.index');
   Route::get('/userdetails/{id}',               'show');
   Route::post('/userdetails',                   'store')->name('userdetails.store');
   Route::delete('/userdetails/{id}',            'destroy');
   Route::put('/userdetails/about/{id}',         'about')->name('userdetails.about');
   Route::put('/userdetails/company/{id}',       'company')->name('userdetails.company');
   Route::put('/userdetails/job/{id}',           'job')->name('userdetails.job');
   Route::put('/userdetails/country/{id}',       'country')->name('userdetails.country');
   Route::put('/userdetails/address/{id}',       'address')->name('userdetails.address');
   Route::put('/userdetails/phone/{id}',         'phone')->name('userdetails.phone');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
