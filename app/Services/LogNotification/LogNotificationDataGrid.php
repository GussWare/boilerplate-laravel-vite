<?php
namespace App\Services\LogNotification;

use Yajra\DataTables\DataTables;
use App\Abstracts\DataGridAbsctract;

class LogNotificationDataGrid extends DataGridAbsctract
{

    public function getDatagrid($data)
    {
        $result =  DataTables::of($data)
            ->addColumn('created_at', function($row) {
                return $row->created_at->format('F j, Y');
            })
            ->make(true);


        return $result;
    }
}
