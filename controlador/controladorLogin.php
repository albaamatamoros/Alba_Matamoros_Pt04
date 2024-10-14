<?php
    session_start();
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    require_once "../model/model.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = $_POST["action"];

        try {
            if ($accion == "IniciarSessio"){
                $usuari = $_POST["usuari"];
                $contrasenya = $_POST["contrasenya"];

                if ($usuari) { $errors[] = "No pots iniciar sessió amb un usuari buit"; } 
                if ($contrasenya) { $errors[] = "Et cal una contrasenya per iniciar sessió";}
                if ($errors) {
                    $existe = comprovarUsuariIContrasenya($usuari, $contrasenya);
                    if ($existe == false){
                        $errors[] = "Inici de sessió incorrecte, torneu a intentar-ho";
                    } else {
                        $_SESSION["login"] = $existe;
                    }
                    if ($errors){ include "./vista/vistaIniciar.php"; }
                } else { include "./vista/vistaIniciar.php"; }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>