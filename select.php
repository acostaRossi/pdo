<?php

require_once "db-config.php";

$pdo = connectToDB();

function doQuery() {

    global $pdo;

    if ($pdo) {
        // https://www.php.net/manual/en/pdo.query.php
        // PDO::query : Prepares and executes an SQL statement without placeholders
        $stmt = $pdo->query("SELECT * FROM users");
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $records;
}

if ($pdo) {

    $results = doQuery();

    $msg = "Records count = ";
    $msg .= count($results);
    $msg .= "\n\n";

    if ($results) {
        foreach ($results as $result) {
            $msg .= $result['id'];
            $msg .= "\t";
            $msg .= $result['name'];
            $msg .= "\t";
            $msg .= $result['age'];
            $msg .= "\t";
            $msg .= $result['active'];
            $msg .= "\n";
        }
    }}

$responseData = [
    "success" => true,
    "msg" => $msg
];

header("Content-Type: application/json");
echo json_encode($responseData);
