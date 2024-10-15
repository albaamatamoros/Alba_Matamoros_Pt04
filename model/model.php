<?php
    function comprovarUsuariIContrasenya($usuari, $contrasenya){
        require_once "connexio.php";
        try {
            $statement = $connexio->prepare('SELECT * FROM usuaris WHERE usuari = :usuari AND contrasenya = :contrasenya');
            $statement->execute(
                array(
                ':usuari' => $usuari,
                ':contrasenya' => $contrasenya)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>