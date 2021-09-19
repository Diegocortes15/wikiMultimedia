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
    </header>
    <main class="contenedor">
        <?php require_once('include/funciones/bd_conexion.php');
        $articulo_id = $_GET['id'];

        
        if($usuario || $usuario=='admin_wikimultimedia@gmail.com')
        {
            include ("include/templates/editar_eliminar_articulo.php");
        }

        ?>

        <div class="background_blanco_articulo">
        
        <?php
        $sql = "SELECT * FROM `articulos` WHERE `id_articulo`= $articulo_id";
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
            
            <h3 class="titulo_articulo fw_700"><?php echo $consulta['titulo_articulo'];?></h3>

            <h4 class="subtitulo_articulo fw_700">Resumen</h4>
            <p>
                <?php echo $consulta['resumen_articulo'];?>
            </p>

            <h4 class="subtitulo_articulo fw_700"><?php echo $consulta['subtitulo_articulo'];?></h4>
            <p class="contenido_articulo">
            <?php echo $consulta['contenido_articulo'];?>
            </p>

            <img class="imagen_articulo" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">

            <h4 class="subtitulo_articulo fw_700">Referencias</h4>
            <ul>
                <li class="referencia_articulo"><?php echo $consulta['referencias_articulo'];?></li>
            </ul>

            <h4 class="subtitulo_articulo fw_700">Categoria</h4>
            
                <a class="btn_<?php echo $consulta['categoria_articulo'];?> fw_700" href="<?php echo $consulta['categoria_articulo'];?>.php"><?php echo $categoria_ui;?></a>
            
                <div class="calificar_articulos">
                <h4 class="calificacion_titulo">Califica este articulo</h4>
                    <div>
                        <i class="fas fa-star" data-index="0"></i>
                        <i class="fas fa-star" data-index="1"></i>
                        <i class="fas fa-star" data-index="2"></i>
                        <i class="fas fa-star" data-index="3"></i>
                        <i class="fas fa-star" data-index="4"></i>
                    </div>
                </div>

                <?php
                if(isset($POST['save'])){
                    $ID=$connection->real_scape_string($_POST['IDu']);
                    $calificacion=$connection->real_scape_string($_POST['calificacion']);
                    $calificacion++;
                    $sql = "INSERT INTO calificaciones(id_calificacion, rating, id_art) VALUES (NULL,'$calificacion','$articulo_id')";
                    $resultado = $connection->query($sql);
                }
                ?>
                
            <div class="compartir_articulo">
                <span>
                <i class="fas fa-copy" id="boton_link_articulo"></i>
                </span>
                <p>Copiar enlace del articulo</p>
            </div>
            
            <span id="mensaje_link_articulo" class="mensaje_link_articulo"></span>
            <input type="text" id="link_articulo" class="link_articulo" value="wikimultimedia.epizy.com/articulo.php?id=<?php echo $articulo_id;?>">
        </div>
        <?php } 
        
        $connection->close();

        ?>
    </main>
    <?php include_once 'include/templates/footer.php'; ?>