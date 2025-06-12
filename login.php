
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

echo "Hasta aquí todo bien<br>";

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    if (!empty($usuario) && !empty($contrasena)) {
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE Usuario = ?");
        $stmt->execute([$usuario]);
        $usuarioBD = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuarioBD) {
            if (!empty($usuarioBD['Contraseña']) && password_verify($contrasena, $usuarioBD['Contraseña'])) {
                $mensaje = "Inicio de sesión exitoso.";
            } else {
                $mensaje = "Contraseña incorrecta.";
            }
        } else {
            $mensaje = "Usuario no encontrado.";
        }
    } else {
        $mensaje = "Rellena todos los campos.";
    }
}
?>
