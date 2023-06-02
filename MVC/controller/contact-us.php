<?php
include_once "model/database.php";

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
?>