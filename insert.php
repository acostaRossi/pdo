<?php

require_once "db-config.php";

$pdo = connectToDB();

if ($pdo) {

    $name = $_POST["name"];
    $age = $_POST["age"];

    $sql = "INSERT INTO users VALUES(?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, null);
    $stmt->bindValue(2, $name, PDO::PARAM_STR);
    $stmt->bindValue(3, $age, PDO::PARAM_INT);
    $stmt->bindValue(4, false, PDO::PARAM_BOOL);
    $stmt->execute();
    $lastInsertedId = $pdo->lastInsertId();

    $msg = "Inserted with success ! \n";
    $msg .= "Id = $lastInsertedId";
}

$responseData = [
    "success" => true,
    "msg" => $msg
];

header("Content-Type: application/json");
echo json_encode($responseData);
