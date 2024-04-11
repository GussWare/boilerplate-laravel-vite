import "jquery-validation";
import { addErrorMessage } from "../utils/modal";
import "../utils/alert";

$(document).ready(function () {
  "use strict";

  const form = $('#form-create');
  const base_url = 'http://' + window.location.host;
  const formValidate = form.validate();


  form.on('submit', function (e) {
    e.preventDefault();

    let isValid = formValidate.valid();

    if (!isValid) return false;

    let formDataArray = $(this).serializeArray();
    let dataObject = {};

    $.each(formDataArray, function (index, item) {
      var name = item.name;
      var value = item.value;

      if (name.includes('[]')) {
        name = name.replace('[]', '');

        if (dataObject[name] === undefined) {

          dataObject[name] = [value];
        } else {

          dataObject[name].push(value);
        }
      } else {

        dataObject[name] = value;
      }
    });

    $.ajax({
      url: base_url + '/users/store',
      type: 'POST',
      data: dataObject,
      beforeSend: function () {
        $("#btn-guardar").attr("disabled", true);
      },
      success: function (response) {
        $('#alert-messages').AlertMessage('success', 'Usuario creado correctamente');
        form[0].reset();
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