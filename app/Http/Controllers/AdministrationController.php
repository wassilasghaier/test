<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Role;
use App\Models\Menu;
use App\Models\User;
use App\Models\Event;
use App\Models\Operation;
use App\Models\Club;
use App\Models\Contrie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\VerifyMail;
use Hash;
use Validator;
use Auth;
class AdministrationController extends Controller
{
   /* public function createRoles(Request $request)
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
        return view('admin.settings.roles', ['roles' => $roles]); 
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
      return view('admin.settigs.roleadd');
    }
    public function roleEdit($id){
     $role = Role::find($id);
     return view('admin.settings.roleedit', ['role' => $role]);
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
              return response()->json([
                'message' => 'role not found.'
              ], 404);
            } 
              $roles = $request->get('roles');
              if(!empty($roles))
               {
               
               $menu->roles()->sync($request->input('roles', []));
                
              }
           return redirect( 'admin/affectation' )->with( 'success', 'Permission affected to user role successfully..' );
          
        }
    }*/
    //user Managment
    public function adminListUser()
    {   
        //$users = User::all();
        $parents = User::whereHas(
          'roles', function($q){
              $q->where('name', 'utilisateur');
          }
        )->orderBy('id', 'desc')->paginate(8);
        return view('admin.members', ['parents' => $parents]);
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
    public function activeUser($id,Request $request)
    {   
      if(User::where('id', $id)->exists())
      {   
          try {
             $user = User::findOrFail($id);
              if($user->is_active == 1)
              {$user->is_active = 0;
               $user->save();}
              else 
              {$user->is_active = 1;
               $user->save();}
               return redirect( 'admin/users' )->with( 'success', 'Utilisateur statut est mise à jour avec succès' );
            } catch (ModelNotFoundException $e) {
                $message= 'Aucun utilisateur trouver';
                return redirect( 'admin/users' )->with( 'fail', 'Aucun utilisateur trouver' );
            }  
      }
      else{
        return redirect( 'admin/users' )->with( 'fail', 'Aucun utilisateur trouver' );
      }  
    }
    public function showProfile($id,Request $request){
      //$users = User::all();
      $user = User::where('id', $id)->first();
      if($user){
       return view('admin.profile', ['user' => $user]);
      }
    }
    //Coach managment
    public function createCoach(Request $request)
    {   
      $request->validate([
        'firstname' => 'required|max:20|min:3|',
        'lastname' => 'required|max:20|min:3|',
        'email'=>'required|email|unique:users,email',
        'cin'=>'required|digits:8',
        'phone' => 'required|digits:8',
        'club_id' => 'required',  
        'password' => 'required|min:6',
        'cpassword' => 'required|min:6|same:password',
        
      ],[
        'firstname.required' => 'le champs nom est obligatoir',
        'lastname.required' => 'le champs prénom est obligatoir',
        'email.exists'=>"cette emaile existe dans le tabel utilisateure",
        'email.required'=>"le champs email est obligatoir ",
        'cin.required' => 'le champs cin est obligatoir',
        'phone.required'=>"le champs télèphone est obligatoir",
        'club_id.required'=>"le champs club est obligatoir",
        'password.required'=>"le champs mot de passe est obligatoir",
        'cpassword.required'=>"le champs confirmer mot de passe est obligatoir",
        'cpassword.same'=>"non concordance des mots de passe",
      ]);  
      $club=Club::where('id', $request->club_id)->first();
      $ad = User::whereHas(
        'roles', function($q){
            $q->where('name', 'adherent');
        }
      )->orderBy('id', 'DESC')->first();
      if($ad!= null)
      {
        $uuid=substr($ad->uuid,5);
        if($uuid[0]!="0")
        {$new=(int)$uuid + 1 ;}
        else{
          if($uuid[1]!="0")
          {
           $uuid=$uuid[1] . $uuid[2] .$uuid[3];
           $new=(int)$uuid + 1;
          }
          else if($uuid[2]!="0")
          {
            $uuid=$uuid[2] . $uuid[2];
            $new=(int)$uuid + 1;
          }
          else{
              $new=(int)$uuid[3]+ 1;
          }
        }
      $s=(string)$new;
      if(strlen($s)== 4)
      {$uuid_new= $club->uuid . $s;}
      elseif(strlen($s)== 3)
      {$uuid_new= $club->uuid . "0" . $s;}
      elseif(strlen($s)== 2)
      {$uuid_new= $club->uuid . "00" . $s;}
      elseif(strlen($s)== 1)
      {$uuid_new= $club->uuid . "000" . $s;}
      }
      else 
      {$uuid_new=$club->uuid . "0001";}
      //
      $role= $request->role_id;
      $request['remember_token'] = Str::random(10);
      $user = new User();
      $name=$request->firstname . $request->lastname;
      $user->name=$name;
      $user->uuid=$uuid_new;
      $user->cin=$request->cin;
      $user->password= Hash::make($request['password']);
      $user->phone= $request->phone;
      $user->email = is_null($request->email) ? $user->email : $request->email;
      $user->date_birth = is_null($request->date_birth) ? $user->date_birth : $request->date_birth;
      $user->adresse = is_null($request->adresse) ? $user->adresse : $request->adresse;
      $user->adresse = $request->adresse;
      $user->image="/soft/images/user/07.jpg";
      $user->gender=$request->gender;
      $user->club_id=$request->club_id;
      //$user->username = is_null($request->username) ? $user->username : $request->username;
      $user->save();
      $user->roles()->attach(Role::where('id', $role)->first());
      $details = [
        'email' => $user->email,
        'password' => $request->password,
      ];
      Mail::to($user->email)->send(new VerifyMail($details));
      return redirect( '/admin/coachs' )->with( 'success', 'coach créé avec succès' ); 
    }
    public function showCoach(){
      $contries = Contrie::all(); 
      $clubs= Club::all();
      return view('admin.coachs.coachAdd', ['contries' => $contries,'clubs' => $clubs]);
    }
    public function userInfo($id, Request $request)
    {
     //Retrieve the information of the authenticated user
      $user = User::where('id', $id)->first();
      $role = $user->roles()->first();
      $user->marches= Event::where('user_id', $user->id)->count();
      $user->kl=$user->events()->sum('kilometrage');
      $user->role= $role->name;
      /*$age = Carbon::parse($user->date_birth)->diff(Carbon::now())->y;
      dd($age. " Years"); */
     // Return user's details
     if($user){
      return view('admin.coachs.coach', ['user' => $user]);
     }
      
    }
    public function showProfileCoach($id,Request $request){
      //$users = User::all();
      $contries = Contrie::all(); 
      $clubs= Club::all();
      $user = User::where('id', $id)->first();
      if($user){
       return view('admin.coachs.coachEdit', ['user' => $user,'contries' => $contries,'clubs' => $clubs]);
      }
    }
    public function updateCoach($id,Request $request){
      $request->validate([
        'name' => 'required|max:20|min:3|',
        'email'=>'required|email',
        'cin'=>'required|digits:8',
        'phone' => 'required|digits:8',
        'club_id' => 'required',  
      ],[
      'name.required' => 'le champs nom et prennom est obligatoir',
      'email.required'=>"le champs email est obligatoir ",
      'cin.required' => 'le champs cin est obligatoir',
      'phone.required'=>"le champs télèphone est obligatoir",
      'club_id.required'=>"le champs club est obligatoir",
      ]);  
      $user = User::where('id', $id)->first();
      if($user){
        $user->name=$request->name;
        $user->email=$request->email;
        $user->cin= $request->cin;
        $user->phone = $request->phone;
        $user->club_id =$request->club_id;
        $user->date_birth = is_null($request->date_birth) ? $user->date_birth : $request->date_birth;
        $user->adresse = is_null($request->adresse) ? $user->adresse : $request->adresse;
        $user->gender = is_null($request->gender) ? $user->gender : $request->gender;
        $user->save();
        return redirect( '/admin/coachs' )->with( 'success', 'Coach mise à jour avec succès' );
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
      $coachs = User::whereHas(
        'roles', function($q){
            $q->where('id', 1);
      })->get();
      $supercoachs = User::whereHas('roles', function($query){
          $query->where('id', 4);
      })->get();
      $datas= $coachs->concat($supercoachs);               
     foreach($datas as $data)
      {
        $role = $data->roles()->first();
        $data->role=$role->name;
      }
      return view('admin.coachs.coachs', ['coachs' => $datas]);  
    } 
   
    public function changeToSupCoach($id){
      try {
        $user = User::findOrFail($id);
      } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'User not found.'
        ], 403);
      }
      if($user){
        $user->roles()->sync(4);
        return redirect( '/admin/coachs' )->with( 'success', 'Coach mise à jour avec succès' );
      }
    }
   
    public function listCoachAffect(){
      $coachs = User::whereHas(
        'roles', function($q){
            $q->where('name', 'coach');
        }
      )->get();
      return view('admin.affectCoach', ['coachs' => $coachs]);  
    } 
    public function coachToAffect($id, Request $request){
      $user= User::where('id', $id)->first();
      $clubs= Club::all();
      return view('admin.clubCoach', ['user' => $user,'clubs' => $clubs]);  
    } 
    public function coachAffect($id, Request $request){
      $user= User::where('id', $id)->first();
      $user->club_id= $request->club_id;
      $user->update();
      return redirect( 'admin/coachs/affected' )->with( 'success', 'Opétration effectuée avec succès.' );
    } 
    public function activeCompet($id, Request $request)
    {   
      if(User::where('id', $id)->exists())
      {   
          try {
             $user = User::findOrFail($id);
              if($user->is_active == 1)
              {$user->is_active = 0;
               $user->save();}
              else 
              {$user->is_active = 1;
               $user->save();}
               return redirect( '/admin/coachs' )->with( 'success', 'Coach statut est mise à jour avec succès' );
            } catch (ModelNotFoundException $e) {
                $message= 'Aucun utilisateur trouver';
                return redirect( '/admin/coachs' )->with( 'fail', 'Aucun utilisateur trouver' );
            }  
      }
      else{
        return redirect( '/admin/coachs' )->with( 'fail', 'Aucun utilisateur trouver' );
      }  
    }
  
    public function listeCompet(Request $request)
    {       
      $competition= Competition::orderBy('created_at', 'desc')->get();
      return response()->json($competition,200);
             
    }
    
   
 
