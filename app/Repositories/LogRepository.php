<?php

namespace App\Repositories;

use App\Models\Log;
use App\Interfaces\RepositoryInterface;


class LogRepository implements RepositoryInterface
{

    public function findAll()
    {
        $r =  Log::with(['notification', 'channel', 'user'])
        ->get();

        return $$r;
    }

    public function findAllByNotificationId($notificationId = 56)
    {
        $logs = Log::with(['notification', 'channel', 'user'])
            ->where('notification_id', $notificationId)
            ->get();

        return $logs;
    }

    public function findById($id)
    {
        return Log::find($id);
    }

    public function create($obj)
    {
        $data = $obj->toArray();
        return Log::create($data);
    }

    public function update($id, $obj)
    {
        $data = $obj->toArray();
        return Log::find($id)->update($data);
    }

    public function delete($id)
    {
        return Log::destroy($id);
    }
}
