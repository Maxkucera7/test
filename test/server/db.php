<?php
$mysqli = new mysqli("localhost", "root", "", "classicmodels");
    if($mysqli->connect_error) {
        echo "Nepodařilo se připojit k DB!";
        echo $mysqli->connect_error;
        return;
    }
    ?>