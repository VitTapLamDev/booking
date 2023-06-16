<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - DỊCH VỤ</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('inc/links.php')?>
    <style>
        .pop:hover{
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
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
        <h2 class="fw-bold h-font text-center">DỊCH VỤ CỦA CHÚNG TÔI</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Chúng tôi mang đến sự đa dạng và chất lượng với các dịch vụ hấp dẫn tạo nên một trải nghiệm đáng nhớ cho mỗi khách hàng.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/sedan.png" width="40px">
                        <h5 class="m-0 ms-3">Đưa đón sân bay</h5>
                    </div>
                    <p>
                    Giúp bạn khám phá thế giới mà không phải lo lắng về di chuyển. Tận hưởng sự thoải mái và tiện nghi với đội ngũ lái xe chuyên nghiệp, đảm bảo bạn đến và đi sân bay một cách dễ dàng và an toàn.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/washing-machine.png" width="40px">
                        <h5 class="m-0 ms-3">Giặt là</h5>
                    </div>
                    <p>
                    Giúp bạn duy trì sự tươi mới trong chuyến đi. Với tiêu chuẩn cao, đội ngũ chuyên viên đảm bảo quần áo của bạn sẽ được giặt sạch, hấp hơi và trả lại nhanh chóng.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/dumbbell.png" width="40px">
                        <h5 class="m-0 ms-3">Phòng Gym</h5>
                    </div>
                    <p>
                    Mang đến không gian hiện đại và trang thiết bị đa dạng, giúp bạn duy trì sức khỏe và thể hình tối ưu trong mỗi chuyến đi.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/swimming.png" width="40px">
                        <h5 class="m-0 ms-3">Bể bơi</h5>
                    </div>
                    <p>
                    Mang đến không gian thư giãn, tươi mát và đẳng cấp, giúp bạn thư giãn và tận hưởng những giây phút thư thái.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/tray.png" width="40px">
                        <h5 class="m-0 ms-3">Ăn uống</h5>
                    </div>
                    <p>
                    Cung cấp hương vị đa dạng và chất lượng, từ món ăn tươi ngon đến thực đơn đa dạng, đảm bảo sẽ làm hài lòng vị giác của bạn.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/facial-massage.png" width="40px">
                        <h5 class="m-0 ms-3">Spa</h5>
                    </div>
                    <p>
                    Tận hưởng sự thư giãn hoàn hảo, với các liệu pháp chăm sóc da và massage thảo dược, mang lại cảm giác thư thái và phục hồi sức khỏe.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/bar-counter.png" width="40px">
                        <h5 class="m-0 ms-3">Bar</h5>
                    </div>
                    <p>
                    Điểm đến lý tưởng để thưởng thức đồ uống đa dạng, phục vụ từ những cocktail tinh tế đến rượu vang hảo hạng, mang đến trải nghiệm giải trí độc đáo.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/poker-cards.png" width="40px">
                        <h5 class="m-0 ms-3">Casino</h5>
                    </div>
                    <p>
                    Mang đến không gian đầy sự hồi hộp và giải trí, với các trò chơi đa dạng và chuyên nghiệp, hứa hẹn những trải nghiệm đầy kích thích.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="/assets/images/service/icon/meeting-room.png" width="40px">
                        <h5 class="m-0 ms-3">Phòng Họp</h5>
                    </div>
                    <p>
                    Cung cấp không gian chuyên nghiệp, trang thiết bị hiện đại và dịch vụ hỗ trợ, đáp ứng mọi nhu cầu tổ chức hội thảo, họp và sự kiện của bạn.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/footer.php'); ?>


</body>
</html>