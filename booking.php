<?php
    require('inc/db_config.php');
    session_start();
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
    <?php 
        if (isset($_SESSION['account'])){
            require('inc/header_login.php');
        }else{
            require('inc/header.php');
        }
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">PHÒNG KHÁCH SẠN</h2>
        <div class="h-line bg-dark"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-lg-3 mb-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow col-lg-12 col-md-12" style="justify-content: space-around; ">
                    <form method="POST" action="">
                        <h4 class="mt-2" style="margin-left: 20px;">ĐẶT PHÒNG NGAY</h4>
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid col-lg-12 col-md-12">
                                <div class="border p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Bạn muốn đi đâu?</h5>
                                    <label for="" class="form-label">Điểm đến</label>
                                    <input type="text" name="location_inp" class="form-control shadow-none mb-3" value="<?php echo $_SESSION['location']; ?>" required>
                                </div>
                                <div class="border p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Ngày đến - Ngày Đi</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Check-in</label>
                                            <input name="check_in" type="date" class="form-control shadow-none mb-3" value="<?php echo $_SESSION['checkin']; ?>" required>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="" class="form-label">Check-out</label>
                                            <input name="check_out" type="date" class="form-control shadow-none mb-3" value="<?php echo $_SESSION['checkout']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="border p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Số lượng phòng</h5>
                                    <div class="col-lg-12">
                                        <label for="" class="form-label">Số lượng phòng: </label>
                                        <input name="number" type="number" class="form-control shadow-none mb-3" value="<?php echo $_SESSION['numofroom'] ?>" required>
                                    </div>
                                </div>
                                <div class="border p-3 rounded mb-3" style="margin: 10px; white-space:nowrap;">
                                    <h5 class="mb-3" style="font-size: 18px;" >Hạng phòng</h5>
                                    <label for="" class="form-label">Hạng phòng tìm kiếm: </label> <br>
                                    <select name="room_code" class="form-control shadow-none mb-3" required>
                                        <option disabled selected value="">Bạn muốn ở đâu?</option>
                                        <option <?php if($_SESSION['roomtype']=="standard"){ ?> selected <?php } ?> value="standard">Cơ bản</option>
                                        <option <?php if($_SESSION['roomtype']=="double"){ ?> selected <?php } ?> value="double">Phòng đôi</option>
                                        <option <?php if($_SESSION['roomtype']=="vip"){ ?> selected <?php } ?> value="vip">Vip</option>
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
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th>Khách sạn</th>
                    <th>Hotline</th>
                    <th>Địa chỉ</th>
                    <th>Hạng phòng</th>
                    <th>Giá (VNĐ/Đêm)</th>
                    <th>Bản đồ</th>
                    <?php if($_SESSION['account']){ ?><th></th> <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id_hotel'] ?></td>
                    <td><?php echo $row['hotel_name']; ?></td>             
                    <td><?php echo $row['hotline']?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td><?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip"); ?></td>
                    <td><?php echo $row['price']?></td>
                    <td><iframe width="200" height="120" src="<?php echo $row['gmap']; ?>" frameborder="0"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                    <?php if($_SESSION['account']){ ?><td><button name="booking_room" type="button" class='btn btn-dark shadow-none mybtn' onclick="getData(this); window.location.href='payment.php'">ĐẶT PHÒNG NGAY</button></td> <?php } ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <?php require('inc/footer.php')?> 
    <script>
        function getData(button) {
            var row = button.parentNode.parentNode;
            var rowData = [];
            var cells = row.getElementsByTagName('td');
            rowData.push(cells[0].textContent);
            rowData.push(cells[1].textContent);
            rowData.push(cells[5].textContent);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc/save_data.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                }
            };
            xhr.send('data=' + encodeURIComponent(JSON.stringify(rowData)));
        }
    </script>
                                
</html>