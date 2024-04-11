<?php

namespace App\Services\Notifications;

use App\Repositories\NotificationRepository;
use App\Repositories\LogRepository;
use App\Interfaces\ServiceInterface;
use App\Abstracts\DataGridAbsctract;

class NotificationService implements ServiceInterface
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function pagination(DataGridAbsctract $notificationDataGrid)
    {
        $data = $this->notificationRepository->findAll();

        $dataGrid = $notificationDataGrid->getDatagrid($data);

        return $dataGrid;
    }

    public function findAll()
    {
        $result = $this->notificationRepository->findAll();

        return $result;
    }

    public function findById($id)
    {
        $result = $this->notificationRepository->findById($id);

        return $result;
    }

    public function findLogsByNotificationId($id)
    {
        $result = $this->notificationRepository->findLogsByNotificationId($id);

        return $result;
    }

    public function create($dto)
    {
        $result = $this->notificationRepository->create($dto);

        return $result;
    }

    public function update($id, $dto)
    {
        $result = $this->notificationRepository->update($id, $dto);

        return $result;
    }

    public function delete($id)
    {
        $result = $this->notificationRepository->delete($id);

        return $result;
    }
}
