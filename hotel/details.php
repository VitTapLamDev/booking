<?php
    require('inc_hotel/db_config.php');
    session_start();
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $hotel_id = $_SESSION['hotel_account'];
        $sql = "SELECT * FROM `hotel_cred` WHERE `id_hotel` LIKE '$hotel_id'";
        $result = mysqli_query($conn, $sql);
    }
    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN CHI TIẾT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php require('inc_hotel/links.php') ?>
</head>
<body>
    <?php require('inc_hotel/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>
                <!-- General setting  -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">THÔNG TIN MÔ TẢ</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#details">Edit</button>
                        </div>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <h6 class="card-subtitle mb-1 fw-bold">Tên khách sạn</h6>
                        <p class="card-text"><?php echo $row['hotel_name']; ?></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Giới thiệu</h6>
                        <p class="card-text"><?php echo $row['hotel_intro']; ?></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Mô tả</h6>
                        <p class="card-text"><?php echo $row['hotel_about']; ?></p>
                        
                    </div>
                </div>
                <!-- Modal detail -->
                <div class="modal fade" id="details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post">                        
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">Thông tin mô tả</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">ID khách sạn </label>
                                        <input type="text" name="id_hotel" class="form-control shadow-none" value="<?php echo $_SESSION['hotel_account'] ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Tên khách sạn</label>
                                        <input type="text" name="hotel_name_inp" class="form-control shadow-none" value="<?php echo $row['hotel_name']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Giới thiệu</label>
                                        <textarea class="form-control shadow-none" name="hotel_intro_inp" rows="3" required><?php echo $row['hotel_intro']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Mô tả</label>
                                        <textarea class="form-control shadow-none" name="hotel_about_inp" rows="5" required><?php echo $row['hotel_about']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="details_btn" data-bs-dismiss="modal" class="btn btn-success text-white shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contact/Address</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">Edit</button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"><?php echo $row['details']; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1"> 
                                        <i class="bi bi-telephone-fill me-1"></i> 
                                        <span id="pn1"><?php echo $row['hotline']; ?></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold"> E-mail</h6>
                                    <p class="card-text" id="email"><?php echo $row['hotel_email']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1"> 
                                        <i class="bi bi-twitter mb-1"></i> 
                                        <span id="tw"><?php echo $row['twitter_link']; ?></span>
                                    </p>
                                    <p class="card-text mb-1"> 
                                        <i class="bi bi-facebook mb-1"></i> 
                                        <span id="fb"><?php echo $row['fb_link']; ?></span>
                                    </p>
                                    <p class="card-text"> 
                                        <i class="bi bi-instagram mb-1"></i> 
                                        <span id="insta"><?php echo $row['insta_link']; ?></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy" src="<?php echo $row['gmap'] ?>"></iframe>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Contact modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="post" action="">                        
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">Contact/Address Settings</h1>
                                </div>
                                <form method="post">
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">ID khách sạn </label>
                                                        <input type="text" name="id_hotel" class="form-control shadow-none" value="<?php echo $_SESSION['hotel_account'] ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Address</label>
                                                        <input type="text" name="address" class="form-control shadow-none" value="<?php echo $row['details']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Phone Numbers (with country code)</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"> <i class="bi bi-telephone-fill"></i> </span>
                                                            <input type="text" name="phone_number" class="form-control shadow-none" value="<?php echo $row['hotline']; ?>" require>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Email</label>
                                                        <input type="email" name="email" class="form-control shadow-none" value="<?php echo $row['hotel_email']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Social Links</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"> <i class="bi bi-facebook"></i> </span>
                                                            <input type="text" name="fb" class="form-control shadow-none" value="<?php echo $row['fb_link']; ?>" require>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"> <i class="bi bi-instagram"></i> </span>
                                                            <input type="text" name="ins" class="form-control shadow-none" value="<?php echo $row['insta_link']; ?>" require>
                                                        </div> 
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"> <i class="bi bi-twitter"></i> </span>
                                                            <input type="text" name="tw" class="form-control shadow-none"  value="<?php echo $row['twitter_link']; ?>" require>
                                                        </div> 
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">iFrame Scr</label>
                                                        <div class="input-group mb-3">
                                                            <textarea class="form-control shadow-none" name="gmap" rows="5" required><?php echo $row['gmap']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        
                                        </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="contact_setBtn" data-bs-dismiss="modal" class="btn btn-success text-white shadow-none">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>