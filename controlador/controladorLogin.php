<?php
    //Alba Matamoros Morales
    session_start();
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    //Si es correcta la contrasenya.
    $correct = "false";
    require_once "../model/modelUsuaris.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = ($_POST["action"]);
        try {
            if ($accion == "Iniciar sessió"){
                $usuari = ($_POST["usuari"]);
                $contrasenya = ($_POST["contrasenya"]);

                if (empty($usuari)) { $errors[] = "No pots iniciar sessió amb un usuari buit."; } 
                if (empty($contrasenya)) { $errors[] = "Et cal una contrasenya per iniciar sessió.";}
                if (empty($errors)) {
                    $existe = comprovarContrasenya($usuari);
                    if ($existe == false) {
                        $errors[] = "No existeix aquest usuari";
                    } else { 
                        $correct = password_verify($contrasenya, $existe['contrasenya']); 
                        if ($correct == false){
                            $errors[] = "La contrasenya no es correcta";
                        } else {
                            $result = iniciSessio($usuari);
                            $_SESSION["loginId"] = $result["id_usuari"];
                            $_SESSION["loginUsuari"] = $result["usuari"];
                            $_SESSION["loginCorreu"] = $result["correu"];
                            header("Location: ../index.php");
                        }
                    }
                    if (!empty($errors)){ include "../vista/vistaLogin.php"; }
                } else { include "../vista/vistaLogin.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaLogin.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>