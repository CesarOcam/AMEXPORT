<?php
session_start();

// Incluir la conexión
require_once('conexion.php'); // Ajustá esta ruta según tu estructura

// Recoger datos del formulario
$username = $_POST['email'] ?? '';
$password = $_POST['pass'] ?? '';

// Buscar al usuario
$stmt = $pdo->prepare('SELECT * FROM sec_users WHERE email = ?');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Validar contraseña (sin usar hash, comparación directa)
if ($user && $password === $user['pswd']) {
    $_SESSION['user'] = $user['login'];
    exit;
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>
