<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contactModel;

class ContactController extends Controller
{
    function ContactIndex(){
        return view('contacts');
    }
    function getContactData(){
        $result= json_encode(contactModel::orderBy('id','desc')->get()) ;
        return $result;
    }

    function contactDelete(Request $request){
        $id = $request->input('id');
        $result = contactModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
