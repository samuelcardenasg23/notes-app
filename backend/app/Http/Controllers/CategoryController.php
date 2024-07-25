<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::paginate(10);

        return response()->json($categories);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store(
            $request->validated('name'),
        );

        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return response(status: 204);
    }
}
