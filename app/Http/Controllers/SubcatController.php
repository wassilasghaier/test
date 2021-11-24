<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Subcat;
use App\Models\Categorie;
use Validator;
use Auth;
class SubcatController extends Controller
{
    public function createSubcat(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'categorie_id' => 'required'
        ]);        
        //Check the validation becomes fails or not
        if ($validator->fails()) {
            //Return error message
            return response()->json(['error'=> $validator->errors()->all()], 422);
        }
        $Subcat = Subcat::create($request->all());
        $success['message'] = 'Subcat created ssuccesfully';
          //Return success message
        return response()->json(['success'=>$success], 200);
      
    }
    public function listeSubcat(Request $request)
    {   
        $subcats = Subcat::all(); 
        if(!empty($subcats)) {
         return response()->json(['message' => "success",
         'subcat'=>$subcats], 200);
        }
        else{
            return response()->json(['message'=> "No Subcats found"], 200);
           } 
    }
    public function updateSubcat(Request $request)
    {   
        try {
            $id = $request->id;
            $Subcat = Subcat::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Subcat not found.'
            ], 403);
        }

        $Subcat->update($request->all());

        return response()->json(['message'=>'Subcats updated successfully.']);
    }
    public function deleteSubcat(Request $request)
    {   
        try {
            $id = $request->id;
            $Subcat = Subcat::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Subcat not found.'
            ], 403);
        }

        $Subcat->delete();
        return response()->json(['message'=>'Subcat Deleted successfully.']);
    }
    
}
