<?php
    require('inc/db_config.php');
    session_start();
    $email_log = $_SESSION['account'];
    $query_user = "SELECT * FROM `user_cred` WHERE `email`='$email_log'";     
    $result_user = mysqli_query($conn, $query_user);

    $id_hotel = $_SESSION['id_hotel'];
    $query_hotel = "SELECT * FROM `hotel_cred` WHERE `id_hotel`='$id_hotel'";     
    $result_hotel = mysqli_query($conn, $query_hotel);

    $checkin = $_SESSION['checkin'];
    $checkout = $_SESSION['checkout'];
    $price = $_SESSION['price'];
    $numofroom = $_SESSION['numofroom'];

    $startDate = new DateTime($checkin);
    $endDate = new DateTime($checkout);
    $interval = $startDate->diff($endDate);
    $days = $interval->d;

    $total = $days * $price * $numofroom;
    $_SESSION['total'] = $total;
    
    function generateBillCode($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
    
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }
    
        return $code;
    }

    $billcode = generateBillCode();
    $_SESSION['bill_id'] = $billcode;
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Hóa đơn số:  <?php echo '#'.$billcode; ?></h4>
                                <?php while($row = mysqli_fetch_assoc($result_hotel)): ?>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted"><?php echo $row['hotel_name'] ?></h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1"><i class="bi bi-geo-fill me-1"></i><?php echo $row['details'] ?></p>
                                    <p class="mb-1"><i class="bi bi-envelope-fill me-1"></i><?php echo $row['hotel_email'] ?></p>
                                    <p class="mb-1"><i class="bi bi-telephone-fill me-1"></i><?php echo $row['hotline'] ?></p>
                                <?php endwhile; ?>
                                </div>
                            </div>
                            <hr class="my-4">
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
                    <a href="vnpay_php/vnpay_pay.php" target="_blank">
                        <button name="payed" class="btn btn-dark shadow-none">
                            <i class="bi bi-cash me-2" style="color: chartreuse;"></i>THANH TOÁN NGAY
                        </button>
                    </a>
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