<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class CategoryController extends Controller
{
    // public function show($category, ProductService $products)
    // {
    //     return view('pages.category',[
    //         'category'=>$category,
    //         'products'=>$products->getCategoryProducts($category)
    //     ]);
    // }
    public function show($category, ProductService $products)
    {
        return view('pages.category', [
            'category' => $category,
            'products' => $products->getProductsByCategory($category)
        ]);
    }
}