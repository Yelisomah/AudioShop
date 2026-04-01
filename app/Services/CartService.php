<?php

namespace App\Services;

class CartService
{
    public function getCart()
    {
        return session()->get('cart', []);
    }

    public function add($product)
    {
        $cart = $this->getCart();

        $id = $product['id'];

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {

            $cart[$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],

                // IMPORTANT FIX
                'image' => $product['image']['desktop'],

                'quantity' => 1
            ];
        }

        session()->put('cart',$cart);
    }

    public function increase($id)
    {
        $cart = $this->getCart();

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }

        session()->put('cart',$cart);
    }

    public function decrease($id)
    {
        $cart = $this->getCart();

        if(isset($cart[$id])){
            $cart[$id]['quantity']--;

            if($cart[$id]['quantity'] <= 0){
                unset($cart[$id]);
            }
        }

        session()->put('cart',$cart);
    }

    public function remove($id)
    {
        $cart = $this->getCart();

        if(isset($cart[$id])){
            unset($cart[$id]);
        }

        session()->put('cart',$cart);
    }
    public function getSubtotal()
    {
        $cart = $this->getCart();

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    public function getShipping()
    {
        return 50;
    }

    public function getVAT()
    {
        return $this->getSubtotal() * 0.2;
    }

    public function getGrandTotal()
    {
        return $this->getSubtotal() + $this->getShipping() + $this->getVAT();
    }
}