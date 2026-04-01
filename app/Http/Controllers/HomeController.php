<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class HomeController extends Controller
{
    public function index(ProductService $products)
    {
        $all = $products->getAllProducts();

        return view('pages.home',[
            'products'=>$all
        ]);
    }
}