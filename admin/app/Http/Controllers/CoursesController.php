<?php

namespace App\Http\Controllers;

use App\coursesModel;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    function CoursesIndex(){
        return view('courses');
    }

    function getCourseData(){
        $result= json_encode(coursesModel::orderBy('id','desc')->get()) ;
        return $result;
    }
    function getCourseDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(coursesModel::where('id','=',$id)->get()) ;
        return $result;
    }
    function courseDelete(Request $request){
        $id = $request->input('id');
        $result = coursesModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
    function courseUpdate(Request $request){
        $id = $request->input('id');
        $course_name  = $request->input('name');
        $course_fee = $request->input('fee');
        $course_totalenroll = $request->input('t_enroll');
        $course_totalclass = $request->input('t_class');
        $course_link  = $request->input('link');
        $course_img = $request->input('img');
        $course_des = $request->input('desc');

        $result = coursesModel::where('id','=',$id)->update
        ([
            'course_name'=>$course_name,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'course_img'=>$course_img,
            'course_des'=>$course_des
        ]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    function courseAdd(Request $request){
        $course_name  = $request->input('name');
        $course_des = $request->input('desc');
        $course_fee = $request->input('fee');
        $course_totalenroll = $request->input('t_enroll');
        $course_totalclass = $request->input('t_class');
        $course_link  = $request->input('link');
        $course_img = $request->input('img');

        $result = coursesModel::insert
        ([
            'course_name'=>$course_name,
            'course_des'=>$course_des,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'course_img'=>$course_img
        ]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

}



