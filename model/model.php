<?php
    //SELECT
    //Comprovar Usuari I Contrasenya exsistent.
    function comprovarUsuariIContrasenya($usuari, $contrasenya){
        try {
            require_once "connexio.php";
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

    //Comprovar Usuari I Email.
    function comprovarUsuariIEmail($usuari, $email){
        try {
            require_once "connexio.php";
            $statement = $connexio->prepare('SELECT * FROM usuaris WHERE usuari = :usuari AND email = :email');
            $statement->execute(
                array(
                ':usuari' => $usuari,
                ':email' => $email)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //INSERT
    //Insertar nou Usuari.
    function insertarNouUsuari($nom, $cognoms, $usuari, $email, $contrasenya){
        try {
            //Senteècia per inserir
            require_once "connexio.php";
            $statement = $connexio->prepare('INSERT INTO usuaris (nom, cognoms, usuari, correu, contrasenya) VALUES (:nom, :cognoms, :usuari, :correu, :contrasenya)');
            $statement->execute( 
            array(
            ':nom' => $nom, 
            ':cognoms' => $cognoms,
            ':usuari' => $usuari,
            ':correu' => $email,
            ':contrasenya' => $contrasenya)
            );
        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
?>