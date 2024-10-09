<?php
//CONNEXIO
function connexio(){
    //Dades connexio a BD.
    $host = "localhost";
    $nomBD = "pt02_alba_matamoros";
    $usuari = "root";
    $contra = "";

    //Connexió.
    try {
       return new PDO("mysql:host=$host;dbname=$nomBD", $usuari, $contra);
        echo "Connexio correcta!!" . "<br />"; 
    } catch (PDOException $e){
        die("Error: " . $e->getMessage());
    }
}
?>