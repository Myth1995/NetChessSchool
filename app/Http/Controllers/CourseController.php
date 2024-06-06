<?php

namespace App\Http\Controllers;

use App\Models\FriendProfitHistory;
use App\Models\Service;
use App\Models\Lesson;
use App\Models\PaymentPackageHistories;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends MyController
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

    public function coursePurchase(Request $request){
        
        $course_id = $request->input('course_id');
        if($course_id == null){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $course_row = Service::find($course_id);
        if(!isset($course_row->id)){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $course_price = $course_row->price;

        $user_row = User::find(Auth()->user()->id);

        if(!isset($user_row->id) || $user_row->status == 2){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_USER_ERROR);
            return;
        }

        if($user_row->ncs_coin < $course_price){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_NCS_COIN_ERROR);
            return;
        }

        User::where("id", Auth()->user()->id)->update([
            "ncs_coin"=> $user_row->ncs_coin - $course_price,
        ]);

        $profit_user = array();
        $first_sponser = Auth()->user()->sponser_id;
        if(isset($first_sponser)){
            array_push($profit_user, $first_sponser);   
            $second_sponser = User::find($first_sponser);
        }
        if(isset($second_sponser) && isset($second_sponser->sponser_id) ){
            array_push($profit_user, $second_sponser->sponser_id);
            $third_sponser = User::find($second_sponser->sponser_id);
        }
        if(isset($third_sponser) && isset($third_sponser->sponser_id) ){
            array_push($profit_user, $third_sponser->sponser_id);
            $forth_sponser = User::find($third_sponser->sponser_id);
        }
        if(isset($forth_sponser) && isset($forth_sponser->sponser_id)){
            array_push($profit_user, $forth_sponser->sponser_id);
            $fifth_sponser = User::find($forth_sponser->sponser_id);
        }
        if(isset($fifth_sponser) && isset($fifth_sponser->sponser_id)){
            array_push($profit_user, $fifth_sponser->sponser_id);
        }

        if(count($profit_user) > 0){
            foreach($profit_user as $key => $id){
                User::where("id", $id)->increment('ncs_coin', 1);
                $friend_profit = new FriendProfitHistory();
                $friend_profit->from = Auth()->user()->id;
                $friend_profit->to = $id;
                $friend_profit->package_id = $course_id;
                $friend_profit->profit_amount = 1;
                $friend_profit->save();
            }
        }

        $admin_profit = $course_price - count($profit_user);
        //Friend MLM Add Coin
        $admin_row = User::find(1);
        if(isset($admin_row)){
            $admin_coin = $admin_row->ncs_coin;
            $admin_coin = $admin_coin + $admin_profit;
            User::where('id',1)->update(['ncs_coin'=> $admin_coin]);
        }

        //Payment History Saving
        $payment_package_history = new PaymentPackageHistories();
        $payment_package_history->user_id = Auth()->user()->id;
        $payment_package_history->course_id = $course_row->id;
        $payment_package_history->description = Auth()->user()->user_name . ": purchasing =>" . $course_row->title;
        $payment_package_history->amount = $course_price;
        $payment_package_history->status = 1;
        $payment_package_history->save();

        $user_subscription = Subscription::where("user_id", Auth()->user()->id)->where("course_id", $course_row->id)->where('status', 1)->first();
        if(isset($user_subscription->id)){
            //Subscription Updating
            $permit_period = $user_subscription->permit_period;
            $update_period = date("Y-m-d H:i:s", strtotime($permit_period . " + 1 month"));
            $data = array(
                'permit_period' => $update_period
            );
            Subscription::where('id', $user_subscription->id)->update($data);
            
        }else{
            //Subscription Saving
            $subscription = new Subscription();
            $subscription->user_id = Auth()->user()->id;
            $subscription->course_id = $course_row->id;     
            $subscription->permit_period = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " + 1 month"));
            $subscription->status = 1;
            $subscription->save();
        }
        
        $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS);

    }



}
