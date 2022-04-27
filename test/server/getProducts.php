<?php

    include "db.php";
    
    $sql = "SELECT productName, buyPrice FROM products LIMIT 10";
    $result = $mysqli->query($sql);
    $arr = [];
    if($result !== FALSE) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        echo json_encode($arr);
    } else {
        echo "Špatný dotaz! " . $mysqli->error . " --- " . $sql;
    }

?>