<?php

namespace App\Services\Channels;

use Yajra\DataTables\DataTables;
use App\Abstracts\DataGridAbsctract;
use Illuminate\Support\Facades\URL;

class ChannelDataGrid extends DataGridAbsctract
{
    public function __construct()
    {
    }

    public function getDatagrid($data)
    {
        $result =  DataTables::of($data)
            ->addColumn('actions', function ($row) {
                $editLink = '<a href="' . URL::route("channels.edit", $row->id) . '" class="btn btn-primary btn-sm">Editar</a>';
                $deleteLink = '<button onclick="deleteChannel(' . $row->id . ')" class="btn btn-danger btn-sm">Eliminar</button>';

                return $editLink . ' ' . $deleteLink;
            })
            ->addColumn('created_at', function($row) {
                return $row->created_at->format('F j, Y');
            })
            ->make(true);

        return $result;
    }
}
