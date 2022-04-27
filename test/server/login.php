<?php 
    session_start();

    include "db.php";

    //print_r($_POST);

    $email = $_POST["email"];
    $pass = $_POST["password"];
    //$passhash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "SELECT password,id FROM users WHERE email='$email'";
    $res = $mysqli->query($sql);
    if($mysqli->error) { }
    else {
        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $hash = $row["password"];
            if(password_verify($pass, $hash)) {
                echo "ok";
                $_SESSION["userId"] = $row["id"]; 
            } else {
                echo "Špatné heslo!";
            }
        } else {
            echo "Chyba! Neexiustuješ!";
        }
    }

    /*
    echo $passhash;
    $sql = "SELECT id FROM users WHERE email='$email' AND password='$passhash'";
    $res = $mysqli->query($sql);
    if($mysqli->error) {
        echo $mysqli->error;
    } else {
        if($res->num_rows > 0) {
            echo "ok";
        } else {
            echo "Chyba! Špatné přihlašovací údaje!";
        }
    }
*/
?>