<?php

namespace App\Services\LogNotification;

use App\Repositories\LogRepository;
use App\Abstracts\DataGridAbsctract;

class LogNotificationService
{
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }


    public function pagination(DataGridAbsctract $logDataGrid, int $notificationId)
    {
        $data = $this->logRepository->findAllByNotificationId($notificationId);

        $dataGrid = $logDataGrid->getDatagrid($data);

        return $dataGrid;
    }

    public function create($dto)
    {
        $result = $this->logRepository->create($dto);

        return $result;
    }
}
