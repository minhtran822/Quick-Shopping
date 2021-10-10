<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title> Insert Writer </title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1> Add Account </h1>

    

    <form action="" method="post">

        <label>Account Name</label>

        <br>

        <INPUT TYPE="Text" VALUE="" NAME="name">

        <br>

        <br>

        <INPUT TYPE="Submit" Name="Submit1" VALUE="Add account" id="button">

        <br>

        <br>

        <a href="index.php"> Back</a>

    </form><br>

    <?php
        require 'dbconnect.php';
        if(isset($_POST['name'])){
        $varName=$_POST['name'];

        if($varName === null){
            echo 'Please Add Name';
        }

        else{
            
            $qInNote = "INSERT INTO writer (wname) VALUES ( '" . $varName. "')";

            if(mysqli_query($conn, $qInNote)){
                echo 'Recorded ' . $varName;
            } else {
                echo 'Unsuccessful';
            }
        }
    }
    ?>
</body>

</html>