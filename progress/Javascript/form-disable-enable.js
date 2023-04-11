// form-User-Information
document.getElementById("enableForm1").addEventListener("click", function() {
    enableForm("form-user-information");
  });
  
  document.getElementById("disableForm1").addEventListener("click", function() {
    disableForm("form-user-information");
  });
  
  // Habilitar y deshabilitar form2
  document.getElementById("enableForm2").addEventListener("click", function() {
    enableForm("form-pet-information");
  });
  
  document.getElementById("disableForm2").addEventListener("click", function() {
    disableForm("form-pet-information");
  });
  
  // Funciones para habilitar y deshabilitar campos del formulario
  function enableForm(formId) {
    var inputs = document.getElementById(formId).getElementsByTagName("input");
    var selects = document.getElementById(formId).getElementsByTagName("select");
    
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].disabled = false;
    }
    
    for (var i = 0; i < selects.length; i++) {
      selects[i].disabled = false;
    }
  }
  
  function disableForm(formId) {
    var inputs = document.getElementById(formId).getElementsByTagName("input");
    var selects = document.getElementById(formId).getElementsByTagName("select");
    
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].disabled = true;
    }
    
    for (var i = 0; i < selects.length; i++) {
      selects[i].disabled = true;
    }
  }
  