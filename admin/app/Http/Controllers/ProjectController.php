<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projectsModel;

class ProjectController extends Controller
{
    function ProjectIndex(){
        return view('projects');
    }
    function getProjectData(){
        $result= json_encode(projectsModel::orderBy('id','desc')->get()) ;
        return $result;
    }
    function getProjectDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(projectsModel::where('id','=',$id)->get()) ;
        return $result;
    }

    function projectDelete(Request $request){
        $id = $request->input('id');
        $result = projectsModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function projectUpdate(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $desc = $request->input('desc');
        $link = $request->input('link');
        $img = $request->input('img');

        $result = projectsModel::where('id','=',$id)->update(['project_name'=>$name,'project_des'=>$desc,'project_link'=>$link,'project_img'=>$img]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    function projectAdd(Request $request){
        $name = $request->input('name');
        $desc = $request->input('desc');
        $link = $request->input('link');
        $img = $request->input('img');

        $result = projectsModel::insert(['project_name'=>$name,'project_des'=>$desc,'project_link'=>$link,'project_img'=>$img]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

}
