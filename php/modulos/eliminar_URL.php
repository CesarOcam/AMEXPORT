<?php
// Incluir la conexión a la base de datos
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"])) {
        $nombre = trim($_POST["nombre"]); // Elimina espacios en blanco

        try {
            // Preparar la consulta SQL
            $stmt = $pdo->prepare("DELETE FROM urls WHERE nombre = :nombre");
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

            // Ejecutar la consulta y verificar si eliminó filas
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "URL eliminada correctamente.";
            } else {
                echo "No se encontró la URL con ese nombre.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Faltan datos en la solicitud.";
    }
} else {
    echo "Método no permitido.";
}
?>
