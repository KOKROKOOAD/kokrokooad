<?php

namespace App\Http\Controllers;

use App\Services\Mailer;
use Illuminate\Support\Facades\View;
use App\Jobs\RegistrationSuccessfullJob;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendMailsController extends Controller

{

    public function sendMail(){
       /*  $mail =  new Mailer();
        $email = 'jarthur@nalosolutions.com';
        $username = 'jarthur';
        $subject = 'welcome to kokrokoo'; */
        //$message =  $mail->message();
        $user = ['jarthur@nalosolutions.com','Joojo Arthur'];
      //  $mail->sendMail($email,$username,$subject,$mail->message());

     $sendmails =  Mail::send('Mail.register.success', ['user' => $user], function ($m) use ($user) {
        //  $m->from('support@kokrokoo.com', 'support@kokrokoo.com');

          $m->to($user[0], $user[1])->subject('welcome to kokrokoo!');
      });
      if($sendmails){
          echo "Mail sent";
      }
      else{
          echo "Can not send mail";
      }
  }

    }


