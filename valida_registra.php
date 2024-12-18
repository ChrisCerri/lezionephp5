<?php
    // AVVIO SESSIONE
    session_start();

    /* if(session_id() != $_SESSION['sessioneid']) {
        header("Location:registra.php");
        exit; //per essere sicuri che l'interprete non continui a leggere i dati della pagina
    } */

    /* if(isset($_POST['btnregistra'])) {
        echo "click bottone";
    }
    else{
        echo "no click";
    } */

    if(session_id() != $_SESSION['sessioneid'] || !isset($_POST['btnregistra'])) {
        header("Location: registra.php");
        exit;
    }

    $_SESSION['sessione'] = "ok";

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

    //controllo la user se esiste
    $sql_select = "SELECT user FROM alunni WHERE user = '$user'";
    $duplicato = $link->query($sql_select);

    if($duplicato->num_rows > 0) {
        echo "l'utente esiste";
        exit; //con gli exit non si esegue il resto dei controlli
    }

    $sql_insert = "INSERT INTO alunni (cognome, nome, user, pwd, genere, data_nascita, rosso, verde, giallo, comune) VALUES ('$cognome', '$nome', '$user', '$pwd', '$genere', '$data_nascita', '$rosso', '$verde', '$giallo', '$comune')"; 
    //php deve scrivere su un altro linguaggio  //contiene esattamente istruzione che deve fare

    //inserisco i dati nel db
    $result = $link->query($sql_insert);

    //variabili di sessione
    $_SESSION['cognome'] = $cognome;
    $_SESSION['nome'] = $nome;
    $_SESSION['user'] = $user;
    

    if($result) {
        /* echo "dati inseriti"; */
        header("Location:benvenuto.php");
    }
    else {
        echo "dati non inseriti";
    }

    //proteggere dati
    /* echo session_id(); */ //quando sessione è aperta, rimane sempre lo stesso id




    $link->close(); //l'oggetto è link e close chiude la connessione
?>