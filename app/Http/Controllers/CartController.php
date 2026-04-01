<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CartService;

class CartController extends Controller
{
    public function index(CartService $cart)
    {
        return view('pages.cart',[
            'cart'=>$cart->getCart(),
            'subtotal'=>$cart->getSubtotal(),
            'shipping'=>$cart->getShipping(),
            'vat'=>$cart->getVAT(),
            'grandTotal'=>$cart->getGrandTotal()
        ]);
    }

    public function add(Request $request, ProductService $products, CartService $cart)
    {
        $productId = $request->product_id;

        $product = $products->getProductById($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart->add($product);

        return redirect('/cart');
    }
    public function increase($id, CartService $cart)
    {
        $cart->increase($id);

        return redirect('/cart');
    }

    public function decrease($id, CartService $cart)
    {
        $cart->decrease($id);

        return redirect('/cart');
    }

    public function remove($id, CartService $cart)
    {
        $cart->remove($id);

        return redirect('/cart');
    }
}
