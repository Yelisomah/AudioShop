<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function start(Order $order, PaymentService $payments)
    {
        $payment = $payments->initializePayment([
            'email' => $order->email,
            'amount' => $order->total
        ]);

        return redirect($payment['data']['authorization_url']);
    }

    public function verify(string $reference, PaymentService $payments)
    {
        $result = $payments->verifyPayment($reference);

        if ($result['data']['status'] === 'success') {

            $orderId = $result['data']['metadata']['order_id'];

            $order = Order::findOrFail($orderId);

            $order->update([
                'status' => 'paid'
            ]);

            return view('pages.success', [
                'order' => $order
            ]);
        }

        abort(400, 'Payment verification failed');
    }
}