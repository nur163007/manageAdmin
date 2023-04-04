<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/',function(){
 return view('admin.dashboard');
});
Route::get('/', [UserController::class,'login']);
Route::post('/loginCheck', [UserController::class,'loginCheck'])->name('loginCheck');
Route::get('/registration-form',[RegistrationController::class, 'showRegisterFrom']);
Route::get('/countries',[CountryController::class,'getCountry'])->name('country');
Route::get('/terms',[UserController::class,'getTerms']);
Route::post('/member/register',[UserController::class,'store'])->name('store.register');

//Route::middleware('login')->group(function(){
//
//});

Route::group(['middileware' =>'api'],function ($routes){
    Route::post('/register',[RegistrationController::class,'register']);
    Route::get('/verify',[RegistrationController::class,'verifyEmail']);

});

