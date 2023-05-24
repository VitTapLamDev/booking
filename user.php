<?php
    require ('inc/db_config.php');
    session_start();
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Hotel Booking</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotels.php">Khách sạn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Dịch vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Hỗ trợ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Về chúng tôi</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal">
                        <i class="bi bi-box-arrow-in-right me-2"></i>ĐĂNG XUẤT
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body ">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6 mb-4 mb-lg-0 align-items-center">
                                    <img src="/assets/images/user.png" alt="...">
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                        <h3 class="h2 text-white mb-0">Họ và tên</h3>
                                    </div>
                                    <ul class="list-unstyled mb-1-9">
                                        <li class="mb-2 mb-xl-3"><i class="bi bi-telephone-fill"></i></li>
                                        <li class="mb-2 mb-xl-3"><i class="bi bi-envelope-fill"></i></li>
                                        <li class="mb-2 mb-xl-3"><i class="bi bi-geo-alt-fill"></i></li>
                                        <li class="mb-2 mb-xl-3"><i class="bi bi-person-vcard-fill"></i></li>
                                        <li class="mb-2 mb-xl-3"><i class="bi bi-calendar3-event"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div>
                        <span class="section-title text-primary mb-3 mb-sm-4">Lịch sử đặt phòng: </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        // while ($row = mysqli_fetch_assoc($result_user)){
        //     echo $row['user_name'];
        //     echo $row['email'];
        //     echo $row['address'];
        //     echo $row['phonenumber'];
        //     echo $row['id'];
        //     echo $row['dob'];
        // }
        echo $_SESSION['account'];
    ?>
    
    
    <?php require('inc/footer.php')?>
</body>
</html>