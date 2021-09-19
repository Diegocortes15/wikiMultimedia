<?php include_once 'include/templates/head.php'; ?>

<body>
    <div class="contenido_pagina">
    <h1>Wiki Multimedia</h1>
    <header class="hero">
        <div class="contenido_hero contenedor">
            <div class="barra_inicio">
                <?php
                
                session_start();

                $usuario=$_SESSION['usuario'];

                if(!$usuario)
                {
                    include ("include/templates/boton_index_visitante.php");
                }
                else if($usuario=='admin_wikimultimedia@gmail.com')
                {
                    include ("include/templates/boton_index_administrador.php");
                }
                else
                {
                    include ("include/templates/boton_index_editor.php");
                }
                
                ?>
                <!--<a class="boton1 fw_700" href="ingresar.php">Ingresar</a>-->
                <!--<a class="boton2 fw_700" href="registrarse.php">Registro</a>-->
            </div>

            <div class="logo contenedor">
                <img class="logo_exterior" src="images/LogoSpropuesta2.png" alt="logo_exterior">
            </div>

            <form class="barra_busqueda" action="buscar_articulos.php">
                <input class="busqueda" type="search" name="search" id="search" placeholder="¿Que estás buscando?">
            </form>
        </div>
    </header>

    <main class="seccion_inicio contenedor">

        <h2 class="barra_titulo_seccion centrar_contenido fw_300">Categorias</h2>

        <div class="entradas ">

                <?php
                    require_once('include/funciones/bd_conexion.php');
                    ?>

                <?php
                    //$sql = "SELECT * FROM `articulos` ORDER BY `articulos`.`id_articulo` DESC LIMIT 4";
                    $sql = "SELECT * FROM `articulos` WHERE `categoria_articulo` = 'animacion' ORDER BY `articulos`.`id_articulo` DESC LIMIT 1";
                    $resultado = $connection->query($sql);
    
                    while (($consulta = $resultado -> fetch_assoc())) {
                        if($consulta['categoria_articulo']=='animacion')
                        {
                            $categoria_ui="Animación";
                        }
            ?>
                <div class="entrada column_6">
                    <a class="btn_<?php echo $consulta['categoria_articulo'];?> fw_700" href="<?php echo $consulta['categoria_articulo'];?>.php"><?php echo $categoria_ui;?></a>
                    <div class="contenido_entrada">
                        <img class="imagen_preview" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
                        <div class="contenidotxt_entrada">
                            <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>"> <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>"><?php echo $consulta['titulo_articulo'];?></a></h3>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span> <?php echo $consulta['fecha_articulo'];?></p>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span> <?php echo $consulta['autor_articulo'];?></p>
                            <p class="resumen_articulo">
                                <?php echo $consulta['resumen_articulo'];?>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php } ?>

            <!-----------------------------------------------------------------------------------------------------------------------> 
            <?php
                    //$sql = "SELECT * FROM `articulos` ORDER BY `articulos`.`id_articulo` DESC LIMIT 4";
                    $sql = "SELECT * FROM `articulos` WHERE `categoria_articulo` = 'procesamiento_imagenes' ORDER BY `articulos`.`id_articulo` DESC LIMIT 1";
                    $resultado = $connection->query($sql);
    
                    while (($consulta = $resultado -> fetch_assoc())) {
                        if($consulta['categoria_articulo']=='procesamiento_imagenes')
                        {
                            $categoria_ui="Procesamiento de Imagenes";
                        }
            ?>
            <div class="entrada column_6">
                    <a class="btn_<?php echo $consulta['categoria_articulo'];?> fw_700" href="<?php echo $consulta['categoria_articulo'];?>.php"><?php echo $categoria_ui;?></a>
                    <div class="contenido_entrada">
                        <img class="imagen_preview" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
                        <div class="contenidotxt_entrada">
                            <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>"> <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>"><?php echo $consulta['titulo_articulo'];?></a></h3>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span> <?php echo $consulta['fecha_articulo'];?></p>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span> <?php echo $consulta['autor_articulo'];?></p>
                            <p class="resumen_articulo">
                                <?php echo $consulta['resumen_articulo'];?>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php } ?>
             <!----------------------------------------------------------------------------------------------------------------------->
             <?php
                    //$sql = "SELECT * FROM `articulos` ORDER BY `articulos`.`id_articulo` DESC LIMIT 4";
                    $sql = "SELECT * FROM `articulos` WHERE `categoria_articulo` = 'lenguajes_de_programacion' ORDER BY `articulos`.`id_articulo` DESC LIMIT 1";
                    $resultado = $connection->query($sql);
    
                    while (($consulta = $resultado -> fetch_assoc())) {
                        if($consulta['categoria_articulo']=='lenguajes_de_programacion')
                        {
                            $categoria_ui="Lenguajes de Programación";
                        }
            ?>
            <div class="entrada column_6">
                    <a class="btn_<?php echo $consulta['categoria_articulo'];?> fw_700" href="<?php echo $consulta['categoria_articulo'];?>.php"><?php echo $categoria_ui;?></a>
                    <div class="contenido_entrada">
                        <img class="imagen_preview" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
                        <div class="contenidotxt_entrada">
                            <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>"> <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>"><?php echo $consulta['titulo_articulo'];?></a></h3>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span> <?php echo $consulta['fecha_articulo'];?></p>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span> <?php echo $consulta['autor_articulo'];?></p>
                            <p class="resumen_articulo">
                                <?php echo $consulta['resumen_articulo'];?>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php } ?>
             <!----------------------------------------------------------------------------------------------------------------------->
             <?php
                    //$sql = "SELECT * FROM `articulos` ORDER BY `articulos`.`id_articulo` DESC LIMIT 4";
                    $sql = "SELECT * FROM `articulos` WHERE `categoria_articulo` = 'modelado3d' ORDER BY `articulos`.`id_articulo` DESC LIMIT 1";
                    $resultado = $connection->query($sql);
    
                    while (($consulta = $resultado -> fetch_assoc())) {
                        if($consulta['categoria_articulo']=='modelado3d')
                        {
                            $categoria_ui="Modelado 3D";
                        }
            ?>
            <div class="entrada column_6">
                    <a class="btn_<?php echo $consulta['categoria_articulo'];?> fw_700" href="<?php echo $consulta['categoria_articulo'];?>.php"><?php echo $categoria_ui;?></a>
                    <div class="contenido_entrada">
                        <img class="imagen_preview" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
                        <div class="contenidotxt_entrada">
                            <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>"> <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>"><?php echo $consulta['titulo_articulo'];?></a></h3>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span> <?php echo $consulta['fecha_articulo'];?></p>
                            <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span> <?php echo $consulta['autor_articulo'];?></p>
                            <p class="resumen_articulo">
                                <?php echo $consulta['resumen_articulo'];?>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php } ?>
             <!----------------------------------------------------------------------------------------------------------------------->                    
                    

        </div>

        <a class="boton3 fw_700" href="categorias.php">Ver Todas</a>

    </main>

    <section class="ultimas_entradas ">

        <h2 class="barra_titulo_seccion centrar_contenido fw_300 ">Ultimas Entradas</h2>

        <div class="carrusel contenedor">
            <br>
            <div class="column6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                    require_once('include/funciones/bd_conexion.php');
                    $sql = "SELECT * FROM `articulos` ORDER BY `articulos`.`id_articulo` DESC LIMIT 6";
                    $resultado = $connection->query($sql);
                    $fila=false;
    
                    while (($consulta = $resultado -> fetch_assoc())) {
                    if($fila==false){
                    ?>

                            <div class="carousel-item entrada_carrusel active">
                                <div class="contenido_entrada_carrusel">
                                    <img class="imagen_carrusel column_6_2" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
                                    <div class="contenidotxt_entrada column_6_2">
                                        <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>">
                                            <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>">
                                                <?php echo $consulta['titulo_articulo'];?>
                                            </a>
                                        </h3>
                                        <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span>
                                            <?php echo $consulta['fecha_articulo'];?>
                                        </p>
                                        <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span>
                                            <?php echo $consulta['autor_articulo'];?>
                                        </p>
                                        <p class="resumen_articulo">
                                            <?php echo $consulta['resumen_articulo'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php $fila=true; } else{ ?>
                            <div class="carousel-item entrada_carrusel">
                                <div class="contenido_entrada_carrusel">
                                    <img class="imagen_carrusel column_6_2" src="<?php echo $consulta['multimedia_articulo'];?>" alt="<?php echo $consulta['titulo_articulo'];?>">
                                    <div class="contenidotxt_entrada column_6_2">
                                        <h3 class="btn_entrada_<?php echo $consulta['categoria_articulo'];?>">
                                            <a href="articulo.php?id=<?php echo $consulta['id_articulo'];?>">
                                                <?php echo $consulta['titulo_articulo'];?>
                                            </a>
                                        </h3>
                                        <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Fecha:</span>
                                            <?php echo $consulta['fecha_articulo'];?>
                                        </p>
                                        <p><span class="titulo_<?php echo $consulta['categoria_articulo'];?> fw_700">Autor Artículo:</span>
                                            <?php echo $consulta['autor_articulo'];?>
                                        </p>
                                        <p class="resumen_articulo">
                                            <?php echo $consulta['resumen_articulo'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <?php 
    $connection->close();
    include_once 'include/templates/footer.php'; 
    ?>