<?php

if(isset($_GET['type']) && strtolower($_GET['type']) == 'ajax')
{
    require_once "db-config.php";

    $pdo = connectToDB();

    $stmt = $pdo->query("SELECT * FROM users");

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
    <h1 style="display: inline-block;">HTML Table With Ajax</h1>
    <a href="grid-ajax-infinite-scroll.php" class="btn btn-primary">Next</a>

    <p id="loader" style="display:none;">Loading data ...</p>

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
</div>

<script type="text/javascript">

    let baseUrl = "http://10.211.55.3/pdo/";

    let template = "<td>" +
        "<td>:ID</td>" +
        "<td>:NAME</td>" +
        "<td>:AGE</td>" +
        "<td>:ACTIVE</td>" +
        "</tr";

    function getData(e) {

        document.getElementById("loader").style.display = "block";

        fetch(baseUrl + "grid-ajax.php?type=ajax")
            .then(response => response.json())
            .then(result => {
                for(index in result) {
                    let record = result[index];
                    let html = template;
                    html = html.replace(":ID", record["id"]);
                    html = html.replace(":NAME", record["name"]);
                    html = html.replace(":AGE", record["age"]);
                    html = html.replace(":ACTIVE", record["active"]);

                    document.getElementsByTagName("tbody")[0].innerHTML += html;

                    document.getElementById("loader").style.display = "none";
                }
            })
            .catch(error => console.log('error', error));
    }

    getData();

</script>

</body>
</html>
