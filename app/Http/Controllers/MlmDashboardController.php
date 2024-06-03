<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Auth;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\User;

class MlmDashboardController extends MyController
{

    public function index(){

        if(!Auth()->check()){
            return redirect('login');
        }

        $user = User::where('id',Auth()->user()->id)->first();

        if(!isset($user->id) || $user->sponser_id == null){
            return redirect()->back();
        }

        $invite_row = Invite::where('to',Auth()->user()->id)->first();
        if(!isset($invite_row->id)){
            return redirect("/");
        }

        return view("client.mlmDashboard");

    }

    public function join($sponser){

        if(!Auth()->check()){
            session()->flash('request_sponser', $sponser);
            return redirect("login");
        }

        $my_info = User::find(Auth()->user()->id);
        if(!(isset($my_info->id)) || $my_info->sponser_id != null){
            return redirect("/");
        }

        if($sponser == null){
            return redirect("/");
        }

        $sponser_row = User::where('user_name', $sponser)->orwhere('email', $sponser)->first();
        if(!isset($sponser_row->id)){
            return redirect("/");
        }

        $data["sponser"] = $sponser;
        return view('client.mlmJoin', $data);
    }

    public function registerMLM(Request $request){

        if(!Auth()->check()){
            return redirect("login");
        }

        if(Auth()->user()->spenser_id != null){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $sponser = $request->input("sponser"); 


        if($sponser == null){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $sponser_row = User::where('user_name', $sponser)->orwhere('email', $sponser)->first();
        if(!isset($sponser_row->id)){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $invite_row = Invite::where('to', Auth()->user()->id)->first();
        if(isset($invite_row->id)){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_EXIST_ERROR);
            return;
        }

        $invite = new Invite();
        $invite->from = $sponser_row->id;
        $invite->to = Auth()->user()->id;
        $invite->save();

        User::where("id", Auth()->user()->id)->update(array(
            'sponser_id' => $sponser_row->id
        ));

        $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS);

    }
}
