<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Menu;
use App\Models\User;
use App\Models\Paiment;
use App\Models\Operation;
use App\Models\Slider;
use App\Models\Coefficient;
use App\Models\Entreprise;
use App\Models\Competition;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Hash;
use Validator;
use Auth;
class AdministrationController extends Controller
{
    public function createRoles(Request $request)
    {   
       $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ],[
          'name.required' => 'le champs libller est obligatoir',
          'name.string' => 'le champs libller doit contenire seulement des lettres',
          'description.required' => 'le champs description est obligatoir',
        ]);        
      
        $role = Role::create($request->all());
       
        return redirect( '/admin/roles' )->with( 'success', 'Role successfully created' );

    }
    
    public function listeRoles()
    {   
        $roles = Role::all();
        return view('admin.roles', ['roles' => $roles]); 
    }
    public function updateRoles(Request $request, $id)
    {   
        try {
            $role = Role::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Role not found.'
            ], 403);
        }

        $role->update($request->all());

       // return response()->json(['message'=>'Role updated successfully.']);
       return redirect( 'admin/roles' )->with( 'success', 'role successfully updatetd' );
    }
    public function deleteRoles($id)
    {   
        try {
            $role = Role::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Role not found.'
            ], 403);
        }
        $role->delete();
        return redirect( 'admin/roles' )->with( 'success', 'Role Deleted successfully.' );
        //return response()->json(['message'=>'Role Deleted successfully.']);
    }
    public function showRole(){
      return view('admin.roleadd');
  }
  public function roleEdit($id){
    $role = Role::find($id);
    return view('admin.roleedit', ['role' => $role]);
  }

    public function adminListUser()
    {   
        //$users = User::all();
        $parents = User::whereHas(
          'roles', function($q){
              $q->where('name', 'customer');
          }
        )->get();
        return view('admin.parents', ['parents' => $parents]);
    }
    public function createCoach(Request $request)
    {   
       $request->validate([
            'name' => 'required|max:20|min:3|',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|min:6',
        ],[
          'name.required' => 'le champs nom est obligatoir',
          'email.exists'=>"cette emaile existe dans le tabel utilisateure",
          'email.required'=>"le champs email est obligatoir ",
          'password.required'=>"le champs mot de passe est obligatoir",
          ]);  
        $role= 'coach';
        $request['remember_token'] = Str::random(10);
        $user = new User();
        $user->name=$request->name;
        $user->password= Hash::make($request['password']);
        $user->email = is_null($request->email) ? $user->email : $request->email;
        $user->image="/soft/images/user/07.jpg";
        //$user->username = is_null($request->username) ? $user->username : $request->username;
        $user->save();
        $user->roles()->attach(Role::where('name', $role)->first());
        return redirect( '/admin/coachs' )->with( 'success', 'coach successfully created' );
      
    }
    public function showProfile($id,Request $request){
       //$users = User::all();
       $user = User::where('id', $id)->first();
       if($user){
        return view('admin.profile', ['user' => $user]);
       }
    }
    public function showCoach(){
      return view('admin.coachAdd');
    }
    public function deleteUser($id)
    {
      try {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect( 'admin/users' )->with( 'success', 'utilisateur supprimé avec succès.' );
      } catch (ModelNotFoundException $e) {
        
        return redirect( 'admin/users' )->with( 'danger', "utilisateur n'existe pas." );
      }
     
    }
    public function deleteCoach($id)
    {
      try {
        $user = User::findOrFail($id);
      } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'User not found.'
        ], 403);
    }
    $user->delete();
    return redirect( 'admin/coachs' )->with( 'success', 'coach supprimé avec succès.' );
    }
    public function adminListCoach(){
      $enfants = User::whereHas(
        'roles', function($q){
            $q->where('name', 'coach');
        }
      )->get();
      return view('admin.coachs', ['enfants' => $enfants]);  
    } 
  
    public function createMenus(Request $request)
    {   
        $request->validate([
          'title' => 'required|string',
        ],[
        'title.required' => 'le champs libller est obligatoir',
        'title.string' => 'le champs libller doit contenire seulement des lettres',
        ]);   
        $menu = Menu::create([
          'title'     => $request['title'],
          'icon'    => 'assets/img/chicon.png',
          'url' => '/Chiled',
        ]);
        return redirect( '/admin/permissions' )->with( 'success', 'permission successfully created' );   
    }
    public function listeMenus(Request $request)
    {   
        $menus = Menu::all(); 
        return view('admin.permission', ['menus' => $menus]); 
           
    }
    public function showMenu(){
      return view('admin.padd');
    }
  public function menuEdit($id){
    $menu = Menu::find($id);
    return view('admin.pedit', ['menu' => $menu]);
  }
    public function updateMenus(Request $request, $id)
    {   
        try {
            $menu = Menu::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Menu not found.'
            ], 403);
        }

        $menu->update($request->all());
        return redirect( 'admin/permissions' )->with( 'success', 'Permission updated successfully.' );
        //return response()->json(['message'=>'Menu updated successfully.']);
    }
    
    public function deleteMenus($id)
    {   
        try {
            $menu = Menu::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Menu not found.'
            ], 403);
        }

        $menu->delete();
        return redirect( 'admin/permissions' )->with( 'success', 'Permission Deleted successfully..' );

        
    }
    public function affectMenus(Request $request)
    {   
        $menuId = $request->menuId;
        $roleId = $request->roleId;
        $menu = Menu::findOrFail($menuId);
        $role = Role::findOrFail($roleId);
        $menu->roles()->attach(Role::where('id', $role->id)->first());
        
          /**Return success message with token value
          */
        return response()->json(['message'=>'successfully.']);
    }
    public function affectEdit($id){
      $menu = Menu::find($id);
      $roles = $menu->roles()->get();
      $menu->roles=$roles;
      $roles = Role::all();
      return view('admin.affectedit', compact('menu', 'roles'));
    }
    public function dashbordMenu(Request $request)
    {   
       
        $menus = Menu::with('roles') // Eager loading
               ->get();
           
       foreach ($menus as $menu) {
        $name ="---" ;
        if(count($menu->roles) > 0){ 
        $name ="" ;
        foreach ($menu->roles as $role) {
          $name= $name . ' ' . $role->name;
        }
      }
      $menu->listes=$name;
    }
        return view('admin.affect')->with('menus', $menus);       
        }

    public function affectRoleMenu(Request $request, $id)
    {   
        if(Menu::where('id', $id)->exists())
        {
          try {
             $menu = Menu::findOrFail($id);
            } catch (ModelNotFoundException $e) {
              /*return response()->json([
                'message' => 'role not found.'
              ], 404);*/
            } 
              $roles = $request->get('roles');
              if(!empty($roles))
               {
               
               $menu->roles()->sync($request->input('roles', []));
                
              }
           return redirect( 'admin/affectation' )->with( 'success', 'Permission affected to user role successfully..' );
          
        }
    }
   
    public function activeCompet(Request $request)
    {  $validator = Validator::make($request->all(), [
        'id'=> 'required',
      ]);        
      //Check the validation becomes fails or not
      if ($validator->fails()) {
        //Return error message
        return response()->json(['error'=> $validator->errors()->all()], 400);
      }  
      if(User::where('id', $request->id)->exists())
      {   
         try {
             $id = $request->id;
             $user = User::findOrFail($id);
             $user->is_active = 1;
             return response()->json(
             $user, 200);
            } catch (ModelNotFoundException $e) {
                $message= 'Aucun utilisateur trouver';
             return response()->json(
              $message
             , 404);
            }  
      }
      else{
          $message= 'Aucun utilisateur correspont';
        return response()->json(
            $message
        , 404);
     }  
    }
    public function deactiveCompet(Request $request)
    {  $validator = Validator::make($request->all(), [
        'id'=> 'required',
      ]);        
      //Check the validation becomes fails or not
      if ($validator->fails()) {
        //Return error message
        return response()->json(['error'=> $validator->errors()->all()], 400);
      }  
      if(User::where('id', $request->id)->exists())
      {   
         try {
             $id = $request->id;
             $user = User::findOrFail($id);
             $user->is_active = 0;
             return response()->json(
             $user, 200);
            } catch (ModelNotFoundException $e) {
                $message= 'Aucun utilisateur trouver';
             return response()->json(
              $message
             , 404);
            }  
      }
      else{
          $message= 'Aucun Utilisateur correspont';
        return response()->json(
            $message
        , 404);
     }  

    }
    public function listeCompet(Request $request)
    {       
      $competition= Competition::orderBy('created_at', 'desc')->get();
      return response()->json($competition,200);
             
    }
    
    public function userInfo($id, Request $request)
  {
   //Retrieve the information of the authenticated user
    $user = User::where('id', $id)->first();
    $user->marchs="aucune marche";
    $user->role= "coach";
   // Return user's details
   if($user){
    return view('admin.coach', ['user' => $user]);
   }
    
  }

}
