<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adminModel;

class LoginController extends Controller
{
    function login(){
        return view('login');
    }
    function onLogin(Request $request){
        $user =$request->input('user');
        $password =$request->input('pass');
        $countvalue = adminModel::where('username','=',$user)->where('password','=',$password)-> count();
        if($countvalue==1){
            $request->session()->put('userKey',$user);
            return 1;
        }
        else{
            return 0;
        }
    }

    function onLogout(Request $request){
        $user =$request->input('user');
        $request->session()->flash('userKey',$user);
        return redirect('/login');
    }
}
