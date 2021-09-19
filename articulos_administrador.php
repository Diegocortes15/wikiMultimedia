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


        <h2 class="barra_titulo_seccion centrar_contenido fw_300">Mis Artículos</h2>
        <div class="btn_nuevo_articulo">
            <a class="boton_editor fw_700" href="articulo_nuevo.php">Nuevo artículo</a>
        </div>

        <div class="entradas">

        <?php
        require_once('include/funciones/bd_conexion.php');

        $sql = "SELECT * FROM `registros` WHERE `correo_usuario` = '$usuario'";
                $resultado = $connection->query($sql);

                while ($consulta = $resultado -> fetch_assoc()) {
                    # code...
                    $usuario_id=$consulta['id_usuario'];
                }

        $sql = "SELECT * FROM `articulos` WHERE `usuario_id` = $usuario_id ORDER BY `articulos`.`id_articulo` DESC";
        $resultado = $connection->query($sql);

        while (($consulta = $resultado -> fetch_assoc())) {?>
    <div class="entrada column_6">
        <div class="contenido_entrada">
            <img class="imagen_preview column_6_2" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
            <div class="contenidotxt_entrada column_6_2">
                <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>"> <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>"><?php echo $consulta['titulo_articulo'];?></a></h3>
                <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span> <?php echo $consulta['fecha_articulo'];?></p>
                <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span> <?php echo $consulta['autor_articulo'];?></p>
                <p class="resumen_articulo">
                    <?php echo $consulta['resumen_articulo'];?>
                </p>
            </div>
        </div>
    </div>
        <?php }
        $connection->close();
        ?>

        </div>
    </main>
    <?php include_once 'include/templates/footer.php'; ?>