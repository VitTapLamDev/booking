<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - KHÁCH SẠN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('inc/links.php')?>
    <?php require('inc/db_config.php')?>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Hotel Booking</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotels.php">Khách sạn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Dịch vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Hỗ trợ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Về chúng tôi</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" onclick="window.location.href = 'user.php';">
                        <i class="bi bi-person-circle me-2"></i>Trang Cá Nhân
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <?php echo isset($alert) ? $alert : ''; ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">PHÒNG KHÁCH SẠN</h2>
        <div class="h-line bg-dark"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-lg-3 mb-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow col-lg-12 col-md-12" style="justify-content: space-around;">
                    <form method="POST" action="">
                        <h4 class="mt-2" style="margin-left: 20px;">ĐẶT PHÒNG NGAY</h4>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid col-lg-12 col-md-12">
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Bạn muốn đi đâu?</h5>
                                    <label for="" class="form-label">Điểm đến</label>
                                    <input type="text" name="location_inp" class="form-control shadow-none mb-3" required>
                                </div>
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Ngày đến - Ngày Đi</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Check-in</label>
                                            <input name="check_in" type="date" class="form-control shadow-none mb-3" required>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="" class="form-label">Check-out</label>
                                            <input name="check_out" type="date" class="form-control shadow-none mb-3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Số lượng phòng</h5>
                                    <div class="col-lg-12">
                                        <label for="" class="form-label">Số lượng phòng: </label>
                                        <input name="number" type="number" class="form-control shadow-none mb-3" required>
                                    </div>
                                </div>
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="" style="font-size: 18px; padding: 5px 5px 10px 0; display: inline-block;">Hạng phòng</h5>
                                    <label for="" class="form-label" style="padding-bottom: 5px">Hạng phòng cần tìm: </label> <br>
                                    <select name="room_code" id="" style="padding: 4px" required>
                                        <option disabled selected value="">Hạng phòng cần tìm</option>
                                        <option value="standard">Cơ bản</option>
                                        <option value="double">Phòng đôi</option>
                                        <option value="vip">Vip</option>
                                    </select>
                                </div>
                                <form class="d-flex">
                                    <div class="row justify-content-between align-items-center" style="margin: 10px;"> 
                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <button name="search_hotels" type="submit" class='btn btn-dark shadow-none mybtn'>TÌM KIẾM</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </form>
                </nav>
            </div>
        </div>          
    </div>

    <div class="col-lg-12 px-4">
        <table class="table shadow table-bordered" id="hotel_room">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Khách sạn</th>
                    <th>Hotline</th>
                    <th>Địa chỉ</th>
                    <th>Hạng phòng</th>
                    <th>TIện nghi</th>
                    <th>Giá</th>
                    <th>Bản đồ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $id = 1;
                    while ($row = mysqli_fetch_assoc($result)) : 
                ?>
                <tr>
                    <td><?php echo $id++ ?></td>
                    <td><?php echo $row['hotel_name']; ?></td>             
                    <td><?php echo $row['hotline']?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td><?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip"); ?></td>
                    <td><?php echo $row['convenient']?></td>
                    <td><?php echo $row['price'].'VND/Đêm'?></td>
                    <td><iframe width="200" height="120" src="<?php echo $row['gmap']; ?>" frameborder="0"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                    <td><button name="booking_room" type="submit" class='btn btn-dark shadow-none mybtn' data-bs-toggle="modal" data-bs-target="#bookingModal">ĐẶT PHÒNG NGAY</button>  </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>  
    </div>

    <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="booking-form" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"> 
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i> ĐẶT PHÒNG NGAY
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base ">
                            Lưu ý: Thông tin của bạn phải trùng khớp và sẽ được bảo mật trong suốt quá trình đặt phòng khách sạn.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Họ và tên</label>
                                    <input name="name" type="text" class="form-control shadow-none" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Số điện thoại </label>
                                    <input name="phonenumber" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Số CCCD/Hộ chiếu</label>
                                    <input name="ID" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Khách sạn </label>
                                    <input name="hotel_name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Hạng Phòng</label>
                                    <input name="room_code" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Số lượng phòng</label>
                                    <input name="number" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Check-in</label>
                                    <input name="checkin_bill" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Check-out</label>
                                    <input name="checkout_bill" type="date" class="form-control shadow-none" required>
                                </div>
                            </div>
                        </div>              
                        <div class="text-center my-1">
                            <button name="booking_room" class="btn btn-dark shadow-none booking_room" data-bs-dismiss="modal" type="submit">ĐẶT PHÒNG NGAY</button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    </div>
    <?php require('inc/footer.php')?> 

    <script>
        $("#submit").click(function () {
            var text = $("#textarea").val();
            $("#modal_body").html(text);
        });
    </script>
</html>