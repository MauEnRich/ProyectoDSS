<?php
require 'config/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $contraseña = $_POST['contraseña'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<form method="post">
    <h2>Iniciar Sesión</h2>
    Correo: <input type="email" name="email" required><br>
    Contraseña: <input type="password" name="contraseña" required><br>
    <button type="submit">Entrar</button>
</form>
