<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'db.php';

    $mensaje = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = trim($_POST['usuario']);
        $correo = trim($_POST['correo']);
        $contrasena = trim($_POST['contrasena']);

        if (!empty($usuario) && !empty($correo) && !empty($contrasena)) {

            $hash = password_hash($contrasena, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO Usuarios (Usuario, Correo, Contraseña) VALUES (?, ?, ?)");
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
    <div class="registro-container">
        <h2>Registro de usuario</h2>
        <form action="registro.php" method="POST">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
