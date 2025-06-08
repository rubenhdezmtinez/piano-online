<?php
    $host = '10.0.2.16';
    $usuario = 'rhm';
    $password = 'ckl_*opt21A';
    $base_datos = 'piano';

    $conn = new mysqli($host, $usuario, $password, $base_datos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>
