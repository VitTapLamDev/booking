<?php
    require('inc/user_cred.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - TRANG CÁ NHÂN</title>
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

    <section class="bg-light">
        <div class="container">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body ">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 mb-4 mb-lg-0 align-items-center justify-content-center">
                                <img src="/assets/images/user.png" alt="...">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                            <h3 class="h2 text-white mb-0"><?php echo $user_name; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-end">
                                        <button type="button" class="btn btn-danger shadow-none btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#change_pass">Change Password</button>  
                                        <button type="button" class="btn btn-dark shadow-none btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#details_user">Edit Information</button>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 "><i class="bi bi-telephone-fill me-4 "></i><?php echo $user_phonenumber ?> </li>
                                    <li class="mb-2 mb-xl-3 "><i class="bi bi-envelope-fill me-4 "></i><?php echo $user_email ?></li>
                                    <li class="mb-2 mb-xl-3 "><i class="bi bi-geo-alt-fill me-4 "></i><?php echo $user_address ?></li>
                                    <li class="mb-2 mb-xl-3 "><i class="bi bi-calendar3-event me-4 "></i><?php echo $formattedDate ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 px-4">
            <span class="section-title text-primary mb-3 mb-sm-4">Đơn đặt phòng: </span>
        </div>
        <div class="col-lg-12 px-4">
            <table class="table shadow table-bordered" id="hotel_room">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách sạn</th>
                        <th>Hotline</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th class="text-nowrap">Hạng phòng</th>
                        <th class="text-end">Thanh toán</th>
                        <th class="text-end">Trạng thái đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row = mysqli_fetch_assoc($result_booking)) : 
                    ?>
                    <tr class="align-items-center justify-content-center">
                        <td><?php echo $row['hotel_id'] ?></td>
                        <td><?php echo $row['hotel_name']; ?></td>             
                        <td><?php echo $row['hotline']?></td>
                        <td><?php echo $row['check_in']; ?></td>
                        <td><?php echo $row['check_out'] ?></td>
                        <td><?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip"); ?></td>
                        <td class="text-end"><?php echo $row['price'].' VND'?></td>

                        <?php if($row['status']=='process'){ ?>
                            <td class="text-center"><span class="badge text-bg-secondary">Chờ xử lý</span></td>
                        <?php }else{ ?>
                            <td class="text-center"><span class="badge text-bg-success">Đã Thanh Toán</span></td>
                        <?php } ?>
                    </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>  
        </div>                            

        <div class="col-lg-12 px-4">
            <span class="section-title text-primary mb-3 mb-sm-4">Lịch sử đặt phòng: </span>
        </div>
        <div class="col-lg-12 px-4">
            <form action="" method="POST">
                <table class="table shadow table-bordered" id="hotel_room">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khách sạn</th>
                            <th class="text-nowrap">Mã đơn</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th class="text-nowrap">Hạng phòng</th>
                            <th class="text-nowrap text-center">Trạng thái đơn hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = mysqli_fetch_assoc($result_hotel)) : 
                        ?>
                        <tr>
                            <td><?php echo $row['hotel_id'] ?></td>
                            <td><?php echo $row['hotel_name']; ?></td>             
                            <td><?php echo $row['bill_code']?></td>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out'] ?></td>
                            <td><?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip"); ?></td>
                            <?php if($row['status']=='cancel'){ ?>
                                <td class="text-center"><span class="badge text-bg-danger">Đã hủy</span></td>
                            <?php }else{ ?>
                                <td class="text-center"><span class="badge text-bg-success">Đã trả phòng</span></td>
                            <?php } ?>
                            <?php if($row['status']=='success'){ ?>
                                <td class="text-center"><button onclick="getData(this); window.location.href='rating.php'" name="rating_btn" type="button" class="btn btn-dark shadow-none mybtn" >Phản hồi</button>  </td>
                            <?php } ?>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>  
            </form>
        </div>
                                
        <div class="modal fade" id="change_pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center"> 
                                <i class="bi bi-person-lines-fill fs-3 me-2"></i> Đổi mật khẩu
                            </h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label">Mật khẩu cũ</label>
                                        <input name="old_pass" type="password" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label">Mật khẩu mới </label>
                                        <input name="new_pass" type="password" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label">Xác nhận mật khẩu</label>
                                        <input name="cnew_pass" type="password" class="form-control shadow-none" rows="2" required>
                                    </div>
                                </div>
                            </div>              
                            <div class="text-center my-1">
                                <button name="change_pass" class="btn btn-dark shadow-none" type="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>

        <div class="modal fade" id="details_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center"> 
                                <i class="bi bi-person-lines-fill fs-3 me-2"></i> Chỉnh sửa thông tin cá nhân
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
                                        <input name="name" type="text" class="form-control shadow-none" value="<?php echo $user_name; ?>" required>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Số điện thoại </label>
                                        <input name="phonenumber" type="text" class="form-control shadow-none" value="<?php echo (int) $user_phonenumber ?> "required>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <textarea name="address" class="form-control shadow-none" rows="2" required><?php echo $user_address ?></textarea>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Ngày sinh</label>
                                        <input name="dob" type="date" class="form-control shadow-none" value="<?php echo $dob ?>" required>
                                    </div>
                                </div>
                            </div>              
                            <div class="text-center my-1">
                                <button name="edit_user" class="btn btn-dark shadow-none" type="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
    </section>   
    <script>
        function getData(button) {
            var row = button.parentNode.parentNode; // Get the parent row of the button
            var cells = row.getElementsByTagName('td'); // Get all cells in the row

            // Access the data in each cell
            var data1 = cells[0].textContent;
            var data2 = cells[2].textContent;

            // Create an AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc/save_data.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Prepare the data to be sent
            var bill_code = 'data1=' + encodeURIComponent(data1) + '&data2=' + encodeURIComponent(data2);

            // Send the AJAX request
            xhr.send(bill_code);

            // Optional: Handle the response from the server
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Data saved in session successfully.');
                } else {
                    console.log('Failed to save data in session.');
                }
                }
            };
            }
    </script>
    
    <?php require('inc/footer.php')?>
</body>
</html>