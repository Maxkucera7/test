<?php 
    include "db.php";

    //print_r($_POST);

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT email FROM users WHERE email='$email'";
    $res = $mysqli->query($sql);
    if($res->num_rows > 0) {
        echo "Chyba! Uživatel už existuje!";
    } else {
        $passhash = password_hash($pass, PASSWORD_DEFAULT);
        //echo $passhash;
        //echo strlen($passhash);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$passhash')";
        $res = $mysqli->query($sql);
        if($mysqli->error) {
            echo "Chyba! " . $mysqli->error . $sql;
        } else {
            echo "ok";
        }
    }

?>