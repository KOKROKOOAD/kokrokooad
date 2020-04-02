<?php

namespace App\Http\Controllers;

use App\Jobs\RegistrationSuccessfullJob;
use App\Jobs\SendPurchaseReceiptEmailJob;
use App\Models\ScheduledAd;
use App\ScheduledAds;
use App\Services\SendTextMessage;
use App\User;
use Illuminate\Http\Request;
use App\Transactions;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Auth;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class MakePaymentController extends Controller
{

    public function makePayment(Request $request)
    {

        function __construct()
        {
            $this->middleware('auth');
        }


        $trans_info = Transactions::select('amount', 'phone', 'subscription_id', 'transaction_id')->whereInvoice_id('10033459')->first();
        $users = ScheduledAds::find($trans_info->subscription_id);

        // send email
        $this->dispatch(new SendPurchaseReceiptEmailJob($users->user));

        die($users->user);

        $item_desc = null;
        if ($request->payby == 'MTN' || $request->payby == 'AIRTELTIGO') {
            $form_data = $request->validate([
                'payby' => 'required|alpha',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
                'subscription_id' => 'required',
                'amount' => 'required|numeric',
                'media_house_id' => 'required'

            ]);
            $item_desc = "subscription purchase";
        } else {
            $form_data = $request->validate([
                'payby' => 'required|alpha',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
                'subscription_id' => 'required',
                'amount' => 'required|numeric',
                'voucher_code' => 'required|numeric',
                'media_house_id' => 'required'

            ]);
            $item_desc = $request->voucher_code;
        }


        // $name = time() . auth()->user()->email;
        $name =  auth()->user()->name;
        $payby = $request->input('payby');
        $msisdn = $request->input('phone');
        $customer = $name;
        $amount = $request->input('amount');
        $subscription_id = $request->input('subscription_id');

        $callback = env("PAY_CALLBACK");

        $msisdn = substr($msisdn, 1, 9);

        $api_key = 'vUqBR$Hz';
        $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $secret = md5('kokrokoogh' . $key . md5('vUqBR$Hz'));
        $src = $_SERVER['REMOTE_ADDR'];
        $transaction_id = uniqid('K', true);

        if (Transactions::where('transaction_id', '=', $transaction_id)) {
            $transaction_id = uniqid('K', true);
        }


        $dataArray = array(
            'merchant_id' => 'NPS_000035',
            'secrete' => $secret,
            'key' => $key,
            'order_id' => $transaction_id,
            'customerName' => $name,
            'amount' => 0.1,
            'item_desc' => $item_desc,
            'customerNumber' => '233' . $msisdn,
            'payby' => $payby,
            'callback' => 'http://kokrokooad.com/user-account/payment/update'
        );


        $data = json_encode($dataArray, true);

        if ($payby == 'MTN' || $payby == 'AIRTELTIGO') {

            $res = shell_exec("curl -X POST 'https://api.nalosolutions.com/payplus/api/index.php' -d '$data'");
            $res_obj = json_decode($res, true);
            if (isset($res_obj['InvoiceNo'])) {

                $transac = Transactions::create([
                    'phone' => '233' . $msisdn,
                    'payment_source' => $payby,
                    'transaction_id' => $transaction_id,
                    'amount' => $amount,
                    'subscription_id' => $subscription_id,
                    'media_house_id' => $request->media_house_id,
                    'invoice_id' => $res_obj['InvoiceNo'],
                    'service' => $item_desc,
                    'customer' => $customer,
                    'transaction_status' => 'pending',
                    'transaction_date' => $res_obj['Timestamp'],
                ]);
                return response()->json(['success' => 'success']);
            }
        } elseif ($payby === 'VODAFONE') {

            $res = shell_exec("curl -X POST 'https://api.nalosolutions.com/payplus/api/index.php' -d '$data'");
            $res_obj = json_decode($res, true);
            if (isset($res_obj['InvoiceNo'])) {

                $transac = Transactions::create([
                    'phone' => '233' . $msisdn,
                    'payment_source' => $payby,
                    'transaction_id' => $transaction_id,
                    'amount' => $amount,
                    'subscription_id' => $subscription_id,
                    'media_house_id' => $request->media_house_id,
                    'invoice_id' => $res_obj['InvoiceNo'],
                    'service' => $item_desc,
                    'customer' => $customer,
                    'transaction_status' => 'pending',
                    'transaction_date' => $res_obj['Timestamp'],
                ]);
                return response()->json(['success' => 'success']);
            }
        }
    }

    // total amount  to be paid
    public function getSubTotal(Request $request)
    {

        if (is_array($request->id)) {

            $payment = ScheduledAds::select('spots', 'rate', 'media_house_id')->whereIn('subscription_id', $request->id)->get();
            return response()->json(['status' => 'success', 'payment' => $payment, 'media_house_id' => $payment[0]->media_house_id]);
        } else {
            $payment = ScheduledAds::select('spots', 'rate', 'media_house_id')->where('subscription_id', '=', $request->id)->get();
            return response()->json(['status' => 'success', 'spots' => $payment[0]->spots, 'rate' => $payment[0]->rate, 'media_house_id' => $payment[0]->media_house_id]);
        }
    }


    public function makePaymentCallback(Request $request)
    {

        $payment_callback = json_decode($request->getContent(), true);
        if ($payment_callback['InvoiceNo'] && $payment_callback['Status'] == "PAID") {
            $trans = Transactions::whereInvoice_id($payment_callback['InvoiceNo'])->update([
                'transaction_status' => strtolower($payment_callback['Status']),
                'updated_at' => $payment_callback['Timestamp'],
            ]);

            $trans_info = Transactions::select('amount', 'phone', 'subscription_id', 'transaction_id')->whereInvoice_id($payment_callback['InvoiceNo'])->first();
            $users = ScheduledAds::find($trans_info->subscription_id);

            $trans = ScheduledAds::whereSubscription_id($trans_info->subscription_id)->update([
                'status' => 'pending',
            ]);


            // send email
            $this->dispatch(new SendPurchaseReceiptEmailJob($users->user, $trans_info->amount, $trans_info->transaction_id));
            //send text
            $sendText = new SendTextMessage();
            $text =   $sendText->paymentMessage($users->user->name, $trans_info->amount, $trans_info->transaction_id, env('SMS_USERNAME'), env("SMS_PASSWORD"), $users->user->phone1);


            $request->session()->flash('payment-success', 'Hello ,' . $users->user->name . ' your transaction with amount of  GHS' . $payment_callback['amount'] . ' was successfully processed');
        }
    }
}
