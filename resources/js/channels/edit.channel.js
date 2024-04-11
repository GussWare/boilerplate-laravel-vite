import "jquery-validation";

import { addErrorMessage } from "../utils/modal";
import "../utils/alert";


$(document).ready(function () {
  "use strict";

  const form = $('#form-edit');
  const base_url = 'http://' + window.location.host;
  const formValidate = form.validate();


  form.on('submit', function (e) {
    e.preventDefault();

    let isValid = formValidate.valid();

    if (!isValid) return false;

    let formDataArray = $(this).serializeArray();
    let dataObject = {};

    $.each(formDataArray, function (i, item) {
      dataObject[item.name] = item.value;
    });

    const id = dataObject.id;

    $.ajax({
      url: base_url + '/channels/update/' + id,
      type: 'PUT',
      data: dataObject,
      beforeSend: function () {
        $("#btn-guardar").attr("disabled", true);
      },
      success: function (response) {
        $('#alert-messages').AlertMessage('success', 'Categoria Actualizada Correctamente');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        var errors = jqXHR.responseJSON.errors;

        addErrorMessage(errors);
      },
      complete: function () {
        $("#btn-guardar").removeAttr("disabled");
      }
    });
  });
});