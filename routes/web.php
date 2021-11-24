<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\PassportController;
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


Route::get('/',[MainController::class, 'login']);


Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');
    Route::get('/admin/dashboard',[MainController::class, 'dashboard']);
    Route::get('/admin/roles',[AdministrationController::class,'listeRoles']);
    Route::get('/admin/permissions',[AdministrationController::class,'listeMenus']);
    Route::get('/admin/affectation',[AdministrationController::class,'dashbordMenu']);
    Route::get('/admin/affectation/{id}/edit', [AdministrationController::class,'affectEdit']);
    Route::put('/admin/affectation/{id}', [AdministrationController::class,'affectRoleMenu']);
    Route::get('/admin/roles/create', [AdministrationController::class,'showRole']);
    Route::post('/admin/roles/create', [AdministrationController::class,'createRoles']);
    Route::get('/admin/roles/{id}/edit', [AdministrationController::class,'roleEdit']);
    Route::put('/admin/roles/{id}', [AdministrationController::class,'updateRoles']);
    Route::get('/admin/roles/delete/{id}',[AdministrationController::class,'deleteRoles']);
    Route::get('/admin/permissions/create', [AdministrationController::class,'showMenu']);
    Route::post('admin/permissions/create', [AdministrationController::class,'createMenus']);
    Route::get('/admin/permissions/{id}/edit', [AdministrationController::class,'menuEdit']);
    Route::put('/admin/permissions/{id}', [AdministrationController::class,'updateMenus']);
    Route::get('/admin/permissions/delete/{id}',[AdministrationController::class,'deleteMenus']);
    Route::get('/admin/users',[AdministrationController::class,'adminListUser']);
    //
    Route::get('/admin/users/profile/{id}',[AdministrationController::class,'showProfile']);
    Route::get('/admin/users/delete/{id}',[AdministrationController::class,'deleteUser']);
    Route::get('/admin/coachs',[AdministrationController::class,'adminListCoach']);
    Route::get('/admin/coachs/create', [AdministrationController::class,'showCoach']);
    Route::post('admin/coachs/create', [AdministrationController::class,'createCoach']);
    Route::get('/admin/coachs/delete/{id}',[AdministrationController::class,'deleteCoach']);
    Route::get('/admin/coachs/profile/{id}',[AdministrationController::class,'userInfo']);


    Route::get('/admin/packs',[PackController::class,'listepacks']);
    Route::get('/admin/pack/create', [PackController::class,'formCreate']);
    Route::post('/admin/packs/create', [PackController::class,'create']);
    Route::get('/admin/packs/{id}/edit', [PackController::class,'formEdit']);
    Route::put('/admin/packs/{id}', [PackController::class,'update']);
    Route::get('/admin/packs/delete/{id}',[PackController::class,'delete']);

    Route::get('/admin/demandes',[PackController::class,'paimentDemand']);
    Route::get('admin/paiments',[PackController::class,'paimentPaied']);
    Route::get('/admin/demandes/activate/{id}',[PackController::class,'paimentValid']);
    
    Route::get('/admin/operations/addition',[DayController::class,'getlistuser']);
    Route::get('/admin/operations/soustraction',[DayController::class,'getListsous']);
    Route::get('/admin/operations/multiiplication',[DayController::class,'getListmulti']);
    Route::get('/admin/operations/division',[DayController::class,'getListdiv']);
   //
    Route::get('/admin/operations/addition/{id}',[DayController::class,'getListaddE']);
    Route::get('/admin/operations/soustraction/{id}',[DayController::class,'getListsousE']);
    Route::get('/admin/operations/multiplication/{id}',[DayController::class,'getListmultiE']);
    Route::get('/admin/operations/division/{id}',[DayController::class,'getListdivE']);
   //
   Route::post('/admin/profile/edit',[MainController::class,'settings']);
   Route::get('/admin/profile/edit',[MainController::class,'showProfile']);
   Route::get('/admin/profile',[MainController::class,'profile']);
   Route::get('/admin/setting', function () {
    return view('admin.setting');
   });
   Route::post('/admin/setting',[PassportController::class,'changepwd']);
});    
