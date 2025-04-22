<?php
session_start();

// Verificar si el usuario está logueado (comprobar si hay una sesión activa)
if (!isset($_SESSION['user'])) {
    // Si no está logueado, redirige al login
    header('Location: login.php');
    exit();
}
?>
