<?php

include_once "model/"; 

class knowUsController{

    public function knowUs(){
        $style = "<link rel='stylesheet' href='assets/css/style-know-us.css'>"; 
        require_once "view/head.php"; 
        require_once "view/know-us/know-us.php"; 
        require_once "view/footer.php"; 
    }

}

?>