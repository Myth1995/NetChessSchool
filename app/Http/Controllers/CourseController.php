<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id){
        $data['course'] = Service::findOrFail( $id );
        return view('client.course', $data);
    }

    public function detail(){
        return view('client.courseDetail');
    }

    public function list(){
        return view('client.courseList');
    }

}
