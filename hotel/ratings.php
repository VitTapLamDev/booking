<?php
    require('inc_hotel/db_config.php');
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        session_start();
        $hotel_id = $_SESSION['hotel_account'];
        $sql = "SELECT * FROM `hotel_cred` WHERE `id_hotel` LIKE '$hotel_id'";
        $result = mysqli_query($conn, $sql);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐÁNH GIÁ</title>
    <?php require('inc_hotel/links.php') ?>
</head>
<body>
    <?php require('inc_hotel/header.php') ?>
</body>
</html>