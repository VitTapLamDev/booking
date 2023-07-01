<?php
    require('inc_hotel/db_config.php');
    session_start();
    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }
    $bill_code = $_SESSION['bill_code'];
    $sql = "SELECT * FROM `booking` WHERE `bill_code` = '$bill_code'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <title>Chi tiết hóa đơn</title>
    <?php require('inc_hotel/links.php') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
</head>
<body>
    <?php require('inc_hotel/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                
                <button class="btn btn-secondary" onclick="window.location.href='bills.php'">< Quay lại</button>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Hóa đơn số:  <?php echo '#'.$row['bill_code']; ?></h4>
                                <div class="mb-4">
                                <h2 class="mb-1 text-muted"><?php echo $row['hotel_name'] ?></h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1"><i class="bi bi-geo-fill me-1"></i><?php echo $row['details'] ?></p>
                                    <p class="mb-1"><i class="bi bi-envelope-fill me-1"></i><?php echo $row['hotel_email'] ?></p>
                                    <p class="mb-1"><i class="bi bi-telephone-fill me-1"></i><?php echo $row['hotline'] ?></p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Thông tin khách hàng:</h5>
                                        <h5 class="font-size-15 mb-2"><?php echo $row['user_name'] ?></h5>
                                        <p class="mb-1"><?php echo $row['address'] ?></p>
                                        <p class="mb-1"><?php echo $row['email_user'] ?></p>
                                        <p><?php echo $row['phonenumber'] ?></p>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">Thời gian tạo đơn:</h5>
                                            <h5>
                                                <span class="badge text-bg-primary">
                                                    <?php 
                                                        $dateString = $row['time_booked']; // Assuming 'date_column' is the name of your column
                                                        $dateTime = new DateTime($dateString);
                                                        $formattedDate = $dateTime->format('H:i:s d/m/Y');
                                                        echo $formattedDate;
                                                    ?>
                                                </span>
                                            </h5>
                                        </div>
                                        <div>
                                            <h5 class="font-size-15 mb-1">Trạng thái đơn hàng:</h5>
                                            <?php if($row['status']=='cancel'){ ?>
                                                <h5><span class="badge text-bg-danger">Đã hủy</span></h5>
                                            <?php }else if($row['status']=='success'){ ?>
                                                <h5><span class="badge text-bg-success">Đã trả phòng</span></h5>
                                            <?php }else if($row['status']=='process'){ ?>
                                                <h5><span class="badge text-bg-secondary">Đang xử lý</span></h5>
                                            <?php }else if($row['status']=='payed'){ ?>
                                                <h5><span class="badge text-bg-primary">Đã thanh toán</span></h5>
                                            <?php } ?>
                                        </div>
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
                                                    <th><?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip"); ?></th>
                                                    <td><?php echo $row['number'].' phòng'; ?></td>
                                                    <td><?php echo $row['check_in']; ?></td>
                                                    <td><?php echo $row['check_out'] ?></td>
                                                    <td class="text-end"><?php echo $row['price'].'VND' ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="text-end">Tạm tính: </th>
                                                    <td class="text-end"><?php echo $row['price'].'VND' ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="border-0 text-end">Giảm giá:</th>
                                                    <td class="border-0 text-end">- 0VND</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="border-0 text-end">Tổng cộng: </th>
                                                    <td class="border-0 text-end"><h5 class="m-0 fw-semibold"><?php echo $row['price'].'VND' ?></h5></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-print-none mt-4">
                                        <div class="float-end">
                                            <?php if($row['status']=='process' || $row['status']=='payed') {?>
                                                <a data-bs-toggle="modal" data-bs-target="#cancelConfirm" class="btn btn-danger w-md">Hủy đơn</a>
                                                <a data-bs-toggle="modal" data-bs-target="#checkoutConfirm" class="btn btn-primary w-md">Trả phòng</a>
                                            <?php } ?>
                                            <?php if($row['status']=='process') {?>
                                                <a data-bs-toggle="modal" data-bs-target="#payedConfirm" class="btn btn-success w-md">Thanh toán</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

                <div class="modal fade" id="checkoutConfirm" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Xác nhận trả phòng</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Trả phòng hóa đơn số: <?php echo '#'.$_SESSION['bill_code'] ?></h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" name="checkoutBtn" class="btn btn-primary">Trả phòng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="cancelConfirm" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Xác nhận hủy đơn</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Hủy hóa đơn số: <?php echo '#'.$_SESSION['bill_code'] ?></h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" name="cancelBtn" class="btn btn-danger">Hủy đơn</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="payedConfirm" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Xác nhận thanh toán</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Thanh toán hóa đơn số: <?php echo '#'.$_SESSION['bill_code'] ?></h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" name="payedBtn" class="btn btn-primary">Thanh toán</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>                                           
</body>
</html>