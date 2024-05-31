<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('client.course');
    }

    public function detail(){
        return view('client.courseDetail');
    }

    public function list(){
        return view('client.courseList');
    }

}
