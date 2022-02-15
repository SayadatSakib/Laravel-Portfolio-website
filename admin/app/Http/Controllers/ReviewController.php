<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reviewModel;

class ReviewController extends Controller
{
    function ReviewIndex(){
        return view('review');
    }function getReviewData(){
    $result= json_encode(reviewModel::orderBy('id','desc')->get()) ;
    return $result;
}
    function getReviewDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(reviewModel::where('id','=',$id)->get()) ;
        return $result;
    }

    function reviewDelete(Request $request){
        $id = $request->input('id');
        $result = reviewModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function reviewUpdate(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $desc = $request->input('desc');
        $img = $request->input('img');

        $result = reviewModel::where('id','=',$id)->update(['name'=>$name,'des'=>$desc,'img'=>$img]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    function reviewAdd(Request $request){
        $name = $request->input('name');
        $desc = $request->input('desc');
        $img = $request->input('img');

        $result = reviewModel::insert(['name'=>$name,'des'=>$desc,'img'=>$img]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}
