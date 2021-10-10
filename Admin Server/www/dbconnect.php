<?php

 $db_host   = 'asgn-db.cujhfzahbjmj.us-east-1.rds.amazonaws.com';

	$db_name   = 'sample';

	$db_user   = 'admin';

	$db_passwd = '123456789';

	

	$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);



    if(!$conn){

        echo "Comnection error";

        die("Connection Failed: ".mysqli_connect_error());

    }

    echo "Connection established";
    
?>