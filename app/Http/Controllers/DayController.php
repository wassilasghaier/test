<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Entreprise;
use App\Models\Operation;
use App\Models\User;
use App\Models\Message;
use Validator;
use Auth;
class DayController extends Controller
{
    public function addOperation(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
            'type' => 'required',
            'time'=> 'required',
        ]);      
        /**Check the validation becomes fails or not
        */
        if ($validator->fails()) {
            /**Return error message
            */
            return response()->json(['error'=> $validator->errors()->all()], 400);
        }
        $user = Auth::user();
        $id=$user->id;
        if (!empty($user)) { 
           if (strcmp($request->type, "addition") == 0) {
             $color="0xfff7dceb";
              $icon="0xfff7bcdd"; }
         else if(strcmp($request->type, "soustraction") == 0) {
               $color="0xffd8eaff";
               $icon="0xff8fb2da";}
        else if(strcmp($request->type, "multiplication") == 0) {
                $color="0xfffcf3e7";
                 $icon="0xfff2a47d"; }
         else if(strcmp($request->type, "division") == 0) {
                $color="0xffd2f7f1";
                 $icon="0xff67bfaf"; }
           try {
            $operation = Operation::create([
                'value'     => $request['value'],
                'type'    => $request['type'],
                'time' => $request['time'],
                'user_id'=>  $id,
                'color'=> $color,
                'icon' =>  $icon,
              ]);
            $message=new Message();
            $message->message = 'operation saved ssuccesfully';
            return response()->json($message, 200);  
            } catch (ModelNotFoundException $e) {
                $message = "une erreur c'est produit";
               return response()->json($message, 400);
            }  
        }  
        else {
        $message = "utilisateur n'existe pas";
        return response()->json($message, 404); 
            }
    }
    public function getListOp(Request $request)
    {
        $user = Auth::user();
        $operations= Operation::where('user_id',$user->id)->get();
        return response()->json(['operations' =>$operations], 200);
             
    }
    public function getListaddE($id, Request $request)
    {
        
        $operations= Operation::where('type','like','addition')->where('user_id',$id)->paginate(6);
        return view('admin.eAddition')->with('operations', $operations); 
             
    }
    public function getListsousE($id, Request $request)
    {
        
        $operations= Operation::where('type','like','soustraction')->where('user_id',$id)->get();
        return view('admin.eSous')->with('operations', $operations); 
             
    }
    public function getListmultiE($id, Request $request)
    {
        
        $operations= Operation::where('type','like','multiplication')->where('user_id',$id)->get();
        return view('admin.eMulti')->with('operations', $operations); 
             
    }
    public function getListdivE($id, Request $request)
    {
        
        $operations= Operation::where('type','like','division')->where('user_id',$id)->get();
        return view('admin.eDiv')->with('operations', $operations); 
             
    }
    public function getListsous(Request $request)
    {
        
       // $operations= Operation::where('type','like','soustraction')->get();
        config()->set('database.connections.mysql.strict', false);
        $operations= Operation::where('type','like','soustraction')
                 ->whereDate('created_at','<',Carbon::today()->subDays(1))
                 ->groupBy('user_id')
                 ->orderBy('id', 'DESC')
                 ->get(); 
        return view('admin.sous')->with('operations', $operations); 
             
    }
    public function getListmulti(Request $request)
    {
        
       // $operations= Operation::where('type','like','multiplication')->get();
        config()->set('database.connections.mysql.strict', false);
        $operations= Operation::where('type','like','multiplication')
                 ->whereDate('created_at','<',Carbon::today()->subDays(1))
                 ->groupBy('user_id')
                 ->orderBy('id', 'DESC')
                 ->get();    
        return view('admin.multi')->with('operations', $operations); 
             
    }
    public function getListdiv(Request $request)
    {
        config()->set('database.connections.mysql.strict', false);
        $operations= Operation::where('type','like','division')
                 ->whereDate('created_at','<',Carbon::today()->subDays(1))
                 ->groupBy('user_id')
                 ->orderBy('id', 'DESC')
                 ->get();    
        return view('admin.div')->with('operations', $operations); 
             
    }
    public function getByid(Request $request)
    {
        $id = $request->id;
        $operations= Operation::where('user_id',$id)->get();
        return response()->json(['operations' =>$operations], 200);
             
    }  
    public function getSpecific(Request $request)
    {
        $id = $request->id;
        $op = $request->op;
        if($op=='addition')
        $operations= Operation::where('type','like','addition')->where('user_id',$id)->get();
        else if($op=='soustraction')
        $operations= Operation::where('type','like','soustraction')->where('user_id',$id)->get();
        else if($op=='multiplication')
        $operations= Operation::where('type','like','multiplication')->where('user_id',$id)->get();
        else
        $operations= Operation::where('type','like','division')->where('user_id',$id)->get();
        return response()->json(['operations' =>$operations], 200);
        
             
    }
   
        
             
 
    public function getlistuser(){
        config()->set('database.connections.mysql.strict', false);
        $operations= Operation::where('type','like','addition')
                 ->whereDate('created_at','<',Carbon::today()->subDays(1))
                 ->groupBy('user_id')
                 ->orderBy('id', 'DESC')
                 ->paginate(6);           
       return view('admin.addition')->with('operations', $operations); } 



}