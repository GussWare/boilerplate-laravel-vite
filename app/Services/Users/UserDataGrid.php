<?php

namespace App\Services\Users;

use Yajra\DataTables\DataTables;
use App\Abstracts\DataGridAbsctract;
use Illuminate\Support\Facades\URL;

class UserDataGrid extends DataGridAbsctract
{

    public function __construct()
    {
    }

    public function getDatagrid($data)
    {
        return DataTables::of($data)
            ->addColumn('actions', function ($row) {
                $editLink = '<a href="' . URL::route("users.edit", $row->id) . '" class="btn btn-primary btn-sm">Editar</a>';
                $deleteLink = '<button onclick="deleteUser(' . $row->id . ')" class="btn btn-danger btn-sm">Eliminar</button>';

                return $editLink . ' ' . $deleteLink;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('F j, Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