//gestion Adhéents
  public function createAdh(Request $request)
  {   
       $request->validate([
            'firstname' => 'required|max:20|min:3|',
            'lastname' => 'required|max:20|min:3|',
            'email'=>'required|email|unique:users,email',
            'cin'=>'required|digits:8',
            'phone' => 'required|digits:8',
            'club_id' => 'required',  
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6|same:password',
            
        ],[
          'firstname.required' => 'le champs nom est obligatoir',
          'lastname.required' => 'le champs prénom est obligatoir',
          'email.exists'=>"cette emaile existe dans le tabel utilisateure",
          'email.required'=>"le champs email est obligatoir ",
          'cin.required' => 'le champs cin est obligatoir',
          'phone.required'=>"le champs télèphone est obligatoir",
          'club_id.required'=>"le champs club est obligatoir",
          'password.required'=>"le champs mot de passe est obligatoir",
          'cpassword.required'=>"le champs confirmer mot de passe est obligatoir",
          'cpassword.same'=>"non concordance des mots de passe",
          ]);  
          $club=Club::where('id', $request->club_id)->first();
          $ad = User::whereHas(
            'roles', function($q){
                $q->where('name', 'adherent');
            }
          )->orderBy('id', 'DESC')->first();
          if($ad!= null)
          {
          $uuid=substr($ad->uuid,5);
          if($uuid[0]!="0")
          {$new=(int)$uuid + 1 ;}
          else{
              if($uuid[1]!="0")
              {$uuid=$uuid[1] . $uuid[2] .$uuid[3];
               $new=(int)$uuid + 1;
              }
              else if($uuid[2]!="0")
              {$uuid=$uuid[2] . $uuid[2];
               $new=(int)$uuid + 1;
              }
              else{
                  $new=(int)$uuid[3]+ 1;
              }
            }
          $s=(string)$new;
          if(strlen($s)== 4)
          {$uuid_new= $club->uuid . $s;}
          elseif(strlen($s)== 3)
          {$uuid_new= $club->uuid . "0" . $s;}
          elseif(strlen($s)== 2)
          {$uuid_new= $club->uuid . "00" . $s;}
          elseif(strlen($s)== 1)
          {$uuid_new= $club->uuid . "000" . $s;}
          }
          else 
          {$uuid_new=$club->uuid . "0001";}
        //
        $role= 'adherent';
        $request['remember_token'] = Str::random(10);
        $user = new User();
        $name=$request->firstname . $request->lastname;
        $user->name=$name;
        $user->uuid=$uuid_new;
        $user->cin=$request->cin;
        $user->password= Hash::make($request['password']);
        $user->phone= $request->phone;
        $user->email = is_null($request->email) ? $user->email : $request->email;
        $user->date_birth = is_null($request->date_birth) ? $user->date_birth : $request->date_birth;
        $user->adresse = is_null($request->adresse) ? $user->adresse : $request->adresse;
        $user->image="/soft/images/user/07.jpg";
        $user->gender=$request->gender;
        $user->club_id=$request->club_id;
        //$user->username = is_null($request->username) ? $user->username : $request->username;
        $user->save();
        $user->roles()->attach(Role::where('name', $role)->first());
        return redirect( '/admin/adherents' )->with( 'success', 'Adhérent créé avec succès' );
      
  }
  public function showAdh(){
      $contries = Contrie::all(); 
      $clubs= Club::all();
      return view('admin.adherents.createAdh', ['contries' => $contries,'clubs' => $clubs]);  
  }
  public function showProfileAdh($id,Request $request){
    $user = User::where('id', $id)->first();
    $clubs= Club::all();
    $contries = Contrie::all(); 
    $club=Club::where('id', $user->club_id)->first();
    /*$user->club=$club->name;*/
    if($user){
     return view('admin.adherents.editAdh', ['user' => $user,'contries' => $contries, 'clubs' => $clubs,'club' => $club]);
    }
  }
  public function updateAdh($id,Request $request){
    $request->validate([
      'name' => 'required|max:20|min:3|',
      'email'=>'required|email',
      'cin'=>'required|digits:8',
      'phone' => 'required|digits:8',
      'club_id' => 'required',  
    ],[
    'name.required' => 'le champs nom et prennom est obligatoir',
    'email.required'=>"le champs email est obligatoir ",
    'cin.required' => 'le champs cin est obligatoir',
    'phone.required'=>"le champs télèphone est obligatoir",
    'club_id.required'=>"le champs club est obligatoir",
    ]);  
    $user = User::where('id', $id)->first();
    if($user){
      $user->name=$request->name;
      $user->email=$request->email;
      $user->cin= $request->cin;
      $user->phone = $request->phone;
      $user->club_id =$request->club_id;
      if($request->date_birth != null)
      $user->date_birth =$request->date_birth;
      if($request->adresse != null)
      $user->adresse = $request->adresse;
      $user->gender = is_null($request->gender) ? $user->gender : $request->gender;
      $user->save();
      return redirect( '/admin/adherents' )->with( 'success', 'Adhérent mise à jour avec succès' );
    }
  }
  public function changeToCoach($id){
    try {
      $user = User::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
          'message' => 'User not found.'
      ], 403);
    }
    if($user){
      $user->roles()->sync(1);
      return redirect( '/admin/coachs' )->with( 'success', 'Adhérent mise à jour avec succès' );
    }
  }
  public function activate($id, Request $request)
  {  
    if(User::where('id', $id)->exists())
    {   
        try {
           $user = User::findOrFail($id);
            if($user->is_active == 1)
            {$user->is_active = 0;
             $user->save();}
            else 
            {$user->is_active = 1;
             $user->save();}
             return redirect( '/admin/adherents' )->with( 'success', 'Adhérent statut est mise à jour avec succès' );
          } catch (ModelNotFoundException $e) {
              $message= 'Aucun utilisateur trouver';
              return redirect( '/admin/adherents' )->with( 'fail', 'Aucun utilisateur trouver' );
          }  
    }
    else{
      return redirect( '/admin/adherents' )->with( 'fail', 'Aucun utilisateur trouver' );
    }  

  }
  public function adminListAdh()
    {   
        //$users = User::all();
        $users = User::whereHas(
          'roles', function($q){
              $q->where('name', 'adherent');
          }
        )->orderBy('id', 'desc')->paginate(8);
        return view('admin.adherents.adherents', ['users' => $users]);
    }
}

