<?php

use App\Http\Controllers\AffiliationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UserInfoController;
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
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user',   [UserController::class,              'store'])->name('user.store');




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

Route::controller(BookingController::class)->group(function () {
   Route::get('/booking',                  'index')->name('booking.index');
   Route::get('/booking/{id}',             'show')->name('booking.show'); 
   Route::post('/booking/store',           'store')->name('booking.store');
   Route::post('/booking',                 'storeFormData')->name('booking.storeFormData');
   Route::put('/booking/{id}',             'update')->name('booking.update');
   Route::put('/booking/status/{id}',      'status')->name('booking.status');
   
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
    
    Route::controller(UserInfoController::class)->group(function () {
        Route::get('/userinfo',                  'index')->name('userinfo.index');
        Route::get('/userinfo/{id}',             'show')->name('userinfo.show');
    });

    Route::controller(BookingController::class)->group(function () {
        Route::delete('/booking/{id}',          'destroy')->name('booking.destroy');
    });

    Route::controller(BookingDetailsController::class)->group(function () {
        Route::get('/bookingdetails',                  'index')->name('bookingdetails.index');
        Route::get('/bookingdetails/{id}',             'show')->name('bookingdetails.show');
    });
    
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
       Route::put('/userdetails/user_id/{id}',       'userid')->name('userdetails.userid');
    });
    
    Route::controller(UserController::class)->group(function () {
       Route::get('/user',                  'index')->name('user.index'); 
       Route::get('/profile',             'show');
       Route::get('/user/details',          'getUserDetails');
       Route::delete('/user/{id}',          'destroy');
       Route::put('/user/name/{id}',        'name')->name('user.name');
       Route::put('/user/avatar/{id}',      'avatar')->name('user.avatar');
       Route::put('/user/username/{id}',    'username')->name('user.username');
       Route::put('/user/email/{id}',       'email')->name('user.email');
       Route::put('/user/password/{id}',    'password')->name('user.password');
       Route::put('/user/is_admin/{id}',    'admin')->name('user.admin');
    });
});
