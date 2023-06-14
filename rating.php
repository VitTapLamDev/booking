<?php
    require ('inc/db_config.php');
    session_start();
    if(!$_SESSION['account']){
        header('Location: index.php');
    }
    $hotel_code = $_SESSION['hotel_id'];
    $bill_code = $_SESSION['bill_code'];
    $sql_hotel = "SELECT * FROM `hotel_cred` WHERE `id_hotel` = '$hotel_code'";
    $query_hotel = mysqli_query($conn, $sql_hotel);

    $sql_bill = "SELECT * FROM `booking` WHERE `bill_code` = '$bill_code'";
    $query_bill = mysqli_query($conn, $sql_bill);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - Gửi phản hồi</title>
    <link rel="stylesheet" href="/assets/style/rating_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
    <?php require('inc/header_login.php')?>
    <div class="container ">
        <section id="about-section" class="pt-5 pb-5 mt-4">
            <div class="container wrapabout">
                <div class="row">
                    <div class="col-lg-12 align-items-center justify-content-left d-flex mb-5 mb-lg-0">
                        <div class="blockabout col-lg-12">
                            <?php while($row = mysqli_fetch_assoc($query_bill)): ?>
                            <div class="blockabout-inner text-center text-sm-start">
                                <div class="title-big pb-3 mb-3">
                                    <h3> <?php echo 'Hóa đơn: #'.$row['bill_code'] ?></h3>
                                </div>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo 'Khách sạn: '.$row['hotel_name'] ?> </p>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo 'Địa chỉ: '.$row['details']; ?></p>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo 'Hotline: '.$row['hotline']; ?></p>
                                <hr>
                                <h4>Chi tiết đơn đặt phòng:</h4>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo ($row['room_code']=='double') ? "Hạng phòng: Phòng đôi":(($row['room_code'])=='standard'?"Hạng phòng: Cơ bản": "Hạng phòng: Vip");; ?></p>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo 'Số lượng: '.$row['number'].' phòng'; ?></p>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo 'Ngày đặt phòng: '.$row['check_in']; ?></p>
                                <p class="description-p text-muted pe-0 pe-lg-0"><?php echo 'Ngày trả phòng: '.$row['check_out']; ?></p>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="contact" class="contact-area section-padding mt-3">
        <div class="container">										
            <div class="section-title text-center mb-3">
                <h1>Gửi phản hồi cho chúng tôi</h1>
                <p>Kì nghỉ của bạn thế nào? Hãy cho chúng tôi biết cảm nghĩ của bạn nha!</p>
            </div>					
            <div class="row">
                <div class="col-lg-7">	
                    <div class="contact">
                        <form class="form" name="enq" method="post">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <input type="text" name="hotel_id" class="form-control" value="<?php echo $hotel_code ?>" readonly>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <input type="text" name="bill_code" class="form-control" value="<?php echo $bill_code ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="">Đánh giá:</label>
                                    </div>
                                    <div id="rating">
                                        <input type="radio" id="star5" name="rating" value="5"/>
                                        <label class = "full" for="star5" title="Tuyệt vời - 5 stars"></label>
                                    
                                        <input type="radio" id="star4" name="rating" value="4"/>
                                        <label class = "full" for="star4" title="Rất tốt - 4 stars"></label>
                                    
                                        <input type="radio" id="star3" name="rating" value="3"/>
                                        <label class = "full" for="star3" title="Bình thường - 3 stars"></label>
                                    
                                        <input type="radio" id="star2" name="rating" value="2"/>
                                        <label class = "full" for="star2" title="Khá tệ - 2 stars"></label>
                                    
                                        <input type="radio" id="star1" name="rating" value="1"/>
                                        <label class = "full" for="star1" title="Không có lần thứ hai - 1 star"></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <textarea rows="6" name="message" class="form-control" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="col-md-12 text-center mb-3">
                                    <button name="send_feedbackBtn" type="submit" name="send_feedbackBtn" class=" btn btn-primary">Gửi phản hồi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!--- END COL --> 
                <div class="col-lg-5">
                    <?php while($row = mysqli_fetch_assoc($query_hotel)): ?>
                    <div class="single_address">
                        <i class="fa fa-building"></i>
                        <h4>Khách sạn</h4>
                        <p><?php echo $row['hotel_name'] ?></p>
                    </div>	
                    <div class="single_address">
                        <i class="fa fa-map-marker"></i>
                        <h4>Địa chỉ</h4>
                        <p><?php echo $row['details'] ?></p>
                    </div>
                    <div class="single_address">
                        <i class="fa fa-envelope"></i>
                        <h4>Gửi email hỗ trợ</h4>
                        <p><?php echo $row['hotel_email'] ?></p>
                    </div>
                    <div class="single_address">
                        <i class="fa fa-phone"></i>
                        <h4>Hotline</h4>
                        <p><?php echo $row['hotline'] ?></p>
                    </div>
                    <?php endwhile;  ?>				
                </div><!--- END COL --> 
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->	 
    </div>
    
    <?php require('inc/footer.php')?>
</body>
</html>