<?php require('inc/db_config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL BOOKING - Khách sạn</title>
    <?php require('inc/links.php'); ?>
</head>
<body>
    <?php 
        session_start();
        if (isset($_SESSION['account'])){
            require('inc/header_login.php');
        }else{
            require('inc/header.php');
        }
    ?>


    <?php require('inc/footer.php'); ?>
</body>
</html>