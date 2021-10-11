<?php
    require 'dbConnect.php';

    $rowcount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM products;"));
    $qInitialise = "INSERT INTO products (id, name, code, image, price) VALUES 
                                                       (1, 'FinePix Pro2 3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
                                                       (2, 'EXP Portable Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
                                                       (3, 'Luxury Ultra thin Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00);";
    if($rowcount == 0){
        mysqli_query($conn,$qInitialise);
    }

?>