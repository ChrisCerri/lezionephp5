<?php
    session_start();
    $utente = $_SESSION['utente'];
    $id = $utente['id'];

    //inserisco il file config
    include("include/config.php");

    //collegamento al db
    $link = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

    //chiudo il collegamento se non mi collego
    if($link === false) {
        die();
    }

    $sql_delete = "DELETE FROM alunni WHERE id = '$id' ";
    
    $result = $link->query($sql_delete);

    if($result) {
        echo "utente eliminato";
    }    
    else {
        echo "utente non eliminato";
    }
    
?>