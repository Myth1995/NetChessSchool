<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id){

        $course = Service::findOrFail( $id );

        if(!isset($course->id) || $course->status == 0){
            return redirect()->back();
        }

        $children = Service::where('parent', $course->id)->get();
        
        if(count($children) == 0){
            $data["course"] = $course;
            return view('client.course', $data);
        }else{
            return redirect()->route("course.list",$id);
        }
        
    }

    public function couseList($id){
        $data["courses"] = Service::where("parent", $id)->where("status", 1)->get();
        return view("client.courseList", $data);
    }

    public function detail(){
        return view('client.courseDetail');
    }

}
