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

        <div class="hero_secciones">
            <h2 class="titulo_banner barra_banner centrar_contenido fw_400">Categorías</h2>
        </div>
    </header>
    <div class="background_blanco_pagina contenedor">
        <main class="categorias">
            <a class="btn_animacion fw_700" href="animacion.php">Animación</a>
            <a class="btn_procesamiento_imagenes fw_700" href="procesamiento_imagenes.php">Procesamiento de Imagenes</a>
            <a class="btn_lenguajes_de_programacion fw_700" href="lenguajes_de_programacion.php">Lenguajes de programación</a>
            <a class="btn_modelado3d fw_700" href="modelado3d.php">Modelado 3D</a>
        </main>
        <section class="entradas">
        <?php
                    require_once('include/funciones/bd_conexion.php');
                    $sql = "SELECT * FROM `articulos` ORDER BY `articulos`.`id_articulo` DESC";
                    $resultado = $connection->query($sql);
    
                    while (($consulta = $resultado -> fetch_assoc())) {
                        if($consulta['categoria_articulo']=='modelado3d')
                        {
                            $categoria_ui="Modelado 3D";
                        }
                        else if($consulta['categoria_articulo']=='procesamiento_imagenes'){
                            $categoria_ui="Procesamiento de Imagenes";
                        }
                        else if($consulta['categoria_articulo']=='animacion'){
                            $categoria_ui="Animación";
                        }
                        else if($consulta['categoria_articulo']=='lenguajes_de_programacion'){
                            $categoria_ui="Lenguajes de Programación";
                        }
                        ?>
                <div class="entrada column_6">
                    <a class="btn_<?php echo $consulta['categoria_articulo'];?> fw_700" href="<?php echo $consulta['categoria_articulo'];?>.php"><?php echo $categoria_ui;?></a>
                    <div class="contenido_entrada">
                        <img class="column_6_2 imagen_preview" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
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

        </section>
    </div>
    <?php include_once 'include/templates/footer.php'; ?>