<?php
    //Alba Matamoros Morales
    session_start();
    require_once "../model/modelPersonatges.php";

    if (isset($_GET['id_personatge'])) {
        $idPersonatge = $_GET['id_personatge'];
    
        esborrarPerId($idPersonatge);
    
        header("Location: ../index.php");
    }
?>