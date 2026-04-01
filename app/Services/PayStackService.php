<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaystackService
{
    public function initializePayment($email, $amount)
    {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
        ->post(env('PAYSTACK_PAYMENT_URL').'/transaction/initialize',[
            'email'=>$email,
            'amount'=>$amount,
            'callback_url'=>route('payment.callback')
        ]);

        return $response->json();
    }

    public function verifyPayment($reference)
    {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
        ->get(env('PAYSTACK_PAYMENT_URL')."/transaction/verify/".$reference);

        return $response->json();
    }
}