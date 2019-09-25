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
        $item_desc = "subscription";
        //$account_type = $request->input('acc_type');
        $callback =  env("PAY_CALLBACK");


        $api_key = 'vUqBR$Hz';
        $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $secret = md5('kokrokoogh' . $key . md5('vUqBR$Hz'));
        $src = $_SERVER['REMOTE_ADDR'];
        /*
        $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $secrete = md5("kokrokoo" . $key . md5('3bksh!9$'));
        $dataArray = array("merchant_id" => "NPS_000002", "secrete" => "$secrete", "key" => "$key", "order_id" => "$order_id", "customerName" => "$username", "amount" => "$amount", "item_desc" => "$item_desc", "customerNumber" => "$msisdn", "payby" => "$payby", "callback" => "$callback");
        $data = json_encode($dataArray, true);
        $src = $_SERVER['REMOTE_ADDR'];
        file_put_contents("syslog.log", date('Y-m-d H:i:s') . " $src || $data" . PHP_EOL, FILE_APPEND); */
        // echo $data;

        $dataArray = array(
            'merchant_id' => 'NPS_000035',
            'secrete' => $secret,
            'key'    => $key,
            'order_id' => $order_id,
            'customerName' => auth()->user()->name,
            'amount' => $amount,
            'item_desc' => $item_desc,
            'customerNumber' => '233244560186',
            'payby' => $payby,
            'callback' =>   redirect()->route('makepayment-callback')  //route('makepayment-callback,MakePaymentController@MakePaymentCallback')          // 'https://api.nalosolutions.com/nalosms/smspay/callback.php',
        );

        $data  = json_encode($dataArray, true);
        //Log::info(Carbon::now()->format('Y-m-d H:i:s') . " $src || ", $data);

        /*  $res = $client->request(
            'POST',
            'https://api.nalosolutions.com/payplus/api/index.php',
            [
                'data' => $data
            ]
        ); */

        $res = shell_exec("curl -X POST 'https://api.nalosolutions.com/payplus/api/index.php' -d '$data'");


        return response($res);


        //  Log::info($res->getStatusCode());

        //  Log::channel('paylog')->info('Loging response to API call ' . $res->getStatusCode());

        /*  if ($res->getBody()->getContents() == 200) {
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
            if ($transac) {
                return response()->json('success');
            } else {
                return response()->json('error');
            }
        } else {
            return response()->json('failed');
        }
 */
    }

    public function makePaymentCallback()
    {
        if (isset($_GET['invoice'])) {
            dd($_GET['invoice']);
        }
    }
}
