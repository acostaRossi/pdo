<?php

require_once "db-config.php";

$pdo = connectToDB();

if ($pdo) {
    $msg = "Connected to the database successfully!";
}

$responseData = [
    "success" => true,
    "msg" => $msg
];

header("Content-Type: application/json");
echo json_encode($responseData);
