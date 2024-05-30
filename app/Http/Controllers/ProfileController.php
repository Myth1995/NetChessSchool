<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends MyController
{

    public function index(){

        $user = auth()->user();
        return view("client.profile", compact("user"));
    }
}