<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

<<<<<<< HEAD
    class Contact{
        
        public function Contact(){
            $style = "<link rel='stylesheet' href='assets/css/style-contact-us.css'>"; 
            require_once "view/head.php"; 
            require_once "view/index/index.php"; 
            require_once "view/footer.php"; 
        } 
        
        public function suggestions(){
            $name = $_POST['name'];
            $surnames = $_POST['surname'];
            $username = $_POST['username'];
            $message =$_POST['message'];
                // Registrar la sugerencia   en la base de datos
            $sql = "SELECT username FROM contact WHERE username = $username";
            $stmt = Database::Conectar()->prepare($sql);
            $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $sql = "INSERT INTO sigup (name, surname, username, message) VALUES (?, ?, ?, ?)";
                    $stmt = Database::Conectar()->prepare($sql);
                    echo "Se a enviado la sugerencia correctamente";         
                } 
                else {
                    echo "Error al enviar sugerencia por  favor registrese o inicie secion: " . $stmt->error;
                }

        }
    }
=======
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
>>>>>>> 6f616153bea1047cf40b3e088b62c25f48ddd063
?>