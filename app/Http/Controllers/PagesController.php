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
use App\Models\Page;
use Hash;
use Validator;
use Auth;
class PagesController extends Controller
{
    public function create(Request $request)
    {   
        $request->validate([
           'name' => 'required|string',
           'description'=> 'required',
           'image'=> 'required|mimes:jpg,png,jpeg'
        ],[
          'name.required' => 'le champs nom est obligatoir',
          'name.string' => 'le champs nom doit contenire seulement des lettres',
          'description.required' => 'le champs description est obligatoir',
          'image.required' => 'le champs image est obligatoir',
        ]);
        
        try {
          if ($image = $request->file('image')) {
          $name = date('YmdHis') . "." .$request->file('image')->getClientOriginalExtension();
          $path = $request->file('image')->move('public/images',$name);}
        } catch (\Throwable $th) {
          return redirect()->back()->with('fail','Erreur lors de la creation');
        }
          
        $new = Actualite::create([
          'name'=> $request['name'],
          'description'=> $request ['description'],
          'image' => $path,
        ]);
        
        
        return redirect( '/admin/pages' )->with( 'success', 'actualité créé avec succès' ); 
        
    }
    
    public function pageEdit($id){
      $page =Page::where('id',$id)->first();
      return view('admin.pages.pageEdit', ['page' => $page]);
    }
      public function updatePage(Request $request, $id)
      {   
          $request->validate([
            'name' => 'required|string',
            'description'=> 'required',
         ],[
         'name.required' => 'le champs nom est obligatoir',
         'name.string' => 'le champs nom doit contenire seulement des lettres',
         'description.required' => 'le champs description est obligatoir',
         'imageUpdate.required' => 'le champs image est obligatoir',
         ]);
         try {
          $page = Page::findOrFail($id);
          } catch (ModelNotFoundException $e) {
          return response()->json([
              'message' => 'page not found.'
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
          $page->name= $request->name;
          $page->description= $request->description;
          if(($request->file('image') != null))
          {$page->image = $path;}
          $page->save();
          return redirect( 'admin/pages' )->with( 'success', "Les informations de la page ont été mises à jour avec succès." );
          //return response()->json(['message'=>'Menu updated successfully.']);
      }
      public function listePages()
      {   
        try {
          $pages = Page::all();
        } catch (ModelNotFoundException $e) {
            return redirect( 'admin/pages' )->with( 'danger', "page n'existe pas." );
        }
        return view('admin.pages.pages', ['pages' => $pages]);
        
      }

      //webview

      public function pageByid($id)
      {   
        $page =Page::where('id',$id)->first();
        return view('site.about', ['page' => $page]);
      }
      public function clubByid($id)
      {   
        $club =Club::where('id',$id)->first();
        return view('site.club', ['club' => $club]);
      }
      public function coachByClub($id)
      {   
        $datas = User::where('club_id',$id)->whereHas(
          'roles', function($q){
              $q->where('id', 1);
        })->get();
        $supercoachs = User::where('club_id',$id)->whereHas('roles', function($query){
            $query->where('id', 4);
        })->get();
        $coachs= $datas->concat($supercoachs);
        return view('site.coachs', ['coachs' => $coachs]);
      }
      public function coachs()
      {   
        $datas = User::whereHas(
          'roles', function($q){
              $q->where('id', 1);
        })->get();
        $supercoachs = User::whereHas('roles', function($query){
            $query->where('id', 4);
        })->get();
        $coachs= $datas->concat($supercoachs);
        return view('site.coachs', ['coachs' => $coachs]);
      }

      
}
