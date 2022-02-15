<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contactModel;
use App\coursesModel;
use App\projectsModel;
use App\reviewModel;
use App\servicesModel;
use App\VisitorModel;


class HomeController extends Controller
{
    function HomeIndex(){
        $total_contact =  contactModel::count();
        $total_course =  coursesModel::count();
        $total_project =   projectsModel::count();
        $total_review =   reviewModel::count();
        $total_service =   servicesModel::count();
        $total_visitor =  VisitorModel::count();
        return view('home',[
            'total_contact'=>   $total_contact,
            'total_course'=>$total_course,
            'total_project'=>$total_project,
            'total_review'=>$total_review,
            'total_service'=>$total_service,
            'total_visitor'=>$total_visitor
        ]);
    }



}
