<?php

namespace App\Services\Channels;

use App\Repositories\ChannelRepository;
use App\Abstracts\DataGridAbsctract;
use App\Interfaces\ServiceInterface;


class ChannelService implements ServiceInterface
{
    protected $channelRepository;

    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

    public function pagination(DataGridAbsctract $channelDataGrid)
    {
        $data = $this->channelRepository->findAll();

        $dataGrid = $channelDataGrid->getDatagrid($data);

        return $dataGrid;
    }

    public function findAll() {
        $result = $this->channelRepository->findAll();

        return $result;
    }

    public function findById($id) 
    {
        $result = $this->channelRepository->findById($id);

        return $result;
    }

    public function create($dto)
    {
        $result = $this->channelRepository->create($dto);

        return $result;
    }

    public function update($id, $dto)
    {
        $result = $this->channelRepository->update($id, $dto);

        return $result;
    }

    public function delete($id)
    {
        $result = $this->channelRepository->delete($id);

        return $result;
    }
}
