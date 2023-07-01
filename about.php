<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - CHÚNG TÔI</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <?php require('inc/links.php')?>
    <style>
        .box{
            border-top-color: var(--teal) !important;
        }
    </style>
</head>
<body class="bg-light">
    
    <?php 
        session_start();
        if (isset($_SESSION['account'])){
            require('inc/header_login.php');
        }else{
            require('inc/header.php');
        }
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">HỆ THỐNG KHÁCH SẠN</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Chúng tôi tự hào mang đến một danh sách đa dạng và phong phú với hàng ngàn khách sạn trên toàn thế giới. Từ những khách sạn tiện nghi đến những kỳ quan nghỉ dưỡng xa hoa, chúng tôi cam kết cung cấp cho bạn lựa chọn tuyệt vời và trải nghiệm đáng nhớ.
        </p>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="/assets/images/about/building.png" width="40px">
                    <h4 class="mt-3">20+ KHÁCH SẠN</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="/assets/images/about/living-room.png" width="40px">
                    <h4 class="mt-3">100+ PHÒNG</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="/assets/images/about/rating.png" width="40px">
                    <h4 class="mt-3">200+ KHÁCH HÀNG</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="/assets/images/about/customer-review.png" width="40px">
                    <h4 class="mt-3">200+ ĐÁNH GIÁ</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ĐỘi NGŨ THÀNH LẬP</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Những con người đầy nhiệt huyết và tận tâm với sứ mệnh mang đến trải nghiệm tuyệt vời cho khách hàng. Chúng tôi tận dụng công nghệ tiên tiến và thiết kế sáng tạo để đảm bảo tính tiện lợi, độ an toàn và sự chuyên nghiệp trong mỗi giao dịch đặt phòng của bạn.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3"> Hoàng Tuấn Sinh</h3>
                <p>
                    Chuyên ngành An toàn thông tin - Học viện Kỹ thuật Mật Mã
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4">
                <img src="/assets/images/profile.png" class="w-100">
            </div>
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3">Nguyễn Lý Minh Vũ</h3>
                <p>
                    Chuyên ngành An toàn thông tin - Học viện Kỹ thuật Mật Mã
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4">
                <img src="/assets/images/profile.png" class="w-100">
            </div>
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3">Nguyễn Đức Việt</h3>
                <p>
                    Chuyên ngành An toàn thông tin - Học viện Kỹ thuật Mật Mã  
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4">
                <img src="/assets/images/profile.png" class="w-100">
            </div>
        </div>
    </div>
    <?php require('inc/footer.php')?>
    

</body>
</html>