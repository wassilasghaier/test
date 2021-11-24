<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Video;
use App\Models\Image;
use Validator;
use Auth;
class VideoController extends Controller
{
    public function createVideo(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'path'  => 'required',
        ]);        
        //Check the validation becomes fails or not
        if ($validator->fails()) {
            //Return error message
            return response()->json(['error'=> $validator->errors()->all()], 400);
        }
            try{
             $name = $request->file('image')->getClientOriginalName();
             $path = $request->file('image')->storeAs('public/documents',$name);
             $path = substr($path,7);
             $path = "storage/" . $path;
                //store image file into directory and db  
                $video = new Video(); 
                $video->title = is_null($request->title) ? $video->title : $request->title;
                $video->image = $path;
                $video->path = is_null($request->path) ? $video->path : $request->path;
                $video->save(); 
                $success['message'] = 'Video ajouter avec succes.';
                $success['Video'] = $video;
                return response()->json(['success'=>$success], 200);
            }catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'Error accured try again'
                ], 400);
            }  
    } 
    public function getAllVideos(Request $request)
    {   
        $videos = Video::all();
        if($videos){ 
        return response()->json([
                    'videos' => $videos
                ],200);} 
        else { 
            $message='aucun  video trouver';
        return response()->json($message,200);}   
    }  
    public function deleteVideo(Request $request)
    {   
        if(video::where('id', $request->id)->exists())
        {
         try {
             $id = $request->id;
             $video = Video::findOrFail($id);
             $path=$video->image;
          } catch (ModelNotFoundException $e) {
            $message='video not found.';
            return response()->json($message
                , 404);
          }
          File::delete($path);
          $video->delete();
          $message='video supprimer avec succes';
         return response()->json($message,200);
        }
        else{
            $message='video not found.';
            return response()->json($message, 404);
        }
    }
    public function getVideoById(Request $request)
    {   
        if(video::where('id', $request->id)->exists())
        {
         try {
             $id = $request->id;
             $video = Video::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                $message='video not found.';
            return response()->json($message, 404);
            }
            return response()->json($video,200);
        }
        else{
            $message='video not found.';
            return response()->json($message, 404);
        }
    }
    public function updateVideo(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'id'=> 'required',
            'title' => 'required',
        ]);        
       //Check the validation becomes fails or not
       if ($validator->fails()) {
        //Return error message
        return response()->json(['error'=> $validator->errors()->all()], 400);
        }
       if(Video::where('id', $request->id)->exists())
       {
        $video = Video::findOrFail($request->id);
        $path=$video->image;
        if(!is_null($request->image)) {
        File::delete($path); 
            try{
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/documents',$name);
            $path = substr($path,7);
            $path = "storage/" . $path;
            }catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Error accured try again'
            ], 400);
            }
        }
        //store image file into directory and db  
        $video->title = is_null($request->title) ? $video->title : $request->title;
        $video->image = $path;
        $video->path = is_null($request->path) ? $video->path : $request->path;
        $video->save(); 
        $message = 'video est mise a jour avec succes.';
        return response()->json($message, 200);        
       }    
      else {
        $message = 'video not found';
        return response()->json($message, 404);
      }
    }

    
}
