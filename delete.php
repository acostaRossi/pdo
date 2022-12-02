<?php

require_once "db-config.php";

$pdo = connectToDB();

$sql = "DELETE FROM users WHERE name = ?";

$name = $_POST["name"];

$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->execute();

$rowCount = $stmt->rowCount();

$msg = "Deleted with success !!!\n";
$msg .= "Affected $rowCount records.";

$responseData = [
    "success" => true,
    "msg" => $msg
];

header("Content-Type: application/json");
echo json_encode($responseData);
