<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransactionHistory;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends MyController
{
    public function index(){

        $data["services"] = Service::where("status",1)->where("parent",0)->orderBy("id","asc")->get();
        return view('client.service', $data);
    }

    public function purchasePackage(Request $request){
        
        $product_check = Service::where("id", $request->product_id)->first();
        if (!$product_check) {
            return redirect()->back();   
        }

        $payment_history = new PaymentTransactionHistory();
        $payment_history->user_id = Auth()->user()->id;
        $payment_history->course_id = $product_check->id;
        $payment_history->amount = $product_check->price;
        $payment_history->save();
        session()->put('history-id', $payment_history->id);

    }
    
}
