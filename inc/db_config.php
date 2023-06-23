<?php 
    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');

    
    if(isset($_POST['add_user_queries'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $query = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
        if(mysqli_query($conn, $query)){
            header('Location: success.php');
            exit();
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
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $hashpass = md5($pass);
        $q = "SELECT * FROM `user_cred` WHERE `email` = '$email'";
        $result_regis = mysqli_query($conn, $q);
        if($pass != $cpass){
            $alert = '<div class="alert alert-danger" style"pos" role="alert">Mật khẩu không trùng khớp. Vui lòng kiểm tra lại!</div>';
        }elseif(mysqli_num_rows($result_regis)==1){
            $alert = '<div class="alert alert-danger" role="alert">Email đã tồn tại. Vui lòng thử lại!</div>';
        }else{
            $query = "INSERT INTO `user_cred`(`user_name`, `email`, `address`, `phonenumber`, `dob`, `password`) 
                        VALUES ('$name','$email','$address','$phonenumber','$dob','$hashpass')";
            mysqli_query($conn, $query);
            $alert = '<div class="alert alert-success" role="alert">Tạo tài khoản thành công!</div>';
        }
    }

    if(isset($_POST['login_account'])){
        $email_log = $_POST['email_log'];
        $pass_log = md5($_POST['pass_log']);
        $query = "SELECT * FROM `user_cred` WHERE `email`='$email_log' and `password`='$pass_log'";     
        $result_user = mysqli_query($conn, $query);
        if(mysqli_num_rows($result_user)==1){
            $_SESSION['account'] = $email_log;
            if($_SESSION['total']){
                header('Location: payment.php');
            }elseif($_SESSION['location']){
                header('Location: booking.php');
            }else{
                header('Location: index.php');
            }
            $alert = '<div class="alert alert-success" role="alert">Đăng nhập thành công!</div>';
        }else{
            $alert = '<div class="alert alert-danger" role="alert">Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!</div>';
            $_SESSION['account'] = null;
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['index_submitBtn'])){
            if(!$_SESSION['account']){
                $_SESSION['account'] = null;
            }
            $location = $_POST['index_location'];
            $room_code = $_POST['index_roomcode'];
            $check_in = $_POST['index_checkin'];
            $check_out = $_POST['index_checkout']; 
            $number = $_POST['index_number'];

            $_SESSION['location'] = $location;
            $_SESSION['roomtype'] = $room_code;
            $_SESSION['checkin'] = $check_in;
            $_SESSION['checkout'] = $check_out; 
            $_SESSION['numofroom'] = $number;
            header("Location: booking.php");
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['send_feedbackBtn'])){
            $billcode = $_POST['bill_code'];
            $hotel_id = $_POST['hotel_id'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $score = $_POST['rating'];
            
            $feedback = "INSERT INTO `rating_bill`( `hotel_id`, `bill_code`, `sore`, `subject`, `message`) 
                        VALUES ('$hotel_id','$billcode','$score','$subject','$message')";
            if(mysqli_query($conn, $feedback)){
                header("Location: success.php");
            exit();
            }
        }
    }
    

?>