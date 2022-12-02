<?php

if(isset($_GET['type']) && strtolower($_GET['type']) == 'ajax')
{
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

    $record = $records = $stmt->fetchAll(PDO::FETCH_OBJ);

    header("Content-Type", "application/json");
    echo json_encode($record);
    exit;
}

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
    <a href="grid.php" class="btn btn-primary">Back</a>
    <h1 style="display: inline-block;">HTML Table With Ajax Infinite Scroll</h1>

    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Active</th>
        </thead>
        <tbody>
        </tbody>
    </table>
    <button id="get-data">More</button>
</div>

<script type="text/javascript">

    let baseUrl = "http://10.211.55.3/pdo/";

    let template = "<td>" +
        "<td>:ID</td>" +
        "<td>:NAME</td>" +
        "<td>:AGE</td>" +
        "<td>:ACTIVE</td>" +
        "</tr";

    let offset = 0;

    function getData(e) {

        fetch(baseUrl + "grid-ajax-infinite-scroll.php?type=ajax&offset=" + offset)
            .then(response => response.json())
            .then(result => {
                for(let index in result) {
                    let record = result[index];
                    let html = template;
                    html = html.replace(":ID", record["id"]);
                    html = html.replace(":NAME", record["name"]);
                    html = html.replace(":AGE", record["age"]);
                    html = html.replace(":ACTIVE", record["active"]);

                    document.getElementsByTagName("tbody")[0].innerHTML += html;

                    offset++;
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("get-data").addEventListener("click", getData);

    getData();

</script>
</body>
</html>
