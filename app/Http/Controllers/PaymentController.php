<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\CourseUser;
use App\Models\Payment;
use App\Models\RequestedLessions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(Request $request)
    {
//        dd($request->all());
        $amount = $request->amount;
        $bill_id = $request->course_id;
        $child_id = $request->child_id;
        $req_id = $request->req_id;
        return view('payment.payment')
            ->with('amount', $amount)
            ->with('child_id', $child_id)
            ->with('req_id', $req_id)
            ->with('bill_id', $bill_id);
    }

    public function savePayment(Request $request)
    {
//        dd($request->all());
        Stripe::setApiKey("sk_test_OUlWcJ4QuBhVLhgG7Ivccx6T00Jizbf3vC");

        $token = $_POST['stripeToken'];

        $description = "Course ID " . $request->course_id . " payment By " . Auth::user()->id;

        $charge = Charge::create([
            'amount' => floatval($request->amount) * 100,
            'currency' => 'LKR',
            'description' => $description,
            'source' => $token,
            'metadata' => ['order_id' => $request->course_id],
        ]);
        if ($charge->status == "succeeded") {
            $payment = new Payment();
            $payment->customer_id = Auth::user()->id;
            $payment->bill_id = $request->course_id;
            $payment->payment_method = $charge->source->brand;
            $payment->card_last_digit = $charge->source->last4;
            $payment->total_amount = $request->amount;
            $payment->card_name = $request->card_name;
            $res = $payment->save();

            $cu=new CourseUser();
            $cu->course_id = $request->course_id;
            $cu->user_id = $request->child_id;
            $res2 = $cu->save();

            $rq = RequestedLessions::where('id',$request->req_id)->update(['status'=>0]);

////
////            send sms
//            if (!is_null(Auth::user()->contact)) {
//
//                $apiKey = urlencode('cIGgjndT+iE-K6ESkeKNrXndTQ3XJPFH5GxA4uQPtP');
//
//                $numbers = array(Auth::user()->contact);
//                $sender = urlencode('water bill');
//                $message = rawurlencode($request->invoice_no . " Water bill - " . ucfirst($request->month) . ' of LKR. ' . $request->amount . ' paid. Due amount LKR. ' . $balance);
//
//                $numbers = implode(',', $numbers);
//
//                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
//
//                $result = $this->post('https://api.txtlocal.com/send/', array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message));
////            dd($result);
//
//            }
            return redirect()->route('requestPayLessons')->with('success', 'Payment Success!');


        } else {
            return redirect()->route('requestPayLessons')->with('error', 'Payment Not Success! Please try again.');
        }
    }

//    private function post($url, $postVars = array())
//    {
//        $postStr = http_build_query($postVars);
//        $options = array(
//            'http' =>
//                array(
//                    'method' => 'POST', //We are using the POST HTTP method.
//                    'header' => 'Content-type: application/x-www-form-urlencoded',
//                    'content' => $postStr //Our URL-encoded query string.
//                )
//        );
//        $streamContext = stream_context_create($options);
//        $result = file_get_contents($url, false, $streamContext);
//        if ($result === false) {
//            $error = error_get_last();
//            throw new Exception('POST request failed: ' . $error['message']);
//        }
//        return $result;
//    }
}
