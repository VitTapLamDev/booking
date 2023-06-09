<?php
    require('inc_hotel/db_config.php');
    session_start();
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $hotel_id = $_SESSION['hotel_account'];
        $sql = "SELECT * FROM `user_rating` WHERE `hotel_id` LIKE '$hotel_id'";
        $result = mysqli_query($conn, $sql);

        $query_rating = "SELECT COUNT(bill_code) AS 'number', AVG(sore) AS 'avgscore' FROM `rating_bill` WHERE `hotel_id` = '$hotel_id'";
        $result_rating =  mysqli_query($conn, $query_rating);
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
    <title>ĐÁNH GIÁ</title>
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <link rel="stylesheet" href="assets_hotel/rating_style.css">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <?php require('inc_hotel/links.php') ?>
</head>
<body>
    <?php require('inc_hotel/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="container">
                    <div class="row">
                        <!-- Main content -->
                        <div class="col-lg-9 mb-3">
                            <div class="row text-left mb-5">
                            </div>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <div class="card row-hover pos-relative py-3 px-3 mb-3 border-secondary-subtle rounded">
                                    <div class="row align-items-center">
                                        <div class="col-md-8 mb-3 mb-sm-0">
                                            <h4><?php echo '#'.$row['bill_code'].': '.$row['subject'] ?></h4>
                                            <p class="text-sm"><span class="op-6">Rating at: <?php echo $row['date'].' by '. $row['user_name'] ?> </span>  </p>
                                            <hr>
                                            <h5><?php echo $row['message'] ?></h5>
                                        </div>
                                        <div class="col-md-4 op-7">
                                            
                                            <div class="row text-left op-7" style="white-space: nowrap;">
                                                <div class="rating">
                                                <span class="badge text-bg-primary me-2 fs-6">Đánh giá: </span>
                                                    <?php 
                                                        $score = $row['score'];
                                                        for($i =1; $i <= $score; $i++){
                                                            ?> <i class="bi bi-star-fill text-warning" style="white-space: nowrap;"></i> <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <!-- Sidebar content -->
                            <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                                <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div><div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}" data-toggle="sticky" class="sticky" style="top: 85px;"><div class="sticky-inner">
                                    <div class="bg-white text-sm">
                                        <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                            Thống kê
                                        </h4>
                                        <?php while($row = mysqli_fetch_assoc($result_rating)): ?>
                                        <hr class="my-0">
                                        <div class="row text-center d-flex flex-row op-7 mx-0">
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold"><?php echo $row['number'] ?></a> Đánh giá </div>
                                            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold"><?php if(!$row['avgscore']){echo '0';}else{echo $row['avgscore'];}  ?></a>Điểm Trung Bình</div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>