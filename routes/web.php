<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\PagesController;
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

Route::get('/pages/{id}', [PagesController::class,'pageByid']);
Route::get('/club/{id}', [PagesController::class,'clubByid']);
Route::get('/coach/{id}', [PagesController::class,'coachByClub']);
Route::get('/contact', function () {
    return view('site.contact');
   });
Route::get('/condition', function () {
    return view('site.condition');
});   
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
    //
    Route::get('/admin/users',[AdministrationController::class,'adminListUser']);
    Route::get('/admin/users/profile/{id}',[AdministrationController::class,'showProfile']);
    Route::get('/admin/users/delete/{id}',[AdministrationController::class,'deleteUser']);
    Route::get('/admin/users/activate/{id}',[AdministrationController::class,'activeUser']);
    //
    Route::get('/admin/adherents',[AdministrationController::class,'adminListAdh']);
    Route::get('/admin/adherents/create', [AdministrationController::class,'showAdh']);
    Route::post('admin/adherents/create', [AdministrationController::class,'createAdh']);
    Route::get('/admin/adherents/profile/{id}',[AdministrationController::class,'showProfileAdh']);
    Route::get('/admin/adherents/delete/{id}',[AdministrationController::class,'deleteAdh']);
    Route::get('/admin/adherents/activate/{id}',[AdministrationController::class,'activate']);
    Route::put('/admin/adherents/profile/edit{id}',[AdministrationController::class,'updateAdh']);
    Route::get('/admin/adherents/change/{id}',[AdministrationController::class,'changeToCoach']);
    //
    Route::get('/admin/coachs',[AdministrationController::class,'adminListCoach']);
    Route::get('/admin/coachs/create', [AdministrationController::class,'showCoach']);
    Route::post('admin/coachs/create', [AdministrationController::class,'createCoach']);
    Route::get('/admin/coachs/edit/{id}',[AdministrationController::class,'showProfileCoach']);
    Route::put('/admin/coachs/edit/{id}',[AdministrationController::class,'updateCoach']);
    Route::get('/admin/coachs/delete/{id}',[AdministrationController::class,'deleteCoach']);
    Route::get('/admin/coachs/profile/{id}',[AdministrationController::class,'userInfo']);
    Route::get('/admin/coachs/affected',[AdministrationController::class,'listCoachAffect']);
    Route::get('/admin/coachs/affect/{id}',[AdministrationController::class,'coachToAffect']);
    Route::put('/admin/clubs/affect/{id}',[AdministrationController::class,'coachAffect']);
    Route::get('/admin/coachs/activate/{id}',[AdministrationController::class,'activeCompet']);
    Route::get('/admin/coachs/change/{id}',[AdministrationController::class,'changeToSupCoach']);
    //
    Route::get('/admin/clubs',[ClubController::class,'listeclubs']);
    Route::get('/admin/clubs/create', [ClubController::class,'createClubBlade']);
    Route::post('/admin/clubs/create', [ClubController::class,'createClub']);
    Route::get('/admin/clubs/{id}/edit', [ClubController::class,'clubEdit']);
    Route::put('/admin/clubs/{id}', [ClubController::class,'updateClub']);
    Route::get('/admin/clubs/delete/{id}',[ClubController::class,'deleteClub']);
    //
    Route::get('/admin/demandes/{id}/affect',[UserController::class,'acceptDemande']);
    Route::get('/admin/demandes/{id}/cancel',[UserController::class,'cancelDemande']);
    Route::get('/admin/demandes',[UserController::class,'listedemandes']);
    //
    Route::get('/admin/clubsbycnt/{id}',[ClubController::class,'clubsbycnt']);
    Route::get('/admin/coachbyclub/{id}',[UserController::class,'coachbyclub']);
    //
     Route::get('/admin/events',[EventController::class,'listeEvents']);
     Route::get('/admin/events/create', [EventController::class,'createEventBlade']);
     Route::post('/admin/events/create', [EventController::class,'createEvent']);
     Route::get('/admin/events/{id}/edit', [EventController::class,'EventEdit']);
     Route::put('/admin/events/{id}', [EventController::class,'updateEvent']);
     Route::get('/admin/events/delete/{id}',[EventController::class,'deleteEvent']);
     Route::get('/admin/events/{id}/duplicate', [EventController::class,'eventToD']);
     Route::post('/admin/events/duplicate', [EventController::class,'eventDuplicate']);
     Route::get('/admin/events/cancel/{id}',[EventController::class,'cancelEvent']);
     
    
     //
    Route::get('/admin/news',[NewsController::class,'listeNews']);
    Route::get('/admin/news/create', function () {
        return view('admin.news.newsadd');
       });
    Route::post('/admin/news/create', [NewsController::class,'create']);
    Route::get('/admin/news/{id}/edit', [NewsController::class,'newEdit']);
    Route::put('/admin/news/{id}', [NewsController::class,'updateNew']);
    Route::get('/admin/news/delete/{id}',[NewsController::class,'deleteNew']);
    //
    Route::get('/admin/pages',[PagesController::class,'listePages']);
    Route::get('/admin/pages/{id}/edit',[PagesController::class,'pageEdit']);
    Route::put('/admin/pages/{id}', [PagesController::class,'updatePage']);
    
    
    //
   Route::post('/admin/profile/edit',[MainController::class,'settings']);
   Route::get('/admin/profile/edit',[MainController::class,'showProfile']);
   Route::get('/admin/profile',[MainController::class,'profile']);
   Route::get('/admin/setting', function () {
    return view('admin.setting');
   });
   Route::post('/admin/setting',[PassportController::class,'changepwd']);
   //
   Route::get('/admin/stat',[StatController::class, 'getStats']);
   Route::get('/admin/stat/{id}',[StatController::class, 'nbgendeByclub']);

});    
