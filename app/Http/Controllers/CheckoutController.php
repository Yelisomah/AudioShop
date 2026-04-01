<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\PaystackService;

class CheckoutController extends Controller
{
    public function index(CartService $cart)
    {
        return view('pages.checkout',[
            'cart'=>$cart->getCart(),
            'subtotal'=>$cart->getSubtotal(),
            'shipping'=>$cart->getShipping(),
            'vat'=>$cart->getVAT(),
            'grandTotal'=>$cart->getGrandTotal()
        ]);
    }

    public function process(Request $request, CartService $cart, PaystackService $paystack)
    {

        if($request->payment_method == "emoney")
        {

            $payment = $paystack->initializePayment(
                $request->email,
                $cart->getGrandTotal() * 100
            );

            return redirect($payment['data']['authorization_url']);

        }

        session()->put('order',[
            'customer'=>$request->all(),
            'items'=>$cart->getCart(),
            'total'=>$cart->getGrandTotal()
        ]);

        session()->forget('cart');

        return redirect('/checkout/success');
    }
    public function callback(Request $request, CartService $cart, PaystackService $paystack)
    {

        $payment = $paystack->verifyPayment($request->reference);

        if($payment['data']['status'] == "success")
        {

            session()->put('order',[
                'items'=>$cart->getCart(),
                'total'=>$cart->getGrandTotal(),
                'payment_reference'=>$request->reference
            ]);

            session()->forget('cart');

            return redirect('/checkout/success');

        }

        return redirect('/checkout')->with('error','Payment failed');

    }
}