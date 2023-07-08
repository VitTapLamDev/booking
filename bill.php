<?php require('inc/payment_crud.php') ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - ĐƠN HÀNG</title>
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <?php require('inc/links.php')?>
    <link rel="stylesheet" href="assets/style/payment.css">
      
</head>
<body class="bg-light">
<?php
    if($_SESSION['account']) {
        require('inc/header_login.php');
    } else {
        require('inc/header.php');
    }
    ?>
    <button class="btn btn-secondary mt-3 sticky-top" onclick="goBack()" style="top: 68px;">< Quay lại</button>
    <hr>
    <!-- Thông tin khách sạn -->
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color"><?php echo $hotel_name ?></h3>
                        <p style="text-align:justify"><?php echo $intro ?></p>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Địa chỉ</label>
                                    <p><?php echo $address ?></p>
                                </div>
                                <div class="media">
                                    <label>Email</label>
                                    <p><?php echo $hotel_email ?></p>
                                </div>
                                <div class="media">
                                    <label>Hotline</label>
                                    <p><?php echo $hotline ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Facebook</label>
                                    <p><?php echo $fb_link ?></p>
                                </div>
                                <div class="media">
                                    <label>Instagram</label>
                                    <p><?php echo $insta_link ?></p>
                                </div>
                                <div class="media">
                                    <label>Twitter</label>
                                    <p><?php echo $tw_link ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="<?php echo $hotel_img ?>" title="" alt="">
                    </div>
                </div>
            </div>
            <div class="counter">
                <?php while($row = mysqli_fetch_assoc($result_bill)){ ?>
                <div class="row">
                    <div class="col-6 col-lg-4">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500"><?php echo $row['sl'] ?></h6>
                            <p class="m-0px font-w-600">Tổng đơn đã đặt</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150"><?php echo $num_of_order ?></h6>
                            <p class="m-0px font-w-600">Phản hồi</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850"><?php echo $avg_score ?></h6>
                            <p class="m-0px font-w-600">Xếp hạng</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="mt-3">
                <p style="text-align:justify"><?php echo $about ?></p>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row align-items-center justify-content-around flex-row-reverse">
        <?php while($row = mysqli_fetch_assoc($result_room)){ ?>
            <div class="col-lg-6">
                <div class="about-text">
                    <h3 class="dark-color">Chi tiết phòng ngủ</h3>
                    <h4 class="theme-color">Hạng phòng: <?php echo ($row['room_code'] == 'double') ? "Phòng đôi" : (($row['room_code']) == 'standard' ? "Cơ bản" : "Vip"); ?></h4>
                    <p col-lg-12><?php echo 'Tiện nghi: '.$row['convenient'] ?></p>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="about-img">
                    <img src="<?php echo $row['img_room'] ?>">
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <hr>
    <!-- Đặt phòng -->
    
    <div>
        <form id="booking-form" method="POST">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center fs-3"> THÔNG TIN ĐẶT PHÒNG </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Hóa đơn số:  <?php echo '#'.$_SESSION['bill_code']; ?></h4>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted"><?php echo $hotel_name ?></h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1"><i class="bi bi-geo-fill me-1"></i><?php echo $address ?></p>
                                    <p class="mb-1"><i class="bi bi-envelope-fill me-1"></i><?php echo $hotel_email ?></p>
                                    <p class="mb-1"><i class="bi bi-telephone-fill me-1"></i><?php echo $hotline ?></p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <?php if($_SESSION['account']){ ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <?php while($row = mysqli_fetch_assoc($result_user)): ?>
                                        <h5 class="font-size-16 mb-3">Thông tin khách hàng:</h5>
                                        <h5 class="font-size-15 mb-2"><?php echo $row['user_name'] ?></h5>
                                        <p class="mb-1"><?php echo $row['address'] ?></p>
                                        <p class="mb-1"><?php echo $row['email'] ?></p>
                                        <p><?php echo $row['phonenumber'] ?></p>
                                        <?php endwhile; ?>   
                                    </div>
                                </div>  
                            </div>
                            <?php } ?>
                            <div class="py-2">
                                <form method="post">
                                    <h5 class="font-size-15">Chi tiết hóa đơn:</h5>
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Hạng phòng</th>
                                                    <th>Số lượng phòng</th>
                                                    <th>Ngày đặt phòng</th>
                                                    <th>Ngày trả phòng</th>
                                                    <th class="text-end" style="width: 120px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo($_SESSION['roomtype']=='double') ? "Phòng đôi":(($_SESSION['roomtype'])=='standard'?"Cơ bản": "Vip"); ?></th>
                                                    <td><?php echo $numofroom; ?></td>
                                                    <td><?php echo $checkin; ?></td>
                                                    <td><?php echo $checkout ?></td>
                                                    <td class="text-end"><?php echo $total.'VND' ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="text-end">Tạm tính: </th>
                                                    <td class="text-end"><?php echo $total.'VND' ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="border-0 text-end">Tổng cộng: </th>
                                                    <td class="border-0 text-end"><h5 class="m-0 fw-semibold"><?php echo $total.'VND' ?></h5></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="text-center mt-2">
                    <button name="" class="btn btn-danger shadow-none" data-bs-toggle="modal" data-bs-target="#confirmcancel" type="button">
                        <i class="bi bi-cash-coin me-2" ></i>Yêu cầu hủy đơn
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="confirmcancel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận hủy đơn</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Quý khách vừa yêu cầu hoàn tiền. Hệ thống đang tiến hành xử lý yêu cầu và dự kiến hoàn tiền sẽ được thực hiện trong thời gian từ 1-2 ngày làm việc. Hãy kiên nhẫn chờ đợi và cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của chúng tôi. </p>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ĐÓNG</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cashreturn" type="button" data-bs-dismiss="modal">TÔI ĐÃ HIỂU</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cashreturn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Gửi yêu cầu hủy phòng/Hoàn tiền thành công</h1>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button type="submit" name="cashreturn" class="btn btn-primary">ĐÓNG</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/footer.php')?> 
</body>
</html>