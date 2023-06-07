<?php
    require ('inc/db_config.php');
    session_start();
    $email_log = $_SESSION['account'];
    $query_user = "SELECT * FROM `user_cred` WHERE `email`='$email_log'";     
    $result_user = mysqli_query($conn, $query_user);

    $query_booking = "SELECT * FROM `booking` WHERE `email_user`= '$email_log' AND `status` = 0";
    $result_booking = mysqli_query($conn, $query_booking);

    $query_history = "SELECT * FROM `booking` WHERE `email_user`= '$email_log' AND `status` = 1";
    $result_hotel = mysqli_query($conn, $query_history);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - Gửi phản hồi</title>
    <link rel="stylesheet" href="/assets/style/user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>
<body>
    <?php 
        require('inc/header_login.php')
    ?>

    
    
    <?php require('inc/footer.php')?>
</body>
</html>