<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class ProfileController extends MyController
{

    public function index(){

        
    }

    public function view (Request $request){

        if(!Auth()->check()){
            return redirect('login');
        }
        $user = auth()->user();
        $data['user'] = $user;

        if(!isset($request->type) || !isset($request->course)){
            return redirect()->back();
        }
        $data['type'] = $request->type;

        $data['all_course'] = Subscription::where('user_id', Auth()->user()->id)->where("status",1)->orderBy("created_at","desc")->get();
        $permit_end_row = Subscription::whereRaw("permit_period < now() and status = 1")->get();
        
        $course = Subscription::where("user_id", Auth()->user()->id)->where("status",1)->where("course_id", $request->course)->first();
        
        $data["purchase_course"] = $course;
        $data["end_of_course"] = count($permit_end_row);


        dd($data);
        return view("client.profile", $data);
    }


}