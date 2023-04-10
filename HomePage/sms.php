<?php


require 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure


  function sendSMS($to,$content){
    $sid    = "AC7ff764186df417a8cadd82c85cce53fd";
    $token  = "0e87b6d3ba9470d57b2411f4e8122bdb";
    $twilio = new Client($sid, $token);

      $message = $twilio->messages
                        ->create($to,
                                [
                                    "body" => $content,
                                    "from" => "+12055966303"
                                ]
                        );

      return $message;
      if($message){
        echo "<br>message sent to your mobile check to verify";
      }
      else{
        echo "failed to send message server errror 101";
      }
  }
?>
