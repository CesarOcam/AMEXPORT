<?php
// Incluir la conexión a la base de datos
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los datos
    if (isset($_POST["nombre"]) && isset($_POST["URL"])) {
        $nombre = $_POST["nombre"];
        $url = $_POST["URL"];

        try {
            // Preparar la consulta SQL
            $stmt = $pdo->prepare("INSERT INTO urls (nombre, url) VALUES (:nombre, :url)");
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":url", $url);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "URL guardada correctamente.";
            } else {
                echo "Error al guardar la URL.";
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
