<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $contraseña = $_POST['contraseña'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo inválido";
        exit;
    }

    $hash = password_hash($contraseña, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$nombre, $email, $hash]);
        echo "Usuario registrado con éxito. <a href='login.php'>Iniciar sesión</a>";
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
}
?>

<form method="post">
    <h2>Registro</h2>
    Nombre: <input type="text" name="nombre" required><br>
    Correo: <input type="email" name="email" required><br>
    Contraseña: <input type="password" name="contraseña" required><br>
    <button type="submit">Registrarse</button>
</form>
