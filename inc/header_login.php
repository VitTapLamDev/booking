<?php 
    require('db_config.php');
    
?>
<!-- Taskbar -->
<form action="" method="POST" class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-2 shadow-sm">
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
                        <a class="nav-link" href="booking.php">Khách sạn</a>
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
                    <button name="user_details" type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" onclick="window.location.href = 'user.php';">
                        <i class="bi bi-person-circle me-2"></i>Trang cá nhân
                    </button>
                    <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" onclick="window.location.href = 'logout.php';">
                        <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
                    </button>
                </div>
            </div>
        </div>
    </nav>
</form>
<?php echo isset($alert) ? $alert : ''; ?>