<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
    public function createOrder($data, $cart)
    {
        $order = Order::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'city'=>$data['city'],
            'country'=>$data['country'],
            'payment_method'=>$data['payment']
        ]);

        foreach($cart as $item){

            OrderItem::create([
                'order_id'=>$order->id,
                'product_name'=>$item['name'],
                'price'=>$item['price'],
                'quantity'=>$item['qty']
            ]);

        }

        return $order;
    }
}