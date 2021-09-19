<?php include_once 'include/templates/head.php'; ?>
<?php include_once 'include/templates/header_barra_visitante.php'; ?>

<div class="hero_registro_ingresar">
    <h2 class="titulo_banner barra_banner centrar_contenido fw_400">Registro</h2>
</div>
</header>

<main class="form_login_singin">
    <form action="" method="POST">
        <div class="contenido_formulario">

            <label for="email">Dirección de correo electronico</label>
            <div id="error_email"></div>
            <input type="email" id="email" name="email" placeholder="Correo electornico" >
            
            <label for="password">Contraseña</label>
            <div id="error_password"></div>
            <input type="password" id="password" name="password" placeholder="* * * * * * * * * * * *" >
            
            <label for="password_confirm">Confirmar Contraseña</label>
            <div id="error_password_confirm"></div>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="* * * * * * * * * * * *" >
            
        </div>
        <div id="error_formulario_registro"></div>
        <div class="submit_login_singin">
            <input type="submit" id="Registrar" value="Registrar" class="boton3 fw_700">
        </div>
    </form>
</main>

    <?php

        try {
            //code...
            require_once('include/funciones/bd_conexion.php');

            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            

            $sql = "SELECT *  FROM registros WHERE correo_usuario='$email';";
            $resultado = $connection->query($sql);
            $contador=mysqli_num_rows($resultado);

            if($contador>0)
            {
                echo"<script language='javascript'>
                    var error_formulario_registro = document.getElementById('error_formulario_registro');
                    error_formulario_registro.style.display = 'block';
                    error_formulario_registro.innerHTML = 'El correo {$email}  ya se encuentra registrado.';
                    </script>
                    ";
            }
            else{
                if(trim($password) == '' || trim($password_confirm) =='' || trim($email)=='')
                {
                    
                    echo"<script language='javascript'>
                    var error_formulario_registro = document.getElementById('error_formulario_registro');
                    error_formulario_registro.style.display = 'block';
                    error_formulario_registro.innerHTML = 'Por favor complete todos los campos.';
                    </script>
                    ";
                }
                else if(trim($password) == trim($password_confirm))
                { 
                $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cost'=>7]);
                $sql = "INSERT INTO `registros` (`id_usuario`, `correo_usuario`, `contrasenia_usuario`) VALUES (NULL, '$email', '$hashed_password')";
                $resultado = $connection->query($sql);
                header('Location: ingresar.php');
                }
                else
                {
                    
                    echo"<script language='javascript'>
                    var error_formulario_registro = document.getElementById('error_formulario_registro');
                    error_formulario_registro.style.display = 'block';
                    error_formulario_registro.innerHTML = 'Las contraseñas no coinciden.';
                    </script>
                    ";
                }
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }

    ?>

<?php 
$connection->close();
include_once 'include/templates/footer.php'; ?>