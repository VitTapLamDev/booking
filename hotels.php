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
    <?php require('inc/header.php')?>
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
                                    <input type="text" name="location_inp" class="form-control shadow-none mb-3">
                                </div>
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Ngày đến - Ngày Đi</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Check-in</label>
                                            <input name="check_in" type="date" class="form-control shadow-none mb-3">
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="" class="form-label">Check-out</label>
                                            <input name="check_out" type="date" class="form-control shadow-none mb-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Số lượng phòng</h5>
                                    <div class="col-lg-12">
                                        <label for="" class="form-label">Số lượng phòng: </label>
                                        <input name="number" type="number" class="form-control shadow-none mb-3">
                                    </div>
                                </div>
                                <div class="border bg-light p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="" style="font-size: 18px; padding: 5px 5px 10px 0; display: inline-block;">Hạng phòng</h5>
                                    <label for="" class="form-label" style="padding-bottom: 5px">Hạng phòng cần tìm: </label> <br>
                                    <select name="room_code" id="" style="padding: 4px">
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
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>  
    </div>
    
    
    <?php require('inc/footer.php')?> 
</html>