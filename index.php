<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal AMEXPORT</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="lib/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

    </style>
</head>
<body>
    <!-- Barra de navegación oscura -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PORTAL AMEXPORT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid pt-5">
        <div class="m-2">
            <div class="row">
                <!-- Sección de tarjetas -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <a href="https://smartport.com.mx/Tracing" target="_blank" style="text-decoration: none;">
                                <div class="card border shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center icon-custom">
                                            <img src="img/icave_Logo.png" class="img-fluid" alt="Smartport Logo">
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
                                            <img src="img/cice_Logo.png" class="img-fluid" alt="CICE Logo">
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
                                            <img src="img/contenco.png" class="img-fluid border rounded" alt="Contecon Logo">
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
                                            <img src="img/logo_Amexport.png" class="img-fluid" alt="Amexport Logo">
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
                </div>

                <!-- Formulario de Scraping -->
                <div class="col-md-6">
                    <div class="card2 border rounded p-4 mb-5">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4">Arrastra aquí la URL o escríbela</h5>
                            <form id="scraperForm">
                                <input class="form-control mb-4" type="text" id="urlInput" placeholder="https://ejemplo.com" required>
                                <button class="btn btn-secondary w-100" type="button" onclick="scrapear()">Search</button>
                            </form>
                            <div id="resultado_scrap" class="mt-4" style="border: 1px solid #ccc; padding: 20px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scraping.js"></script>
</body>
</html>
