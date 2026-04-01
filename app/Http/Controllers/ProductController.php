<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
    public function show($slug, ProductService $products)
    {
        return view('pages.product',[
            'product'=>$products->getProduct($slug)
        ]);
    }
}