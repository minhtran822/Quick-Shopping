<?php
    require 'dbConnect.php';
    require_once("initilisationDB.php");


    /* If input fields are populated, add a row to the EMPLOYEES table. */
    $product_name = htmlentities($_POST['name']);
    $product_code = htmlentities($_POST['code']);
    $product_image = htmlentities($_POST['image']);
    $product_price = htmlentities($_POST['price']);

    if (strlen($product_name) || strlen($product_code) || strlen($product_image) || strlen($product_price)) {
        $n = mysqli_real_escape_string($conn, $product_name);
        $c = mysqli_real_escape_string($conn, $product_code);
        $i = mysqli_real_escape_string($conn, $product_image);
        $p = mysqli_real_escape_string($conn, $product_price);

        $query = "INSERT INTO products (name, code, image, price) VALUES  ('$n', '$c', '$i', $p);";

        if(!mysqli_query($conn, $query)) echo("<p>Error adding products data.</p>");
    }
?>

    <!-- This is the admin view for the Quick Shopping -->
    <HTML>
    <HEAD>
    <TITLE>Quick Shopping admin</TITLE>
    <link href="style.css" type="text/css" rel="stylesheet" />
    </HEAD>
    <BODY>
    <h1> Quick Shopping </h1>
    <h2> Admin View </h2>
    <a href="http://ec2-3-88-70-106.compute-1.amazonaws.com/"> Go back to shop here </a>

    <!-- Input form -->
    <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
        <table border="0">
            <tr>
                <td>NAME</td>
                <td>CODE</td>
                <td>IMAGE</td>
                <td>PRICE(2 decimal points)</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="name" maxlength="45" size="30" value="Havana Hat" required/>
                </td>
                <td>
                    <input type="text" name="code" maxlength="45" size="30" value="abcde" required/>
                </td>
                <td>
                    <input type="text" name="image" maxlength="90" size="60" value="https://asgn2-bucket.s3.amazonaws.com/Havana+Hat.jpg" required/>
                </td>
                <td>
                    <input type="number" min="0.00" step="0.01" name="price" maxlength="45" size="30" value="100.00" required/>
                </td>
                <td>
                    <input type="submit" value="Add Data" />
                </td>
            </tr>
        </table>
    </form>

    <!-- Display table data. -->
    <table border="1" cellpadding="2" cellspacing="2">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>CODE</td>
            <td>IMAGE</td>
            <td>PRICE</td>
        </tr>

        <?php

        $result = mysqli_query($conn, "SELECT * FROM products");

        while($query_data = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>",$query_data[0], "</td>",
            "<td>",$query_data[1], "</td>",
            "<td>",$query_data[2], "</td>",
            "<td>",$query_data[3], "</td>",
            "<td>",$query_data[4], "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <?php

    mysqli_free_result($result);
    mysqli_close($conn);

    ?>
</BODY>
</HTML>