<?php


namespace App\Services\Impl;


use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        $products = $this->productRepository->getAll();
        return $products;
    }

    public function findById($id)
    {
        $product = $this->productRepository->findById($id);

        $statusCode = 200;
        if (!$product)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'products' => $product
        ];
        return $data;
    }

    public function create($request)
    {
        $product = $this->productRepository->create($request);

        $statusCode = 201;
        if (!$statusCode)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'products' => $product
        ];
        return $data;
    }

    public function update($request, $id)
    {
        $oldProduct = $this->productRepository->findById($id);

        if (!$oldProduct) {
            $newProduct = null;
            $statusCode = 404;
        } else {
            $newProduct = $this->productRepository->update($request, $oldProduct);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'products' => $newProduct
        ];
        return $data;
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findById($id);

        $statusCode = 404;
        $message = "Product not found";
        if ($product) {
            $this->productRepository->destroy($product);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
