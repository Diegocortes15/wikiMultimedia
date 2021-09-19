<?php include_once 'include/templates/head.php'; ?>

<?php include 'include/templates/header_barra_visitante.php'; ?>

        <div class="hero_registro_ingresar">
            <h2 class="titulo_banner barra_banner centrar_contenido fw_400">Iniciar Sesión</h2>
        </div>
    </header>

    <main class="form_login_singin">

        <form action="" method="POST">
            <div class="contenido_formulario">
                <label for="email">Dirección de correo electronico</label>
                <div id="error_email"></div>
                <input type="email" id="email" name="email" placeholder="Correo electronico" required>
                <label for="password">Contraseña</label>
                <div id="error_password"></div>
                <input type="password" id="password" name="password" placeholder="* * * * * * * * * * * *" required>
            </div>
            <div id="error_formulario_registro"></div>
            <div class="submit_login_singin">
                <input type="submit" id="Ingresar" value="Ingresar" class="boton3 fw_700">
            </div>
        </form>

    </main>

    <?php

        try {
            //code...
            require_once('include/funciones/bd_conexion.php');

            session_start();

            $email = $_POST['email'];
            $password = $_POST['password'];

            if(trim($email) == '' && trim($password) == '')
            {
                echo"<script language='javascript'>
                    var error_formulario_registro = document.getElementById('error_formulario_registro');
                    error_formulario_registro.style.display = 'block';
                    error_formulario_registro.innerHTML = 'Por favor complete todos los campos.';
                    </script>";
            }
            else {
                $sql = "SELECT * FROM `registros` WHERE `correo_usuario` = '$email'";
                $resultado = $connection->query($sql);
                $contador=mysqli_num_rows($resultado);
                 
                if($contador > 0)
                {
                    while ($consulta=$resultado->fetch_assoc()) {
                        if(password_verify($password, $consulta['contrasenia_usuario']))
                        {
                        $_SESSION['usuario'] = $email;
                        header('Location: index.php');
                        }
                        else {
                            echo"<script language='javascript'>
                            var error_formulario_registro = document.getElementById('error_formulario_registro');
                            error_formulario_registro.style.display = 'block';
                            error_formulario_registro.innerHTML = 'La contraseña para {$email} no coincide.';
                            </script>";
                        }
                    }
                }
                else {
                    echo"<script language='javascript'>
                    var error_formulario_registro = document.getElementById('error_formulario_registro');
                    error_formulario_registro.style.display = 'block';
                    error_formulario_registro.innerHTML = 'El correo {$email} no se encuentra registrado.';
                   </script>";
                }
            }



        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }

    ?>

    <?php 
    $connection->close();
    include_once 'include/templates/footer.php'; 
    ?>