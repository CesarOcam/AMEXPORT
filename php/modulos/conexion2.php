
<?php
// Parámetros de conexión
$host = "3.224.12.191"; // Dirección del servidor de base de datos (EC2)
$port = 3306;
$dbname = "sql_sapamexport_";
$usuario = "sql_sapamexport_";
$contraseña = "27sNnCnwjid5EN2M";

try {
    // Crear conexión PDO con puerto incluido
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $usuario, $contraseña);

    // Configurar atributos de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // (Opcional) Confirmación
    echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
