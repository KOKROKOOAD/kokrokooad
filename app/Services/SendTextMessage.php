<?php

namespace App\Services;

class SendTextMessage
{


    public function paymentMessage($name,$amount,$ref, $sms_username, $sms_pass, $phone)
    {
        $phone = '233' . substr($phone, -9);
        $message = 'Hello ' . $name .',\n'. 'Your kokrokooad subscription payment was  successfully processed. kindly  see transaction details below.' .
            '\n' . 'amount: GHS' . $amount . '\n' . ' Ref # : ' . $ref . '\n' . 'Thanks for choosing kokrokooad.com
       ';

        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $sms_username . "&password=" . urlencode($sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);
    }

    public function sendSubConfirmationText($name, $phone, $sms_username, $sms_pass, $message)
    {
        $phone = '233' . substr($phone, -9);
       


        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $sms_username . "&password=" . urlencode($sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);

        return $response;
    }
}
