<?php
    require('inc/db_config.php');
    session_start();
    $email_log = $_SESSION['account'];
    $query_user = "SELECT * FROM `user_cred` WHERE `email`='$email_log'";     
    $result_user = mysqli_query($conn, $query_user);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - KHÁCH SẠN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('inc/links.php')?>
</head>
<body class="bg-light">
    <?php require('inc/header_login.php');?>
    <button class="btn btn-secondary" onclick="goBack()">< Quay lại</button>
    <!-- Thông tin khách sạn -->



    <!-- Đặt phòng -->
    <div>
        <form id="booking-form" method="POST">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center"> 
                    <i class="bi bi-person-lines-fill fs-3 me-2"></i> XÁC NHẬN THÔNG TIN ĐẶT PHÒNG 
                </h5>
            </div>
            <div class="modal-body">
                <span class="badge bg-light text-dark mb-3 text-wrap lh-base ">
                    Lưu ý: Thông tin của bạn phải trùng khớp và sẽ được bảo mật trong suốt quá trình đặt phòng khách sạn.
                </span>
                <div class="container-fluid">
                    <div class="row">
                        <?php while ($row = mysqli_fetch_assoc($result_user)): ?>          
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input name="name" type="text" class="form-control shadow-none" value="<?php echo $row['user_name']; ?>">
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Số điện thoại </label>
                            <input name="phonenumber" type="number" class="form-control shadow-none" value="<?php echo $row['phonenumber']; ?>">
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="text" class="form-control shadow-none" value="<?php echo $row['email']; ?>" readonly>
                            <?php endwhile; ?>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Khách sạn </label>
                            <input name="hotel_name" type="text" class="form-control shadow-none" value="<?php echo $_SESSION['hotel_booked']; ?>" readonly>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Hạng Phòng</label>
                            <input name="room_code" type="text" class="form-control shadow-none" value="<?php echo($_SESSION['roomtype']=='double') ? "Phòng đôi":(($_SESSION['roomtype'])=='standard'?"Cơ bản": "Vip"); ?>" readonly>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Số lượng phòng</label>
                            <input name="number" type="number" class="form-control shadow-none" value="<?php echo $_SESSION['numofroom']; ?>" readonly>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Ngày nhận phòng:</label>
                            <input name="checkin_bill" type="text" class="form-control shadow-none" value="<?php echo $_SESSION['checkin']; ?>" readonly>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Ngày trả phòng</label>
                            <input name="checkout_bill" type="text" class="form-control shadow-none" value="<?php echo $_SESSION['checkout']; ?>" readonly>
                        </div>
                    </div>
                </div>              
                <div class="text-center">
                    <button class="btn btn-dark shadow-none" type="button" >
                        <i class="bi bi-cash me-2" style="color: chartreuse;"></i>THANH TOÁN NGAY
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php require('inc/footer.php')?> 
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</html>