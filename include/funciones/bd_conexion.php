<?php
    $connection = new mysqli('remotemysql.com', 'rCSLmQy2P5', 'HRHTJWszfZ', 'rCSLmQy2P5');
    //$connection = new mysqli('localhost', 'root', '123456', 'wikimultimedia');
    //localhost,usuario,contraseña,baseDdato
    if($connection->connect_error){
        echo $error -> $connection->connect_error;
    }
?>
