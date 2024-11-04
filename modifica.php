<?php
    session_start();
    $utente_modifica = $_SESSION['utente'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <form action="./modifica_registra.php" method="post">
            <input type="text" placeholder="cognome" name="cognome" value="<?php echo $utente_modifica['cognome']?>">
            <input type="text" placeholder="nome" name="nome" value="<?php echo $utente_modifica['nome'] ?>">
            <input type="text" placeholder="user" name="user" value="<?php echo $utente_modifica['user'] ?>">
            <!-- <input type="password" placeholder="password" name="pwd"> -->

            <?php
                $check_donna = $utente_modifica['genere'] == "d" ? "checked" : "";
                $check_uomo = $utente_modifica['genere'] == "u" ? "checked" : "";
            ?>
            <input type="radio" name="genere" value="d" id="donna" <?php echo $check_donna ?>>
            <label for="donna">donna</label>
            <input type="radio" name="genere" value="u" id="uomo" <?php echo $check_uomo ?>>
            <label for="uomo">uomo</label>

            <input type="date" name="data_nascita" value="<?php echo $utente_modifica['data_nascita']?>">

            <?php
                $checked_rosso = $utente_modifica['rosso'] == "si" ? "checked" : "";
                $checked_verde = $utente_modifica['verde'] == "si" ? "checked" : ""; 
                $checked_giallo = $utente_modifica['giallo'] == "si" ? "checked" : "";  
            ?>
            <input type="checkbox" name="rosso" value="si" id="rosso">
            <label for="rosso">rosso</label>
            <input type="checkbox" name="verde" value="si" id="verde">
            <label for="verde">verde</label>
            <input type="checkbox" name="giallo" value="si" id="giallo">
            <label for="giallo">giallo</label>

            <select name="comune">
                <!-- <option value="comune1">comune 1</option>
                <option value="comune2">comune 2</option>
                <option value="comune3">comune 3</option>
                <option value="comune4">comune 4</option> -->
                <?php
                    $comune = ["comune 1" => "comune1", "comune 2" => "comune2", "comune 3" => "comune3", "comune 4" => "comune4"];
                    foreach($comune as $indice => $valore) {
                        $selected_comune = $utente_modifica['comune'] == $valore ? "selected" : "";
                        echo "<option value='$valore' $selected_comune >$indice</option>";
                    }
                ?>
            </select>

            <button type="submit">Registra dati</button>
        </form>
    </div>
</body>
</html>