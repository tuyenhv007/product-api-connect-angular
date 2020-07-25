<?php


namespace App\Repositories\Impl;


use App\Product;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ProductRepository;

class ProductRepositoryImpl extends EloquentRepository implements ProductRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Product::class;
        return $model;
    }
}
