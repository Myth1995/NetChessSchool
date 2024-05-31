<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MlnDashboardController extends Controller
{
    public function index(){
        return view("client.mlnDashboard");
    }
}
