<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use App\Models\Contrie;
use App\Models\Club;
use App\Models\Event;
use App\Models\Actualite;
use App\Models\Categorie;
use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use Hash;
use Validator;
use Auth;
class NewsController extends Controller
{
    public function create(Request $request)
    {   
        $request->validate([
           'name' => 'required|string',
           'link' => 'required',
           'description'=> 'required',
           'image'=> 'required|mimes:jpg,png,jpeg'
        ],[
          'name.required' => 'le champs nom est obligatoir',
          'name.string' => 'le champs nom doit contenire seulement des lettres',
          'link.required' => 'le champs lien est obligatoir',
          'description.required' => 'le champs description est obligatoir',
          'image.required' => 'le champs image est obligatoir',
        ]);
        
        try {
          if ($image = $request->file('image')) {
          $name = date('YmdHis') . "." .$request->file('image')->getClientOriginalExtension();
          $path = $request->file('image')->move('public/images',$name);}
        } catch (\Throwable $th) {
          return redirect()->back()->with('fail','Erreur lors de la création');
        }
          
        $new = Actualite::create([
          'name'=> $request['name'],
          'link'=> $request['link'],
          'description'=> $request ['description'],
          'image' => $path,
        ]);
        
        
        return redirect( '/admin/news' )->with( 'success', 'actualité créé avec succès' ); 
        
    }
    
    public function newEdit($id){
      $new = Actualite::where('id',$id)->first();
      return view('admin.news.newsedit', ['new' => $new]);
    }
      public function updateNew(Request $request, $id)
      {   
          $request->validate([
            'name' => 'required|string',
            'link' => 'required',
            'description'=> 'required',
         ],[
         'name.required' => 'le champs nom est obligatoir',
         'name.string' => 'le champs nom doit contenire seulement des lettres',
         'link.required' => 'le champs lien est obligatoir',
         'description.required' => 'le champs description est obligatoir',
         'imageUpdate.required' => 'le champs image est obligatoir',
         ]);
         try {
          $new = Actualite::findOrFail($id);
          } catch (ModelNotFoundException $e) {
          return response()->json([
              'message' => 'event not found.'
          ], 403);
          }
          try {
              if ($request->file('image') != null) {
                $name = date('YmdHis') . "." .$request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->move('public/images',$name);
              }
          } catch (\Throwable $th) {
           return redirect()->back()->with('fail','Erreur lors de la creation');
          }
          $new->name= $request->name;
          $new->link= $request->link;
          $new->description= $request->description;
          if(($request->file('image') != null))
          {$new->image = $path;}
          $new->save();
          return redirect( 'admin/news' )->with( 'success', "Les informations de l'evenement ont été mises à jour avec succès." );
          //return response()->json(['message'=>'Menu updated successfully.']);
      }
      
      public function deleteNew($id)
      {   
          try {
            $new = Actualite::findOrFail($id);
          } catch (ModelNotFoundException $e) {
              return redirect( 'admin/news' )->with( 'danger', "évènement n'existe pas." );
          }
          $new->delete();
          return redirect( 'admin/news' )->with( 'success', 'évènement supprimé avec succès.' );
  
          
      }
      public function listeNews()
      {   
        try {
          $news = Actualite::orderBy('id', 'desc')->paginate(8);
        } catch (ModelNotFoundException $e) {
            return redirect( 'admin/news' )->with( 'danger', "évènement n'existe pas." );
        }
        return view('admin.news.news', ['news' => $news]);
        
      }
      public function news()
      {   
        $news = Actualite::orderBy('id', 'desc')->get();
        return response()->json([
          'news' => $news,
        ], 200);
        
      }
}
