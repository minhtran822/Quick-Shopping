<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title> Insert Note </title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1> Add a Comment </h1>

    

    <form action="" method="post">

        <label>Writer Name</label>

        <br>

        <?php
            require 'dbconnect.php';

            $query = "SELECT wname FROM writer";

            $result = mysqli_query($conn, $query);

        ?>

        <select name="inWriter" style="width:200px">
            <option value=""></option>"
            <?php
                while ($row = mysqli_fetch_assoc($result)){
                    $writer_name = $row["wname"];
                    echo"<option value='$writer_name'> $writer_name </option>";
                }
            ?>
        </select>

        <br>

        <br>

        <label>Note</label>

        <br>

        <textarea id="note" name="inNote" rows="4" cols="50"></textarea>

        <br>

        <br>

        <INPUT TYPE="Submit" Name="Submit1" VALUE="Add Comment" id="button">

    </form><br>
	
	<a href="index.php"> Back </a><br>

    <?php
        require 'dbconnect.php';
        if(isset($_POST['inWriter']) && isset($_POST['inNote'])){
        $varWriter=$_POST['inWriter'];
        $varNote=$_POST['inNote'];

        echo 'Hello' .$varWriter. 'How are you?';
        echo "<br>";
        echo ($varWriter===null);
        echo "<br>";

        if($varWriter === null || $varNote ===null){
            echo 'Who is writing what?';
        }

        else{
            $selectID = "SELECT writer.wid FROM writer where wname = '" . $varWriter . "'";
            $qID = mysqli_query($conn, $selectID);
            if (!$qID) {
                $message  = 'Invalid query: ' . mysql_error() . "\n";
                $message .= 'Whole query: ' . $query;
                die($message);
            }

            $getID = mysqli_fetch_array($qID);
            echo $getID;

            $formatID = (int)$getID[0];
            echo $formatID;

            $qInNote = "INSERT INTO note (w_id, note_txt) VALUES ( $formatID, '" . $varNote. "')";

            if(mysqli_query($conn, $qInNote)){
                echo 'Recorded';
                header("Location: index.php");
            } else {
                echo 'Unsuccessful';
            }
        }
    }
    ?>
</body>

</html>