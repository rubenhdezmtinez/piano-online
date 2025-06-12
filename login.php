<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

echo "Paso 1<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Paso 2: Formulario recibido<br>";

    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    echo "Paso 3: Usuario = $usuario<br>";

    if (!empty($usuario) && !empty($contrasena)) {
        echo "Paso 4: Consultando BD<br>";

        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE Usuario = ?");
        $stmt->execute([$usuario]);
        $usuarioBD = $stmt->fetch();

        echo "Paso 5: Resultado de fetch: " . var_export($usuarioBD, true) . "<br>";

        if ($usuarioBD && isset($usuarioBD['Contraseña'])) {
            echo "Paso 6: Verificando contraseña<br>";

            if (password_verify($contrasena, $usuarioBD['Contraseña'])) {
                echo "✅ Login correcto<br>";
            } else {
                echo "❌ Contraseña incorrecta<br>";
            }
        } else {
            echo "⚠️ Usuario no encontrado o sin campo 'Contraseña'<br>";
        }
    } else {
        echo "⚠️ Usuario o contraseña vacíos<br>";
    }
} else {
    echo "Formulario no enviado<br>";
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
