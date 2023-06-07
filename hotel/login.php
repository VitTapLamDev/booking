<?php 
    require('inc_hotel/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="assets_hotel/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?php echo isset($alert) ? $alert : ''; ?>
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">HOTEL BOOKING - Quản lý khách sạn</h5>
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input name="hotel_account" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                            <label for="floatingInput">Tài khoản</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="hotel_pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Mật Khẩu</label>
                        </div>
                        <div class="d-grid">
                            <button name="hotel_login" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">đăng nhập</button>
                        </div>
                        <hr class="my-4">
                        <div class="d-grid mb-2">
                            <button class="btn btn-register text-uppercase fw-bold" style="background-color: #f32714;" type="submit">
                            <i class="fab fa-google me-2"></i>ĐĂNG KÝ TÀI KHOẢN DOANH NGHIỆP
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>