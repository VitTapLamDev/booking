<?php 

    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');
    if(isset($_POST['add_user_queries'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            $alert = '<div class="alert alert-success" style"pos" role="alert">Gửi Email thành công!</div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">Hệ thống đang bận. Vui lòng thử lại!</div>';
        }
    }

    if(isset($_POST['create_user'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $id = $_POST['ID'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $hashpass = md5($pass);

        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenumber`, `ID`, `dob`, `password`) VALUES ('$name','$email','$address','$phonenumber','$id','$dob','$hashpass')";
        $q = "SELECT * FROM `user_cred` WHERE `email`='$email'";
        $result_regis = mysqli_query($conn, $q);
        if($pass != $cpass){
            $alert = '<div class="alert alert-danger" style"pos" role="alert">Mật khẩu không trùng khớp. Vui lòng kiểm tra lại!</div>';
        }elseif(mysqli_num_rows($result_regis)==1){
            $alert = '<div class="alert alert-danger" role="alert">Email đã tồn tại. Vui lòng thử lại!</div>';
        }else{
            $query_run = mysqli_query($conn, $query);
            $alert = '<div class="alert alert-success" role="alert">Tạo tài khoản thành công!</div>';
        }
    }

    if(isset($_POST['login_account'])){
        $email_log = $_POST['email_log'];
        $pass_log = md5($_POST['pass_log']);
        $query = "SELECT * FROM `user_cred` WHERE `email`='$email_log' and `password`='$pass_log'";     
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $alert = '<div class="alert alert-success" role="alert">Đăng nhập thành công!</div>';
            // header('Location: ');
        }else{
            $alert = '<div class="alert alert-danger" role="alert">Đăng nhập không thành công!</div>';
        }
    }


    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $sql = "SELECT * FROM `hotel_cred` WHERE 1";
        $result = mysqli_query($conn, $sql);
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['search_rooms'])){
            $location = $_POST['location_inp'];

            $query = "SELECT * FROM `hotel_cred` WHERE `location` LIKE '$location'";     
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)==0){
                $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
                // header('Location: ');
            }

        }
    }
    
?>