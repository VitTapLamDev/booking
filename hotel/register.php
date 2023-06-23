<?php require('inc_hotel/db_config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ TÀI KHOẢN DOANH NGHIỆP</title>
    <link rel="stylesheet" href="assets_hotel/register.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<!------ Include the above in your HEAD tag ---------->
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Chào mừng!</h3>
                <p>Hotel Booking</p>
                <input type="submit" name="" value="Login" onclick="window.location.href='login.php'"/> 
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Đăng ký tài khoản khách sạn</h3>
                        <form action="" method="post">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hotel_name" placeholder=" Name *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hotel_add" placeholder="Address *" value="" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="hotel_email" placeholder="Email *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="20" name="hotel_hotline" class="form-control" placeholder="Hotline *" value="" required />
                                    </div>
                                    <input type="submit" name="register_hotel" class="btnRegister" value="Register"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>