<?php
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    require_once "../model/model.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = $_POST["action"];

        try {
            if ($accion == "Registrar-se"){

                $nom = ($_POST["nom"]);
                $cognoms = ($_POST["cognoms"]);
                $usuari = ($_POST["usuari"]);
                $email = ($_POST["email"]);
                $contrasenya = ($_POST["contrasenya"]);
                $confirmar_contrasenya = ($_POST["confirmar_contrasenya"]);

                if (empty($nom)) { $errors[] = "El camp 'nom' és obligatori"; } 
                if (empty($cognoms)) { $errors[] = "El camp 'cognoms' és obligatori"; }
                if (empty($usuari)) { $errors[] = "El camp 'usuari' és obligatori"; }
                if (empty($email)) { $errors[] = "El camp 'correu' és obligatori"; }
                if (empty($contrasenya)) { $errors[] = "El camp 'contrasenya' és obligatori"; }
                if (empty($confirmar_contrasenya)) { $errors[] = "El camp 'confirmar contrasenya' és obligatori"; }
                if ($contrasenya != $confirmar_contrasenya) { $errors[] = "Contrasenya i confirmar contrasenya"; }
                //Si errors es buit ->
                if (empty($errors)) {
                    $existe = comprovarUsuariIEmail($usuari, $email);
                    if ($existe == false){
                        insertarNouUsuari($nom, $cognoms, $usuari, $email, $contrasenya);
                        include "../vista/vistaRegistrarse.php";
                    } else {
                        $errors[] = "Aquest usuari o email ja exsisteix";
                    }
                    if (!empty($errors)){ include "../vista/vistaRegistrarse.php"; }
                } else { include "../vista/vistaRegistrarse.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaModificar.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>