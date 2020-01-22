<?php

namespace App\Http\Controllers;

use App\Jobs\RegistrationSuccessfullJob;
use App\Jobs\SendPurchaseReceiptEmailJob;
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
use function GuzzleHttp\Promise\all;

class MakePaymentController extends Controller
{

    public function makePayment(Request $request)
    {


        $user_name  = explode(' ',auth()->user()->name);
        $name = time().'_'.$user_name[0].'_'.$user_name[1];

        $unique_id = uniqid('K',true);
        if(Transactions::where('client_id', '=',$unique_id)){
            $unique_id = uniqid('K',true);
        }

        $payby = $request->input('payby');
        $msisdn = $request->input('phone');
        $transaction_id = $unique_id;
        $customer =  $name;
        $amount = $request->input('amount');
        $subscription_id = $request->input('subscription_id');
        $item_desc = "subscription purchase";
        $callback =  env("PAY_CALLBACK");



        $api_key = 'vUqBR$Hz';
       // k0kr00gh
        $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $secret = md5('kokrokoogh' . $key . md5('vUqBR$Hz'));
        $src = $_SERVER['REMOTE_ADDR'];
        /*\\
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
            'order_id' => $transaction_id,
            'customerName' => $name,
            'amount' => $amount,
            'item_desc' => $item_desc,
            'customerNumber' => $msisdn,
            'payby' => $payby,
            'callback' =>  'payment/update'                  //'https://api.nalosolutions.com/nalosms/smspay/callback.php'
                //'payment/update'    // action('MakePaymentController@makePaymentCallback')  //route('makepayment-callback,MakePaymentController@MakePaymentCallback')          // 'https://api.nalosolutions.com/nalosms/smspay/callback.php',
        );


        $data  = json_encode($dataArray, true);


        if ($payby == 'MTN' || $payby == 'AIRTEL'){

            $res = shell_exec("curl -X POST 'https://api.nalosolutions.com/payplus/api/index.php' -d '$data'");

            $res_obj  = json_decode($res);

            die($res_obj->accepted);

        //    return response()->json(['success'=> 'success']);


        }



    }

    // total amount  to be paid
    public function getSubTotal(Request $request){

        if(is_array($request->id)){

            $payment  = ScheduledAds::select('spots','rate')->whereIn('subscription_id',$request->id)->get();
            return response()->json(['status'=>'success','payment'=> $payment]);

        }
        else{
            $payment  = ScheduledAds::select('spots','rate')->where('subscription_id','=',$request->id)->get();
            return response()->json(['status'=>'success','spots' => $payment[0]->spots,'rate'=>$payment[0]->rate]);
        }

    }


    public function makePaymentCallback(Request $request)
    {

        $data  = $request->all();
       // dd($data);


        //  Log::info($res->getStatusCode());

        //  Log::channel('paylog')->info('Loging response to API call ' . $res->getStatusCode());

        /*  if ($res->getBody()->getContents() == 200) {
            $transac = Transactions::create([
                'phone' => $phoneNumber,
                'payment_source' => $network,
                'transaction_id' => $transaction_id,
                'amount' => $amount,
                'subscription_id' => $subscription_id,
                'service' => $service,
                'status' => $success,
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
}
