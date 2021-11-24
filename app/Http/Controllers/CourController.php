<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Entreprise;
use App\Models\TypeCour;
use App\Models\Cour;
use App\Models\Staff;
use Validator;
use Auth;
class CourController extends Controller
{
    public function createTypeCour(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);        
        //Check the validation becomes fails or not
        if ($validator->fails()) {
            //Return error message
            return response()->json(['error'=> $validator->errors()->all()], 422);
        }
        $typeCour = TypeCour::create($request->all());
        $success['message'] = 'type cours created ssuccesfully';
          //Return success message
        return response()->json(['success'=>$success], 200);
      
    }
    public function listeTypeCour(Request $request)
    {   
        $typeCour = TypeCour::all(); 
        if(!empty($typeCour)) {
         return response()->json(['message' => "success",
         'typeCour'=>$typeCour], 200);
        }
        else{
            return response()->json(['message'=> "No type cours found"], 200);
           } 
    }
    public function updateTypeCour(Request $request)
    {   
        try {
            $id = $request->id;
            $typeCour = TypeCour::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Role not found.'
            ], 403);
        }

        $typeCour->update($request->all());

        return response()->json(['message'=>'type Cour updated successfully.']);
    }
    public function deleteTypeCour(Request $request)
    {   
        try {
            $id = $request->id;
            $typeCour = TypeCour::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'type Cour not found.'
            ], 403);
        }

        $typeCour->delete();
        return response()->json(['message'=>'type Cour Deleted successfully.']);
    }
    public function createCour(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender'=> 'required',
            'color'=> 'required',
            'prices'=> 'required',
            'typecour_id' => 'required',
            'entreprise_id'=> 'required'
        ]);        
        //Check the validation becomes fails or not
        if ($validator->fails()) {
            //Return error message
            return response()->json(['error'=> $validator->errors()->all()], 422);
        }
        $cour = new Cour(); 
        $cour->name = is_null($request->name) ? $cour->name : $request->name;
        $cour->gender = is_null($request->gender) ? $cour->gender : $request->gender;
        $cour->color = is_null($request->entreprise_id) ? $cour->color : $request->color;
        $cour->prices = is_null($request->entreprise_id) ? $cour->prices : $request->prices;
        $cour->typecour_id= is_null($request->typecour_id) ? $Cour->typecour_id : $request->typecour_id;
        $cour->entreprise_id = is_null($request->entreprise_id) ? $cour->entreprise_id : $request->entreprise_id;
        $cour->save();
        $staffs = $request->get('staffs');
        if(!empty($staffs)){
        // loop through all cours
        foreach ($staffs as $staff) {
          $cour->staffs()->attach(Staff::where('id', $staff['staff_id'])->first());
        }
        $cour->staffs=$staffs;
      }
      else{
        $cour->staffs=$staffs;
      }
       //Return success message
      $success['message'] = 'Cour created successfully.';
      $success['cour'] = $cour;
      return response()->json(['success'=>$success], 200);    
    }
    public function updateCour(Request $request)
    {   
      if(Cour::where('id', $request->id)->exists())
     {   
        try {
            $id = $request->id;
            $cour = Cour::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Cour not found.'
            ], 404);
        }
        $cour->name = is_null($request->name) ? $cour->name : $request->name;
        $cour->gender = is_null($request->gender) ? $cour->gender : $request->gender;
        $cour->color = is_null($request->color) ? $cour->color : $request->color;
        $cour->prices = is_null($request->prices) ? $cour->prices : $request->prices;
        $cour->typecour_id= is_null($request->typecour_id) ? $cour->typecour_id : $request->typecour_id;
        $cour->entreprise_id = is_null($request->entreprise_id) ? $cour->entreprise_id : $request->entreprise_id;
        if($cour->save()){
          try {
            $type_cour = $cour->typecour()->first()->name;
            $cour->typecour_name= $type_cour;
            $staffs = $request->get('staffs');
            $cour->staffs()->sync($request->input('staffs', []));
            $datas=$cour->staffs()->get();
            $listes = [];
            foreach ($datas as $data) {
                $staff = new Staff();
                $staff->id = $data->id;
                $staff->name = $data->name;
                $listes[]= $staff;
              }
            $cour->staffs =$listes;
        
           }catch (ModelNotFoundException $e) {
            $result['message'] = 'some error accured please try again';
            return response()->json(['result'=>$result],400);
           }
           $result['message'] = 'cour updated ssuccesfully';
           $result['cour'] = $cour;
           return response()->json(['result'=>$result], 200);
        }
        else{
         $result['message'] = 'some error accured please try again';
         return response()->json(['result'=>$result],400);
        }     
      }
       else{ 
         return response()->json([
         'message' => 'Cour not found.'], 404);
       } 
    }
    public function deleteCour(Request $request)
    {   
        if(Cour::where('id', $request->id)->exists())
        {
         try {
             $id = $request->id;
             $cour = Cour::findOrFail($id);
          } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Cour not found.'], 404);
          }
         $cour->delete();
         return response()->json(['message'=>'Cour Deleted successfully.']);
        }
        else{
            return response()->json([
                'message' => 'Cour not found.'
            ], 404);
        }
    }
    public function listeCour(Request $request)
    {   
        if(Entreprise::where('id', $request->id)->exists())
        {
           try {
              $id = $request->id;
              $entreprise = Entreprise::findOrFail($id);
            }catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'entreprise not found.'], 404);
            }
          if($entreprise)
          {
             $cours = Cour::where('entreprise_id', $id)->get();
             foreach($cours as $cour){
                $type_cour = $cour->typecour()->first()->name;
                $cour->typecour_name= $type_cour;
             } 
             return response()->json(['cours'=>$cours]);
            } 
        }  
        else
        {
            return response()->json([
                'message' => 'entreprise not found.'], 404);
        }
       
    }
    public function detailCour(Request $request)
    {   
        if(Cour::where('id', $request->id)->exists())
        {
          try { 
              $id = $request->id;
              $cour = Cour::findOrFail($id);
              $type_cour = $cour->typecour()->first()->name;
              $cour->typecour_name= $type_cour;
              $datas=$cour->staffs()->get();
              $listes = [];
              foreach ($datas as $data) {
                 $staff = new Staff();
                 $staff->id = $data->id;
                 $staff->name = $data->name;
                 $listes[]= $staff;
                }
            $cour->staffs =$listes;
            }catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Cour not found.'
            ], 404);
            }
         return response()->json(['cour'=>$cour]);
        }
        else
        {
          return response()->json([
            'message' => 'Cour not found.'
           ], 404);
        }
    }
    public function affectStaffCour(Request $request)
    {   
        if(Cour::where('id', $request->id)->exists())
        {
          try {
             $Cour = Cour::findOrFail($request->id);
            } catch (ModelNotFoundException $e) {
              return response()->json([
                'message' => 'cour not found.'
              ], 404);
            }
          $staffs = $request->get('staffs');
          if(!empty($staffs))
           {
             // loop through all cours
              foreach ($staffs as $staff) {
                 $cour->staffs()->attach(Staff::where('id', $staffs['staff_id'])->first());
               }
               $cour->staffs=$staff;
           }
           else
           {
               $cour->staffs=$staff;
            }
           $success['message'] = 'staffs affected to cour.';
           $success['cour'] = $cour;
           return response()->json(['success'=>$success], 200);
        }
        else
        {
         return response()->json([
         'message' => 'Cour not found.'], 404);
        }
    }
    
}
