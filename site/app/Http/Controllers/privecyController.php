<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class privecyController extends Controller
{
    function privecyPage()
    {
        return view('policy');
    }
}
