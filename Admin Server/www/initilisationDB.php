<?php
    require 'dbConnect.php';

    $rowcount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM products;"));
    $qInitialise = "INSERT INTO products (name, code, image, price) VALUES 
                                                       ('Scary Mask', '3DcAM01', 'https://asgn2-bucket.s3.amazonaws.com/Scary+Mask.jpg', 1500.00),
                                                       ('Heart-shaped Sunglasses', 'USB02', 'https://asgn2-bucket.s3.amazonaws.com/Heart-shaped+Sunglasses.jpg', 800.00),
                                                       ('Cool Plunger', 'wristWear03', 'https://asgn2-bucket.s3.amazonaws.com/Cool+Plunger.jpg', 300.00);";
    if($rowcount == 0){
        mysqli_query($conn,$qInitialise);
    }

?>