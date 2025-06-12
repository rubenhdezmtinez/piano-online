<?php
session_start();

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    if (!empty($usuario) && !empty($contrasena)) {
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE Usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuarioBD = $result->fetch_assoc();

        if ($usuarioBD && isset($usuarioBD['Contraseña'])) {
            if (password_verify($contrasena, $usuarioBD['Contraseña'])) {
                $_SESSION['usuario'] = $usuario;
                header("Location: index.php");
                exit();
            } else {
                $error = "❌ Contraseña incorrecta.";
            }
        } else {
            $error = "⚠️ Usuario no encontrado.";
        }
    } else {
        $error = "⚠️ Usuario o contraseña vacíos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <div class="registro-container">
        <h2>Inicio de sesión</h2>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
