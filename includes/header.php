<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piano online</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="/js/piano.js"></script>
</head>
<body>
    <header>
        <h1>Piano online</h1>
        <nav>
            <a href="index.php">Piano</a>
            <a href="login.php">Iniciar sesión</a>
            <a href="registro.php">Registrarse</a>
        </nav>
    </header>
    <div class="main-container">
        <div class="header">
            <h2>Piano online</h2>
            <a href="index.php">Piano</a><br>
            <a href="login.php">Iniciar sesión</a><br>
            <a href="registro.php">Registrarse</a>
        </div>

        <div class="piano">
            <!-- Aquí va tu HTML del piano con teclas -->
            <?php include_once "templates/piano.php"; ?>
        </div>
    </div>

    <div class="footer">
        © 2025 Piano Online
    </div>
<main>