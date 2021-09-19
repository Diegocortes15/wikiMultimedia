<?php include_once 'include/templates/head.php'; ?>
<?php
                
    session_start();

    $usuario=$_SESSION['usuario'];

    
    if(!$usuario)
    {
        header('Location: index.php');
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

    <main>
        <form class="contenedor" action="" method="post" enctype="multipart/form-data">
    <?php
    try {
        
        require_once('include/funciones/bd_conexion.php');

        //Variables del articulo

        /**Informacion de Entrada -Inicio */
        $autor_articulo=substr($usuario, 0, strpos($usuario, "@"));
        $fecha_articulo = date("Y/m/d");

        //Variables para validar y poder enviar sentencia SQL si estan las variables en true;
        $validacion_titulo_articulo=false;
        $validacion_resumen_articulo=false;
        $validacion_sub_titulo_articulo=false;
        $validacion_contenido_sub_titulo=false;
        $validacion_referencias_articulo=false;
        $validacion_categorias_articulo=false;
        $validacion_importar_multimedia=false;

        /**filter_has_var — Comprueba si existe una variable de un tipo concreto existe */
        /**filter_input — Toma una variable externa concreta por su nombre y opcionalmente la filtra */

        if(filter_has_var(INPUT_POST,'titulo_articulo') && (strlen(filter_input(INPUT_POST,'titulo_articulo')) > 0) && trim(filter_input(INPUT_POST,'titulo_articulo'))){
            $titulo_articulo=$_POST['titulo_articulo'];
            $validacion_titulo_articulo=true;
        }
        else{
            $validacion_titulo_articulo=false;
        }

        /**isset — Determina si una variable está definida y no es NULL */
        if(isset($_POST['resumen_articulo']))
        {
            /**strlen — Obtiene la longitud de un string */
            /**trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena */
            if(strlen($_POST['resumen_articulo']) > 0 && trim($_POST['resumen_articulo']))
            {
                $resumen_articulo = $_POST['resumen_articulo'];
                $validacion_resumen_articulo=true;
            }
            else{
                $validacion_resumen_articulo=false;
            }
        }
        /**Informacion de Entrada -Fin */

        

        if(filter_has_var(INPUT_POST,'sub_titulo_articulo') && (strlen(filter_input(INPUT_POST,'sub_titulo_articulo')) > 0) && trim(filter_input(INPUT_POST,'sub_titulo_articulo'))){
            $sub_titulo_articulo = $_POST['sub_titulo_articulo'];
            $validacion_sub_titulo_articulo=true;
        }
        else{
            $validacion_sub_titulo_articulo=false;
        }

        /**isset — Determina si una variable está definida y no es NULL */
        if(isset($_POST['contenido_sub_titulo']))
        {
            /**strlen — Obtiene la longitud de un string */
            /**trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena */
            if(strlen($_POST['contenido_sub_titulo']) > 0 && trim($_POST['contenido_sub_titulo']))
            {
                $contenido_sub_titulo=$_POST['contenido_sub_titulo'];
                $validacion_contenido_sub_titulo=true;
            }
            else{
                $validacion_contenido_sub_titulo=false;
            }
        }

        /**isset — Determina si una variable está definida y no es NULL */
        if(isset($_POST['referencias_articulo']))
        {

            /**strlen — Obtiene la longitud de un string */
            /**trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena */
            if(strlen($_POST['referencias_articulo']) > 0 && trim($_POST['referencias_articulo']))
            {
                $referencias_articulo=$_POST['referencias_articulo'];
                $validacion_referencias_articulo=true;
            }
            else{
                $validacion_referencias_articulo=false;
            }
        }


        $categorias_articulo=$_POST['categorias_articulo'];
        if($categorias_articulo == "")
        {
            $validacion_categorias_articulo=false;
        }
        else{
            $validacion_categorias_articulo=true;
        }
        
        

        if($validacion_titulo_articulo&&$validacion_resumen_articulo&&$validacion_sub_titulo_articulo&&$validacion_contenido_sub_titulo&&$validacion_referencias_articulo&&$validacion_categorias_articulo){
            /**Guardando id del usuario para guardar id usuario en el articulo
            * para conocer los articulos publicados por el usuario.
            */

            /**Guardar Imagen para el articulo */
        if($_FILES['importar_multimedia']['error'] > 0){
            echo "<script language='javascript'>
                            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
                            error_importar_multimedia.style.display = 'block';
                            error_importar_multimedia.innerHTML = 'Error al cargar archivo';
                            </script>";
            $validacion_importar_multimedia=false;
        }
        else
        {
            $archivos_permitidos=array("image/png","image/jpg","image/jpeg","image/gif");

            if(in_array($_FILES["importar_multimedia"]["type"], $archivos_permitidos))
            {

                $sql = "SELECT * FROM `registros` WHERE `correo_usuario` = '$usuario'";
                $resultado = $connection->query($sql);

                while ($consulta = $resultado -> fetch_assoc()) {
                    # code...
                    $usuario_id=$consulta['id_usuario'];
                }

                $ruta='archivos_articulos/'.$usuario_id.'/';
                $archivo = $ruta.$_FILES["importar_multimedia"]["name"];

                if(!file_exists($ruta))
                {
                    //mkdir — Crea un directorio
                    mkdir($ruta);
                }
                if(!file_exists($archivo))
                {
                    $resultado=@move_uploaded_file($_FILES["importar_multimedia"]["tmp_name"], $archivo);

                    if($resultado)
                    {
                        $validacion_importar_multimedia=true;
                        $sql = "INSERT INTO `articulos` (`id_articulo`, `autor_articulo`, `fecha_articulo`, `titulo_articulo`, `resumen_articulo`, `subtitulo_articulo`, `contenido_articulo`, `multimedia_articulo`, `categoria_articulo`, `referencias_articulo`, `usuario_id`) 
                        VALUES (NULL, '$autor_articulo', '$fecha_articulo', '$titulo_articulo', '$resumen_articulo', '$sub_titulo_articulo', '$contenido_sub_titulo', '$archivo', '$categorias_articulo', '$referencias_articulo', '$usuario_id');";
                        $resultado = $connection->query($sql);
                        /**Enviando variables del articulo a MySQL */
                
                        header('Location: categorias.php');
                    }
                    else
                    {
                        echo "<script language='javascript'>
                            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
                            error_importar_multimedia.style.display = 'block';
                            error_importar_multimedia.innerHTML = 'Error al guardar el archivo';
                            </script>";
                        $validacion_importar_multimedia=false;
                    }

                } else 
                {
                    echo "<script language='javascript'>
                            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
                            error_importar_multimedia.style.display = 'block';
                            error_importar_multimedia.innerHTML = 'El archivo ya existe';
                            </script>";
                    $validacion_importar_multimedia=false;
                }

            }
            else{
                echo "<script language='javascript'>
                            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
                            error_importar_multimedia.style.display = 'block';
                            error_importar_multimedia.innerHTML = 'Archivo no permitido';
                            </script>";
                $validacion_importar_multimedia=false;
            }
        }
        
            
        }
        else{
            echo "<script language='javascript'>
            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
            error_importar_multimedia.style.display = 'block';
            error_importar_multimedia.innerHTML = 'Wiki';
            </script>";
        }

    } catch (\Throwable $th) {
        //throw $th;
        echo $th->getMessage();
    }

    ?>
            <div class="background_blanco_articulo formulario_articulo">

                <div id="error_formulario_articulo"></div>
                <input class="boton_editor" id="boton_editor_crear_articulo" type="submit" value="Crear artículo">
                
                <div id="error_titulo_articulo"></div>
                <input type="text" id="titulo_articulo" name="titulo_articulo" placeholder="Titulo artículo" value="<?php echo $titulo_articulo?>"required>

                <label for="resumen">Resumen</label>
                <div id="error_resumen_articulo"></div>
                <textarea name="resumen_articulo" id="resumen_articulo" placeholder="Resumen del artículo." required><?php echo $resumen_articulo?></textarea>
                
                <div id="error_sub_titulo_articulo"></div>
                <input type="text" id="sub_titulo_articulo" name="sub_titulo_articulo" placeholder = "Subtítulo" value="<?php echo $sub_titulo_articulo?>" required>

                <div id="error_contenido_sub_titulo"></div>
                <textarea name="contenido_sub_titulo" id="contenido_sub_titulo" placeholder="Contenido subtitulo." required><?php echo $contenido_sub_titulo?></textarea>

                <br>
                
                <div id="error_importar_multimedia"></div>
                <div class="contenedor_contenido_multimedia">

                    <div class="btn_agregar_multimedia boton_editor">
                        <p><i class="fas fa-upload"></i> Agregar multimedia</p>
                        <input type="file" id="importar_multimedia" name="importar_multimedia">
                    </div>

                    <div class="multimedia_preview" id="multimedia_preview"></div>

                </div>

                <br>

                <label for="referencias_articulo">Referencias</label>
                <div id="error_referencias_articulo"></div>
                <textarea name="referencias_articulo" id="referencias_articulo" required><?php echo $referencias_articulo?></textarea>

                <br>
                <label for="categorias">Categoria</label>
                <br>
                <div id="error_categorias_articulo"></div>
                <select class="categorias" id="categorias_articulo" name="categorias_articulo">
                    <option value="" disabled selected> -- Seleccione -- </option>
                    <option value="animacion" <?php if($categorias_articulo=="animacion") echo "selected" ?> >Animación</option>
                    <option value="procesamiento_imagenes" <?php if($categorias_articulo=="procesamiento_imagenes") echo "selected" ?>>Procesamiento de imagenes</option>
                    <option value="lenguajes_de_programacion" <?php if($categorias_articulo=="lenguajes_de_programacion") echo "selected" ?>>Lenguajes de programación</option>
                    <option value="modelado3d" <?php if($categorias_articulo=="modelado3d") echo "selected" ?>>Modelado 3D</option>
                </select>
                
                <br>
            </div>

        </form>
    </main>

    <?php
    $connection->close();
    include_once 'include/templates/footer.php'; ?>