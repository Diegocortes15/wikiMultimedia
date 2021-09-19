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
        include ("include/templates/header_barra_visitante.php");
    }
                
?>
    </header>
    <main class="contenedor">
        <?php require_once('include/funciones/bd_conexion.php');
        $articulo_id = $_GET['id'];
        
        if($usuario || $usuario=='admin_wikimultimedia@gmail.com')
        {
            include ("include/templates/validar_articulo_edit.php");
        }

        ?>

        <div class="background_blanco_articulo">
        
        <?php
        $sql = "SELECT * FROM `articulos_editar` WHERE `id_edicion`= $articulo_id";
        $resultado = $connection->query($sql);
        while (($consulta = $resultado -> fetch_assoc())) {
           $id_articulo_oficial=$consulta['id_articulo_edit'];
         }

        $sql = "SELECT * FROM `articulos` WHERE `id_articulo`= $id_articulo_oficial";
        $resultado = $connection->query($sql);
        while (($consulta = $resultado -> fetch_assoc())) { ?>
           <h3 class="fw_700"> Editando artículo: <a class="url_articulo_original" href="articulo.php?id=<?php echo $consulta['id_articulo'];?>" target="_blank"><?php echo $consulta['titulo_articulo'];?><i class="fas fa-mouse-pointer"></i></a></h3>
        <?php } ?>

        

        <?php
        $sql = "SELECT * FROM `articulos_editar` WHERE `id_edicion`= $articulo_id";
        $resultado = $connection->query($sql);
        while (($consulta = $resultado -> fetch_assoc())) {
            
            if($consulta['categoria_articulo_edit']=='modelado3d')
            {
                $categoria_ui="Modelado 3D";
            }
            else if($consulta['categoria_articulo_edit']=='procesamiento_imagenes')
            {
                $categoria_ui="Procesamiento de Imagenes";
            }
            else if($consulta['categoria_articulo_edit']=='animacion')
            {
                $categoria_ui="Animación";
            }
            else if($consulta['categoria_articulo_edit']=='lenguajes_de_programacion')
            {
                $categoria_ui="Lenguajes de Programación";
            }

            ?>
            <h3 class="titulo_articulo fw_700"><?php echo $consulta['titulo_articulo_edit'];?></h3>

            <h4 class="subtitulo_articulo fw_700">Resumen</h4>
            <p>
                <?php echo $consulta['resumen_articulo_edit'];?>
            </p>

            <h4 class="subtitulo_articulo fw_700"><?php echo $consulta['subtitulo_articulo_edit'];?></h4>
            <p class="contenido_articulo">
            <?php echo $consulta['contenido_articulo_edit'];?>
            </p>

            <img class="imagen_articulo" src="<?php echo $consulta['multimedia_articulo_edit'];?>" alt="<?php echo $consulta['titulo_articulo_edit'];?>">

            <h4 class="subtitulo_articulo fw_700">Referencias</h4>
            <ul>
                <li class="referencia_articulo"><?php echo $consulta['referencias_articulo_edit'];?></li>
            </ul>

            <h4 class="subtitulo_articulo fw_700">Categoria</h4>
            
                <a class="btn_<?php echo $consulta['categoria_articulo_edit'];?> fw_700" href="<?php echo $consulta['categoria_articulo_edit'];?>.php"><?php echo $categoria_ui;?></a>

        </div>

        <?php } 
        
        $connection->close();

        ?>
    </main>
    <?php include_once 'include/templates/footer.php'; ?>