<?php

require_once "db-config.php";

$pdo = connectToDB();

$name = $_POST["name"];
$age = intval($_POST["age"]);
$id = intval($_POST["id"]);

$sql = "UPDATE users SET name=:name, age=:age WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":age", $age, PDO::PARAM_INT);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

$rowCount = $stmt->rowCount();

$msg = "Updated with success !!!\n";
$msg .= "Affected $rowCount records.";

$responseData = [
    "success" => true,
    "msg" => $msg
];

header("Content-Type: application/json");
echo json_encode($responseData);
