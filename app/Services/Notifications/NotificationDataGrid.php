<?php

namespace App\Services\Notifications;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use App\Abstracts\DataGridAbsctract;


class NotificationDataGrid extends DataGridAbsctract
{

    public function __construct()
    {
    }

    public function getDatagrid($data)
    {
        return DataTables::of($data)
        ->addColumn('actions', function ($row) {
            $editLink = '<a href="' . URL::route("notifications.edit", $row->id) . '" class="btn btn-primary btn-sm">Editar</a>';
            return $editLink;
        })
        ->addColumn('created_at', function ($row) {
            return $row->created_at->format('F j, Y');
        })->make(true);
    }
}
