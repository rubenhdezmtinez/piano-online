<?php
require_once 'db.php'; // Asegúrate de que contiene $conn con tu conexión PDO o mysqli

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    // Validación básica
    if (!empty($usuario) && !empty($correo) && !empty($contrasena)) {

        // Encriptar contraseña
        $hash = password_hash($contrasena, PASSWORD_BCRYPT);

        // Preparar e insertar en la base de datos
        $stmt = $conn->prepare("INSERT INTO Usuario (Usuario, Correo, Contraseña) VALUES (?, ?, ?)");
        if ($stmt->execute([$usuario, $correo, $hash])) {
            $mensaje = "Registro exitoso.";
        } else {
            $mensaje = "Error al registrar usuario.";
        }
    } else {
        $mensaje = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <h2>Registro de Usuario</h2>
    <?php if (!empty($mensaje)): ?>
        <p><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" id="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br>

        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
