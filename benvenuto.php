<?php
    session_start();
    $cognome = $_SESSION['cognome'];
    $nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
      Ciao <?php echo "$cognome $nome"?> sei stato registrato
    </p>
</body>
</html>

<?php
    session_destroy();
?>