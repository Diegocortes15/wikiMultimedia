<?php
    $connection = new mysqli('localhost', 'root', 'root', 'wikimultimedia');
    //$connection = new mysqli('localhost', 'root', '123456', 'wikimultimedia');
    //localhost,usuario,contraseña,baseDdato
    if($connection->connect_error){
        echo $error -> $connection->connect_error;
    }
?>