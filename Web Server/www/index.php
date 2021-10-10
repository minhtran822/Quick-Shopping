<!DOCTYPE html>

<html lang="en">

<head>

    <title>Home</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Chat Forum</h1>

    <p> This is the all the note form our beloved writers</p>

    <br>

    <div class = "menu">
        <a href="new_comment.php">Add Comment</a>
    </div>

    <table border="1">
    <tr><th>Note #</th><th>By</th><th>Said that:</th></tr>

<?php
    require 'dbconnect.php';

    $query ="SELECT note.n_id, writer.wname, note.note_txt FROM writer, note WHERE note.w_id = writer.wid";

    $result = mysqli_query($conn,$query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["n_id"]."</td><td>" .$row["wname"]."</td><td>".$row["note_txt"]."</td></tr>\n";
    }

    mysql_free_result($result);
?>

</body>

</html>