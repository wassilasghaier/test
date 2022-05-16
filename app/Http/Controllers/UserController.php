<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Menu;
use App\Models\User;
use App\Models\Club;
use App\Models\Contrie;
use App\Models\Deamnde;
use App\Models\adherent;
use App\Models\Message;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Hash;
use Validator;
use Auth;
class UserController extends Controller
{
    public function coachbyclub($id, Request $request){
     $data=User::whereHas(
        'roles', function($q){
            $q->where('name', 'coach');
        }
      )->where('club_id', $id)->get();
      return response()->json($data);
    }

    public function addDemande(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:20|min:3|',
            'lastname' => 'required|max:20|min:3|',
            'email'=>'required|email',
            'cin'=>'required|digits:8',
            'phone' => 'required|digits:8',
            'club_id' => 'required',
          ],[
            'firstname.required' => 'le champs nom est obligatoir',
            'lastname.required' => 'le champs prénom est obligatoir',
            'email.exists'=>"cette emaile existe dans le tabel utilisateure",
            'email.required'=>"le champs email est obligatoir ",
            'cin.required' => 'le champs cin est obligatoir',
            'phone.required'=>"le champs télèphone est obligatoir",
            'club_id.required'=>"le champs mot de passe est obligatoir",
        ]);  
          /**Check the validation becomes fails or not
           */
        if ($validator->fails()) {
            /**Return error message
            */
            return response()->json(['error'=> $validator->errors()->all()], 400);
        } 
        $email = adherent::where('email', $request->email)->first();
        if($email){
            $message=new Message();
            $message->message = 'demande existe déja';
            return response()->json($message, 400); 
        }
        else{
            $user= Auth::user();
            $demande= new adherent();
            $demande->user_id=$user->id;
            $demande->firstname=$request->firstname;
            $demande->lastname=$request->lastname;
            $demande->uuid=is_null($request->uuid) ? $demande->uuid : $request->uuid;
            $demande->cin=$request->cin;
            $demande->phone= $request->phone;
            $demande->email = is_null($request->email) ? $demande->email : $request->email;
            $demande->club_id=$request->club_id;
            $demande->save();
            $message=new Message();
            $message->message="votre demande créé avec succès";
            return response($message, 200); 
        }
    }
    public function listedemandes(Request $request)
    {   
        $demandes = adherent::where('is_accepted','1')->get(); 
        return view('admin.demandes', ['demandes' => $demandes]); 
    }

    public function acceptDemande($id, Request $request){   
        $demande = adherent::where('id',$id)->first();  
        $demande->is_accepted=2;
        $demande->save();
        $user=User::where('id',$demande->user_id)->first();
        $user->club_id=$demande->club_id;
        if($demande->uuid != null)
        $user->uuid=$demande->uuid;
        else
        { 
         $club=Club::where('id', $demande->club_id)->first();
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
        
          $user->uuid=$uuid_new;
        }
        $role= 'adherent';
        $user->roles()->sync(Role::where('name', $role)->first());
        $user->save();
        return redirect( '/admin/adherents' )->with( 'success', 'demande acceptée avec succès' ); 
    }
    
}
