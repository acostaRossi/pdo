<?php

require_once "db-config.php";

$pdo = connectToDB();

if ($pdo) {

    /* SQL INJECTION
    $sql = "SELECT * FROM users WHERE id = " . $_POST["id"];
    $record = $pdo->query($sql)->fetch();


    /* PREVENT SQL INJECTION */
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("id", $_POST["id"], PDO::PARAM_INT);
    $stmt->execute();
    $record = $stmt->fetch();


    $msg = "";

    if ($record) {
        $msg .= $record['id'];
        $msg .= "\t";
        $msg .= $record['name'];
        $msg .= "\t";
        $msg .= $record['age'];
        $msg .= "\t";
        $msg .= $record['active'];
        $msg .= "\n";
    }}

$responseData = [
    "success" => true,
    "msg" => $msg
];

header("Content-Type: application/json");
echo json_encode($responseData);
