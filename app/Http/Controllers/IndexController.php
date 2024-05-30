<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('client.index');
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
