<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\LotRequest;
use App\Services\CategoryService;
use App\Services\LotService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function index() {
        return $this->categoryService->showIndexPage();
    }

    public function create() {
        return $this->categoryService->showCreatePage();
    }

    public function store(CategoryRequest $request) {
        return $this->categoryService->storeCategory($request);
    }

    public function update(CategoryRequest $request) {
        return $this->categoryService->updateCategory($request);
    }

    public function delete(CategoryRequest $request) {
        return $this->categoryService->deleteCategory($request);
    }
}
