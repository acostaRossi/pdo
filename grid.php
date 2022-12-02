<?php

require_once "db-config.php";

$pdo = connectToDB();

$offset = 0;
$limit = 10;

if(isset($_GET['offset'])) {

    $offset =  intval($_GET['offset']);
}

if($offset < 0) {
    $offset = 0;
}

$stmt = $pdo->query("SELECT * FROM users LIMIT $limit OFFSET $offset");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <a href="pages/home.html" class="btn btn-primary">Back</a>
    <h1 style="display: inline-block;">HTML Table Full Server Side</h1>
    <a href="grid-ajax.php" class="btn btn-primary">Next</a>

    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Active</th>
        </thead>
        <tbody>

        <?php

        $record = $records = $stmt->fetch(PDO::FETCH_OBJ);

        while($record) {

            echo "<tr>";
            echo "<td>".$record->id."</td>";
            echo "<td>".$record->name."</td>";
            echo "<td>".$record->age."</td>";
            echo "<td>".$record->active."</td>";
            echo "</tr>";

            $record = $records = $stmt->fetch(PDO::FETCH_OBJ);
        }

        ?>

        </tbody>
    </table>
    <a href="grid.php?offset=<?php echo ($offset - 10) ?>">Page prev</a>
    <a href="grid.php?offset=<?php echo ($offset + 10) ?>">Page next</a>
</div>

<script src="assets/js/index.js"></script>
</body>
</html>
