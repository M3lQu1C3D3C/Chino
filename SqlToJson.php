<?php
    $db_host = "localhost";
    $db_name = "Chino";
    $db_user = "root";
    $db_pass = "";
    $mysqli = new mysqli($db_host, $db_user, $db_pass);
    $mysqli->select_db($db_name);
    $query = "SELECT * FROM Notas";
    $result = $mysqli->query($query, MYSQLI_STORE_RESULT);
    $json_array = array();
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row;
    }
    $mysqli->close();
    $fp = fopen("data.json", "w");
    fwrite($fp, json_encode($json_array));
    fclose($fp);
?>