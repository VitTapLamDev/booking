<?php
    require('inc_hotel/db_config.php');
    session_start();
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $hotel_id = $_SESSION['hotel_account'];
        $sql = "SELECT * FROM `hotel_cred` WHERE `id_hotel` LIKE '$hotel_id'";
        $result = mysqli_query($conn, $sql);
    }
    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <title>QUẢN LÝ</title>
    <?php require('inc_hotel/links.php') ?>
</head>
<body>
    <?php require('inc_hotel/header.php') ?> 
</body>
</html>