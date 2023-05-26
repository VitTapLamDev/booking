<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - HỖ TRỢ</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('inc/links.php')?>
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
    <?php include 'inc/db_config.php'; ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">LIÊN HỆ VỚI CHÚNG TÔI</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil illum quia eaque sequi? Esse explicabo amet
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59595.347641166954!2d105.77399541953127!3d21.00428974666735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1683270571454!5m2!1svi!2s" height="320"></iframe>
                    <h5>Địa Chỉ</h5>
                    <a href="https://goo.gl/maps/isaXdJ5XGsFVhXri9" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill">Hoàn Kiếm, Hà Nội, Việt Nam</i>
                    </a>
                    <h5>LIÊN HỆ:</h5>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel; +841810293120" class="d-inline-block mb-2 text-decoration-none text-dark">+841810293120</a> 
                    <br>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel; +841810293120" class="d-inline-block mb-2 text-decoration-none text-dark">+841810293120</a> 
                    <h5>Email</h5>
                    <i class="bi bi-envelope-fill"></i>
                    <a href="mailto: help.customer@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">help.customer@gmail.com</a> 
                    <h5>Follow us</h5>
                    <i class="bi bi-twitter me-1"></i>
                    <i class="bi bi-facebook me-1"></i>
                    <i class="bi bi-instagram me-1"></i>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Gửi hỗ trợ cho chúng tôi</h5>
                        <div class="mb-3">
                            <i class="bi bi-person-fill"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Họ và Tên</label>
                            <input name="name" type="text" class="form-control shadow-none" require>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-envelope-at-fill"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" type="email" class="form-control shadow-none" require>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-card-heading"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Tiêu đề</label>
                            <input name="subject" type="text" class="form-control shadow-none" require>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-body-text"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Nội dung</label>
                            <textarea name="message" class="form-control shadow-none" rows="5" style="resize: none" require></textarea>
                        </div>
                        <button name="add_user_queries" type="submit" class="btn-sm text-white custom-bg mt-3">
                            <i class="bi bi-send-fill" style="padding-right: 5px;"></i>GỬI
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php require('inc/footer.php')?> 

</body>
</html>