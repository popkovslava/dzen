<?php

namespace App\Services\Sms;

class SmsService implements SmsServiceInterface
{

    public function sendRocketSMS($message = null)
    {
        $messageQuery = http_build_query($message);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://api.rocketsms.by/simple/send');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $messageQuery);
        @json_decode(curl_exec($curl), true);
    }
}
