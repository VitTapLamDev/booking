<?php
    require ('inc/db_config.php');
    session_start();
    if(!$_SESSION['account']){
        header('Location: index.php');
    }
    $email_log = $_SESSION['account'];
    $query_user = "SELECT * FROM `user_cred` WHERE `email`='$email_log'";     
    $result_user = mysqli_query($conn, $query_user);

    $query_booking = "SELECT * FROM `booking` WHERE `email_user`= '$email_log' AND (`status` = 'process' OR `status` = 'payed')";
    $result_booking = mysqli_query($conn, $query_booking);

    $query_history = "SELECT * FROM `booking` WHERE `email_user`= '$email_log' AND (`status` = 'success' OR `status` = 'cancel')";
    $result_hotel = mysqli_query($conn, $query_history);
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
                                <?php  while ($row = mysqli_fetch_assoc($result_user)){
                                    $dob = $row['dob']; 
                                    $formattedDate = date('d-m-Y', strtotime($dob));
                                ?>
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0"><?php echo $row['user_name']; ?></h3>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <?php echo "<li class=\"mb-2 mb-xl-3\"><i class=\"bi bi-telephone-fill me-4\"></i>". $row['phonenumber']. "</li>"; ?>
                                    <?php echo "<li class=\"mb-2 mb-xl-3\"><i class=\"bi bi-envelope-fill me-4\"></i>". $row['email']. "</li>"; ?>
                                    <?php echo "<li class=\"mb-2 mb-xl-3\"><i class=\"bi bi-geo-alt-fill me-4\"></i>". $row['address']. "</li>"; ?>
                                    
                                    <?php echo "<li class=\"mb-2 mb-xl-3\"><i class=\"bi bi-calendar3-event me-4\"></i>". $formattedDate. "</li>"; }?>
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
                            <td class="text-end"><span class="badge text-bg-secondary">Chờ xử lý</span></td>
                        <?php }else{ ?>
                            <td class="text-end"><span class="badge text-bg-success">Đã Thanh Toán</span></td>
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
                            <th class="text-nowrap text-end">Trạng thái đơn hàng</th>
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
                                <td class="text-end"><span class="badge text-bg-danger">Đã hủy</span></td>
                            <?php }else{ ?>
                                <td class="text-end"><span class="badge text-bg-success">Đã trả phòng</span></td>
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