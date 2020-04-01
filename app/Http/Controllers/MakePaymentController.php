<?php

namespace App\Http\Controllers;

use App\Jobs\RegistrationSuccessfullJob;
use App\Jobs\SendPurchaseReceiptEmailJob;
use App\Models\ScheduledAd;
use App\ScheduledAds;
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

        $item_desc = null;
        if ($request->payby == 'MTN' || $request->payby == 'AIRTELTIGO') {
            $form_data = $request->validate([
                'payby' => 'required|alpha',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
                'subscription_id' => 'required',
                'amount' => 'required|numeric',

            ]);
            $item_desc = "subscription purchase";
        } else {
            $form_data = $request->validate([
                'payby' => 'required|alpha',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
                'subscription_id' => 'required',
                'amount' => 'required|numeric',
                'voucher_code' => 'required|numeric'
            ]);
            $item_desc = $request->voucher_code;
        }


        $name = time() . auth()->user()->email;
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


        $dataArray = array(
            'merchant_id' => 'NPS_000035',
            'secrete' => $secret,
            'key' => $key,
            'order_id' => $subscription_id,
            'customerName' => $name,
            'amount' => 0.3,
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
                echo 'am here';
                $unique_id = uniqid('K', true);
                if (Transactions::where('client_id', '=', $unique_id)) {
                    $unique_id = uniqid('K', true);
                    $transac = Transactions::create([
                        'phone' => $msisdn,
                        'payment_source' => $payby,
                        'transaction_id' => $unique_id,
                        'amount' => $amount,
                        'subscription_id' => $subscription_id,
                        'invoice_id' => $res_obj['InvoiceNo'],
                        'service' => $item_desc,
                        'customer' => $customer,
                        'transaction_status' => 'pending',
                        'transaction_date' => $res_obj['Timestamp'],
                    ]);
                    return response()->json(['success' => 'success']);
                }
            }
        } elseif ($payby === 'VODAFONE') {

            $res = shell_exec("curl -X POST 'https://api.nalosolutions.com/payplus/api/index.php' -d '$data'");
            $res_obj = json_decode($res, true);
            print_r($res_obj);
            if (isset($res_obj['InvoiceNo'])) {

                $unique_id = uniqid('K', true);
                if (Transactions::where('client_id', '=', $unique_id)) {
                    $unique_id = uniqid('K', true);

                    $transac = Transactions::create([
                        'phone' => $msisdn,
                        'payment_source' => $payby,
                        'transaction_id' => $unique_id,
                        'amount' => $amount,
                        'subscription_id' => $subscription_id,
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
    }

    // total amount  to be paid
    public function getSubTotal(Request $request)
    {

        if (is_array($request->id)) {

            $payment = ScheduledAds::select('spots', 'rate')->whereIn('subscription_id', $request->id)->get();
            return response()->json(['status' => 'success', 'payment' => $payment]);
        } else {
            $payment = ScheduledAds::select('spots', 'rate')->where('subscription_id', '=', $request->id)->get();
            return response()->json(['status' => 'success', 'spots' => $payment[0]->spots, 'rate' => $payment[0]->rate]);
        }
    }


    public function makePaymentCallback(Request $request)
    {

        $payment_callback = json_decode($request->getContent(), true);

        if ($payment_callback) {
            $trans = Transactions::whereInvoice_id($payment_callback['InvoiceNo'])->update([
                'transaction_status' => strtolower($payment_callback['Status']),
                'updated_at' => $payment_callback['Timestamp'],
            ]);

            $trans = ScheduledAds::whereSubscription_id($payment_callback['Order_id'])->update([
                'status' => 'pending',
            ]);

            $request->session()->flash('payment-success', 'Hello ,' . auth()->user()->name . ' your transaction with amount of  GHS' . $payment_callback['amount'] . ' was successfully processed');
        }


        // Log::info('checking incoming request', json_decode($request->all(), true));
    }
}
