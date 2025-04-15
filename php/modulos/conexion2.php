<?php
// Definir las variables de conexión a la base de datos
$host = "3.224.12.191"; // Cambia esto si tu base de datos está en otro servidor
$usuario = "sql_sapamexport_"; // Tu usuario de MySQL
$contraseña = "27sNnCnwjid5EN2M"; // Tu contraseña de MySQL (deja vacío si no tienes contraseña configurada)
$nombre_base_datos = "sql_sapamexport_"; // Nombre de tu base de datos

try {
    // Crear la conexión usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$nombre_base_datos", $usuario, $contraseña);
    
    // Configurar el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa";
    
    // Si la conexión es exitosa, puedes imprimir este mensaje
    //echo "Conexión exitosa a la base de datos!";
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>
