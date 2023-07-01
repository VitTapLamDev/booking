<?php require('inc/payment_crud.php') ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - KHÁCH SẠN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
            <div class="mt-5">
                <div class="container">
                    <div class="swiper swiper-rating">
                        <div class="swiper-wrapper mb-5" >
                            <?php while($row = mysqli_fetch_assoc($ratings)): ?>
                            <div class="swiper-slide bg-white p-4" style="margin: 20px;">
                                <div class="profile d-flex align-items-center mb-3">
                                    <img src="/assets/images/profile.png" class="custom-rating">
                                    <h6 class="m-0 ms-2"><?php echo $row['user_name'] ?></h6>
                                </div>
                                <h5><?php echo $row['subject'] ?></h5>
                                <p style="text-align:justify"><?php echo $row['message'] ?></p>
                                <div class="rating">
                                    <?php 
                                        $score = $row['score'];
                                        for($i = 1; $i <= $score; $i++):
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <?php endwhile;?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <div class="container">
            <div class="row align-items-center justify-content-around flex-row-reverse">
            <?php while($row = mysqli_fetch_assoc($result_room)){ ?>
                <div class="col-lg-6">
                    
                    <div class="about-text">
                        <h3 class="dark-color">Giới thiệu phòng.</h3>
                        <h4 class="theme-color">Hạng phòng: <?php echo ($row['room_code'] == 'double') ? "Phòng đôi" : (($row['room_code']) == 'standard' ? "Cơ bản" : "Vip"); ?></h4>
                        <p>Tiện nghi:</p>
                        <p><?php echo $row['convenient'] ?></p>
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
                <h5 class="modal-title d-flex align-items-center"> 
                    <i class="bi bi-person-lines-fill fs-3 me-2"></i> XÁC NHẬN THÔNG TIN ĐẶT PHÒNG 
                </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Hóa đơn số:  <?php echo '#'.$billcode; ?></h4>
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
                <?php if($_SESSION['account']){ ?>     
                <div class="text-center mt-2">
                    <button name="" class="btn btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#confirmcashpayed" type="button">
                        <i class="bi bi-cash me-2" style="color: chartreuse;" ></i>THANH TOÁN KHI NHẬN PHÒNG
                    </button>
                    <a href="vnpay_php/vnpay_pay.php" target="_blank">
                        <button name="payed" class="btn btn-light shadow-none border border-dark">
                            <img src="https://i.gyazo.com/670d31f2848cdafa000beb2085747a15.png" alt="" width="50px" class="me-2" >THANH TOÁN VNPAY
                        </button>
                    </a>
                </div>
                <?php }else{ ?>
                    <div class="text-center mt-2">
                        <button class="btn btn-dark shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#login_require">
                            <i class="bi bi-cash me-2" style="color: chartreuse;"></i>THANH TOÁN NGAY
                        </button>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>

    <div class="modal fade" id="confirmcashpayed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận thanh toán khi nhận phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Hệ thống sẽ sớm liên hệ với bạn để xác nhận đặt phòng</h5>
                    <p class="font-italic">Lưu ý: Để đảm bảo rằng thông tin đặt phòng của quý khách đã được ghi nhận, chúng tôi mong quý khách vui lòng xác nhận với chúng tôi thông qua cuộc gọi xác nhận.</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ĐÓNG</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cashpayed" type="button" data-bs-dismiss="modal">TÔI ĐÃ HIỂU</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cashpayed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ĐẶT PHÒNG THÀNH CÔNG</h1>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button type="submit" name="cashpayed" class="btn btn-primary">ĐÓNG</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login_require" tabindex="-1" aria-labelledby="login_require" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Bạn cần đăng nhập để thực hiện chức năng này!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập ngay</button>
                </div>
            </div>
        </div>
    </div>
    
    <?php require('inc/footer.php')?> 
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <Script>
        var swiper = new Swiper(".swiper-rating", {
            watchSlidesProgress: true,
            grabCursor: true,
            centeredSlides: true,
            // slidesPerView: "auto",
            loop: true,
            slidesPerView: 3,
    
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints:{
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </Script>
    
</html>