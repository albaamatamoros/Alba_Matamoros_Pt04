<?php
    session_start();
    //Establim el temps de la sessió.
    ini_set('session.gc_maxlifetime', 5 * 60);

    // Guardar el tiempo actual de inicio de sesión
    if (!isset($_SESSION['start_time'])) {
        $_SESSION['start_time'] = time(); // Guardamos el tiempo de inicio
    }

    // Calcular el tiempo de expiración
    $session_lifetime = 5 * 60; // 40 minutos
    $time_left = $session_lifetime - (time() - $_SESSION['start_time']);

    // Enviar el tiempo restante a JavaScript para que lo controle en el navegador
    echo "<script>var sessionTimeLeft = $time_left;</script>";
    include "vista/vistaIndex.php";
?>
