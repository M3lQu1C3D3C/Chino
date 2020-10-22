<?php
    require_once("JsonToSql.php");
    $db_host = "localhost";
    $db_name = "Chino";
    $db_user = "root";
    $db_pass = "";
    $tabl_nam = "Notas";
    $json_nam = "data.json";
    $insertar = new JsonToMariaDB($db_host, $db_name, $db_user, $db_pass, $tabl_nam, $json_nam);
    $insertar->insert();
?>