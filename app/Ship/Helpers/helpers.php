<?php

/*
|--------------------------------------------------------------------------
| Ship Helpers
|--------------------------------------------------------------------------
|
| Write only general helper functions here.
| Container specific helper functions should go into their own related Containers.
| All files under app/{section_name}/{container_name}/Helpers/ folder will be autoloaded by Apiato.
|
*/

if (!function_exists('createOTP')) {
    /*
    * Generate OTP
    * Author: Sazal Ahamed
    */
    function createOTP() {
      return rand(1111, 9999);
    }
    /* End */
}

if (!function_exists('sendOTP')) {
    /*
    * Send OTP to mobile
    * Author: Sazal Ahamed
    */
    function sendOTP($number, $otp) {
        // Account details
        $apiKey = urlencode(config('app.localtext_api_key'));

        // Message details
        $numbers = array($number);
        $sender = urlencode(config('app.localtext_sender'));
        $message = rawurlencode('Hi, '.$otp.' is your OTP to your account for Onsite Fuel Delivery - Webassic IT Solutions');

        $numbers = implode(',', $numbers);
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // $response =json_decode($response,true);
        //
        //  if(array_key_exists("errors",$response)){
        //
        //       // \Log::error('SMS Response Error : '.print_r($response,true));
        //       return false;
        //  }else{
        //
        //      // \Log::info('SMS Response : '.print_r($response,true));
        //      return true;
        //  }
        dd($response);

        // Process your response here
        // \Log::info('Registeration Otp --> Mobile'.$orderDetails['mobile'].' Otp '.$orderDetails['otp']);
        // return false;

    }
    /* End */
}
