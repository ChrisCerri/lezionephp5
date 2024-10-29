<?php
    // AVVIO SESSIONE
    session_start();

    //inizializzo le variabili
    $cognome = $_POST['cognome'];
    $nome = $_POST['pippo'];
    $user = $_POST['user'];
    /* $pwd = $_POST['pwd']; */
    $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT); //nascondere la password su un database

    /* $genere = $_POST['genere']; */
    $genere = isset($_POST['genere']) ? $_POST['genere'] : "";

    $data_nascita = $_POST['data_nascita'];

    $rosso = isset($_POST['rosso']) ? $_POST['rosso'] : "no";
    $verde = isset($_POST['verde']) ? $_POST['verde'] : "no";
    $giallo = isset($_POST['giallo']) ? $_POST['giallo'] : "no";

    $comune = $_POST['comune'];

    //inserisco il file config
    include("include/config.php");

    //collegamento al db
    $link = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

    //chiudo il collegamento se non mi collego
    if($link === false) {
        die();
    }

    $sql_insert = "INSERT INTO alunni (cognome, nome, user, pwd, genere, data_nascita, rosso, verde, giallo, comune) VALUES ('$cognome', '$nome', '$user', '$pwd', '$genere', '$data_nascita', '$rosso', '$verde', '$giallo', '$comune')"; 
    //php deve scrivere su un altro linguaggio  //contiene esattamente istruzione che deve fare

    //inserisco i dati nel db
    $result = $link->query($sql_insert);

    if($result) {
        echo "dati inseriti";
    }
    else {
        echo "dati non inseriti";
    }

    $link->close(); //l'oggetto è link e close chiude la connessione
?>