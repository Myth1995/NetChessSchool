<?php

namespace App\Http\Controllers;

use App\Models\FriendProfitHistory;
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

        
        $first_friends = Invite::where("from", Auth()->user()->id)->get();
        $myfriends = [];
        if(count($first_friends)){
            foreach($first_friends as $index_1 => $friend){
                $myfriends[$index_1][0] = $friend->user->user_name;
                $second_row = Invite::where("from", $friend->to)->get();
                $myfriends[$index_1][1] = [];
                if(count($second_row)){
                    foreach($second_row as $index_2 => $friend){
                        $myfriends[$index_1][1][$index_2][0] = $friend->user->user_name;
                        $third_row = Invite::where("from", $friend->to)->get();
                        $myfriends[$index_1][1][$index_2][1] = [];
                        if(count($third_row)){
                            foreach($third_row as $index_3 => $friend){
                                $myfriends[$index_1][1][$index_2][1][$index_3][0] = $friend->user->user_name;
                                $forth_row = Invite::where("from", $friend->to)->get();
                                $myfriends[$index_1][1][$index_2][1][$index_3][1] = [];
                                if(count($forth_row)){
                                    foreach($forth_row as $index_4 => $friend){
                                        $myfriends[$index_1][1][$index_2][1][$index_3][1][$index_4][0] = $friend->user->user_name;
                                        $fifth_row = Invite::where("from", $friend->to)->get();
                                        $myfriends[$index_1][1][$index_2][1][$index_3][1][$index_4][1] = [];
                                        if(count($fifth_row)){
                                            foreach($fifth_row as $index_5 => $friend){
                                                $myfriends[$index_1][1][$index_2][1][$index_3][1][$index_4][1][$index_5][0] = $friend->user->user_name;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        $data["my_friends"] = $myfriends;

        $profit_earned_log = FriendProfitHistory::where("to",Auth()->user()->id)->limit(10)->get();
        $data["profit_earned_log"] = $profit_earned_log;

        $profit_provided_log = FriendProfitHistory::where("from",Auth()->user()->id)->limit(10)->get();
        $data["profit_providing_log"] = $profit_provided_log;

        return view("client.mlmDashboard", $data);

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

    public function getProvidedProfit(Request $request){
        // $profit_provided_log = FriendProfitHistory::where("from",Auth()->user()->id)->get();
        // if(count($profit_provided_log)){
        //     foreach($profit_provided_log as $item){

        //     }
        // }
        // $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS, $profit_provided_log);
    }
}
