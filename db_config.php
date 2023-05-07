<?php 

    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');

    if(isset($_POST['add_user_queries'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $alert = '<div class="alert alert-success" style"pos" role="alert">Gửi Email thành công!</div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">Hệ thống đang bận. Vui lòng thử lại!</div>';
        }
    }

    function checkEmailExists($email, $conn) {

        $stmt = mysqli_prepare($conn, "SELECT email FROM `user_cred` WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        // Check if email exists
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            return true;
        } else {
            return false;
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
        if($pass != $cpass){
            $alert = '<div class="alert alert-danger" style"pos" role="alert">Mật khẩu không trùng khớp. Vui lòng kiểm tra lại!</div>';
        }elseif(checkEmailExists($email, $conn)){
            $alert = '<div class="alert alert-danger" role="alert">Email đã tồn tại. Vui lòng thử lại!</div>';
        }else{
            $query_run = mysqli_query($con, $query);
            $alert = '<div class="alert alert-danger" role="alert">Tạo tài khoản thành công!</div>';
        }
    }

?>