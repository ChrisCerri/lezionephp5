<?php
    //apro la sessione
    session_start();

    //inizializzo le variabili
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    //file di config
    include("include/config.php");

    //collego al db
    $link = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

    if($link == false) {
        die();
    }

    //istruzione sql per la select
    $sql_select = "SELECT * FROM alunni WHERE user = '$user' ";

    $result = $link->query($sql_select);

    $row = $result->fetch_assoc(); //estrae dato da result

    /* foreach($row as $indice => $valore) {
        echo "<p>$indice</p>";
        echo "<p>$valore</p>";

    } */

    if($result->num_rows == 1) {
        $check_password = password_verify($pwd, $row['pwd']); //controlla se password è corrispondente
        $pwd == $row['pwd'];
        if($check_password) {
            $_SESSION['utente'] = $row;
            header("Location: utente.php");
            //echo "utente collegato";
            
        }
        else {
            echo "password errata";
        }
    }     
    else {
        echo "user errata";
    }


?>