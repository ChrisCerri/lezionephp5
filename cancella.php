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
    <form action="./cancella_utente.php" method="post">
        <?php
            echo "Elimina $utente[cognome] $utente[nome]";
        ?>
        <button type="submit">Elimina utente</button>
    </form>
</body>
</html>