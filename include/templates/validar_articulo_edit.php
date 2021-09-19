<form class="gestionar_articulo" action="" method="POST">
<?php

    if($usuario=='admin_wikimultimedia@gmail.com')
    { ?>
        <input type="submit" class="boton_editor_eliminar" name="eliminar" value="Eliminar Edición">
        <input type="submit" class="boton_editor_aceptar" name="aceptar" value="Aceptar Edición">
    <?php }
?>
</form>

<?php
    
    $sql = "SELECT * FROM `articulos_editar` WHERE `id_edicion` = '$articulo_id'";
    $resultado = $connection->query($sql);

    while ($consulta = $resultado -> fetch_assoc()) {
     # code...
    $usuario_id_articulo=$consulta['usuario_id_edit'];
    }

    $eliminar=$_POST['eliminar'];
    $aceptar=$_POST['aceptar'];
    
    if(isset($eliminar)){

        $sql = "SELECT * FROM `articulos_editar` WHERE `id_edicion` = '$articulo_id'";
        $resultado = $connection->query($sql);
    
        while ($consulta = $resultado -> fetch_assoc()) {
         # code...
         $multimedia_articulo=$consulta['multimedia_articulo_edit'];
         $usuario_id_edit = $consulta['usuario_id_edit'];
        }
        unlink($multimedia_articulo);

        $contador_archivos = count(glob("archivos_articulos_edit/$usuario_id_edit/{*.png, *jpg, *jpeg, *gif}",GLOB_BRACE));
        if($contador_archivos==0){
            rmdir("archivos_articulos_edit/".$usuario_id_edit);
        }

    $sql="DELETE FROM `articulos_editar` WHERE `id_edicion` = $articulo_id";
    $resultado = $connection->query($sql);
    
    header('Location: categorias.php');
    }

    if(isset($aceptar)){
        $sql = "SELECT * FROM `articulos_editar` WHERE `id_edicion` = '$articulo_id'";
        $resultado = $connection->query($sql);
    
        while ($consulta = $resultado -> fetch_assoc()) {
            $id_articulo_edit = $consulta['id_articulo_edit'];
            $fecha_articulo_edit = $consulta['fecha_articulo_edit'];
            $titulo_articulo_edit = $consulta['titulo_articulo_edit'];
            $resumen_articulo_edit = $consulta['resumen_articulo_edit'];
            $subtitulo_articulo_edit = $consulta['subtitulo_articulo_edit'];
            $contenido_articulo_edit = $consulta['contenido_articulo_edit'];
            $multimedia_articulo_edit = $consulta['multimedia_articulo_edit'];
            $categoria_articulo_edit = $consulta['categoria_articulo_edit'];
            $referencias_articulo_edit = $consulta['referencias_articulo_edit'];
            $usuario_id_edit = $consulta['usuario_id_edit'];
        }

        $sql = "SELECT * FROM `articulos` WHERE `id_articulo` = '$id_articulo_edit'";
        $resultado = $connection->query($sql);
        while ($consulta = $resultado -> fetch_assoc()) {
            $usuario_id = $consulta['usuario_id'];
            $multimedia_articulo_actual = ['multimedia_articulo'];
        }
        $archivo = basename($multimedia_articulo_edit);
        $multimedia_articulo = 'archivos_articulos/'.$usuario_id.'/'.$archivo;

        
        copy($multimedia_articulo_edit,$multimedia_articulo);
        unlink($multimedia_articulo_edit);
        unlink($multimedia_articulo_actual);
        $contador_archivos = count(glob("archivos_articulos_edit/$usuario_id_edit/{*.png, *jpg, *jpeg, *gif}",GLOB_BRACE));
        
        if($contador_archivos==0){
            rmdir("archivos_articulos_edit/".$usuario_id_edit);
        }
        
        echo $multimedia_articulo;
        echo '<br>';
        echo 'Articulo ID:' . $id_articulo_edit;
        echo '<br>';
        echo 'Usuario ID:' . $usuario_id;
        


        $multimedia_articulo_edit = $multimedia_articulo;

        $sql = "UPDATE `articulos` SET 
        `fecha_articulo` = '$fecha_articulo_edit' , 
        `titulo_articulo` = '$titulo_articulo_edit' , 
        `resumen_articulo` = '$resumen_articulo_edit' , 
        `subtitulo_articulo` = '$subtitulo_articulo_edit' , 
        `contenido_articulo` = '$contenido_articulo_edit' , 
        `multimedia_articulo` = '$multimedia_articulo_edit' , 
        `categoria_articulo` = '$categoria_articulo_edit' , 
        `referencias_articulo` = '$referencias_articulo_edit' 
        WHERE `id_articulo` = $id_articulo_edit;";

        $resultado = $connection->query($sql);

        $sql="DELETE FROM `articulos_editar` WHERE `id_edicion` = $articulo_id";
        $resultado = $connection->query($sql);

        header('Location: articulos_editados.php'); 

    }
?>