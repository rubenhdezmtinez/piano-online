<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
require_once 'db.php';
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    if (!empty($usuario) && !empty($contrasena)) {
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE Usuario = ?");
        $stmt->execute([$usuario]);
        $usuarioBD = $stmt->fetch();

        if ($usuarioBD && password_verify($contrasena, $usuarioBD['Contraseña'])) {
            $mensaje = "Inicio de sesión exitoso.";
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    } else {
        $mensaje = "Rellena todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <div class="registro-container">
        <h2>Iniciar sesión</h2>

        <?php if ($mensaje): ?>
            <p style="color: red; text-align: center;"><?= $mensaje ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>

<?php include 'includes/footer.php'; ?>