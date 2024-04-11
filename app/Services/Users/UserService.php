<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use App\Interfaces\ServiceInterface;
use App\Abstracts\DataGridAbsctract;

class UserService implements ServiceInterface
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function pagination(DataGridAbsctract $UserDataGrid)
    {
        $data = $this->UserRepository->findAll();

        $dataGrid = $UserDataGrid->getDatagrid($data);

        return $dataGrid;
    }

    public function findAll()
    {
        $result = $this->UserRepository->findAll();

        return $result;
    }

    public function findById($id)
    {
        $result = $this->UserRepository->findById($id);

        return $result;
    }

    public function findByCategories($categories)
    {
        $result = $this->UserRepository->findByCategories($categories);

        return $result;
    }

    public function create($dto)
    {
        $result = $this->UserRepository->create($dto);

        $this->UserRepository->associateChannels($result, $dto->channels);

        $this->UserRepository->associateCategories($result, $dto->categories);

        return $result;
    }

    public function update($id, $dto)
    {
        $result = $this->UserRepository->update($id, $dto);

        $this->UserRepository->associateChannels($result, $dto->channels);

        $this->UserRepository->associateCategories($result, $dto->categories);

        return $result;
    }

    public function delete($id)
    {
        $result = $this->UserRepository->delete($id);

        return $result;
    }
}
