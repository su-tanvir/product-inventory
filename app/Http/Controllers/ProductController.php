<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    use ApiResponser;

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->all());
        return $this->showStoredOne($product);
    }

    public function index(): JsonResponse
    {
        $products = Product::all();
        return $this->showAll($products);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::query()->find($id);
        return $this->showOne($product);
    }

    public function update(UpdateProductRequest $request, int $id): JsonResponse|bool
    {
        $product = Product::query()->find($id);
        if(!$product){
            return $this->errorNotFound();
        }
        return $product->update($request->all());
    }

    public function destroy(int $id)
    {
        $product = Product::query()->find($id);
        if(!$product){
            return $this->errorNotFound();
        }
        return $product->delete();
    }
}
