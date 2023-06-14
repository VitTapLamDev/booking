<?php 
    require('db_config.php');
    
?>

<!-- Taskbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-2 shadow-sm sticky-top">
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
                <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Đăng nhập
                </button>
                <button type="button" class="btn btn-outline-light shadow-none " data-bs-toggle="modal" data-bs-target="#registerModal">
                    Đăng ký
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Login Form -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"> 
                        <i class="bi bi-person-circle fs-3 me-2"></i> Đăng nhập
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email đăng nhập</label>
                        <input type="email" name="email_log" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mật Khẩu</label>
                        <input type="password" name="pass_log" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" name="login_account" class='btn btn-dark shadow-none'>ĐĂNG NHẬP</button>
                        <a href="hotel/login.php" class="text-secondary text-decoration-none">Dành cho khách sạn</a>
                    </div>
                </div>     
            </form>
        </div>  
    </div>
</div>

<!-- Register Form -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"> 
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i> ĐĂNG KÝ
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
                                <input name="name" type="text" class="form-control shadow-none" require>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" require>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Số điện thoại </label>
                                <input name="phonenumber" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Ngày sinh</label>
                                <input name="dob" type="date" class="form-control shadow-none" required>
                                <br>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>              
                    <div class="text-center my-1">
                        <button name="create_user" class="btn btn-dark shadow-none" data-bs-dismiss="modal" type="submit">ĐĂNG KÍ NGAY</button>
                    </div>
                </div>
            </form>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</div>
<?php echo isset($alert) ? $alert : ''; ?>