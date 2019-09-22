<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Auth;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;

class MakePaymentController extends Controller
{
    //
    public function makePayment(Request $request)
    {



        $client = new Client();

        $payby = $request->input('payby');
        $msisdn = $request->input('phone');
        $transaction_id =  uniqid('k', true);
        $order_id = auth()->user()->name . "_" . Carbon::now();
        $amount = $request->input('amount');
        $order_id = $request->input('invoice_id');
        $subscription_id = $request->input('subscription_id');
        $client_id = auth()->user()->client_id;
        $media_house_id = $request->input('media_house_id');
        $item_desc = "subscription purchase";
        //$account_type = $request->input('acc_type');
        $callback =  env("PAY_CALLBACK");



        $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $secrete = md5(env('MERCHANT_USERNAME') . $key . md5(env('MERCHANT_PASSWORD')));
        $src = $_SERVER['REMOTE_ADDR'];

        $dataArray = array(
            'merchant_id' => env('MERCHANT_ID'),
            'secret' => $secrete,
            'key'    => $key,
            'order_id' => $order_id,
            'customerName' => auth()->user()->name,
            'amount' => $amount,
            'item_desc' => $item_desc,
            'customerNumber' => $msisdn,
            'payby' => $payby,
            'callback' =>  'https://api.nalosolutions.com/nalosms/smspay/callback.php',
        );

        $data  = json_encode($dataArray, true);
        Log::info(Carbon::now()->format('Y-m-d H:i:s') . " $src || ", $data);

        $res = $client->request(
            'POST',
            'https://api.nalosolutions.com/payplus/api/index.php',
            [
                'Content' => 'application/json',
                'data' => $data

            ]
        );

        Log::info($res->getStatusCode());

        Log::channel('paylog')->info('Loging response to API call ' . $res->getStatusCode());

        return response()->json($res->getBody()->getContents());



        // 200
        //  $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        //$res->getBody();
        /*  $success = 'failed';
               if($phoneNumber){
                   $success = 'success';
                   $transac = Transactions::create([
                       'phone' => $phoneNumber,
                       'payment_source' => $network,
                       'transaction_id' => $transaction_id,
                       'media_house_id' => $media_house_id,
                       'amount' => $amount,
                       'invoice_id' => $invoice_id,
                       'client_id' => $client_id,
                       'subscription_id' => $subscription_id,
                       'service' => $service,
                       'transaction_status' => $success,
                       'transact_charge' => $amount_charge,
                       'response'   => '{response: success}',
                   ]);
                   if ($transac){
                       return response()->json('success');

                   }
                   else{
                       return response()->json('error');
                   }


               }
               else{
                   return response()->json('failed');
               } */
    }
}
