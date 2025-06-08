<?php
    $host = '10.0.2.15';
    $usuario = 'rhm';
    $password = '4139407ACDC*';
    $base_datos = 'piano';

    $conn = new mysqli($host, $usuario, $password, $base_datos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>