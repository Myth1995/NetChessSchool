<?php

namespace App\Http\Controllers;

use App\Models\PaymentNcsHistory;
use App\Models\PaymentPackageHistories;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $permit_end_row = Subscription::whereRaw("permit_period < now() and status = 1 and user_id = {$user->id}")->get();
        
        $course = Subscription::where("user_id", Auth()->user()->id)->where("status",1)->where("course_id", $request->course)->first();
        
        $data["failed_row"] = Subscription::whereRaw("user_id = {$user->id} and status = 2")->get();
        $data["permit_end_row"] = $permit_end_row;
        $data["purchase_course"] = $course;
        $data["end_of_course"] = count($permit_end_row);
        $data["purchase_course_id"] = $request->course;
        
        $now = date("Y-m-d H:i:s");
        if(isset($course)){
            $data["purchase_check"] = true;
            
            $current_deadline = date('Y-m-d', strtotime($course->permit_period));

            if($now > $current_deadline){
                $result_deadline = date( "Y-m-d", strtotime($now . " + 1 Month +1 Day") );
            }else{
                $result_deadline = date( "Y-m-d", strtotime($course->permit_period . " + 1 Month +1 Day") );
            }
            
        }else{
            $data["purchase_check"] = false;
            $current_deadline = "";
            $result_deadline = date( "Y-m-d", strtotime(date('Y-m-d H:i:s') . " + 1 Month +1 Day") );
        }

        $data["ncs_histories"] = PaymentNcsHistory::where("user_id", Auth()->user()->id)->orderBy("created_at","desc")->get();
        $data["package_histories"] = PaymentPackageHistories::where("user_id", Auth()->user()->id)->orderBy("created_at","desc")->get();

        $data["current_deadline"] = $current_deadline;
        $data["purchase_deadline"] = $result_deadline;

        return view("client.profile", $data);
    }

    public function getSubscriptionAll(Request $request){
        $subscription_row = Subscription::where('user_id', Auth()->user()->id)->where("status",1)->orderBy("created_at","desc")->get();
        $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS, $subscription_row);
    }

    public function imageUploadPost(Request $request){

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar');
            $fileName = time() . '_' . $avatar->getClientOriginalName(); // Append timestamp to avoid duplicate file names
            $path = $request->file('avatar')->storeAs('avatars', $fileName, 'public'); // Store in the public/uploads directory
            
            // Construct the public URL for the uploaded image
            $imageUrl = asset('storage/' . $path);
            User::where("id", Auth()->user()->id)->update([
                'avatar' => $fileName
            ]);

            $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS);
        } else {
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_IMAGE_UPLOAD_ERROR);
        }

    }

}