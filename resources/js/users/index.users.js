import DataTable from "datatables.net";
$.fn.dataTable = DataTable;

import "datatables.net-bs5";
import {showModalConfirm} from "../utils/modal";
import "../utils/alert";

$(document).ready(function () {
  "use strict";

  $.extend(DataTable.ext.classes, {
    sTable: "dataTable table table-striped table-bordered table-hover",
  });

  const base_url = 'http://' + window.location.host;

  new DataTable('#basic-datatable', {
    serverSide: true,
    ajax: {
      url: base_url + '/users/pagination'
    },
    columns: [
      { data: 'name', width: "600" },
      { data: 'email', width: "600" },
      { data: 'created_at', width: "400" },
      { data: 'actions', orderable: false, searchable: false }
    ],
    columnDefs: [
      {
        targets: 3,
        render: function (data, type, row) {
          if (type === 'display') {
            return $('<div/>').html(data).text();
          } else {
            return data;
          }
        }
      }
    ]
  });

  window.deleteUser = function(id) {
    showModalConfirm("Eliminar", "¿Estás seguro de eliminar este registro?", function() {
      $.ajax({
        url: base_url + '/users/destroy/' + id,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
          $('#alert-messages').AlertMessage('success', 'Usuario eliminado correctamente');

          $('#basic-datatable').DataTable().ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          $('#alert-messages').AlertMessage('error', 'Error al eliminar el Usuario');
        }
      });
    }, "danger");
    
  };
});

