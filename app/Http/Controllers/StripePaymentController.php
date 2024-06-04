<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransactionHistory;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Stripe\Exception\CardException;
use Stripe\Product;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{

    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(Config::get("stripe.stripe_secret_key"));
    }


    // public function stripe()
    // {
    //     $product = Config::get('stripe.product');
    //     return view('stripe', compact('product'));
    // }

    public function stripeCheckout(Request $request)
    {
        $product_check = Service::where("id", $request->product_id)->first();
        if (!$product_check) {
            return redirect()->back();   
        }

        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';

        $payment_history = new PaymentTransactionHistory();
        $payment_history->user_id = Auth()->user()->id;
        $payment_history->course_id = $product_check->id;
        $payment_history->checkout_link = $redirectUrl;
        $payment_history->amount = $product_check->price;
        $payment_history->save();
        session()->put('history-id', $payment_history->id);
    
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $product_check->title,
                        ],
                        'unit_amount'  => 100 * $product_check->price,
                        'currency'     => 'PLN',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {

        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        
        $successMessage = "We have received your payment request and will let you know shortly.";


        $history_id = session()->get("history-id");
        $history_row = PaymentTransactionHistory::where("id", $history_id)->first();
        if (!isset($history_row->id)) {
            return redirect()->back();
        }
        PaymentTransactionHistory::where("id", $history_row->id)->update([
            "status" => 1
        ]);

        if(Auth()->user()->sponser_id == null){
            return redirect()->route("profile.index");
        }

        return redirect()->route("mlm.dashboard");
    }

    private function createToken($fullName, $cardNumber, $month, $year, $cvv)
    {

        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardNumber,
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $cvv
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'eur',
                'source' => $tokenId,
                'description' => 'Stripe_payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
?>