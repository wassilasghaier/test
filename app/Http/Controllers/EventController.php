<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use App\Models\Contrie;
use App\Models\Club;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use Hash;
use Validator;
use Auth;
class EventController extends Controller
{
   
    public function createEventBlade(){
    $categories = Categorie::all(); 
    $contries = Contrie::all(); 
    return view('admin.events.eventadd', ['categories' => $categories,'contries' => $contries]);
    }
    public function createEvent(Request $request)
    {   
        $request->validate([
           'name' => 'required|string',
           'categorie_id'=> 'required',
           'contrie_id' => 'required',
           'niveau'=> 'required',
           'description'=> 'required',
           'date'=> 'required',
           'time'=> 'required',
           'place'=> 'required',
           'lat'=> 'required',
           'lang'=> 'required',
           'kilometrage'=> 'required',
           'image'=> 'required|mimes:jpg,png,jpeg'
        ],[
        'name.required' => 'le champs nom est obligatoir',
        'name.string' => 'le champs nom doit contenire seulement des lettres',
        'contrie_id.required' => 'le champs pay est obligatoir',
        'niveau' => 'le champs niveau est obligatoir',
        'description.required' => 'le champs description est obligatoir',
        'date.required' => 'le champs date est obligatoir',
        'time.required' => 'le champs heure est obligatoir',
        'place.required' => 'le champs endroit est obligatoir',
        'lat.required' => 'le champs latitude est obligatoir',
        'lang.required' => 'le champs langitude est obligatoir',
        'kilometrage.required' => 'le champs kilométrage est obligatoir',
        'image.required' => 'le champs image est obligatoir',
        ]);
        
        try {
          if ($image = $request->file('image')) {
          $name = date('YmdHis') . "." .$request->file('image')->getClientOriginalExtension();
          $path = $request->file('image')->move('public/images',$name);}
        } catch (\Throwable $th) {
          return redirect()->back()->with('fail','Erreur lors de la creation');
        }
        if(($request->club_id != null) &&($request->user_id !=null)) {  
        $event = Event::create([
          'name'=> $request['name'],
          'description'=> $request ['description'],
          'image' => $path,
          'place'=> $request ['place'],
          'lang'=> $request ['lang'],
          'lat'=> $request ['lat'],
          'date'=> $request ['date'],
          'time'=> $request ['time'],
          'kilometrage'=> $request ['kilometrage'],
          'nivau'=> $request ['niveau'],
          'club_id'=> $request ['club_id'],
          'categorie_id'=> $request ['categorie_id'],
          'user_id'=> $request ['user_id'],
        ]);
        }
        else{  
          $event = Event::create([
            'name'     => $request['name'],
            'description'=> $request ['description'],
            'image' => $path,
            'place'=> $request ['place'],
            'lang'=> $request ['lang'],
            'lat'=> $request ['lat'],
            'date'=> $request ['date'],
            'time'=> $request ['time'],
            'kilometrage'=> $request ['kilometrage'],
            'nivau'=> $request ['niveau'],
            'categorie_id'=> $request ['categorie_id'],
          ]);}
        return redirect( '/admin/events' )->with( 'success', 'évenement créé avec succès' ); 
        
    }
    public function listeEvents(Request $request)
    {   
        $events = Event::all(); 
        return view('admin.events.events', ['events' => $events]); 
    }
    public function clubs($id,Request $request){
      $club = Club::where('contrie_id',$id)->get();
      return view('admin.clubedit', ['club' => $club,'contries' => $contries]);
    }
  public function eventEdit($id){
    $event = Event::where('id',$id)->first();
    $categories = Categorie::all();
    if($event->club_id!=null){
    $club=Club::where('id',$event->club_id)->first();
    $contrie = Contrie::where('id', $club->contrie_id)->first(); 
    }
    $contries = Contrie::all();
    return view('admin.events.eventedit', ['event' => $event,'categories' => $categories,'contries' => $contries]);
  }
    public function updateEvent(Request $request, $id)
    {   
        $request->validate([
          'name' => 'required|string',
          'categorie_id'=> 'required',
          'niveau'=> 'required',
          'description'=> 'required',
          'date'=> 'required',
          'time'=> 'required',
          'place'=> 'required',
          'lat'=> 'required',
          'lang'=> 'required',
          'kilometrage'=> 'required',
          'imageUpdate'=> 'required'
       ],[
       'name.required' => 'le champs nom est obligatoir',
       'name.string' => 'le champs nom doit contenire seulement des lettres',
       'niveau' => 'le champs niveau est obligatoir',
       'description.required' => 'le champs description est obligatoir',
       'date.required' => 'le champs date est obligatoir',
       'time.required' => 'le champs heure est obligatoir',
       'place.required' => 'le champs endroit est obligatoir',
       'lat.required' => 'le champs latitude est obligatoir',
       'lang.required' => 'le champs langitude est obligatoir',
       'kilometrage' => 'le champs kilométrage est obligatoir',
       'imageUpdate.required' => 'le champs image est obligatoir',
       ]);
       try {
        $event = Event::findOrFail($id);
        } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'event not found.'
        ], 403);
        }
       try {
         if ($request->file('image') != null) {
         $name = date('YmdHis') . "." .$request->file('image')->getClientOriginalExtension();
         $path = $request->file('image')->move('public/images',$name);}
       } catch (\Throwable $th) {
         return redirect()->back()->with('fail','Erreur lors de la creation');
       }
       if(($request->club_id != null) &&($request->user_id !=null)) {  
        $event->name= $request->name;
        $event->description= $request->description;
        if(($request->file('image') != null))
        {$event->image = $path;}
        $event->place= $request->place;
        $event->lang =$request->lang;
        $event->lat = $request->lat;
        $event-> date= $request->date;
        $event-> time= $request->time;
        $event->kilometrage= $request->kilometrage;
        $event->nivau= $request->niveau;
        $event-> club_id= $request->club_id;
        $event-> categorie_id= $request->categorie_id;
        $event-> user_id= $request->user_id;
        $event->save();
       }
       else{  
        $event->name= $request->name;
        $event->description= $request->description;
        if(($request->file('image') != null))
        { 
          $event->image = $path;
        }
          $event->place= $request->place;
          $event->lang =$request->lang;
          $event->lat = $request->lat;
          $event-> date= $request->date;
          $event-> time= $request->time;
          $event->kilometrage= $request->kilometrage;
          $event->nivau= $request->niveau;
          $event-> categorie_id= $request->categorie_id;
          $event->save();
        }
        
        return redirect( 'admin/events' )->with( 'success', "Les informations de l'evenement ont été mises à jour avec succès." );
        //return response()->json(['message'=>'Menu updated successfully.']);
    }
    
    public function deleteEvent($id)
    {   
        try {
          $event = Event::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect( 'admin/events' )->with( 'danger', "évènement n'existe pas." );
        }

        $event->delete();
        return redirect( 'admin/events' )->with( 'success', 'évènement supprimé avec succès.' );

        
    }
    public function participer(Request $request)
    {   
        try {
          $user = Auth::user();
          $event = Event::findOrFail($request->id);
          $message= new Message();
        } catch (ModelNotFoundException $e) {
            $message->message="évènement n'existe pas.";
            return response()->json($message, 400);
        }
        $data = DB::table('event_user')
        ->where('event_id', 100)
        ->where('user_id', 50)
        ->first();
        if($data == null)
        {  
          $event->users()->attach($user->id);
        }
        else
        {  
          $event->users()->sync($user->id);
        }
        $message->message="opération effectuée avec succès.";
        return response()->json($message, 200);
        
    }
    public function apsent(Request $request)
    {   
      try {
        $user = Event::findOrFail($request->user_id);
        $event = Event::findOrFail($request->evt_id);
        $message= new Message();
      } catch (ModelNotFoundException $e) {
          $message->message="évènement n'existe pas.";
          return response()->json($message, 400);
      }
      $event->users()->detach($user->id);
      $message->message="opération effectuée avec succès.";
      return response()->json($message, 200);
    }
    
    public function myList(Request $request)
    {   
        try {
          $user = Auth::user();
		      $id= $user->id;
        } catch (ModelNotFoundException $e) {
		     	$message =new Message();
            $message->message="user n'existe pas.";
            return response()->json($message, 400);
        }
	       	$events= $user->events()->get();
           foreach($events as $event)
			    {     
            if($event->club_id == Null) { 
              $event->clubname = '---';
            }
            else { 
              $cc=Club::select('name')->where('id',$event->club_id)->first();
              $event->clubname = $cc->name;
            }
            if($event->user_id == Null){ 
               $event->coach= "---"; 
               $event->user_id= "---";   
            }
            else {
             $coach=User::select('name')->where('id',$event->user_id)->first();
             $event->coach=$coach->name;
            } 
          }
        return response()->json($events, 200);
        
    }
    public function events(Request $request)
    {   
      try {
          $user = Auth::user();
          $results = Auth::user()->roles()->first();
          $role = Role::findOrFail($results->id);
          if($role->name == 'utilisateur')
          {
            $club = Event::where('date', '>=', date("Y-m-d"))->whereNotNull('club_id')->get();
			        foreach($club as $c)
			        {
				         $cc=Club::select('name')->where('id',$c->club_id)->first();
                 $c->clubname = $cc->name;
                 $coach=User::select('name')->where('id',$c->user_id)->first();
                  if($coach != null)
                 $c->coach=$coach->name;
                  else
                 $c->coach="---";
              }
            $excursion= Event::select('id','name','description','image','place','lang','lat','date','time','kilometrage','nivau','participants','categorie_id')->where('date', '>=', date("Y-m-d"))->where('categorie_id',2)->get();
			        foreach($excursion as $c)
			        {
                 $c->clubname = "---";
                 $c->coach= "---";
              }
            $weekend= Event::select('id','name','description','image','place','lang','lat','date','time','kilometrage','nivau','participants','categorie_id')->where('date', '>=', date("Y-m-d"))->where('categorie_id',3)->get();
			        foreach($weekend as $c)
			        {
                 $c->clubname = "---";
                 $c->coach= "---";
              }
            return response()->json([
              'club' => $club,
              'excursion' => $excursion,
              'weekend' => $weekend,
            ], 200);
          }
          else {
            $club = Event::where('club_id',$user->club_id)->where('date', '>=', date("Y-m-d"))->get();
			      foreach($club as $c)
			      {
                 $cc=Club::select('name')->where('id',$c->club_id)->first();
                 $c->clubname = $cc->name;
                 $coach=User::select('name')->where('id',$c->user_id)->first();
                  if($coach != null)
                 $c->coach=$coach->name;
                  else
                 $c->coach="---";
            }
            if($club == null){
               $club = Event::where('date', '>=', date("Y-m-d"))->whereNotNull('club_id')->get();
				      foreach($club as $c)
			        {
                 $cc=Club::select('name')->where('id',$c->club_id)->first();
                 $c->clubname = $cc->name;
                 $coach=User::select('name')->where('id',$c->user_id)->first();
                 if($coach != null)
                 $c->coach=$coach->name;
                  else
                 $c->coach="---";
                 $c->coach=$coach->name;
              }
            }
            $excursion= Event::select('id','name','description','image','place','lang','lat','date','time','kilometrage','nivau','participants','categorie_id')->where('date', '>=', date("Y-m-d"))->where('categorie_id',2)->get();
			      foreach($excursion as $c)
			      {
              $c->clubname = "---";
              $c->coach= "---";
            }
            $weekend= Event::select('id','name','description','image','place','lang','lat','date','time','kilometrage','nivau','participants','categorie_id')->where('date', '>=', date("Y-m-d"))->where('categorie_id',3)->get();
			      foreach($weekend as $c)
			      {
              $c->clubname = "---";
              $c->coach= "---";
            }
            return response()->json([
              'club' => $club,
              'excursion' => $excursion,
              'weekend' => $weekend,
            ], 200);
          }   
      } catch (ModelNotFoundException $e) {
            $message= new Message();
            $message->message="évènement n'existe pas.";
            return response()->json($message, 400);
      } 
    }
    public function createEvt(Request $request)
    {   
          $validator = Validator::make($request->all(), [
           'name' => 'required|string',
           'club_id' => 'required',
           'description'=> 'required',
           'date'=> 'required',
           'time'=> 'required',
           'place'=> 'required',
           'lat'=> 'required',
           'lang'=> 'required',
           'kilometrage'=> 'required',
          ]);  
          if ($validator->fails()) {
            /**Return error message
            */
            return response()->json(['error'=> $validator->errors()->all()], 400);
          }
        $user = Auth::user();
        if(($request->club_id != null)) {  
          try {
            $club = Club::findOrFail($request->club_id);
          } catch (ModelNotFoundException $e) {
            $message= new Message();
            $message->message="club'existe pas.";
            return response()->json($message, 400);
          }
        $event = Event::create([
          'name'=> $request['name'],
          'description'=> $request ['description'],
          'place'=> $request ['place'],
          'lang'=> $request->lang,
          'lat'=> $request->lat,
          'date'=> $request ['date'],
          'time'=> $request ['time'],
          'kilometrage'=> $request ['kilometrage'],
          'club_id'=> $request ['club_id'],
          'categorie_id'=> 1,
          'user_id'=> $user->id,
        ]);
        $event->lang=$request->lang;
        $event->lat=$request->lat;
        $event->nivau="débutant";
        $event->image="public/images/20220107205414.jpeg";
        $event->save();
        $message= new Message();
        $message->message="évenement créé avec succès";
        return response()->json($message, 201);
        }
        else{ 
          $message= new Message();
          $message->message="une error c'est produit!";
          return response()->json($message, 400);
        }   
    }
    public function coachEvt(Request $request)
    {
      $user = Auth::user();
      $events = Event::where('user_id',$user->id)->get();
      return response()->json($events, 200);
    }
    
   
   
}
           