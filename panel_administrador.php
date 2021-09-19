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


        <h2 class="barra_titulo_seccion centrar_contenido fw_300">Secciones</h2>

        <div class="entradas">

            <div class="entrada icono_panel_administrador column_6">
                <a class="usuarios_editores_admin boton_editor fw_700" href="usuarios_editores.php"><i class="fas fa-users"></i> Usuarios Editores</a>
            </div>

            <div class="entrada icono_panel_administrador  column_6">
                <a class="usuarios_editores_admin boton_editor fw_700" href="articulos_administrador.php"><i class="fas fa-user-tie"></i> Mis Artículos</a>
            </div>

            <div class="entrada icono_panel_administrador  column_6">
                <a class="usuarios_editores_admin boton_editor fw_700" href="articulos_editados.php"><i class="fas fa-newspaper"></i> Validar artículos editados</a>
            </div>

            <div class="entrada icono_panel_administrador  column_6">
                <a class="usuarios_editores_admin boton_editor fw_700" href="articulo_nuevo.php">Nuevo artículo</a>
            </div>

        </div>
    </main>
    <?php include_once 'include/templates/footer.php'; ?>