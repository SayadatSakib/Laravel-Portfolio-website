<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\servicesModel;
use App\coursesModel;
use App\projectsModel;
use App\contactModel;
use App\reviewModel;

class HomeController extends Controller
{
    function HomeIndex()
    {
        // To Get Visitors Data
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);


        // To Get Services Data
        $servicesDataModel = json_decode(servicesModel::all());

        // To Get Courses Data
        $coursesDataModel = json_decode(coursesModel::orderBy('id', 'desc')->limit(6)->get());

        // To Get Projects Data
        $projectsDataModal = json_decode(projectsModel::orderBy('id', 'desc')->get());

        // To Get Reviews Data
        $reviewDataModel = json_decode(reviewModel::all());

        return view('home', [
            'servicesDataKey' => $servicesDataModel,
            'coursesDataKey' => $coursesDataModel,
            'projectsDataKey' => $projectsDataModal,
            'reviewDataKey' => $reviewDataModel,

        ]);
    }

    function contactSend(Request $request)
    {
        $contact_name = $request->input('contact_name');
        $contact_mobile = $request->input('contact_mobile');
        $contact_email = $request->input('contact_email');
        $contact_msg = $request->input('contact_msg');
        $result = contactModel::insert([
            'contact_name' => $contact_name,
            'contact_mobile' => $contact_mobile,
            'contact_email' => $contact_email,
            'contact_msg' => $contact_msg
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
