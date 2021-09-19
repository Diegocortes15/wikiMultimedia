<form class="gestionar_articulo" action="" method="POST">
<?php

    $sql = "SELECT * FROM `registros` WHERE `correo_usuario` = '$usuario'";
    $resultado = $connection->query($sql);

    while ($consulta = $resultado -> fetch_assoc()) {
     # code...
     $usuario_id=$consulta['id_usuario'];
    }

    $sql = "SELECT * FROM `articulos` WHERE `id_articulo` = '$articulo_id'";
    $resultado = $connection->query($sql);

    while ($consulta = $resultado -> fetch_assoc()) {
     # code...
     $usuario_id_articulo=$consulta['usuario_id'];
    }

    if($usuario_id==$usuario_id_articulo || $usuario=='admin_wikimultimedia@gmail.com')
    { ?>
        <input type="submit" class="boton_editor_eliminar" name="eliminar" value="Eliminar Artículo">
    <?php }
?>
<a href="articulo_editar.php?id=<?php echo $articulo_id;?>"class="boton_editor">Editar Artículo</a>
</form>

<?php
    
    $eliminar=$_POST['eliminar'];
    
    if(isset($eliminar)){

        $sql = "SELECT * FROM `articulos` WHERE `id_articulo` = '$articulo_id'";
        $resultado = $connection->query($sql);
    
        while ($consulta = $resultado -> fetch_assoc()) {
         # code...
         $multimedia_articulo=$consulta['multimedia_articulo'];
        }
        unlink($multimedia_articulo);

        $contador_archivos = count(glob("archivos_articulos/$usuario_id_articulo/{*.png, *jpg, *jpeg, *gif}",GLOB_BRACE));
        if($contador_archivos==0){
            rmdir("archivos_articulos/".$usuario_id_articulo);
        }

        $sql="DELETE FROM `articulos` WHERE `id_articulo` = $articulo_id";
        $resultado = $connection->query($sql);

        $sql = "SELECT * FROM `articulos_editar` WHERE `id_articulo_edit` = '$articulo_id'";
        $resultado = $connection->query($sql);
    
        while ($consulta = $resultado -> fetch_assoc()) {
         # code...
         $multimedia_articulo=$consulta['multimedia_articulo_edit'];
         unlink($multimedia_articulo);

         $contador_archivos = count(glob("archivos_articulos/$usuario_id_articulo/{*png, *jpg, *jpeg, *gif}",GLOB_BRACE));

            if($contador_archivos==0){
                rmdir("archivos_articulos/".$usuario_id_articulo);
            }

        }

        $sql="DELETE FROM `articulos_editar` WHERE `id_articulo_edit` = $articulo_id";
        $resultado = $connection->query($sql);
    
    header('Location: categorias.php');
    }
?>