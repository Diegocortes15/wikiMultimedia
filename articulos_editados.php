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


        <h2 class="barra_titulo_seccion centrar_contenido fw_300">Artiuculos Editados</h2>

        <div class="entradas">

        <?php
        require_once('include/funciones/bd_conexion.php');

        $sql = "SELECT * FROM `articulos_editar` ORDER BY `articulos_editar`.`id_edicion` DESC";
        $resultado = $connection->query($sql);

        while (($consulta = $resultado -> fetch_assoc())) {?>
    <div class="entrada column_6">
        <div class="contenido_entrada">
            <img class="column_6_2" src="<?php echo $consulta['multimedia_articulo_edit'];?>" alt="<?php echo $consulta['titulo_articulo_edit'];?>">
            <div class="contenidotxt_entrada column_6_2">
                <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo_edit'];?>"> <a href="articulo_editado_validar.php?id=<?php echo $consulta['id_edicion'];?>"><?php echo $consulta['titulo_articulo_edit'];?></a></h3>
                <p><span class="titulo_<?php echo $consulta['categoria_articulo_edit'];?> fw_700">Fecha:</span> <?php echo $consulta['fecha_articulo_edit'];?></p>
                <p><span class="titulo_<?php echo $consulta['categoria_articulo_edit'];?> fw_700">Autor Artículo:</span> <?php echo $consulta['autor_articulo_edit'];?></p>
                <p class="resumen_articulo">
                    <?php echo $consulta['resumen_articulo_edit'];?>
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