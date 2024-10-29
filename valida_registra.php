<?php
    // AVVIO SESSIONE
    session_start();

    //inizializzo le variabili
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    /* $genere = $_POST['genere']; */
    $genere = isset($_POST['genere']) ? $_POST['genere'] : "";

    $data_nascita = $_POST['data_nascita'];

    $rosso = isset($_POST['rosso']) ? $_POST['rosso'] : "no";
?>