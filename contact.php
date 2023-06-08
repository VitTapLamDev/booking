<?php 
    require('inc/db_config.php');
    $sql_detail = "SELECT * FROM `contact_details` WHERE '1'";
    $result_detail = mysqli_query($conn, $sql_detail);
?>


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
        <?php  while($row = mysqli_fetch_assoc($result_detail)): ?>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" src="<?php echo $row['iframe'] ?>" height="320"></iframe>
                    <h5>Địa Chỉ</h5>
                    <a href="<?php echo $row['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"><?php echo $row['address'] ?></i>
                    </a>
                    <h5>LIÊN HỆ:</h5>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel; <?php echo '+'.$row['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><?php echo '+'.$row['pn1'] ?></a> 
                    <br>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel; <?php echo '+'.$row['pn2'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><?php echo '+'.$row['pn2'] ?></a> 
                    <h5>Email</h5>
                    <i class="bi bi-envelope-fill"></i>
                    <a href="mailto: <?php echo $row['email'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><?php echo $row['email'] ?></a> 
                    <h5>Follow us</h5>
                    <a href="<?php echo $row['tw'] ?>" style="color: black;"><i class="bi bi-twitter me-1"></i></a> 
                    <a href="<?php echo $row['fb'] ?>" style="color: black;"><i class="bi bi-facebook me-1"></i></a> 
                    <a href="<?php echo $row['insta'] ?>" style="color: black;"><i class="bi bi-instagram me-1"></i></a> 
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Gửi hỗ trợ cho chúng tôi</h5>
                        <div class="mb-3">
                            <i class="bi bi-person-fill"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Họ và Tên</label>
                            <input name="name" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-envelope-at-fill"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" type="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-card-heading"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Tiêu đề</label>
                            <input name="subject" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-body-text"></i>
                            <label for="" class="form-label" style="font-weight: 500;">Nội dung</label>
                            <textarea name="message" class="form-control shadow-none" rows="5" style="resize: none" required></textarea>
                        </div>
                        <button name="add_user_queries" type="submit" class="btn-sm text-white custom-bg mt-3">
                            <i class="bi bi-send-fill" style="padding-right: 5px;"></i>GỬI
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    
    <?php require('inc/footer.php')?> 
</body>
</html>