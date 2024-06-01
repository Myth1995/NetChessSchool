<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\User;

class MlmDashboardController extends MyController
{

    public function index(){

        $user_row = User::find(auth()->user()->id);
        if(!isset($user_row->id)){
            return redirect('login')->back();
        }

        if($user_row->spenser_id == null){
            session()->flash('check-mlm','no');
            return redirect()->back();
        }

        session()->flash('check-mlm','yes');
        return view("client.mlmDashboard");

    }
}
