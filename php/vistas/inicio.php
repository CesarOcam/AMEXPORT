<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal AMEXPORT</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="../../lib/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <!-- Barra de navegación oscura -->
    <?php include('../modulos/navbar.php'); ?>

    <div class="container-fluid pt-5">
        <div class="m-2">

            <div class="mb-3 mt-auto">
                <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#form_URL">
                    <i class="fas fa-plus"></i> Nueva URL
                </button>

                <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#eliminar_URL">
                    <i class="fas fa-trash"></i> Eliminar URL
                </button>

                <button id="ejecutar" class="btn btn-secondary" type="button" data-bs-target="#consultar_DODA">
                    <i class="fas fa-search"></i> Consultar DODA
                </button>
            </div>
        

            <div class="row">
                <!-- Sección de tarjetas -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <a href="https://smartport.com.mx/Tracing" target="_blank" style="text-decoration: none;">
                                <div class="card border shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center icon-custom">
                                            <img src="../../img/icave_Logo.png" class="img-fluid" alt="Smartport Logo">
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                                            <div class="card-body">
                                                <h5 class="card-title">smartport.com.mx</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 mb-4">
                            <a href="https://grupocice.com/consultaspublicas/consultas_tmu_siglas.php" target="_blank" style="text-decoration: none;">
                                <div class="card border shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center icon-custom">
                                            <img src="../../img/cice_Logo.png" class="img-fluid" alt="CICE Logo">
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                                            <div class="card-body">
                                                <h5 class="card-title">grupocice.com</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 mb-4">
                            <a href="http://contecon.mx/trazabilidad-de-carga" target="_blank" style="text-decoration: none;">
                                <div class="card border shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center icon-custom">
                                            <img src="../../img/contenco.png" class="img-fluid border rounded" alt="Contecon Logo">
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                                            <div class="card-body">
                                                <h5 class="card-title">contecon.mx</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 mb-4">
                            <a href="https://sapamexport.grupoamexport.com/Inicio/app_Login/" target="_blank" style="text-decoration: none;">
                                <div class="card border shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center icon-custom">
                                            <img src="../../img/logo_Amexport.png" class="img-fluid" alt="Amexport Logo">
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                                            <div class="card-body">
                                                <h5 class="card-title">sapamexport.com</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                       
                        <!-- Tabla URLS -->
                        <?php include('../../php/modulos/tabla_URL.php') ?>

                    </div>
                
                <!-- Formulario de Scraping -->
                <div class="col-md-6">
                    <div class="card2 border rounded p-4 mb-5">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4">Arrastra aquí la URL o escríbela para obtener información</h5>
                            <form id="scraperForm">
                                <input class="form-control mb-4" type="text" id="urlInput" placeholder="https://ejemplo.com" required>
                                <button class="btn btn-secondary w-100" type="button" onclick="scrapear()">Scraping</button>
                            </form>
                            <div id="resultado_scrap" class="mt-4" style="border: 1px solid #ccc; padding: 20px;"></div>
                        </div>
                    </div>
                </div>

<!---------------------------------------------------- MODALES -------------------------------------------------------------------------------->
                <!-- Modal con Formulario -->
                <div class="modal fade" id="form_URL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva URL</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form_Url">
                                    <div class="mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del sitio" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="URL">Dirección URL</label>
                                        <input type="text" class="form-control" id="URL" name="URL" placeholder="URL" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="guardarBtn">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                <!-- Formulario para eliminar URL -->
                <div class="modal fade" id="eliminar_URL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar URL</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form_Url_Borrar">
                                <div class="mb-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre2" placeholder="Nombre del sitio">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="eliminarBtn">Aceptar</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Bootstrap 5 -->
                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"> <!-- Centrado verticalmente -->
                        <div class="modal-content text-center"> <!-- Centrado el texto -->
                            <div class="modal-header justify-content-center"> <!-- Centrar contenido del header -->
                                <h5 class="modal-title" id="errorModalLabel">Sin modulaciones pendientes</h5>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Modal de Bootstrap 5 -->
                <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="infoModalLabel">Datos Recibidos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body text-center" id="infoModalBody">
                                <!-- Aquí se insertarán los datos dinámicamente -->
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                


            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/scraping.js"></script>
    <scripta src="../../js/form_Url.js"></script>
    <script src="../../js/agregar_Url.js"></script>
    <script src="../../js/eliminar_Url.js"></script>
    <script src="../../js/consulta_DODA.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <script>
        function copiarAlPortapapeles(event, elemento, texto) {
            event.preventDefault();
            navigator.clipboard.writeText(texto);

            let tooltip = elemento.querySelector('.tooltip-text');
            tooltip.textContent = "Copiado";
        }

        function mostrarTooltip(elemento) {
            let tooltip = elemento.querySelector('.tooltip-text');
            tooltip.textContent = "Copiar";
            tooltip.style.visibility = "visible";
            tooltip.style.opacity = "1";
        }

        function ocultarTooltip(elemento) {
            let tooltip = elemento.querySelector('.tooltip-text');
            tooltip.style.opacity = "0";
            setTimeout(() => {
                tooltip.style.visibility = "hidden";
                tooltip.textContent = "Copiar"; // Restaurar el texto cuando desaparezca
            }, 200);
        }
    </script>

</body>
</html>
