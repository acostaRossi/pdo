<?php

function connectToDB($host = "10.211.55.3", $db = "pdo", $u = "user", $p = "") {
    $h = isset($_POST["host"]) ? $_POST["host"] : $host;
    $db = isset($_POST["database"]) ? $_POST["database"] : $db;
    $u = isset($_POST["user"]) ? $_POST["user"] : $u;
    $p = isset($_POST["password"]) ? $_POST["password"] : $p;

    $dsn = "mysql:host=$h;dbname=$db;charset=UTF8";

    try {
        $pdo = new PDO($dsn, $u, $p);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $pdo;
}
