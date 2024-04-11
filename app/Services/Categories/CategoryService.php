<?php

namespace App\Services\Categories;

use App\Repositories\CategoryRepository;
use App\Interfaces\ServiceInterface;
use App\Abstracts\DataGridAbsctract;

class CategoryService implements ServiceInterface
{
    protected $categoryRepository;
    protected $categoryDataGrid;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function pagination(DataGridAbsctract $categoryDataGrid)
    {
        $data = $this->categoryRepository->findAll();

        $dataGrid = $categoryDataGrid->getDatagrid($data);

        return $dataGrid;
    }

    public function findAll() {
        $result = $this->categoryRepository->findAll();

        return $result;
    }

    public function findById($id)
    {
        $result = $this->categoryRepository->findById($id);

        return $result;
    }

    public function create($dto)
    {
        $result = $this->categoryRepository->create($dto);

        return $result;
    }

    public function update($id, $dto)
    {
        $result = $this->categoryRepository->update($id, $dto);

        return $result;
    }

    public function delete($id)
    {
        $result = $this->categoryRepository->delete($id);

        return $result;
    }
}
