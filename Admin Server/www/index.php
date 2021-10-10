<!DOCTYPE html>

<html lang="en">

<head>

    <title>Home</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Chat Forum Admin</h1>

    <p> Writers statistic</p>

    <br>

    <div class = "menu">
        <a href="new_writer.php" class="btn">Add Writer</a>
        <a href="http://127.0.0.1:8080/index.php" class="btn"> View Note Centre </a>
    </div>

    <table border="1">
    <tr><th>writer ID</th><th>Name</th><th>Contribution</th></tr>

<?php
    $db_host   = '192.168.2.12';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";



    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    $q = $pdo->query("SELECT writer.wid, writer.wname, C.cnt FROM writer LEFT JOIN (SELECT w_id, count(w_id) AS cnt FROM note GROUP BY w_id) C ON writer.wid=C.w_id");

    while($row = $q->fetch()){
        echo "<tr><td>".$row["wid"]."</td><td>" .$row["wname"]."</td><td>".$row["cnt"]."</td></tr>\n";
    }

?>

</body>

</html>