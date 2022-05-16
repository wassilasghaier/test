<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Club;
use App\Models\Menu;
use App\Models\Message;
use App\Models\Reset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\MyTestMail;
use Hash;
use File;
use Validator;
use Auth;


class PassportController extends Controller
{
    public function registerUser(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3|',
            'password' => 'required|min:6',
        ],[
          'name.required' => 'le champs nom est obligatoir',
          'password.required'=>'le champs mot de passe est obligatoir',
          ]);  
          /**Check the validation becomes fails or not
        */
        if ($validator->fails()) {
            /**Return error message
            */
            return response()->json(['error'=> $validator->errors()->all()], 400);
        }
          if($request->email != "" || $request->email != Null) { 
            $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
             $email = User::where('email', $request->email)->first();
              if($email){
                   $message=new Message();
                   $message->message = 'email existe déja';
                 return response()->json($message, 400); 
                 }
               }else{
                   $message=new Message();
                   $message->message = 'veuiller entrer un email valide';

             return response()->json($message, 400);
            }
          }
          if($request->username != "" || $request->username != Null) { 
           $username = User::where('username',$request->username)->first();
           if($username)
           return response()->json(['error' => 'username existe déja'], 400);
           }
        $role= 'utilisateur';
        $request['remember_token'] = Str::random(10);
        $user = new User();
        $user->name=$request->name;
        $user->password= Hash::make($request['password']);
        $user->email = is_null($request->email) ? $user->email : $request->email;
        $user->username = is_null($request->username) ? $user->username : $request->username;
        $user->phone = is_null($request->phone) ? $user->phone : $request->phone;
        $user->image = "/soft/images/user/07.jpg";
        $user->save();
        $user->roles()->attach(Role::where('name', $role)->first());
        $message=new Message();
        $message->message = 'utilisateur créé avec succès';
          /**Return success message
          */
        return response()->json($message, 200);
      
      
    }
    public function registerCoach(Request $request)
    {   
          $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3|',
            'password' => 'required|min:6',
        ],[
          'name.required' => 'le champs nom est obligatoir',
          'password.required'=>'le champs mot de passe est obligatoir',
          ]);  
          /**Check the validation becomes fails or not
        */
        if ($validator->fails()) {
            /**Return error message
            */
            return response()->json(['error'=> $validator->errors()->all()], 400);
        }
          if($request->email != "" || $request->email != Null) { 
            $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
             $email = User::where('email', $request->email)->first();
              if($email){
                 return response()->json(['error' => 'email existe déja'], 400); 
                 }
               }else{
             return response()->json(['error' => 'veuiller entrer un email valide'], 400);
            }
          }
          if($request->username != "" || $request->username != Null) { 
           $username = User::where('username',$request->username)->first();
           if($username)
           return response()->json(['error' => 'username existe déja'], 400);
           }
        $role= 'coach';
        $parent = Auth::user();
        $request['remember_token'] = Str::random(10);
        $now = Carbon::now();
        $date = $now->addDays(15)->format('Y-m-d');
        $user = new User();
        $user->name=$request->name;
        $user->password= Hash::make($request['password']);
        $user->email = is_null($request->email) ? $user->email : $request->email;
        $user->username = is_null($request->username) ? $user->username : $request->username;
        $user->image = "/soft/images/user/09.jpg";
        $user->parent=$parent->id;
        $user->expired=$date;
        $user->save();
        $user->roles()->attach(Role::where('name', $role)->first());
        $message=new Message();
        $message->message = 'utilisateur créé avec succès';
         return response()->json($message, 200);
       }
    public function registerSupAdmin(Request $request)
      {   
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:20|min:3|',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|min:6',
      ]);
         
    /**Check the validation becomes fails or not
    */
    if ($validator->fails()) {
        /**Return error message
        */
        return response()->json(['error'=> $validator->errors()->all()], 422);
    }
    $role= 'superadmin';
    $request['remember_token'] = Str::random(10);
    $user = User::create([
        'name'     => $request['name'],
        'email'    => $request['email'],
        'password' => Hash::make($request['password']),
      ]);
    $user->roles()->attach(Role::where('name', $role)->first());
    $success['message'] = 'user created ssuccesfully';
      /**Return success message with token value
      */
    return response()->json(['success'=>$success], 200);
      }
    
    public function login(Request $request)
    {
         $validator = Validator::make($request->all(), [
          'password' => 'required',
        ]);
       if ($validator->fails()) {
          /**Return error message
          */
          return response()->json([ 'error'=> $validator->errors()], 422);
        }
        if($request->email != "" || $request->email != Null)
       $user = User::where('email', $request->email)->first();
       else 
       $user = User::where('username', $request->username)->first();
  
       if ($user) {
          if (Hash::check($request->password, $user->password)) {
            $results = $user->roles()->first();
            //$role = Role::findOrFail($results->id);
            $role = Role::findOrFail($results->id);
            $permission = $role->menus()->get();
            $userRole = $results->name;
            if ($userRole) {
               $this->scope = $userRole;
            }
           if ($userRole == "utilisateur") {
              $cname="---"; 
              $cid="0";
            }
          else {
               $club= Club::where('id', $user->club_id)->first(); 
               $cname=$club->name;
               $cid=$club->id;
            }		
            $token = $user->createToken($user->name.'-'.now(), [$this->scope]);
            return response()->json([
              'token' => $token->accessToken,
              'user' => $user->name,
              'club'=> $cname,
              'club_id'=> $cid,
              'role' => $userRole,
            ],200);
          } else {
            $message=new Message();
            $message->message = 'le mot de passe est incorrect';
             return response()->json($message, 422);
          }
        } else {
          $message=new Message();
          $message->message = "Utilisateur n'existe pas";
          return response()->json($message, 422);
        }
    }
    
    public function nbOperation()
  {
   //Retrieve the information of the authenticated user
   $user = Auth::user();
   $results = Auth::user()->roles()->first();
   $role = Role::findOrFail($results->id);
   /*if($role->name == 'parent'){
    $enfants = User::where('parent', $user->id)->get();
    $user->enfants= $enfants;
    $user->nombre=count($enfants);
   }*/
   if($role->name == 'enfant'){
    $operations = DB::table('operations')->where('user_id', $user->id)->count();
    $user->operations= $operations;
   /* $parent = User::where('id', $user->parent)->first();
    $user->parent= $parent;*/
   } 
   return response()->json($user, 200);

  }
 
 public function userClub()
  {
   //Retrieve the information of the authenticated user
   $u = Auth::user();
   $results = Auth::user()->roles()->first();
   $role = Role::findOrFail($results->id);
   if($role->name =="adherent"){
   $user= new User();
   $user->id=$u->id;
   $user->uuid=$u->uuid;
   $user->cin= $u->cin; 	   
   $user->name=$u->name;
   $user->email=$u->email;
   $user->phone=$u->phone;
   $user->is_active=$u->is_active; 
   $club= Club::where("id",$u->club_id)->first();
   $user->club_id= $club->name;}
   else {
   $user= new User();
   $user->id=$u->id;
   $user->name=$u->name;
   $user->email=$u->email;
   $user->phone=$u->phone;
   $user->is_active=$u->is_active;
   }
   $clubs= Club::all();	 
   
    return response()->json([
            'user' => $user,
			      'clubs'=> $clubs,
    ], 200);  
  }	
	
	
  public function userInfo()
  {
   //Retrieve the information of the authenticated user
   $user= Auth::user();
   $results = Auth::user()->roles()->first();
   $role = Role::findOrFail($results->id);
   if($user->date_birth == Null)
    {$user->date_birth="---";}
   if($user->adresse == Null)
    {$user->adresse="---";}
   if($role->name =="utilisateur"){
    $user->image="---";
    $user->club_id="---";
    $user->club_name="---";
    $user->uuid="---";
   }
   else {
    $user->image="---";
    $club= Club::where("id",$user->club_id)->first();
    $user->club_id= $club->id;
    $user->club_name=$club->name;
   }
   
   return response()->json($user, 200);  
  }
  public function userMenu(Request $request)
  {
   //Retrieve the information of the authenticated user
   $user = Auth::user();
   $results = Auth::user()->roles()->first();
   $role = Role::findOrFail($results->id);
   $permission = $role->menus()->get();
   // Return user's details
   return response()->json(['menu' =>$permission], 200);  
  }
  
  public function updateUserInfo(Request $request)
  {
   //Retrieve the information of the authenticated user
   $user = Auth::user();
   $user->name=$request->name;  
   $user->email= is_null($request->email) ? $request->email: $request->email; 
   $user->username=is_null($request->username) ? $request->username: $request->username; 
   $user->phone=is_null($request->phone) ? $request->phone: $request->phone;
   $user->date_birth=is_null($request->date_birth) ? $request->date_birth: $request->date_birth; 
   $user->adresse=is_null($request->adresse) ? $request->adresse: $request->adresse; 
   $user->gender=is_null($request->gender) ? $request->gender: $request->gender; 
   $user->update();
   $message= new Message();
   $message->message="votre profile à été modifié avec succès";
   return response()->json($message,200);
  }
  public function deleteUserInfo(Request $request)
  {
    try {
      $id = $request->id;
      $user = User::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
          'message' => 'User not found.'
      ], 403);
    }

  $user->delete();
  return response()->json(['message'=>'utilisateur supprimé avec succès']);
  }

  public function saveImageUser(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'image' => 'required|mimes:jpg,png,jpeg',
      ]);
       
   if ($validator->fails()) {
      /**Return error message
      */
      return response()->json(['error'=> $validator->errors()->all()], 422);
    }
   //Retrieve the information of the authenticated user
   $user = Auth::user();
   if($path = $request->image->store('public/images')){ 
    //store image file into directory and db
    $path = substr($path,7);
    $user->image = $path;
    $user->save();
    } else {
        return response()->json(['invalid file format'], 422);
    }
    return response()->json(['image uploded'], 200);
  }
  public function getImage(Request $request){
    $image=Storage::disk('public')->get($request->image);
    return (new Response($image, 200))
      ->header('Content-Type', 'image/jpeg');
  }
  public function getFile(Request $request){
    $file=Storage::disk('public')->get($request->filename);
   return (new Response($file, 200))
      ->header('Content-Type', 'application/pdf');
  }
  public function logout (Request $request) {
    $token = $request->user()->token();
    $token->revoke();
    $response = ['message' => 'You have been successfully logged out!'];
    return response($response, 200);
}
public function changepwd(Request $request)
    {
      $request->validate([
        'oldpwd' => 'required',
        'newpwd' => 'required|min:5|max:30',
        'confirme' => 'required|min:5|max:30|same:newpwd'
      ],[
      'newpwd.required' => 'le champs nouveau mot de passe est obligatoir',
      'oldpwd.required' => 'le champs ancien mot de passe est obligatoir',
      'confirme.required' => 'le champs confirme mot de passe est obligatoir',
      ]); 
     $admin = Admin::where('id','1')->first();
     if ($admin) {
        if (Hash::check($request->oldpwd, $admin->password)) {
            $admin->password= Hash::make($request->newpwd);
             $admin->save();
            return redirect( 'admin/setting' )->with('success','mot de passe changer avec succes' );
        } else {
           return redirect( 'admin/setting' )->with('danger','mot de passe incorrect' );
        }
      } else {
        return redirect( 'admin/setting' )->with('danger',"utilisateur n'existe pas" );
      }
    }
 //
 public function updatepwd(Request $request)
    {
      $request->validate([
        'newpwd' => 'required|min:5|max:30',
      ],[
      'newpwd.required' => 'le champs nouveau mot de passe est obligatoir',
      ]); 
      $user = Auth::user();
	  $message= new Message();
     if ($user) {
            $user->password= Hash::make($request->newpwd);
            $user->save();
		    $message->message="votre mot de passe à été changé avec succès";
            return response()->json($message, 200);
        
      } else {
		  $message->message="utilisateur n'existe pas";
		  return response()->json($message, 400);
      }
  }
    function codeReset(Request $request){
      //Validate Inputs
     $request->validate([
          'email'=>'required|email',
        ],[
        'email.required'=>"le champs email est obligatoir ",
      ]);
      $code= Str::random(12);
      $user= User::where('email',$request->email)->first();
      if(!empty($user))
      {
          $reset= new Reset();
          $reset->email=$user->email;
          $reset->code=$code;
          $welcome= "Bienvenue à Kolnanemchiw ,afin de pouvoir récupérer votre compte , veuillez entrer ce code de récupération temporaire au niveau de votre application mobile et passer par la suite au changement de votre mot de passe :";
          $details = [
            'title' => "Mail de récupération du Compte",
            'body' => $welcome,
			'code' => $code,
			'fin'=>"Entrez ce code dans les 120 secondes pour réinitialiser votre mot de passe."
          ];
          Mail::to($user->email)->send(new MyTestMail($details));
          
          $reset->save();
          $message=new Message();
		  $message->message="veuillez vérifier votre messagerie un code à étè envoyé à votre adresse e-mail";
          return response()->json($message, 200);
      }
      else{
         $message=new Message();
		     $message->message="utilisateur n'existe pas";
        return response()->json($message, 422);
      }
    }
    public function mResetPassword(Request $request){
      $request->validate([
          'email'=>'required',
          'code'=>'required',
        ]);
      
      $reset = Reset::where('email', $request->email)->latest()->first();
      $code=  $reset->code;
      $date= $reset->created_at;
      if ($code == $request->code){
        $old = new Carbon($date);
        $now = Carbon::now();
        $diff = $now->timestamp - $old->timestamp;
        if($diff < 170) {
          $user= User::where('email', $reset->email)->first();
          if (!empty($user))
          {  
             $reset->delete();
            $results = $user->roles()->first();
            $role = Role::findOrFail($results->id);
            $permission = $role->menus()->get();
            $userRole = $results->name;
            if ($userRole) {
              $this->scope = $userRole;
            }
            $token = $user->createToken($user->name.'-'.now(), [$this->scope]);
            $reset->delete();
            return response()->json([
                      'token' => $token->accessToken,
                      'user' => $user->name,
                      'role' => $userRole,
                    ],200);
          }
          else {
            $reset->delete();
            return response()->json(['message'=>"utilisateur n'existe pas"],400);
          }        
  
        } 
        else{
          $reset->delete();
          return response()->json(['message'=>"le code est expires"],422);
        }
      }
      else {
          return response()->json(['message'=>"le code n'est pas correct"],400);
      }
    }

}
