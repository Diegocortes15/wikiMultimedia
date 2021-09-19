<?php
    $connection = new mysqli('sql5.freesqldatabase.com', 'sql5438492', 'UHMWCVN3KS', 'sql5438492');
    //$connection = new mysqli('localhost', 'root', '123456', 'wikimultimedia');
    //localhost,usuario,contraseña,baseDdato
    if($connection->connect_error){
        echo $error -> $connection->connect_error;
    }
?>
