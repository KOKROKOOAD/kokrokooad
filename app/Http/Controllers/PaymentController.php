<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

  public function  payment(Request $request){

      $client = new Client();

      $network = $request->input('network');
      $phoneNumber = $request->input('phone');
      $transaction_id = $request->input('trans_id');
      $amount = $request->input('amount');
      $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
      $secrete = md5(env('MERCHANT_USERNAME'). $key . md5(env('MERCHANT_PASSWORD')));
      $formData = array(
          'merchant_id' => env('MERCHANT_ID'),
          'secret' => $secrete,
          'key'    => $key,
          'callback' =>  env('PAYCALL_BACK'),
          'order_id' => $transaction_id,
          'amount' => $amount,
          'item_desc' => env('ITEM_DESC').auth()->user()->client_id.''.date('Y-m-d H:i:s'),
          'customerNumber' => $phoneNumber,
          'payby' => $network,
          'customerName' => auth()->user()->client_id
      );

      $res = $client->request('POST', 'http://213.133.97.233/payplus/api/index.php', [
          'form_params' => $formData

      ]);
              $res->getStatusCode();
      // 200
              $res->getHeader('content-type');
      // 'application/json; charset=utf8'
              $res->getBody();
      // {"type":"User"...'
             dd($res);
}


}
