<?php

use App\Http\Controllers\AffiliationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
   Route::get('/user',                  'index')->name('user.index'); 
   Route::get('/user/{id}',             'show');
   Route::post('/user',                 'store')->name('user.store');
   Route::delete('/user/{id}',          'destroy');
   Route::put('/user/name/{id}',        'name')->name('user.name');
   Route::put('/user/avatar/{id}',      'avatar')->name('user.avatar');
   Route::put('/user/username/{id}',    'username')->name('user.username');
   Route::put('/user/email/{id}',       'email')->name('user.email');
   Route::put('/user/password/{id}',    'password')->name('user.password');
   Route::put('/user/is_admin/{id}',    'admin')->name('user.admin');
});


Route::controller(AffiliationController::class)->group(function () {
    Route::get('/affiliations',             'index')->name('affiliations.index');
    Route::get('/affiliations/{id}',        'show')->name('affiliations.show');
    Route::post('/affiliations',            'store')->name('affiliations.store');
    Route::delete('/affiliations/{id}',     'destroy')->name('affiliations.destroy');
    Route::put('/affiliations/name/{id}',   'name')->name('affiliations.name');
});


Route::controller(ClientController::class)->group(function () {
    Route::get('/clients',                  'index')->name('clients.index'); 
    Route::get('/clients/{id}',             'show')->name('clients.show');
    Route::post('/clients',                 'store')->name('clients.store');
    Route::delete('/clients/{id}',          'destroy')->name('clients.destroy');
    Route::put('/clients/firstname/{id}',   'firstname')->name('clients.firstname');
    Route::put('/clients/lastname/{id}',    'lastname')->name('clients.lastname');
    Route::put('/clients/contact/{id}',     'contact')->name('clients.contact');
    Route::put('/clients/email/{id}',       'email')->name('clients.email');
    Route::put('/clients/affiliation/{id}', 'affiliationid')->name('clients.affiliationid');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
