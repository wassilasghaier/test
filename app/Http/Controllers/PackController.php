<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Pack;
use App\Models\Paiment;
use App\Models\Message;
use App\Models\User;
use Hash;
use Validator;
use Auth;

class PackController extends Controller
{

    public function formCreate(Request $request)
    {   
       return view('admin.packadd');
    }
    public function formEdit($id){
        $pack = Pack::find($id);
        return view('admin.packedit', ['pack' => $pack]);
      }
    public function create(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'period' => 'required',
            'price' => 'required',
        ]);        
        //Check the validation becomes fails or not
        if ($validator->fails()) {
            //Return error message
            return response()->json(['danger'=> $validator->errors()->all()], 422);
        }
        $pack = Pack::create([
            'name'     => $request['name'],
            'period'    => $request['period'],
            'color'    => 'green',
            'price' => $request['price'],

          ]);
          //Return success message
          return redirect( 'admin/packs' )->with( 'success', 'pack est créer avec succès' );
      
    }
    public function listepacks(Request $request)
    {   
        $packs = Pack::all(); 
        return view('admin.pack')->with('packs', $packs);    
        //return response()->json(['menu' =>$permission], 200); 
    }
    public function listepackApi(Request $request)
    {   
        $packs = Pack::all();    
        return response()->json(['packs' =>$packs], 200); 
    }
    public function demandepack(Request $request)
    {   
         $user = Auth::user();
        //$user = User::where('id',$request->id_user)->first();
        $id_pack = $request->id_pack;
        $pack = Pack::where('id',$id_pack)->first();
        $msg =  $this->paiment($user->id,$id_pack);
        if($msg == 0 || $msg == 1 || $msg == 2){  
            $message=new Message(); 
            switch ($msg) {
                case 0:
                    $message->message = "Demande d'abonement déja existant";  
                    return response()->json(['message' =>$message], 422);
                    break;
                case 1:
                    $message->message = 'utilisateur déja abonner';  
                    return response()->json(['message' =>$message], 422);
                    break;

                case 2:
                    $message->message = "pack n'existe pas";  
                    return response()->json(['message' =>$message], 422);
                    break;
            }
        }
        $count=0;
        $enfants =[];
        $enfants= User::where('parent', $user->id)->get();
        $count= count($enfants);
        if($count > 0) { 
          if(($count == 1) && ($id_pack==1)) {  
            foreach($enfants as $enfant){ 
                $enfant->pack_id= $id_pack;
                //$old = new Carbon($date);
                $now = Carbon::now();
                $date = $now->addDays($pack->period)->format('Y-m-d');
                //return response()->json(['date' =>$date], 200);
                $enfant->expired=$date;
                $enfant->update(); 
                
            }
            $user->pack_id= $id_pack;
            $user->expired=$date;
            $user->update();
            $pack= $user->pack()->first();
            $user->packname= $pack->name;
            return response()->json(['user' =>$user], 200);
          }
          else if(($count == 2) && ($id_pack==2)){  
            foreach($enfants as $enfant){ 
                $enfant->pack_id= $id_pack;
                //$old = new Carbon($date);
                $now = Carbon::now();
                $date = $now->addDays($pack->period)->format('Y-m-d');
                //return response()->json(['date' =>$date], 200);
                $enfant->expired=$date;
                $enfant->update(); 
                
            }
            $user->pack_id= $id_pack;
            $user->expired=$date;
            $user->update();
            $pack= $user->pack()->first();
            $user->packname= $pack->name;
            return response()->json(['user' =>$user], 200);
          }
          else if(($count > 2 && $count < 6 ) && ($id_pack==3)){  
                foreach($enfants as $enfant){ 
                    $enfant->pack_id= $id_pack;
                    //$old = new Carbon($date);
                    $now = Carbon::now();
                    $date = $now->addDays($pack->period)->format('Y-m-d');
                    //return response()->json(['date' =>$date], 200);
                    $enfant->expired=$date;
                    $enfant->update(); 
                    
                }
                $user->pack_id= $id_pack;
                $user->expired=$date;
                $user->update();
                $pack= $user->pack()->first();
                $user->packname= $pack->name;
                return response()->json(['user' =>$user], 200);
            }
           else{
              $message= new Message();
              $message->message= 'Le nombre de tes enfants ne convient pas au nombre des enfant dans le pack choisie';
              return response()->json(['message' =>$message], 422); 
            }  
          }
        else{
            $message= new Message();
            $message->message= "vous n'avez pase encore des enfants";
            return response()->json(['message' =>$message], 422); 
          }  
        
    }
    public function update(Request $request, $id)
    {    
        if(Pack::where('id', $id)->exists())
        {
        try {
            $pack = Pack::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect( 'admin/packs' )->with( 'error', "pack n'exicte pas" );
        }

        $pack->update($request->all());

        return redirect( 'admin/packs' )->with( 'success', 'pack est mise à jor avec succès' );
       }
    }
    public function delete($id)
    {   
        try {
            $pack= Pack::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'pack not found.'
            ], 403);
        }
        $pack->delete();
        return redirect( 'admin/packs' )->with( 'success', 'pack est supprimer avec succès' );
    }
    public function paimentDemand ()
    {    
        $paiments = Paiment::where('statut',  1)->get();
        return view('admin.demandep')->with('paiments', $paiments); 
    }
    public function paimentPaied ()
    {    
        $paiments = Paiment::where('statut',  2)->get();
        return view('admin.paiment')->with('paiments', $paiments); 
      
    }
    public function paimentValid ($id)
    {    
        try {
            $now = Carbon::now();
            $paiment = Paiment::findOrFail($id);
            $pack=Pack::where('id',$paiment->pack_id)->first();
             $date = $now->addDays($pack->period)->format('Y-m-d');
             $paiment->statut=2;
             $paiment->expired= $date;
             $paiment->update();
             $user= User::where('id', $paiment->user_id)->first();
             $user->expired= $date;
             $user->is_active=1;
             $user->update();
            $enfants = User::where('parent', $user->id)->get();
            foreach($enfants as $enfant)
            { 
              $enfant->expired= $now;
              $enfant->is_active=1;
             $enfant->update();
            }
        } catch (ModelNotFoundException $e) {
        
          $message->message = "pack n'existe pas";  
          return redirect( '/admin/demandes' )->with( 'danger', 'paiment code nest pas valide' );   
        }
       return redirect( '/admin/demandes' )->with( 'success', 'paiement est valider avec succes' );   
      
    }
    public function paiment($user_id,$pack_id)
    {    
        $now = Carbon::now();
        if(Paiment::where('user_id', $user_id)
           ->where('pack_id', $pack_id)
           ->where('statut',  1)
           ->whereDate('expired', '>=', $now)
           ->exists())
        {
         
          return $value=0;
        }
        else if(Paiment::where('user_id', $user_id)
           ->where('pack_id', $pack_id)
           ->where('statut',  2)
           ->whereDate('expired', '>=', $now)
           ->exists())
        {
         
          return $value=1;
        }
        else {
            $message=new Message();
        try {
            $pack = Pack::findOrFail($pack_id);
            $date = $now->addDays($pack->period)->format('Y-m-d');
            $code=Str::random(6);
            $paiment = new paiment();
            $paiment->user_id=$user_id;
            $paiment->pack_id=$pack_id;
            $paiment->statut=1;
            $paiment->code=$code;
            $paiment->expired= $date;
            $paiment->save();
           
        } catch (ModelNotFoundException $e) {
        
          $message->message = "pack n'existe pas";  
          return $value=2; 
        }
        $message->message = "abonement est créé avec succes";  
        return $value=3; 
        }

    }
    public function nbChiled($id)
    {  
         //Retrieve the information of the authenticated user
       
         return $count;  
        
    }
   
}
