<?php require('inc_hotel/rooms_crud.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HỆ THỐNG PHÒNG NGỦ</title>
    <link rel="stylesheet" href="assets_hotel/rooms_style.css">
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php require('inc_hotel/links.php') ?>
</head>
<body>
    <?php require('inc_hotel/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <?php echo isset($alert) ? $alert : ''; ?>
                <?php 
                    if($room == 0) {
                ?>
                <div class="wp-block-title">
                    <button type="button" name="room_btnAdd" class="btn btn-dark shadow-none btn-sm room_btnEdit" data-bs-toggle="modal" data-bs-target="#add_room">Thêm phòng mới:</button>
                </div>
                
                <?php }else if($room >=3){ ?>
                <div class="wp-block-title">
                    <button type="button" name="room_btnEdit" class="btn btn-dark shadow-none btn-sm room_btnEdit" data-bs-toggle="modal" data-bs-target="#details_room">Chỉnh sửa </button>
                </div>
                <?php }else{ ?>
                <div class="wp-block-title">
                    <button type="button" name="room_btnAdd" class="btn btn-dark shadow-none btn-sm room_btnEdit" data-bs-toggle="modal" data-bs-target="#add_room">Thêm phòng mới:</button>
                </div>
                <div class="wp-block-title">
                    <button type="button" name="room_btnEdit" class="btn btn-dark shadow-none btn-sm room_btnEdit" data-bs-toggle="modal" data-bs-target="#details_room">Chỉnh sửa </button>
                </div>
                <?php }?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="container bootstrap snippets bootdey">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wp-block property list">
                                    <div class="wp-block-body">
                                        <div class="wp-block-img">
                                            <a href="#">
                                                <img src="<?php echo $row['img_room'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="wp-block-content">
                                            <h4 class="content-title">Hạng phòng: <?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip");  ?></h4>
                                            <h5>Số lượng phòng: <?php echo $row['number'] ?></h5>
                                            <!-- <h5>Phòng trống: </h5> -->
                                            <p class="description">Tiện nghi: <?php echo $row['convenient'] ?></p>
                                            <span class="pull-left">
                                                <span class="price"><?php echo $row['price'].' VND/đêm' ?></span> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Detail modal -->
            <div class="modal fade" id="details_room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post">                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Thông tin phòng ngủ:</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    
                                    <div class="mb-3"> 
                                        <label for="" class="form-label fw-bold">Hạng phòng: </label>
                                        <select name="room_code" class="form-control shadow-none mb-3" required>
                                            <option value="standard">Cơ bản</option>
                                            <option value="double">Phòng đôi</option>
                                            <option value="vip">Vip</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Số lượng phòng: </label>
                                    <input type="text" name="room_number" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Tiện nghi:</label>
                                    <input type="text" name="room_conve" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Giá:</label>
                                    <input type="number" name="room_price" class="form-control shadow-none" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="room_Editbtn" class="btn btn-success text-white shadow-none">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal Add room -->
            <div class="modal fade" id="add_room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post">                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Thông tin phòng ngủ:</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                            <label for="" class="form-label fw-bold">ID Hotel</label>
                                            <input type="text" name="hotel_id" class="form-control shadow-none" value="<?php echo $_SESSION['hotel_account'] ?>" readonly>
                                        </div>
                                    <div class="col-lg-6 mb-3"> 
                                        <label for="" class="form-label fw-bold">Hạng phòng: </label>
                                        <select name="room_code" class="form-control shadow-none mb-3" required>
                                            <option value="standard">Cơ bản</option>
                                            <option value="double">Phòng đôi</option>
                                            <option value="vip">Vip</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Số lượng phòng: </label>
                                    <input type="text" name="room_number" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Tiện nghi:</label>
                                    <input type="text" name="room_conve" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Giá:</label>
                                    <input type="number" name="room_price" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Hình ảnh:</label>
                                    <input type="text" name="room_img" class="form-control shadow-none" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="room_Addbtn" class="btn btn-success text-white shadow-none">Add room</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>