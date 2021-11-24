<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Paiment;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $admin = new Admin;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $loggedUserInfo= Admin::where('id','=', session('LoggedUser'))->first();
        $users = User::all()->count();
        $coachs= "0";
        $marches= "0";
        $clubs= "0";
        $news = User::all();
        return view('admin.dash')->with(['LoggedUserInfo'=>$loggedUserInfo,'users'=>$users,'coachs'=>$coachs,'marches'=>$marches,'clubs'=>$clubs,'news'=>$news]);
    }

    function settings(Request $request){
        $data = Admin::where('id','=','1')->first();
        $data->update($request->all());
        return back()->with('success','Votre Information est mise à jour');
    }

    function profile(Request $request){
        $data = Admin::where('id','=','1')->first();
           //dd($user->name);
        return view('admin.profileAdmin', ['data' => $data]);
    }
    function showProfile(Request $request){
        $data = Admin::where('id','=','1')->first();
           //dd($user->name);
        return view('admin.EditprofileAdmin', ['data' => $data]);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
}
