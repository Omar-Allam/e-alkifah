<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    function courses(){
        return view('reports.courses');
    }

    function teachers(){
        return view('reports.teacher');
    }

    function trainers(){
        return view('reports.trainer');
    }

    function certifications(){
        return view('reports.myCertifications');
    }
}
