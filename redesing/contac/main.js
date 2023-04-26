
const form = document.getElementById('contact-form');
const modal = document.querySelector('.modal');
const closeBtn = document.getElementById('close');
const opacidad = document.querySelector('.opacidad');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  if (form.checkValidity()) {
    // Si todos los campos requeridos están llenos, mostrar la ventana emergente
    modal.style.display = 'block';
    opacidad.style.display = 'block';
  }
});

closeBtn.addEventListener('click', () => {
  // Ocultar la ventana emergente cuando se hace clic en el botón 'Volver'
  modal.style.display = 'none';
  opacidad.style.display = 'none';
});
