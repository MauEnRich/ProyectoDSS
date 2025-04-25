<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $contraseña = $_POST['contraseña'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red; text-align: center;'>Correo inválido.</p>";
        exit;
    }

    $hash = password_hash($contraseña, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$nombre, $email, $hash]);
        echo "<p style='color: green; text-align: center;'>Usuario registrado con éxito. <a href='login.php'>Iniciar sesión</a></p>";
    } catch (PDOException $e) {
        echo "<p style='color: red; text-align: center;'>Error al registrar: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>

<div class="form-register">
    <h2>Registro</h2>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre de usuario" required><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="password" name="contraseña" placeholder="Contraseña" required><br>
        <button type="submit">Registrarse</button>
    </form>
</div>

</body>
</html>
