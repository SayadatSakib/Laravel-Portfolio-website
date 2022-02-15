<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\galleryModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    function GalleryIndex(){
        return view('gallery');
    }

    function photoUpload(Request $request){
       $photoPath =  $request->file('photo')->store('public');

       $photoName = explode('/',$photoPath)[1];
       $host = $_SERVER['HTTP_HOST'];
       $location = "Http://".$host."/storage/".$photoName;
       $result = galleryModel::insert(['location'=>$location]);
       return $result;
    }

    function imgJson(){
       return galleryModel::take('4')->get();
    }

    //For LoadMore
    function ingJsonByID(Request $request){
            $FiresID = $request->id;
            $LastID = $FiresID+3;
            return galleryModel::where('id','>=',$FiresID)->where('id','<=',$LastID)->get();
    }



}
