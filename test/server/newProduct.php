<?php

    include "db.php";
    
    $nazev = $_POST["nazev"];
    $cena = $_POST["cena"];

    if(empty($nazev)) {
        echo "Chyba... Není vyplněno jméno!";
        return;
    }
    if(empty($cena)) {
        echo "Chyba... Není vyplněná cena!";
        return;
    }

    $sql = "INSERT INTO products (productName, buyPrice, productLine) VALUES ('$nazev', $cena, 'Vintage Cars')";
    $res = $mysqli->query($sql);
    if($mysqli->error) {
        echo "Chyba! DB dotaz je špatně! " . $sql . $mysqli->error;
    } else {
        echo "ok";
    }

?>