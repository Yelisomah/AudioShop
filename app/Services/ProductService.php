<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProducts()
    {
        return $this->repository->all();
    }

    public function getProduct($slug)
    {
        return $this->repository->findBySlug($slug);
    }

    public function getProductById($id)
    {
        return collect($this->repository->all())
                ->firstWhere('id', (int) $id);
    }

    public function getProductsByCategory($category)
    {
        return $this->repository->getByCategory($category);
    }
    
}