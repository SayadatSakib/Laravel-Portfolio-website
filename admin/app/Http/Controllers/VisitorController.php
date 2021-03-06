<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
        function VisitorIndex()
        {
            $visitorData = json_decode( VisitorModel::orderBy('id','desc')->take(500)->get());
            return view('visitor',['visitorsKey'=>$visitorData]);
        }
}
