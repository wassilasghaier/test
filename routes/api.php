<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\PlaningController;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SubcatController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PaimentController;
use App\Http\Controllers\OperationController;

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


      Route::group( ['middleware' => ['auth:api','scope:admin,customer,coach'] ],function(){
      // authenticated routes for all users type here 
      Route::post('register-enfant',[PassportController::class, 'registerEnfant']);
      Route::get('user/me',[PassportController::class, 'userInfo']);
      Route::get('user/menu',[PassportController::class, 'userMenu']);
      Route::post('user/update/me',[PassportController::class, 'changepwd']);
      Route::post('user/update',[PassportController::class, 'updateUserInfo']);
}); 
}); 



