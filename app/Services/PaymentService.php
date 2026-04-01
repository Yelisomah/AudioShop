<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentService
{
    protected string $secret;

    public function __construct()
    {
        $this->secret = config('services.paystack.secret');
    }

    public function initializePayment(array $data)
    {
        $response = Http::withToken($this->secret)
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => $data['email'],
                'amount' => $data['amount'] * 100
            ]);

        return $response->json();
    }

    public function verifyPayment(string $reference)
    {
        $response = Http::withToken($this->secret)
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        return $response->json();
    }
}