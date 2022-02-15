<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projectsModel;

class projectsController extends Controller
{
    function projectPage()
    {
        // To Get Projects Data
        $projectsData = json_decode(projectsModel::orderBy('id', 'desc')->get());

        return view('projects', ['projectsDataKey' => $projectsData]);
    }
}
