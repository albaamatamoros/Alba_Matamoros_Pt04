<?php
    //Establim el temps de la sessió.
    ini_set('session.gc_maxlifetime', 5 * 60);
    session_start();
    include "vista/vistaIndex.php";
?>
