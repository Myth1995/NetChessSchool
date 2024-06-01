<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends MyController
{
    public function index(){

        $data["services"] = Service::where("status",1)->where("parent",0)->orderBy("id","asc")->get();
        return view('client.service', $data);
    }
    
}
