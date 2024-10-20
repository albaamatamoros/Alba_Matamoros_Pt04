<?php
    //Alba Matamoros Morales

    require_once "connexio.php";
    //------------
    //- USUARIOS -
    //------------
    //********************************************************
    //SELECT
    //Comprovar Usuari I Contrasenya exsistent.
    function comprovarUsuariIContrasenya($usuari, $contrasenya){
        try {
            $connexio = connexio();
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
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM usuaris WHERE correu = :correu OR usuari = :usuari');
            $statement->execute(
                array(
                ':correu' => $email,
                ':usuari' => $usuari)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function comprovarContrasenya($usuari){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM usuaris WHERE usuari = :usuari');
            $statement->execute(
                array(
                ':usuari' => $usuari)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //********************************************************
    //INSERT

    //Insertar nou Usuari.
    function insertarNouUsuari($nom, $cognoms, $usuari, $email, $contrasenya){
        try {
            //Senteècia per inserir
            $connexio = connexio();
            $statement = $connexio->prepare('INSERT INTO usuaris (nom, cognoms, correu, usuari, contrasenya) VALUES (:nom, :cognoms, :correu, :usuari, :contrasenya)');
            $statement->execute( 
            array(
            ':nom' => $nom, 
            ':cognoms' => $cognoms,
            ':correu' => $email,
            ':usuari' => $usuari,
            ':contrasenya' => $contrasenya)
            );
        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //INICIAR SESSIÓN
    function iniciSessio($usuari){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT id_usuari, correu, usuari FROM usuaris WHERE usuari = :usuari');
            $statement->execute(
                array(
                    ':usuari' => $usuari)
            );
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>