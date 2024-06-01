<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IndexController extends MyController
{
    public function index()
    {
        $data["services"] = Service::where("status",1)->where("parent",0)->orderBy("id","asc")->get();
        return view('client.index', $data);
    }

    public function change_lang(Request $request)
    {

        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();

    }

    public function login(){

        return view("client.login");
    }
}
