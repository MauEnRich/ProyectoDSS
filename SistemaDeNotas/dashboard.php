<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
echo "Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . " <a href='logout.php'>Cerrar sesión</a>";
?>
