(function() {

    "use strict";

    document.addEventListener('DOMContentLoaded', function() {

        var error_formulario_registro = document.getElementById('error_formulario_registro');

        var email = document.getElementById('email');
        var error_email = document.getElementById('error_email');
        var password = document.getElementById('password');
        var error_password = document.getElementById('error_password');
        var password_confirm = document.getElementById('password_confirm');
        var error_password_confirm = document.getElementById('error_password_confirm');
        var expresion_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        var aux_email = false;
        var aux_password = false;
        var aux_password_confirm = false;

        if (document.getElementById('Registrar')) {

            function verificarEmail() {

                if (email.value == '') {
                    error_email.style.display = "block";
                    error_email.innerHTML = "Este campo es obligatorio.";
                    email.style.border = '2px solid red';
                    aux_email = false;

                } else if (!expresion_email.test(email.value)) {
                    error_email.style.display = "block";
                    error_email.innerHTML = "El correo electronico puede que este mal escrito.";
                    email.style.border = '2px solid red';
                    aux_email = false;

                } else if (email.value.length > 60) {
                    error_email.style.display = "block";
                    error_email.innerHTML = "El correo electronico es demasiado largo.";
                    email.style.border = '2px solid red';
                    aux_email = false;

                } else {
                    error_email.style.display = "none";
                    email.style.border = 'none';
                    aux_email = true;
                    error_formulario_registro.style.display = "none";
                }
            }

            function confirmPassword(contraseña) {
                if (contraseña.value != password_confirm.value) {
                    error_password_confirm.style.display = "block";
                    error_password_confirm.innerHTML = "Las contraseñas no coinciden.";
                    password_confirm.style.border = '2px solid red';
                    aux_password = false;

                } else {
                    error_password_confirm.style.display = "none";
                    password_confirm.style.border = 'none';
                    aux_password = true;
                    error_formulario_registro.style.display = "none";

                }
            }

            function verificarPassword() {

                if (password.value != '') {
                    error_password.style.display = "none";
                    password.style.border = 'none';
                    if (password.value.length < 5 && password.value.length > 0) {
                        error_password.style.display = "block";
                        error_password.style.color = "red";
                        error_password.innerHTML = "La contraseña es muy debil.";
                        confirmPassword(password);
                        aux_password = true;
                    } else if (password.value.length >= 5 && password.value.length < 15) {
                        error_password.style.display = "block";
                        error_password.style.color = "orange";
                        error_password.innerHTML = "La contraseña es aceptable.";
                        password.style.border = 'none';
                        confirmPassword(password);
                        aux_password = true;
                    } else if (password.value.length >= 15 && password.value.length <= 30) {
                        error_password.style.display = "block";
                        error_password.style.color = "green";
                        error_password.innerHTML = "La contraseña es segura.";
                        confirmPassword(password);
                        password.style.border = 'none';
                        aux_password = true;
                    } else if (password.value.length > 30) {
                        error_password.style.display = "block";
                        error_password.style.color = "red";
                        error_password.innerHTML = "La contraseña es demasiado larga.";
                        password.style.border = '2px solid red';
                        aux_password = false;
                    }
                } else {
                    error_password.style.display = "block";
                    error_password.style.color = "red";
                    error_password.innerHTML = "Este campo es obligatorio.";
                    password.style.border = '2px solid red';
                    aux_password = false;

                }
            }

            function verificarPasswordConfirm() {
                if (password_confirm.value == '') {
                    error_password_confirm.style.display = "block";
                    error_password_confirm.innerHTML = "Este campo es obligatorio.";
                    password_confirm.style.border = '2px solid red';
                    aux_password_confirm = false;

                } else if (password_confirm.value != password.value) {
                    error_password_confirm.style.display = "block";
                    error_password_confirm.innerHTML = "Las contraseñas no coinciden.";
                    password_confirm.style.border = '2px solid red';
                    aux_password_confirm = false;

                } else {
                    error_password_confirm.style.display = "none";
                    password_confirm.style.border = 'none';
                    aux_password_confirm = true;
                    error_formulario_registro.style.display = "none";
                }
            }

            email.addEventListener('blur', verificarEmail);
            password.addEventListener('blur', verificarPassword);
            password_confirm.addEventListener('blur', verificarPasswordConfirm);

            document.getElementById('Registrar').onclick = function(event) {

                if (aux_email && aux_password && aux_password_confirm) {
                    document.getElementById('Registrar').onclick.disabled = false;
                    error_formulario_registro.style.display = "none";
                } else {
                    event.preventDefault();
                    document.getElementById('Registrar').onclick.disabled = true;
                    error_formulario_registro.style.display = "block";
                    error_formulario_registro.innerHTML = "El formulario no se ha completado correctamente";

                    if (!aux_email) {
                        verificarEmail();
                    } else if (!aux_password) {
                        verificarPassword();
                    } else {
                        verificarPasswordConfirm();
                    }
                }
            }

        }

        if (document.getElementById('Ingresar')) {

            function verificarEmail() {

                if (email.value == '') {
                    error_email.style.display = "block";
                    error_email.innerHTML = "Este campo es obligatorio.";
                    email.style.border = '2px solid red';
                    aux_email = false;

                } else if (!expresion_email.test(email.value)) {
                    error_email.style.display = "block";
                    error_email.innerHTML = "El correo electronico puede que este mal escrito.";
                    email.style.border = '2px solid red';
                    aux_email = false;

                } else if (email.value.length > 60) {
                    error_email.style.display = "block";
                    error_email.innerHTML = "El correo electronico es demasiado largo.";
                    email.style.border = '2px solid red';
                    aux_email = false;

                } else {
                    error_email.style.display = "none";
                    email.style.border = 'none';
                    aux_email = true;
                    error_formulario_registro.style.display = "none";
                }
            }

            function verificarPassword() {

                if (password.value != '') {
                    error_password.style.display = "none";
                    password.style.border = 'none';
                    if (password.value.length > 30) {
                        error_password.style.display = "block";
                        error_password.style.color = "red";
                        error_password.innerHTML = "La contraseña es demasiado larga.";
                        password.style.border = '2px solid red';
                        aux_password = false;
                    } else if (password.value.length > 0 && password.value.length <= 30) {
                        error_password.style.display = "none";
                        error_password.style.color = "green";
                        password.style.border = 'none';
                        aux_password = true;
                    }
                } else {
                    error_password.style.display = "block";
                    error_password.style.color = "red";
                    error_password.innerHTML = "Este campo es obligatorio.";
                    password.style.border = '2px solid red';
                    aux_password = false;

                }
            }

            email.addEventListener('blur', verificarEmail);
            password.addEventListener('blur', verificarPassword);

            document.getElementById('Ingresar').onclick = function(event) {

                if (aux_email && aux_password) {
                    document.getElementById('Ingresar').onclick.disabled = false;
                    error_formulario_registro.style.display = "none";
                } else {
                    event.preventDefault();
                    document.getElementById('Ingresar').onclick.disabled = true;
                    error_formulario_registro.style.display = "block";
                    error_formulario_registro.innerHTML = "El formulario no se ha completado correctamente";

                    if (!aux_email) {
                        verificarEmail();
                    } else {
                        verificarPassword();
                    }
                }
            }
        }

        if (document.getElementById('boton_editor_crear_articulo')) {

            var titulo_articulo = document.getElementById('titulo_articulo');
            var error_titulo_articulo = document.getElementById('error_titulo_articulo');
            var aux_titulo_articulo = false;

            var resumen_articulo = document.getElementById('resumen_articulo');
            var error_resumen_articulo = document.getElementById('error_resumen_articulo');
            var aux_resumen_articulo = false;

            var sub_titulo_articulo = document.getElementById('sub_titulo_articulo');
            var error_sub_titulo_articulo = document.getElementById('error_sub_titulo_articulo');
            var aux_sub_titulo_articulo = false;

            var contenido_sub_titulo = document.getElementById('contenido_sub_titulo');
            var error_contenido_sub_titulo = document.getElementById('error_contenido_sub_titulo');
            var aux_contenido_sub_titulo = false;

            var importar_multimedia = document.getElementById('importar_multimedia');
            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
            var multimedia_preview = document.getElementById('multimedia_preview');
            var extensionesPermitidas = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var aux_importar_multimedia = false;

            var referencias_articulo = document.getElementById('referencias_articulo');
            var error_referencias_articulo = document.getElementById('error_referencias_articulo');
            var aux_referencias_articulo = false;

            var categorias_articulo = document.getElementById('categorias_articulo');
            var error_categorias_articulo = document.getElementById('error_categorias_articulo');
            var aux_categorias_articulo = false;

            /************************************************************************** */
            function verificarTituloArticuloInit() {

                if (titulo_articulo.value != '') {
                    error_titulo_articulo.style.display = "none";
                    if (titulo_articulo.value.length > 65) {
                        aux_titulo_articulo = false;
                    } else if (titulo_articulo.value.length > 0 && titulo_articulo.value.length <= 65) {
                        error_titulo_articulo.style.display = "none";
                        aux_titulo_articulo = true;
                    }
                } else {
                    aux_titulo_articulo = false;
                }
            }

            function verificarResumenArticuloInit() {

                if (resumen_articulo.value != '') {
                    error_resumen_articulo.style.display = "none";
                    aux_resumen_articulo = true;
                } else {
                    aux_resumen_articulo = false;
                }
            }

            function verificarSubTituloArticuloInit() {

                if (sub_titulo_articulo.value != '') {
                    error_sub_titulo_articulo.style.display = "none";
                    if (sub_titulo_articulo.value.length > 65) {
                        aux_sub_titulo_articulo = false;
                    } else if (sub_titulo_articulo.value.length > 0 && sub_titulo_articulo.value.length <= 65) {
                        error_sub_titulo_articulo.style.display = "none";
                        aux_sub_titulo_articulo = true;
                    }
                } else {
                    aux_sub_titulo_articulo = false;
                }
            }

            function verificarContenidoSubTituloInit() {

                if (contenido_sub_titulo.value != '') {
                    error_contenido_sub_titulo.style.display = "none";
                    aux_contenido_sub_titulo = true;
                } else {
                    aux_contenido_sub_titulo = false;
                }
            }

            function verificarImportarMulimediaInit() {

                if (importar_multimedia.files.length == 0) {
                    multimedia_preview.style.display = "none";
                    importar_multimedia.value = '';
                    aux_importar_multimedia = false;
                } else {
                    if (!extensionesPermitidas.exec(importar_multimedia.value)) {
                        multimedia_preview.style.display = "none";
                        importar_multimedia.value = '';
                        aux_importar_multimedia = false;
                    } else {

                        if (importar_multimedia.files && importar_multimedia.files[0]) {
                            var ImagenPreview = new FileReader();
                            ImagenPreview.onload = function(e) {
                                multimedia_preview.innerHTML = '<img src="' + e.target.result + '"/>';
                            };
                            ImagenPreview.readAsDataURL(importar_multimedia.files[0]);
                            error_importar_multimedia.style.display = "none";
                            importar_multimedia.style.border = 'none';
                            aux_importar_multimedia = true;
                        }
                    }
                }
            }

            function verificarReferenciasArticuloInit() {

                if (referencias_articulo.value != '') {
                    error_referencias_articulo.style.display = "none";
                    aux_referencias_articulo = true;
                } else {
                    aux_referencias_articulo = false;
                }
            }

            function verificarCategoriaArticuloInit() {

                if (categorias_articulo.value != '') {
                    aux_categorias_articulo = true;
                } else {
                    aux_categorias_articulo = false;
                }
            }

            verificarTituloArticuloInit();
            verificarResumenArticuloInit();
            verificarSubTituloArticuloInit();
            verificarContenidoSubTituloInit();
            verificarImportarMulimediaInit();
            verificarReferenciasArticuloInit();
            verificarCategoriaArticuloInit();

            /************************************************************************** */

            function verificarTituloArticulo() {

                if (titulo_articulo.value != '') {
                    error_titulo_articulo.style.display = "none";
                    titulo_articulo.style.border = '1px solid black';
                    if (titulo_articulo.value.length > 65) {
                        error_titulo_articulo.style.display = "block";
                        error_titulo_articulo.style.color = "red";
                        error_titulo_articulo.innerHTML = "El nombre del artículo es demasiado largo";
                        titulo_articulo.style.border = '2px solid red';
                        aux_titulo_articulo = false;
                    } else if (titulo_articulo.value.length > 0 && titulo_articulo.value.length <= 65) {
                        error_titulo_articulo.style.display = "none";
                        titulo_articulo.style.border = '1px solid black';
                        aux_titulo_articulo = true;
                    }
                } else {
                    error_titulo_articulo.style.display = "block";
                    error_titulo_articulo.style.color = "red";
                    error_titulo_articulo.innerHTML = "Debe asignarle un nombre al artículo";
                    titulo_articulo.style.border = '2px solid red';
                    aux_titulo_articulo = false;
                }
            }

            function verificarResumenArticulo() {

                if (resumen_articulo.value != '') {
                    error_resumen_articulo.style.display = "none";
                    resumen_articulo.style.border = '1px solid black';
                    aux_resumen_articulo = true;
                } else {
                    error_resumen_articulo.style.display = "block";
                    error_resumen_articulo.style.color = "red";
                    error_resumen_articulo.innerHTML = "Este campo es obligatorio";
                    resumen_articulo.style.border = '2px solid red';
                    aux_resumen_articulo = false;
                }
            }

            function verificarSubTituloArticulo() {

                if (sub_titulo_articulo.value != '') {
                    error_sub_titulo_articulo.style.display = "none";
                    sub_titulo_articulo.style.border = '1px solid black';
                    if (sub_titulo_articulo.value.length > 65) {
                        error_sub_titulo_articulo.style.display = "block";
                        error_sub_titulo_articulo.style.color = "red";
                        error_sub_titulo_articulo.innerHTML = "El subtitulo es demasiado largo";
                        sub_titulo_articulo.style.border = '2px solid red';
                        aux_sub_titulo_articulo = false;
                    } else if (sub_titulo_articulo.value.length > 0 && sub_titulo_articulo.value.length <= 65) {
                        error_sub_titulo_articulo.style.display = "none";
                        sub_titulo_articulo.style.border = '1px solid black';
                        aux_sub_titulo_articulo = true;
                    }
                } else {
                    error_sub_titulo_articulo.style.display = "block";
                    error_sub_titulo_articulo.style.color = "red";
                    error_sub_titulo_articulo.innerHTML = "Este campo es obligatorio";
                    sub_titulo_articulo.style.border = '2px solid red';
                    aux_sub_titulo_articulo = false;
                }
            }

            function verificarContenidoSubTitulo() {

                if (contenido_sub_titulo.value != '') {
                    error_contenido_sub_titulo.style.display = "none";
                    contenido_sub_titulo.style.border = '1px solid black';
                    aux_contenido_sub_titulo = true;
                } else {
                    error_contenido_sub_titulo.style.display = "block";
                    error_contenido_sub_titulo.style.color = "red";
                    error_contenido_sub_titulo.innerHTML = "El contenido del artículo es obligatorio";
                    contenido_sub_titulo.style.border = '2px solid red';
                    aux_contenido_sub_titulo = false;
                }
            }

            function verificarImportarMulimedia() {

                if (importar_multimedia.files.length == 0) {
                    error_importar_multimedia.style.display = "block";
                    error_importar_multimedia.style.color = "red";
                    error_importar_multimedia.innerHTML = "Error al cargar imagen o gif";
                    multimedia_preview.style.display = "none";
                    importar_multimedia.value = '';
                    aux_importar_multimedia = false;
                } else {
                    if (!extensionesPermitidas.exec(importar_multimedia.value)) {
                        error_importar_multimedia.style.display = "block";
                        error_importar_multimedia.style.color = "red";
                        error_importar_multimedia.innerHTML = "Extension del archivo no permitida. Extensiones validas png, jpg, jpeg y gif";
                        multimedia_preview.style.display = "none";
                        importar_multimedia.value = '';
                        aux_importar_multimedia = false;
                    } else {

                        if (importar_multimedia.files && importar_multimedia.files[0]) {
                            var ImagenPreview = new FileReader();
                            ImagenPreview.onload = function(e) {
                                multimedia_preview.innerHTML = '<img src="' + e.target.result + '"/>';
                            };
                            ImagenPreview.readAsDataURL(importar_multimedia.files[0]);
                            multimedia_preview.style.display = "block";
                            error_importar_multimedia.style.display = "none";
                            importar_multimedia.style.border = 'none';
                            aux_importar_multimedia = true;
                        }
                    }
                }
            }

            function verificarReferenciasArticulo() {

                if (referencias_articulo.value != '') {
                    error_referencias_articulo.style.display = "none";
                    referencias_articulo.style.border = '1px solid black';
                    aux_referencias_articulo = true;
                } else {
                    error_referencias_articulo.style.display = "block";
                    error_referencias_articulo.style.color = "red";
                    error_referencias_articulo.innerHTML = "Debe haber referencia(s) que sustente el artículo";
                    referencias_articulo.style.border = '2px solid red';
                    aux_referencias_articulo = false;
                }
            }

            function verificarCategoriaArticulo() {

                if (categorias_articulo.value != '') {
                    error_categorias_articulo.style.display = "none";
                    categorias_articulo.style.border = '1px solid black';
                    aux_categorias_articulo = true;
                } else {
                    error_categorias_articulo.style.display = "block";
                    error_categorias_articulo.style.color = "red";
                    error_categorias_articulo.innerHTML = "El artículo debe pertenecer a un tipo de categoria";
                    categorias_articulo.style.border = '2px solid red';
                    aux_categorias_articulo = false;
                }
            }

            titulo_articulo.addEventListener('blur', verificarTituloArticulo);
            resumen_articulo.addEventListener('blur', verificarResumenArticulo);
            sub_titulo_articulo.addEventListener('blur', verificarSubTituloArticulo);
            contenido_sub_titulo.addEventListener('blur', verificarContenidoSubTitulo);
            referencias_articulo.addEventListener('blur', verificarReferenciasArticulo);
            categorias_articulo.addEventListener('blur', verificarCategoriaArticulo);
            importar_multimedia.addEventListener('change', verificarImportarMulimedia);

            document.getElementById('boton_editor_crear_articulo').onclick = function(event) {
                if (aux_titulo_articulo && aux_resumen_articulo && aux_sub_titulo_articulo && aux_contenido_sub_titulo && aux_importar_multimedia && aux_referencias_articulo && aux_categorias_articulo) {
                    document.getElementById('boton_editor_crear_articulo').onclick.disabled = false;
                    error_formulario_articulo.style.display = "none";
                } else {
                    event.preventDefault();
                    document.getElementById('boton_editor_crear_articulo').onclick.disabled = true;
                    error_formulario_articulo.style.display = "block";
                    error_formulario_articulo.innerHTML = "El formulario no se ha completado correctamente";
                    console.log(aux_titulo_articulo);
                    console.log(aux_resumen_articulo);
                    console.log(aux_sub_titulo_articulo);
                    console.log(aux_contenido_sub_titulo);
                    console.log(aux_importar_multimedia);
                    console.log(aux_referencias_articulo);
                    console.log(aux_categorias_articulo);

                    if (!aux_titulo_articulo) {
                        verificarTituloArticulo();
                    }
                    if (!aux_resumen_articulo) {
                        verificarResumenArticulo();
                    }
                    if (!aux_sub_titulo_articulo) {
                        verificarSubTituloArticulo();
                    }
                    if (!aux_contenido_sub_titulo) {
                        verificarContenidoSubTitulo();
                    }
                    if (!aux_importar_multimedia) {
                        verificarImportarMulimedia();
                    }
                    if (!aux_referencias_articulo) {
                        verificarReferenciasArticulo();
                    }
                    if (!aux_categorias_articulo) {
                        verificarCategoriaArticulo();
                    }
                }
            }
        }

        if (document.getElementById('boton_editor_editar_articulo')) {

            var error_formulario_articulo = document.getElementById('error_formulario_articulo');
            var error_formulario2_articulo = document.getElementById('error_formulario2_articulo');

            var titulo_articulo = document.getElementById('titulo_articulo');
            var error_titulo_articulo = document.getElementById('error_titulo_articulo');
            var aux_titulo_articulo = false;

            var resumen_articulo = document.getElementById('resumen_articulo');
            var error_resumen_articulo = document.getElementById('error_resumen_articulo');
            var aux_resumen_articulo = false;

            var sub_titulo_articulo = document.getElementById('sub_titulo_articulo');
            var error_sub_titulo_articulo = document.getElementById('error_sub_titulo_articulo');
            var aux_sub_titulo_articulo = false;

            var contenido_sub_titulo = document.getElementById('contenido_sub_titulo');
            var error_contenido_sub_titulo = document.getElementById('error_contenido_sub_titulo');
            var aux_contenido_sub_titulo = false;

            var importar_multimedia = document.getElementById('importar_multimedia');
            var error_importar_multimedia = document.getElementById('error_importar_multimedia');
            var multimedia_preview = document.getElementById('multimedia_preview');
            var extensionesPermitidas = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var aux_importar_multimedia = false;

            var referencias_articulo = document.getElementById('referencias_articulo');
            var error_referencias_articulo = document.getElementById('error_referencias_articulo');
            var aux_referencias_articulo = false;

            var categorias_articulo = document.getElementById('categorias_articulo');
            var error_categorias_articulo = document.getElementById('error_categorias_articulo');
            var aux_categorias_articulo = false;

            /************************************************************************** */
            function verificarTituloArticuloInit() {

                if (titulo_articulo.value != '') {
                    error_titulo_articulo.style.display = "none";
                    if (titulo_articulo.value.length > 65) {
                        aux_titulo_articulo = false;
                    } else if (titulo_articulo.value.length > 0 && titulo_articulo.value.length <= 65) {
                        error_titulo_articulo.style.display = "none";
                        aux_titulo_articulo = true;
                    }
                } else {
                    aux_titulo_articulo = false;
                }
            }

            function verificarResumenArticuloInit() {

                if (resumen_articulo.value != '') {
                    error_resumen_articulo.style.display = "none";
                    aux_resumen_articulo = true;
                } else {
                    aux_resumen_articulo = false;
                }
            }

            function verificarSubTituloArticuloInit() {

                if (sub_titulo_articulo.value != '') {
                    error_sub_titulo_articulo.style.display = "none";
                    if (sub_titulo_articulo.value.length > 65) {
                        aux_sub_titulo_articulo = false;
                    } else if (sub_titulo_articulo.value.length > 0 && sub_titulo_articulo.value.length <= 65) {
                        error_sub_titulo_articulo.style.display = "none";
                        aux_sub_titulo_articulo = true;
                    }
                } else {
                    aux_sub_titulo_articulo = false;
                }
            }

            function verificarContenidoSubTituloInit() {

                if (contenido_sub_titulo.value != '') {
                    error_contenido_sub_titulo.style.display = "none";
                    aux_contenido_sub_titulo = true;
                } else {
                    aux_contenido_sub_titulo = false;
                }
            }

            function verificarImportarMulimediaInit() {

                if (importar_multimedia.files.length == 0) {
                    multimedia_preview.style.display = "none";
                    importar_multimedia.value = '';
                    aux_importar_multimedia = false;
                } else {
                    if (!extensionesPermitidas.exec(importar_multimedia.value)) {
                        multimedia_preview.style.display = "none";
                        importar_multimedia.value = '';
                        aux_importar_multimedia = false;
                    } else {

                        if (importar_multimedia.files && importar_multimedia.files[0]) {
                            var ImagenPreview = new FileReader();
                            ImagenPreview.onload = function(e) {
                                multimedia_preview.innerHTML = '<img src="' + e.target.result + '"/>';
                            };
                            ImagenPreview.readAsDataURL(importar_multimedia.files[0]);
                            error_importar_multimedia.style.display = "none";
                            importar_multimedia.style.border = 'none';
                            aux_importar_multimedia = true;
                        }
                    }
                }
            }

            function verificarReferenciasArticuloInit() {

                if (referencias_articulo.value != '') {
                    error_referencias_articulo.style.display = "none";
                    aux_referencias_articulo = true;
                } else {
                    aux_referencias_articulo = false;
                }
            }

            function verificarCategoriaArticuloInit() {

                if (categorias_articulo.value != '') {
                    aux_categorias_articulo = true;
                } else {
                    aux_categorias_articulo = false;
                }
            }

            verificarTituloArticuloInit();
            verificarResumenArticuloInit();
            verificarSubTituloArticuloInit();
            verificarContenidoSubTituloInit();
            verificarImportarMulimediaInit();
            verificarReferenciasArticuloInit();
            verificarCategoriaArticuloInit();

            /************************************************************************** */

            function verificarTituloArticulo() {

                if (titulo_articulo.value != '') {
                    error_titulo_articulo.style.display = "none";
                    titulo_articulo.style.border = '1px solid black';
                    if (titulo_articulo.value.length > 65) {
                        error_titulo_articulo.style.display = "block";
                        error_titulo_articulo.style.color = "red";
                        error_titulo_articulo.innerHTML = "El nombre del artículo es demasiado largo";
                        titulo_articulo.style.border = '2px solid red';
                        aux_titulo_articulo = false;
                        verificarTituloArticuloInit();
                    } else if (titulo_articulo.value.length > 0 && titulo_articulo.value.length <= 65) {
                        error_titulo_articulo.style.display = "none";
                        titulo_articulo.style.border = '1px solid black';
                        aux_titulo_articulo = true;
                        verificarTituloArticuloInit();
                    }
                } else {
                    error_titulo_articulo.style.display = "block";
                    error_titulo_articulo.style.color = "red";
                    error_titulo_articulo.innerHTML = "Debe asignarle un nombre al artículo";
                    titulo_articulo.style.border = '2px solid red';
                    aux_titulo_articulo = false;
                    verificarTituloArticuloInit();
                }
            }

            function verificarResumenArticulo() {

                if (resumen_articulo.value != '') {
                    error_resumen_articulo.style.display = "none";
                    resumen_articulo.style.border = '1px solid black';
                    aux_resumen_articulo = true;
                    verificarResumenArticuloInit();
                } else {
                    error_resumen_articulo.style.display = "block";
                    error_resumen_articulo.style.color = "red";
                    error_resumen_articulo.innerHTML = "Este campo es obligatorio";
                    resumen_articulo.style.border = '2px solid red';
                    aux_resumen_articulo = false;
                    verificarResumenArticuloInit();
                }
            }

            function verificarSubTituloArticulo() {

                if (sub_titulo_articulo.value != '') {
                    error_sub_titulo_articulo.style.display = "none";
                    sub_titulo_articulo.style.border = '1px solid black';
                    if (sub_titulo_articulo.value.length > 65) {
                        error_sub_titulo_articulo.style.display = "block";
                        error_sub_titulo_articulo.style.color = "red";
                        error_sub_titulo_articulo.innerHTML = "El subtitulo es demasiado largo";
                        sub_titulo_articulo.style.border = '2px solid red';
                        aux_sub_titulo_articulo = false;
                        verificarSubTituloArticuloInit();
                    } else if (sub_titulo_articulo.value.length > 0 && sub_titulo_articulo.value.length <= 65) {
                        error_sub_titulo_articulo.style.display = "none";
                        sub_titulo_articulo.style.border = '1px solid black';
                        aux_sub_titulo_articulo = true;
                        verificarSubTituloArticuloInit();
                    }
                } else {
                    error_sub_titulo_articulo.style.display = "block";
                    error_sub_titulo_articulo.style.color = "red";
                    error_sub_titulo_articulo.innerHTML = "Este campo es obligatorio";
                    sub_titulo_articulo.style.border = '2px solid red';
                    aux_sub_titulo_articulo = false;
                    verificarSubTituloArticuloInit();
                }
            }

            function verificarContenidoSubTitulo() {

                if (contenido_sub_titulo.value != '') {
                    error_contenido_sub_titulo.style.display = "none";
                    contenido_sub_titulo.style.border = '1px solid black';
                    aux_contenido_sub_titulo = true;
                    verificarContenidoSubTituloInit();
                } else {
                    error_contenido_sub_titulo.style.display = "block";
                    error_contenido_sub_titulo.style.color = "red";
                    error_contenido_sub_titulo.innerHTML = "El contenido del artículo es obligatorio";
                    contenido_sub_titulo.style.border = '2px solid red';
                    aux_contenido_sub_titulo = false;
                    verificarContenidoSubTituloInit();
                }
            }

            function verificarImportarMulimedia() {

                if (importar_multimedia.files.length == 0) {
                    error_importar_multimedia.style.display = "block";
                    error_importar_multimedia.style.color = "red";
                    error_importar_multimedia.innerHTML = "Error al cargar imagen o gif";
                    multimedia_preview.style.display = "none";
                    importar_multimedia.value = '';
                    aux_importar_multimedia = false;
                } else {
                    if (!extensionesPermitidas.exec(importar_multimedia.value)) {
                        error_importar_multimedia.style.display = "block";
                        error_importar_multimedia.style.color = "red";
                        error_importar_multimedia.innerHTML = "Extension del archivo no permitida. Extensiones validas png, jpg, jpeg y gif";
                        multimedia_preview.style.display = "none";
                        importar_multimedia.value = '';
                        aux_importar_multimedia = false;
                    } else {

                        if (importar_multimedia.files && importar_multimedia.files[0]) {
                            var ImagenPreview = new FileReader();
                            ImagenPreview.onload = function(e) {
                                multimedia_preview.innerHTML = '<img src="' + e.target.result + '"/>';
                            };
                            ImagenPreview.readAsDataURL(importar_multimedia.files[0]);
                            multimedia_preview.style.display = "block";
                            error_importar_multimedia.style.display = "none";
                            importar_multimedia.style.border = 'none';
                            aux_importar_multimedia = true;
                        }
                    }
                }
            }

            function verificarReferenciasArticulo() {

                if (referencias_articulo.value != '') {
                    error_referencias_articulo.style.display = "none";
                    referencias_articulo.style.border = '1px solid black';
                    aux_referencias_articulo = true;
                    verificarReferenciasArticuloInit();
                } else {
                    error_referencias_articulo.style.display = "block";
                    error_referencias_articulo.style.color = "red";
                    error_referencias_articulo.innerHTML = "Debe haber referencia(s) que sustente el artículo";
                    referencias_articulo.style.border = '2px solid red';
                    aux_referencias_articulo = false;
                    verificarReferenciasArticuloInit();
                }
            }

            function verificarCategoriaArticulo() {

                if (categorias_articulo.value != '') {
                    error_categorias_articulo.style.display = "none";
                    categorias_articulo.style.border = '1px solid black';
                    aux_categorias_articulo = true;
                    verificarCategoriaArticuloInit();
                } else {
                    error_categorias_articulo.style.display = "block";
                    error_categorias_articulo.style.color = "red";
                    error_categorias_articulo.innerHTML = "El artículo debe pertenecer a un tipo de categoria";
                    categorias_articulo.style.border = '2px solid red';
                    aux_categorias_articulo = false;
                    verificarCategoriaArticuloInit();
                }
            }

            if (aux_titulo_articulo && aux_resumen_articulo && aux_sub_titulo_articulo && aux_contenido_sub_titulo && aux_referencias_articulo && aux_categorias_articulo) {
                error_formulario_articulo.style.display = "block";
                error_formulario_articulo.innerHTML = "Nota: Deberá esperar a que el administrador del sitio web acepte su edición.";
                error_formulario2_articulo.style.display = "block";
                error_formulario2_articulo.innerHTML = "Nota: Deberá esperar a que el administrador del sitio web acepte su edición.";
            } else {
                error_formulario_articulo.style.display = "none";
            }

            function verificarFormulario() {
                if (aux_titulo_articulo && aux_resumen_articulo && aux_sub_titulo_articulo && aux_contenido_sub_titulo && aux_referencias_articulo && aux_categorias_articulo) {
                    error_formulario_articulo.style.display = "block";
                    error_formulario_articulo.innerHTML = "Nota: Deberá esperar a que el administrador del sitio web acepte su edición.";
                    error_formulario2_articulo.style.display = "block";
                    error_formulario2_articulo.innerHTML = "Nota: Deberá esperar a que el administrador del sitio web acepte su edición.";
                } else {
                    error_formulario_articulo.style.display = "none";
                    error_formulario2_articulo.style.display = "none";
                }
            }

            titulo_articulo.addEventListener('blur', verificarTituloArticulo);
            resumen_articulo.addEventListener('blur', verificarResumenArticulo);
            sub_titulo_articulo.addEventListener('blur', verificarSubTituloArticulo);
            contenido_sub_titulo.addEventListener('blur', verificarContenidoSubTitulo);
            referencias_articulo.addEventListener('blur', verificarReferenciasArticulo);
            categorias_articulo.addEventListener('blur', verificarCategoriaArticulo);
            importar_multimedia.addEventListener('change', verificarImportarMulimedia);

            titulo_articulo.addEventListener('blur', verificarFormulario);
            resumen_articulo.addEventListener('blur', verificarFormulario);
            sub_titulo_articulo.addEventListener('blur', verificarFormulario);
            contenido_sub_titulo.addEventListener('blur', verificarFormulario);
            referencias_articulo.addEventListener('blur', verificarFormulario);
            categorias_articulo.addEventListener('blur', verificarFormulario);

            document.getElementById('boton_editor_editar_articulo').onclick = function(event) {
                if (aux_titulo_articulo && aux_resumen_articulo && aux_sub_titulo_articulo && aux_contenido_sub_titulo && aux_referencias_articulo && aux_categorias_articulo) {
                    document.getElementById('boton_editor_editar_articulo').onclick.disabled = false;
                    error_formulario_articulo.style.display = "block";
                    error_formulario_articulo.innerHTML = "Nota: Deberá esperar a que el administrador del sitio web acepte su edición.";
                    error_formulario2_articulo.style.display = "block";
                    error_formulario2_articulo.innerHTML = "Nota: Deberá esperar a que el administrador del sitio web acepte su edición.";
                } else {
                    event.preventDefault();
                    document.getElementById('boton_editor_editar_articulo').onclick.disabled = true;
                    error_formulario_articulo.style.display = "block";
                    error_formulario_articulo.innerHTML = "El formulario no se ha completado correctamente";
                    error_formulario2_articulo.style.display = "block";
                    error_formulario2_articulo.innerHTML = "El formulario no se ha completado correctamente";
                    console.log(aux_titulo_articulo);
                    console.log(aux_resumen_articulo);
                    console.log(aux_sub_titulo_articulo);
                    console.log(aux_contenido_sub_titulo);
                    console.log(aux_importar_multimedia);
                    console.log(aux_referencias_articulo);
                    console.log(aux_categorias_articulo);

                    if (!aux_titulo_articulo) {
                        verificarTituloArticulo();
                    }
                    if (!aux_resumen_articulo) {
                        verificarResumenArticulo();
                    }
                    if (!aux_sub_titulo_articulo) {
                        verificarSubTituloArticulo();
                    }
                    if (!aux_contenido_sub_titulo) {
                        verificarContenidoSubTitulo();
                    }
                    if (!aux_referencias_articulo) {
                        verificarReferenciasArticulo();
                    }
                    if (!aux_categorias_articulo) {
                        verificarCategoriaArticulo();
                    }
                }
            }
        }

        if (document.getElementById('link_articulo')) {
            var boton_link_articulo = document.getElementById('boton_link_articulo');
            var link_articulo = document.getElementById('link_articulo');
            var mensaje_link_articulo = document.getElementById('mensaje_link_articulo');

            boton_link_articulo.addEventListener('click', function() {
                link_articulo.focus();
                document.execCommand('selectAll');
                document.execCommand('copy');

                mensaje_link_articulo.innerHTML = "Copiado en el portapapeles";

                setTimeout(() => mensaje_link_articulo.innerHTML = "", 5000);
            });
        }
    });

})();