<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coursesModel;

class coursesController extends Controller
{
    function coursesPage()
    {
        // To Get Courses Data
        $coursesData = json_decode(coursesModel::orderBy('id', 'desc')->get());

        return view('course', ['coursesDataKey' => $coursesData]);
    }
}
