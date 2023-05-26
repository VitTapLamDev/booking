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
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil illum quia eaque sequi? Esse explicabo amet
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur quasi at provident dolore ab aspernatur reiciendis
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/footer.php'); ?>


</body>
</html>