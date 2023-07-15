<?php
    $db_name = "moviestar";
    $host="localhost";
    $user="root";
    $pass="";

    $conn = new PDO("mysql:host=$host;dbname=$db_name;", $user, $pass);

    //HABILITAR ERROS NO PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

?>