<?php
    $host = '10.0.2.16';
    $usuario = 'rhm';
    $password = '*9A37A5B922A005DB44AD71C89E2CFBEBEE04950';
    $base_datos = 'piano';

    $conn = new mysqli($host, $usuario, $password, $base_datos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>
