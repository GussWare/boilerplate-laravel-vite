import DataTable from "datatables.net";
$.fn.dataTable = DataTable;

import "datatables.net-bs5";
import {showModalConfirm} from "../utils/modal";
import "../utils/alert";

$(document).ready(function () {
  "use strict";

  const base_url = 'http://' + window.location.host;

  $.extend(DataTable.ext.classes, {
    sTable: "dataTable table table-striped table-bordered table-hover",
  });

  new DataTable('#basic-datatable', {
    serverSide: true,
    ajax: {
      url: base_url +'/notifications/pagination'
    },
    columns: [
      { data: 'message', width: "600" }, 
      { data: 'created_at', width: "400" },
      { data: 'actions', orderable: false, searchable: false } 
    ],
    columnDefs: [
      {
        targets: 2,
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
});