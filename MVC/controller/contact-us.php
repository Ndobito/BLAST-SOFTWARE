<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

  // Configuración del correo
  $destinatario = 'Animal2023world@gmail.com';
  $asunto = 'sugerencias';

  // Cuerpo del correo
  $contenido = "Nombre: $nombre\n";
  $contenido = "Apellido: $apellido\n";
  $contenido .= "Email: $email\n";
  $contenido .= "Mensaje: $mensaje\n";

  // Envío del correo
  $headers = "From: $email \r\n";
  $headers .= "Reply-To: $email \r\n";

  if (mail($destinatario, $asunto, $contenido, $headers)) {
    echo 'El mensaje ha sido enviado correctamente.';
  } else {
    echo 'Ha ocurrido un error al enviar el mensaje.';
  }
}