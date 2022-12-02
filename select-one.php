<?php

require_once "db-config.php";

$pdo = connectToDB();

if ($pdo) {

    $sql = "SELECT * FROM users WHERE id = :id";

    // modalità 1

    //$stmt = $pdo->query(str_replace(":id", intval($_POST["id"]), $sql));

    // modalità 2

    // prepare : Prepares a statement for execution and returns a statement object
    //$stmt = $pdo->prepare($sql);
    // execute : Executes a prepared statement
    //$stmt->execute(['id' => intval($_POST["id"])]);

    // modalità 3

    // prepare : Prepares a statement for execution and returns a statement object
    $stmt = $pdo->prepare($sql);
    // bindParam : Binds a parameter to the specified variable name
    $stmt->bindParam('id', $_POST["id"], PDO::PARAM_INT);
    // execute : Executes a prepared statement
    $stmt->execute();

    // fetch : Fetches the next row from a result set
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
