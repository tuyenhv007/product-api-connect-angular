<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $dataProduct = $this->productService->findById($id);
        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function store(Request $request)
    {
        $dataProduct = $this->productService->create($request->all());
        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataProduct = $this->productService->update($request->all(), $id);
        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function destroy($id)
    {
        $dataProduct = $this->productService->destroy($id);
        return response()->json($dataProduct['message'], $dataProduct['statusCode']);
    }
}
