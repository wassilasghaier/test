<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use App\Models\Contrie;
use App\Models\Club;
use App\Models\Deamnde;
use App\Models\adherent;
use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Hash;
use Validator;
use Auth;
class ClubController extends Controller
{
    public function createClub(Request $request)
    {   
        $request->validate([
            'name' => 'required|string',
            'contrie_id' => 'required',
            'description'=> 'required',
            'date_creation'=> 'required',
            'nb_adherent'=> 'required',

         ],[
           'name.required' => 'le champs nom est obligatoir',
          'contrie_id.required' => 'le champs pay est obligatoir',
          'description.required' => 'le champs description est obligatoir',
          'date_creation' => 'le champs date creation est obligatoir',
          'nb_adherent' => 'le champs nombre adherent est obligatoir',
        ]);  
        try {
            if ($image = $request->file('photo') != null) {
            $name = date('YmdHis') . "." .$request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->move('public/images',$name);}
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','Erreur lors de la creation');
        }
        if(strlen((string)$request->contrie_id)>9)  
            {
            $paye=(string)$request->contrie_id;
            } 
        else      
            {
            $paye="0".(string)$request->contrie_id;
            }  
              
        $club = Club::where('contrie_id', $request->contrie_id)->orderBy('id', 'DESC')->first();
        if($club != null)
        {
            $uuid=substr($club->uuid,2);
            if($uuid[0]!="0")
             {$new=(int)$uuid + 1 ;}
            else{
               if($uuid[1]!="0")
               {
                $uuid=$uuid[1] . $uuid[2];
                $new=(int)$uuid + 1;
               }
                else{
                $new=(int)$uuid[2]+ 1;
                }
            }
            $s=(string)$new;
            if(strlen($s)== 3)
            {$uuid_new= $paye . $s;}
            elseif(strlen($s)== 2)
            {$uuid_new= $paye . "0" . $s;}
            elseif(strlen($s)== 1)
            {$uuid_new= $paye . "00" . $s;} 
        } 
        else{ 
         $uuid_new= $paye . "00" . "1";
        }
        $club = new Club();
        $club->uuid = $uuid_new;
        $club-> name = $request->name;
        $club-> description= $request->description;
        if($request->file('photo') != null)
        { $club->photo= $path;}
        $club->date_creation=$request->date_creation;
        if(($request->date_debutmarh != null))
        {$club->date_debutmarh= $request->date_debutmarhe;}
        $club-> nb_adherent =$request->nb_adherent;
        $club-> contrie_id =$request->contrie_id;
        $club->save();
        return redirect( '/admin/clubs' )->with( 'success', 'club créé avec succès' ); 
    }
    public function listeclubs(Request $request)
    {   
        $clubs = Club::orderBy('id', 'desc')->paginate(8); 
        return view('admin.clubs.clubs', ['clubs' => $clubs]); 
    }
    public function clubsbycnt($id,Request $request)
    {   
        $data = Club::where('contrie_id', $id)->get(); 
        return response()->json($data);
    }
    public function createClubBlade(){
      $contries = Contrie::all(); 
      return view('admin.clubs.clubadd', ['contries' => $contries]);
    }
    public function clubEdit($id){
      $club = Club::find($id);
      $contries = Contrie::where('id', '!=' , $club->contrie_id)->get();
      return view('admin.clubs.clubedit', ['club' => $club,'contries' => $contries]);
    }
    public function updateClub(Request $request, $id)
    {   
        $request->validate([
          'name' => 'required|string',
          'contrie_id' => 'required',
          'description'=> 'required',
          'date_creation'=> 'required',
          'nb_adherent'=> 'required',
         ],[
          'name.required' => 'le champs nom est obligatoir',
          'contrie_id.required' => 'le champs pay est obligatoir',
          'description.required' => 'le champs description est obligatoir',
          'date_creation' => 'le champs date creation est obligatoir',
          'nb_adherent' => 'le champs nombre adherent est obligatoir',
         ]); 
        try {
            $club = Club::findOrFail($id);
            if($request->hasfile('photo')){
                $name = date('YmdHis') . "." .$request->file('photo')->getClientOriginalExtension();
                $path = $request->file('photo')->move('public/images',$name);   
                $club->photo=$path;
                $club->update();
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Club not found.'
            ], 403);
        }
        //$club->update($request->all());
          $club->name= $request->name;
          $club->description= $request ->description;
          if(($request->file('photo') != null))
          {$club->photo = $path;}
          $club->date_creation= $request ->date_creation;
          if(($request->date_debutmarh != null))
          {$club->date_debutmarh= $request->date_debutmarhe;}
          $club->nb_adherent= $request->nb_adherent;
          $club->contrie_id= $request->contrie_id;
          $club->update();
          return redirect( 'admin/clubs' )->with( 'success', 'Les informations du club ont été mises à jour avec succès.' );
        //return response()->json(['message'=>'Menu updated successfully.']);
    }
    
    public function deleteClub($id)
    {   
        try {
            $club = Club::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect( 'admin/clubs' )->with( 'danger', "club n'existe pas." );
        }

        $club->delete();
        return redirect( 'admin/clubs' )->with( 'success', 'Club supprimé avec succès.' );

        
    }
    public function affectClubs(Request $request)
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
   
    
    public function coachbyclub($id, Request $request){
        $data=User::whereHas(
           'roles', function($q){
               $q->where('name', 'coach');
           }
         )->where('club_id', $id)->get();
         return response()->json($data, 200);
    }

    public function contrieClub(Request $request){
    $contries = Contrie::join('clubs', 'clubs.contrie_id', 'contries.id')
          ->select('contries.id','contries.name','contries.photo')
          ->distinct()
          ->get();
        return response()->json($contries, 200);
    }
}
