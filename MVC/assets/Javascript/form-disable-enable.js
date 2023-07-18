document.addEventListener("DOMContentLoaded", function () {
  const enableFormButton = document.getElementById("enableForm1");
  const disableFormButton = document.getElementById("disableForm1");
  const formUserInformation = document.getElementById("form-user-information");

  enableFormButton.addEventListener("click", function () {
    enableFormButton.style.display = "none";
    disableFormButton.style.display = "inline-block";
    enableForm("form-user-information");
  });

  disableFormButton.addEventListener("click", function () {
    disableFormButton.style.display = "none";
    enableFormButton.style.display = "inline-block";
    disableForm("form-user-information");
  });
});

function enableForm(formId) {
  var form = document.getElementById(formId);
  var inputs = form.getElementsByTagName("input");
  var selects = form.getElementsByTagName("select");

  for (var i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false;
  }

  for (var i = 0; i < selects.length; i++) {
    selects[i].disabled = false;
  }

  // Habilitar el botón "Guardar"
  var submitButton = form.querySelector("input[type='submit']");
  submitButton.disabled = false;
}

function disableForm(formId) {
  var form = document.getElementById(formId);
  var inputs = form.getElementsByTagName("input");
  var selects = form.getElementsByTagName("select");

  for (var i = 0; i < inputs.length; i++) {
    inputs[i].disabled = true;
  }

  for (var i = 0; i < selects.length; i++) {
    selects[i].disabled = true;
  }

  // Deshabilitar el botón "Guardar"
  var submitButton = form.querySelector("input[type='submit']");
  submitButton.disabled = true;
}
