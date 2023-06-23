<?php 
    
    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['hotel_login'])){
            $hotel_account = $_POST['hotel_account'];
            $hotel_pass = md5($_POST['hotel_pass']);
            $query = "SELECT * FROM `hotel_cred` WHERE `id_hotel`='$hotel_account' and `hpass`='$hotel_pass'";     
            $result_user = mysqli_query($conn, $query);
            if(mysqli_num_rows($result_user)==1){
                session_start();
                $_SESSION['hotel_account'] = $hotel_account;
                header('Location: management.php');
                $alert = '<div class="alert alert-success" role="alert">Đăng nhập thành công!</div>';
            }else{
                $alert = '<div class="alert alert-danger" role="alert">Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!</div>';
            }
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['register_hotel'])){
            $hotel_name = $_POST['hotel_name'];
            $hotel_email = $_POST['hotel_email'];
            $hotel_address = $_POST['hotel_add'];
            $hotel_hotline = $_POST['hotel_hotline'];
            $request_hotel = "INSERT INTO `hotel_queries`(`hotel_name`, `hotel_email`, `hotel_hotline`, `hotel_address`) 
                                VALUES ('$hotel_name','$hotel_email','$hotel_hotline','$hotel_address')";
            if(mysqli_query($conn, $request_hotel)){
                header('Location: success.php');
            }else{
                $alert = '<div class="alert alert-danger" role="alert">Hệ thống đang bận. Vui lòng thử lại sau ít phút!</div>';
            }
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['checkoutBtn'])){
            session_start();
            $bill_code = $_SESSION['bill_code'];
            $sql = "UPDATE `booking_bill` SET `status` = 'success' WHERE `bill_code` = '$bill_code'";     
            mysqli_query($conn, $sql);
            header('Location: bill_details.php');
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['cancelBtn'])){
            session_start();
            $bill_code = $_SESSION['bill_code'];
            $sql = "UPDATE `booking_bill` SET `status` = 'cancel' WHERE `bill_code` = '$bill_code'";     
            mysqli_query($conn, $sql);
            header('Location: bill_details.php');
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['payedBtn'])){
            session_start();
            $bill_code = $_SESSION['bill_code'];
            $sql = "UPDATE `booking_bill` SET `status` = 'payed' WHERE `bill_code` = '$bill_code'";     
            mysqli_query($conn, $sql);
            header('Location: bill_details.php');
        }
    }

    
?>