<?php
// Incluir la conexión a la base de datos
include "conexion.php";

// Definir el límite de registros por página
$limite = 5;

// Obtener el número de la página actual, si no existe, por defecto es la página 1
$paginacion = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Calcular el desplazamiento de los resultados
$desplazamiento = ($paginacion - 1) * $limite;

try {
    // Consultar los registros de la tabla urls con paginación
    $stmt = $pdo->prepare("SELECT id_url, nombre, url FROM urls LIMIT :limite OFFSET :desplazamiento");
    $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
    $stmt->bindParam(':desplazamiento', $desplazamiento, PDO::PARAM_INT);
    $stmt->execute();
    $urls = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consultar el número total de registros en la tabla urls
    $total_stmt = $pdo->query("SELECT COUNT(*) FROM urls");
    $total_urls = $total_stmt->fetchColumn();

    // Calcular el número total de páginas
    $total_paginas = ceil($total_urls / $limite);
} catch (PDOException $e) {
    die("Error al obtener los datos: " . $e->getMessage());
}
?>

<div class="border rounded shadow p-3">
    <table id="tabla_1" class="table table-light table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Url</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urls as $index => $url) : ?>
                <tr>
                    <th scope="row"><?php echo $index + 1 + $desplazamiento; ?></th>
                    <td><?php echo htmlspecialchars($url['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($url['url']); ?></td>
                    <td>
                        <a href="<?php echo htmlspecialchars($url['url']); ?>" target="_blank">Visitar</a>
                        <a href="#" onclick="copiarAlPortapapeles(event, this, '<?php echo htmlspecialchars($url['url']); ?>')" 
                           class="ms-2 position-relative text-decoration-none" 
                           onmouseenter="mostrarTooltip(this)" 
                           onmouseleave="ocultarTooltip(this)">
                            <i class="fas fa-copy"></i>
                            <span class="tooltip-text position-absolute start-50 translate-middle-x p-1 bg-dark text-white rounded small"
                                  style="bottom: -30px; visibility: hidden; opacity: 0; transition: opacity 0.2s; z-index: 10;">
                                Copiar
                            </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Paginación -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $paginacion == 1 ? 'disabled' : ''; ?>">
                <a class="page-link" href="?pagina=<?php echo $paginacion - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                <li class="page-item <?php echo $i == $paginacion ? 'active' : ''; ?>">
                    <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php echo $paginacion == $total_paginas ? 'disabled' : ''; ?>">
                <a class="page-link" href="?pagina=<?php echo $paginacion + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
