const enviarBtn = document.getElementById("enviar-btn");
const modal = document.querySelector(".modal");
const opacidad = document.querySelector(".opacidad");
const cerrarBtn = document.getElementById("close");
enviarBtn.addEventListener("click", function(event) {
  event.preventDefault();
  const isFormValid = ["email", "message"].every(id => {
    const inputField = document.getElementById(id);
    return inputField.value.trim() !== "";
  });
  if (isFormValid) {
    modal.style.display = "block";
    opacidad.style.display = "block";
  }
});
cerrarBtn.addEventListener("click", function() {
  modal.style.display = "none";
  opacidad.style.display = "none";
});