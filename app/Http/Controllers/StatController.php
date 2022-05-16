<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Contrie;
use App\Models\Club;
use App\Models\adherent;
use App\Models\Event;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Hash;
use Validator;
use Auth;
class StatController extends Controller
{

    public function nbAdherentByclub($id){
        /*$clubs = Club::join('users', 'users.club_id', 'clubs.id')
        ->select([
       'clubs.name', 
        DB::raw('(SELECT COUNT(*) FROM users WHERE users.club_id = clubs.id) as nbAdh')
        ])->groupBy('clubs.id')->get();*/
        $clubs = Club::where('contrie_id',$id)
         ->join('users', function($join) use($id){
           $join->on('users.club_id','=','clubs.id');
            
         })->select([
            'clubs.name', 
             DB::raw('(SELECT COUNT(*) FROM users WHERE users.club_id = clubs.id) as nbAdh')
             ])->groupBy('clubs.id')->get();
        $users =array();
        $c = array();
        $i= 0;
        foreach ($clubs as $club){
        $users[$i] = $club->nbAdh;
        $c[$i]=$club->name;
        $i++;
        }
        return $users; 
         

         
    }

    public function nbMarcheByclub($id){
       /* $evts = Club::join('events', 'events.club_id', 'clubs.id')
        ->select([
       'clubs.name', 
        DB::raw('(SELECT COUNT(*) FROM events WHERE events.club_id = clubs.id) as nbevt')
        ])->groupBy('clubs.id')->get();*/
        //return response()->json($events, 200);
        $evts = Club::where('contrie_id',$id)
        ->join('events', function($join) use($id){
          $join->on('events.club_id','=','clubs.id');      
        })->select([
           'clubs.name', 
            DB::raw('(SELECT COUNT(*) FROM events WHERE events.club_id = clubs.id) as nbevt')
            ])->groupBy('clubs.id')->get();
        $events =array();
        $c = array();
        $i= 0;
        foreach ($evts as $evt){
        $events[$i] = $evt->nbevt;
        $c[$i]=$evt->name;
        $i++;
        }
        return $events;
    }
    public function nbKlByclub($id){
         /* $kls = Club::join('events', 'events.club_id', 'clubs.id')
          ->select('clubs.name', DB::raw('SUM(events.kilometrage) As kilometrages'))
          ->groupBy('clubs.id')
          ->get();*/
          //return response()->json($kls, 200);
          $kls = Club::where('contrie_id',$id)
         ->join('events', function($join) use($id){
           $join->on('events.club_id','=','clubs.id');
            
         })->select('clubs.name', DB::raw('SUM(events.kilometrage) As kilometrages'))
         ->groupBy('clubs.id')->get();
          $kilometrages =array();
          $c = array();
          $i= 0;
          foreach ($kls as $kl){
          $kilometrages[$i] = $kl->kilometrages;
          $c[$i]=$kl->name;
          $i++;
          }
          return $kilometrages;
          /*return response()->json([
              'three' => $c,
              'kilometrages' => $kilometrages,
            ], 200);  */         
    }
    public function nbgenderUser(Request $request){
        $q = User::select('gender', DB::raw('count(*) as total'))
        ->groupBy('gender')
        ->get();
        return response()->json($q, 200);
    }
    public function nbgendeByclub($id, Request $request){
        $contries = Contrie::join('clubs', 'clubs.contrie_id', 'contries.id')
          ->select('contries.id','contries.name','contries.photo')
          ->distinct()
          ->get();
        $pays=Contrie::where('id',$id)->select('name')->first();
        $users=$this->nbAdherentByclub($id);
        $events=$this->nbMarcheByclub($id);
        $kilometrages=$this->nbKlByclub($id);
        $homme = array();
        $femme = array();
        $c = array();
        $i= 0;
        $sumf=0;
        $sumh=0;
        $clubs = Club::select('name', 'id')->where('contrie_id',$id)->get();
        foreach ($clubs as $club){
           $club->homme= User::select(DB::raw('count(*) as total'))
              ->where('gender','Homme')
              ->where('club_id', $club->id)
              ->count();
              $homme[$i] = $club->homme;
              $sumh += $club->homme;
           $club->femme= User::select(DB::raw('count(*) as total'))
              ->where('gender','Femme')
              ->where('club_id', $club->id)
              ->count();
              $femme[$i]=$club->femme;
              $c[$i]=$club->name;
              $sumf += $club->femme;
              $i++;
            }
            return view('admin.statistic')  
          ->with('contries',$contries)
          ->with('pays',$pays)
          ->with('clubs',json_encode($c))  
          ->with('homme',json_encode($homme,JSON_NUMERIC_CHECK))
          ->with('femme',json_encode($femme,JSON_NUMERIC_CHECK))
          ->with('users',json_encode($users,JSON_NUMERIC_CHECK))
          ->with('events',json_encode($events,JSON_NUMERIC_CHECK))
          ->with('kilometrages',json_encode($kilometrages,JSON_NUMERIC_CHECK))
          ->with('sumh',$sumh)
          ->with('sumf',$sumf);
        
          /*return response()->json([
            'clubs' => $c,
            'hommes' => $homme,
            'femme' => $femme,
            'users' => $users,
            'events' => $events,
            'kilometrages'=> $kilometrages,
          ], 200);*/
          
    }    
    public function getStats(Request $request){
        $id=1; 
        return redirect('/admin/stat/'.$id);  
    }
    
}
