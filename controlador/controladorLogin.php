<?php
    session_start();
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    require_once "../model/model.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = ($_POST["action"]);

        try {
            if ($accion == "Iniciar sessió"){
                $usuari = ($_POST["usuari"]);
                $contrasenya = ($_POST["contrasenya"]);

                if (empty($usuari)) { $errors[] = "No pots iniciar sessió amb un usuari buit."; } 
                if (empty($contrasenya)) { $errors[] = "Et cal una contrasenya per iniciar sessió.";}
                if (empty($errors)) {
                    $existe = comprovarUsuariIContrasenya($usuari, $contrasenya);
                    if ($existe === false){
                        $errors[] = "Iniciar sessió incorrecte, torna a intentar-ho";
                    } else {
                        $_SESSION["login"] = $existe;
                    }
                    if (!empty($errors)){ include "../vista/vistaLogin.php"; }
                } else { include "../vista/vistaLogin.php"; }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>