<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'db.php';
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

       $stmt = $conn->prepare("SELECT Contraseña FROM Usuarios WHERE Usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($hash);

        if ($stmt->fetch() && password_verify($password, $hash)) {
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit();
        } else {
            $error = "Credenciales inválidas";
        }

        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="form-container">
        <h2>Iniciar Sesión</h2>
        <?php if ($mensaje): ?>
            <p class="mensaje"><?= $mensaje ?></p>
        <?php endif; ?>
        <form method="POST" action="">
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