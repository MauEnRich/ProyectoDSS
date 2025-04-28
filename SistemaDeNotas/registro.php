<?php
require 'config/db.php';

$mensaje = "";
$tipoMensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $contraseña = $_POST['contraseña'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "❌ Correo inválido.";
        $tipoMensaje = "error";
    } else {
        $hash = password_hash($contraseña, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)");
        try {
            $stmt->execute([$nombre, $email, $hash]);
            $mensaje = "✅ Usuario registrado con éxito. <a class='link' href='login.php'>Iniciar sesión</a>";
            $tipoMensaje = "success";
        } catch (PDOException $e) {
            $mensaje = "❌ Error al registrar: " . htmlspecialchars($e->getMessage());
            $tipoMensaje = "error";
        }
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

        <!-- Mensaje de éxito o error -->
        <?php if (!empty($mensaje)): ?>
            <p class="<?php echo $tipoMensaje; ?>"><?php echo $mensaje; ?></p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
