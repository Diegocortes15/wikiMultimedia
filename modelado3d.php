<?php include_once 'include/templates/head.php'; ?>
<?php
                
    session_start();

    $usuario=$_SESSION['usuario'];

    if(!$usuario)
    {
        include ("include/templates/header_barra_visitante.php");
    }
    else if($usuario=='admin_wikimultimedia@gmail.com')
    {
        include ("include/templates/header_barra_administrador.php");
    }
    else
    {
        include ("include/templates/header_barra_editor.php");
    }
                
?>

        <div class="hero_modelado3d">
            <h2 class="titulo_banner barra_banner centrar_contenido fw_400">Modelado3d</h2>
        </div>
    </header>
    <div class="background_blanco_pagina contenedor">

    <main class="entradas">

<main class="entradas">



<?php
        require_once('include/funciones/bd_conexion.php');
        $sql = "SELECT * FROM `articulos` WHERE `categoria_articulo` = 'modelado3d' ORDER BY `articulos`.`id_articulo` DESC";
        $resultado = $connection->query($sql);

        while (($consulta = $resultado -> fetch_assoc())) {?>
    <div class="entrada column_6">
        <div class="contenido_entrada">
            <img class="imagen_preview" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
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

</main>
    </div>
    <?php include_once 'include/templates/footer.php'; ?>