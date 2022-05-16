<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StatController;
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
Route::group(['prefix' => 'v1','middleware' => 'cors'],function(){
      //unauthenticated routes for All users type here here
      Route::post('login',[PassportController::class, 'login']);
      Route::post('register-customer',[PassportController::class, 'registerUser']);
      Route::post('/forgetpassword-step1',[PassportController::class,'codeReset']);
      Route::post('/forgetpassword-step2',[PassportController::class,'mResetPassword']);
      Route::get('news',[NewsController::class, 'news']);
      
      Route::group( ['middleware' => ['auth:api','scope:admin,utilisateur,adherent,coach,super_coach'] ],function(){
      // authenticated routes for all users type here 
      Route::get('user/me',[PassportController::class, 'userInfo']);
      Route::post('user/update',[PassportController::class, 'updateUserInfo']);
      Route::get('user/menu',[PassportController::class, 'userMenu']);
      Route::post('user/update/me',[PassportController::class, 'updatepwd']);
      Route::post('user/demande',[UserController::class, 'addDemande']);
      Route::get('user/events',[EventController::class, 'events']);
      Route::post('user/event/participate',[EventController::class, 'participer']);
      Route::post('user/event/apsent',[EventController::class, 'apsent']);
      Route::get('user/club',[PassportController::class, 'userClub']);		
	Route::get('user/myevents',[EventController::class, 'myList']);
      Route::post('user/event/create',[EventController::class, 'createEvt']);
      Route::get('user/event/coach',[EventController::class, 'coachEvt']);
}); 
}); 
 


