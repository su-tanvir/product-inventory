<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    use ApiResponser;

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->all());
        return $this->showStoredOne($category);
    }

    public function index(): JsonResponse
    {
        $categories = Category::all();
        return $this->showAll($categories);
    }

    public function show(int $id): JsonResponse
    {
        $category = Category::query()->find($id);
        return $this->showOne($category);
    }

    public function showProducts(int $category_id): JsonResponse
    {
        $category = Category::query()->find($category_id);
        if(!$category){
            return $this->errorNotFound();
        }
        return $this->showAll($category->products);
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse|bool
    {
        $category = Category::query()->find($id);
        if(!$category){
            return $this->errorNotFound();
        }
        return $category->update($request->all());
    }

    public function destroy(int $id)
    {
        $category = Category::query()->find($id);
        if(!$category){
            return $this->errorNotFound();
        }
        if($category->products->count() > 0){
            return $this->errorBadRequest();
        }
        return $category->delete();
    }
}
