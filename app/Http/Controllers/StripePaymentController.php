<?php

namespace App\Http\Controllers;

use App\Models\PaymentNcsHistory;
use App\Models\PaymentTransactionHistory;
use App\Models\Service;
use Exception;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Stripe\Exception\CardException;
use Stripe\Product;
use Stripe\StripeClient;
use App\Models\User;

class StripePaymentController extends Controller
{

    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(Config::get("stripe.stripe_secret_key"));
    }

    public function stripeCheckout(Request $request)
    {
        if(!is_numeric($request->ncs)) {
            return redirect()->back();
        }

        try{
            $amount = $request->ncs * 10;
            $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

            $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}&ncs='.$request->ncs.'&payment_amount='.$amount;

            $response =  $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'payment_method_types' => ['link', 'card'],
                'line_items' => [
                    [
                        'price_data'  => [
                            'product_data' => [
                                'name' => "NCS PURCHASING",
                            ],
                            'unit_amount'  => 100 * $amount,
                            'currency'     => 'PLN',
                        ],
                        'quantity'  => 1
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => false
            ]);

            return redirect($response['url']);
        }catch(Exception $e){
            return redirect()->back();
        }        
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        if(!isset($request->ncs)){
            return redirect()->route("profile.index",['type' => 'normal','course' => 0]);
        }

        try{
            $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            info($session);
            
            $successMessage = "We have received your payment request and will let you know shortly.";
            
            $session_row = PaymentNcsHistory::where('session_id', $request->session_id)->first();
            if(isset($session_row->id)) {
                return redirect()->route("profile.index",['type' => 'normal','course' => 0]);
            }
            
            $history_row = new PaymentNcsHistory();
            $history_row->user_id = Auth()->user()->id;
            $history_row->ncs_amount = $request->ncs;
            $history_row->payment_amount = $request->payment_amount;
            $history_row->session_id = $request->session_id;
            $history_row->save();

            $user_amount = Auth()->user()->ncs_coin + $request->ncs;
            User::where('id', Auth()->user()->id)->update([
                'ncs_coin'=> $user_amount
            ]);

            return redirect()->route("profile.index",['type' => 'normal','course' => 0]);
        }catch(Exception $e){
            return redirect()->route("profile.index",['type' => 'normal','course' => 0]);
        }
        
    }

}
?>