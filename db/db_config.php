<?php 

    $dbConn = mysqli_connect('localhost', 'root', 'Mpassword88', 'cocktail_php');

    if(!$dbConn){
        $dbError = 'DB Connection Failed! ' . mysqli_connect_error();
    } else {
        $dbError = '';
    }



?>