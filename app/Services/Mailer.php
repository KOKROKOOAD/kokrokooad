<?php

namespace  App\Services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

Class Mailer
{
    function sendMail($emailAdd,$username,$subject,$message){

       // require 'vendor/autoload.php';	// load Composer's autoloader
        $mail = new PHPMailer(true);   // Passing `true` enables exceptions

     try {
        // Server settings
        $mail->SMTPDebug = 0;     // Enable verbose debug output
        $mail->isSMTP();     // Set mailer to use SMTP
        $mail->Host = env('MAIL_HOST');	 // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;          // Enable SMTP authentication
        $mail->Username = env('MAIL_USERNAME');             // SMTP username
        $mail->Password = env('MAIL_PASSWORD');              // SMTP password
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');   // Enable TLS encryption, `ssl` also accepted
        $mail->Port = env('MAIL_PORT');  // TCP port to connect to

        //Recipients
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Mailer');
        $mail->addAddress($emailAdd, $username);	// Add a recipient, Name is optional
        $mail->addReplyTo(env('MAIL_USERNAME'), 'Mailer');
       // $mail->addCC('his-her-email@gmail.com');
        //$mail->addBCC('his-her-email@gmail.com');

        //Attachments (optional)
        // $mail->addAttachment('/var/tmp/file.tar.gz');// Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

        //Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject =  $subject;
        $mail->Body    =  $message;	// message

        $mail->send();
        
        Log::info('Message has been sent!');
    }   catch (Exception $e) {
         Log::info('Failed, Message could not be sent.');
    }
}

 function message(){
     return view('Mail.register.success');
 }
    }

