<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'db.php';
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT password FROM Usuarios WHERE Usuario = ?");
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

<link rel="stylesheet" href="/css/estilos.css"> 
<h2>Login</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <input type="submit" value="Entrar">
</form>

<?php include 'includes/footer.php'; ?>