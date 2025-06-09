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

<link rel="stylesheet" href="/css/estilos.css"> 

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<div class="form-container">
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="post">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <input type="submit" value="Entrar">
    </form>
</div>

<?php include 'includes/footer.php'; ?>