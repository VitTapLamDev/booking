<?php
    require('ajax/hotel_detail_cred.php');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="style/hotel_detail.css">
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php') ?>
    
    <div class="container-fluid">
        <form method="post">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="container-fluid">
                    <div class="container">
                    <!-- Title -->
                    <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                        <h2 class="h5 mb-3 mb-lg-0"><a href="hotels.php" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a>Hotel Infomation</h2>
                        <div class="hstack gap-3">
                            <button name="save_btn" class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">Hotel Introduce</h3>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">Hotel ID</label>
                                                <input name="hotel_code" type="text" class="form-control" value="<?php echo $hotel_id ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="mb-3">
                                                <label class="form-label">Hotel name</label>
                                                <input name="hotel_name" type="text" class="form-control" value="<?php echo $hotel_name ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Hotel Email</label>
                                                <input name="hotel_email" type="email" class="form-control" value="<?php echo $hotel_email ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Hotline</label>
                                                <input name="hotel_hotline" type="text" class="form-control" value="<?php echo $hotline ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">Address</h3>
                                    <div class="row">
                                        <div class="col-lg-3 mb-3">
                                            <label class="form-label">Location</label>
                                            <input type="text" class="form-control" value="<?php echo $location ?>" readonly>
                                        </div>
                                        <div class="col-lg-9 mb-3">
                                            <label class="form-label">Address</label>
                                            <input name="address" type="text" class="form-control" value="<?php echo $address ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Google Map Irame</label>
                                        <textarea name="gmap" type="text" class="form-control" rows="3" required><?php echo $gmap ?></textarea>
                                    </div>
                                    <h3 class="h6 mb-4">Social Links</h3>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Website</label>
                                            <input name="web_link" type="text" class="form-control" value="Đang cập nhập" readonly>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input name="fb_link" type="text" class="form-control" value="<?php echo $fb_link ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input name="insta_link" type="text" class="form-control" value="<?php echo $ins_link ?>" required>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input name="tw_link" type="text" class="form-control" value="<?php echo $tw_link ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- Right side -->
                            <div class="col-lg-4">
                            <!-- Status -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6">Status</h3>
                                        <?php while($row = mysqli_fetch_assoc($result_rating)): ?>
                                        <hr class="my-0">
                                        <div class="row text-center d-flex flex-row op-7 mx-0">
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold"><?php echo $row['number'] ?></a>Ratings</div>
                                            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold"><?php if(!$row['avgscore']){echo '0';}else{echo $row['avgscore'];}  ?></a>Average rating</div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php while($row = mysqli_fetch_assoc($result_bill)): ?>
                                        <hr class="my-0">
                                        <div class="row text-center d-flex flex-row op-7 mx-0">
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold"><?php echo $row['sl'] ?></a>Order</div>
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" style="color: darkgreen;"><?php echo $row['sl_success'] ?> </a>Success</div>
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" style="color: red;"><?php echo $row['sl_cancel'] ?></a>Cancel</div>
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" style="color: darkgreen;"><?php echo $row['total'] ?> VND</a>Total</div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <!-- Avatar -->
                                <!-- Notes -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6">Notes</h3>
                                        <textarea name="note" class="form-control" rows="6"><?php echo $note ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="container">
                            <h5><span>Rooms</span></h5>
                            <div class="col-lg-12">
                                <form method="post">
                                    <div class="candidate-list">
                                    <?php while($row = mysqli_fetch_assoc($result_room)): ?>
                                        <div class="candidate-list-box card mt-4">
                                            <div class="p-4 card-body">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="candidate-list-images">
                                                            <img src="<?php echo $row['img_room'] ?>" alt="" class="avatar-md img-thumbnail rounded-circle"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="candidate-list-content mt-3 mt-lg-0">
                                                            <div class="row">
                                                                <h5 class="col-lg-4"> Type of room: </h5>
                                                                <h5 class="col-lg-3 fs-19 mb-0">
                                                                    <p><?php echo($row['room_code']=='double') ? "Phòng đôi":(($row['room_code'])=='standard'?"Cơ bản": "Vip");  ?></p>
                                                                </h5>
                                                            </div>
                                                            <div class="row">
                                                                <h5 class="col-lg-4 text-muted mb-2">Total of room:</h5>
                                                                <h5 class="col-lg-3">
                                                                    <p><?php echo $row['number']?></p>
                                                                </h5>
                                                            </div>
                                                            <div class="row">
                                                                <h5 class="col-4 text-muted mb-2">Convenient:</h5>
                                                                <h5 class="col-lg-8">
                                                                    <p><?php echo $row['convenient']?></p>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto ">
                                                        <span class="badge text-bg-success fs-14 mt-1 d-flex justify-content-center"><?php echo $row['price'].' VND/Night' ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>

                    <section class="section">
                        <div class="container">
                            <div class="row ">
                                <h5 class="align-items-center" style="margin-top: 20px;">
                                    <span class="me-1">Rating</span>
                                    <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i>
                                </h5>
                                <?php while($row = mysqli_fetch_assoc($result_rating_hotel)): ?>
                                <div class="col-lg-12">
                                    <form method="post">
                                        <div class="candidate-list">
                                            <div class="candidate-list-box card mt-4">
                                                <div class="p-4 card-body">
                                                    <div class="">
                                                        <div class="candidate-list-content mt-3 mt-lg-0">
                                                            <div class="row">
                                                                <div class="col-lg-9 d-flex align-items-center">
                                                                    <h5 class="fs-19 mb-0">
                                                                        <a><?php echo $row['user_name'] ?></a>
                                                                        <span class="badge bg-secondary ms-1 align-items-end">
                                                                            <?php 
                                                                                $score = $row['score'];
                                                                                for($i =1; $i<=$score; $i++):
                                                                            ?>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <?php endfor; ?>
                                                                        </span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-3 fs-19 mb-0 d-flex justify-content-end">
                                                                    <span class="badge bg-soft-secondary fs-5"><?php echo '#'.$row['bill_code'] ?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="text-muted mb-2 fs-5"><?php echo $row['subject'] ?></p>
                                                            <ul class="list-inline mb-0 text-muted">
                                                                <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> <?php echo $row['message'] ?></li>
                                                            </ul>
                                                        </div>                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </form>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </form>
    </div>
    
    <?php require('inc/scripts.php') ?>
</body>
</html>

