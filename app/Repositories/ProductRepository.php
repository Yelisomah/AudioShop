<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;

class ProductRepository
{
    protected $products;

    public function __construct()
    {
        $path = database_path('data/data.json');

        $this->products = json_decode(File::get($path), true);
    }

    public function all()
    {
        return $this->products;
    }

    public function findBySlug($slug)
    {
        return collect($this->products)->firstWhere('slug', $slug);
    }

    public function getByCategory($category)
    {
        return collect($this->products)
            ->where('category', $category)
            ->values();
    }
}