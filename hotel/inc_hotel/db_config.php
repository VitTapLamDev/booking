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
        if(isset($_POST['details_btn'])){
            $hotel_id = $_POST['id_hotel'];
            $hotel_name = $_POST['hotel_name_inp'];
            $hotel_intro = $_POST['hotel_intro_inp'];
            $hotel_about = $_POST['hotel_about_inp'];

            $query = "UPDATE `hotel_cred` SET `hotel_name`='$hotel_name',`hotel_intro`='$hotel_intro',`hotel_about`='$hotel_about' WHERE `id_hotel` = '$hotel_id'";     
            $result = mysqli_query($conn, $query);
            if($result){
                $alert = '<div class="alert alert-success" role="alert">Cập nhật thông tin mô tả thành công!</div>';
                session_start();
                $_SESSION['alert_message'] = $alert;
                header('Location: details.php');
                
            }else{
                $_SESSION['alert_message'] = 'Cập nhật thông tin mô tả thất bại!';
            }
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['contact_setBtn'])){
            $hotel_id = $_POST['id_hotel'];
            $hotel_address = $_POST['address'];
            $hotel_phone_number = $_POST['phone_number'];
            $hotel_email = $_POST['email'];
            $hotel_fb = $_POST['fb'];
            $hotel_ins = $_POST['ins'];
            $hotel_tw = $_POST['tw'];
            $hotel_gmap = $_POST['gmap'];
 
            $query = "UPDATE `hotel_cred` SET   `details`='$hotel_address',
                                                `hotline`='$hotel_phone_number',
                                                `hotel_email`='$hotel_email', 
                                                `fb_link` = '$hotel_fb',
                                                `insta_link` = '$hotel_ins',
                                                `twitter_link` = '$hotel_tw',
                                                `gmap` = '$hotel_gmap'
                                                WHERE `id_hotel` = '$hotel_id'";     
            $result = mysqli_query($conn, $query);
            header('Location: details.php');
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['room_Editbtn'])){
            session_start();
            $hotel_id = $_SESSION['hotel_account'];
            $room_code = $_POST['room_code'];
            $room_conven = $_POST['room_conve'];
            $room_number = $_POST['room_number'];
            $room_price = $_POST['room_price'];
 
            $query = "UPDATE `rooms` SET `number`='$room_number',`convenient`='$room_conven',`price`='$room_price'
                                        WHERE `hotel_id` = '$hotel_id' AND `room_code` = '$room_code' ";     
            mysqli_query($conn, $query);
            header('Location: rooms.php');
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['room_Addbtn'])){
            $hotel_id = $_POST['hotel_id'];
            $room_code = $_POST['room_code'];
            $room_conven = $_POST['room_conve'];
            $room_number = $_POST['room_number'];
            $room_price = $_POST['room_price'];
            $room_img = $_POST['room_img'];
 
            $insert_room = "INSERT INTO `rooms`( `hotel_id`, `room_code`, `number`, `convenient`, `price`, `img_room`) 
                        VALUES ('$hotel_id','$room_code','$room_number','$room_conven','$room_price','$room_img') ";     
            mysqli_query($conn, $insert_room);
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['search_bill'])){
            $hotel_id = $_POST['hotel_id'];
            $email = $_POST['email_bill'];
 
            $sql = "SELECT * FROM `booking` WHERE `hotel_id` = '$hotel_id' AND `email` = '$email' ";     
            $result = mysqli_query($conn, $sql);
        }
    }

?>