<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryService;
use App\Services\Categories\CategoryDataGrid;
use App\Dtos\CategoryDto;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Validations\Categories\CreateCategoryRequest;
use App\Http\Requests\Validations\Categories\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct()
    {
        $categoryRepository = new CategoryRepository();

        $this->categoryService = new CategoryService($categoryRepository);
    }

    public function index()
    {
        return view('categories.index');
    }

    public function pagination(Request $request)
    {
        $notificationDataGrid = new CategoryDataGrid();

        $data = $this->categoryService->pagination($notificationDataGrid);

        return $data;
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $dto = new CategoryDto($request->all());

        $result = $this->categoryService->create($dto);

        return response()->json($result);
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);

        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $dto = new CategoryDto($request->all());

        $result = $this->categoryService->update($id, $dto);

        return response()->json($result);
    }


    public function destroy($id)
    {
        $result = $this->categoryService->delete($id);

        return response()->json($result);
    }
}
