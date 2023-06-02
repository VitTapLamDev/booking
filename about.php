<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - CHÚNG TÔI</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
        Dù bạn chu du đến phương trời nào hay muốn chinh phục thử thách gì, SivivuTravel sẽ tạo mọi điều kiện thuận lợi và bên bạn với bộ phận hỗ trợ khách hàng 24/7.        </p>
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
        Với phương châm cống hiến hết mình, đội ngũ các thành viên tại SivivuTravel luôn mang tinh thần nhiệt huyết với công việc, luôn nỗ lực hết mình đạt được mục tiêu, từng bước đưa doanh nghiệp bứt phá, phát triển không ngừng.        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3"> Hoàng Tuấn Sinh</h3>
                <p>
                    Sinh viên chuyên ngành An toàn thông tin tại Học viện Kỹ thuật Mật mã
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4">
                <img src="/assets/images/profile.png" class="w-100">
            </div>
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3">Nguyễn Lý Minh Vũ</h3>
                <p>
                Sinh viên chuyên ngành An toàn thông tin tại Học viện Kỹ thuật Mật mã
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4">
                <img src="/assets/images/profile.png" class="w-100">
            </div>
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3">Nguyễn Đức Việt</h3>
                <p>
                Sinh viên chuyên ngành An toàn thông tin tại Học viện Kỹ thuật Mật mã
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