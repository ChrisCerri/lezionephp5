<?php
    session_start();
    $utente = $_SESSION['utente'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>utente loggato</p>
    <?php
        /* foreach($utente as $indice=> $valore) {
            echo "<p>$indice: $valore</p>";
        } */
       echo "<p>$utente[cognome]</p>";
       echo "<p>rosso: $utente[rosso]</p>";
    ?>
</body>
</html>

<?php
session_destroy();
?>