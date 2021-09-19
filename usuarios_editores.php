<?php include_once 'include/templates/head.php'; ?>


<?php
                
    session_start();

    $usuario=$_SESSION['usuario'];

    if($usuario=='admin_wikimultimedia@gmail.com')
    {
        include ("include/templates/header_barra_administrador.php");
    }
    else
    {
        header('Location: index.php');
    }
                
?>

        <div class="hero_panel_editor">
            <h2 class="titulo_banner barra_banner centrar_contenido fw_400">Panel de administrador</h2>
        </div>
    </header>
    <main class="background_blanco_pagina contenedor">

        <h2 class="barra_titulo_seccion centrar_contenido fw_300">Usuarios Editores</h2>

        <?php
            try {
                //code...
                require_once('include/funciones/bd_conexion.php');

                $sql = "SELECT * FROM `registros`";
                $resultado = $connection->query($sql);
            } catch (\Throwable $th) {
                //throw $th;
                echo $th->getMessage();
            }
        ?>

        <div class="usuarios_editores">
            <?php
                while ($consulta = $resultado->fetch_assoc()) { ?>

                        <p class="correo_usuario fw_700 column_6"><?php echo $consulta['correo_usuario']?></p>

            <?php   }   ?>

            

        </div>
        
        <?php
            $connection->close();
        ?>

    </main>
    <?php include_once 'include/templates/footer.php'; ?>