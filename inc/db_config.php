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
        $q = "SELECT * FROM `user_cred` WHERE `email` = '$email'";
        $result_regis = mysqli_query($conn, $q);
        if($pass != $cpass){
            $alert = '<div class="alert alert-danger" style"pos" role="alert">Mật khẩu không trùng khớp. Vui lòng kiểm tra lại!</div>';
        }elseif(mysqli_num_rows($result_regis)==1){
            $alert = '<div class="alert alert-danger" role="alert">Email đã tồn tại. Vui lòng thử lại!</div>';
        }else{
            $query = "INSERT INTO `user_cred`(`user_name`, `email`, `address`, `phonenumber`, `ID`, `dob`, `password`) 
                        VALUES ('$name','$email','$address','$phonenumber','$id','$dob','$hashpass')";
            $query_run = mysqli_query($conn, $query);
            $alert = '<div class="alert alert-success" role="alert">Tạo tài khoản thành công!</div>';
        }
    }

    if(isset($_POST['login_account'])){
        session_start();
        $email_log = $_POST['email_log'];
        $_SESSION['account'] = $email_log;
        $pass_log = md5($_POST['pass_log']);
        $query = "SELECT * FROM `user_cred` WHERE `email`='$email_log' and `password`='$pass_log'";     
        $result_user = mysqli_query($conn, $query);
        if(mysqli_num_rows($result_user)==1){
            header('Location: index.php');
            echo $result_user;
            $alert = '<div class="alert alert-success" role="alert">Đăng nhập thành công!</div>';
        }else{
            $alert = '<div class="alert alert-danger" role="alert">Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!</div>';
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $sql = "SELECT * FROM `hotel_room` WHERE `room_code` LIKE 'null'";
        $result = mysqli_query($conn, $sql);
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['search_hotels'])){
            $location = $_POST['location_inp'];
            $room_code = $_POST['room_code'];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out']; 
            $number = $_POST['number'];

            $_SESSION['location'] = $location;
            $_SESSION['checkin'] = $check_in;
            $_SESSION['checkout'] = $check_out;
            $_SESSION['numofroom'] = $number;
            $_SESSION['roomtype'] = $room_code;

            $sql1 = "SELECT `number` FROM `hotel_room` WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code'";
            $result1 = mysqli_query($conn, $sql1);
            if ($result) {
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    $total_room = $row1["number"];
                }else{
                    $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
                    $total_room = 0;
                }
            }
            $sql2 = "SELECT SUM(number) FROM `booking` 
                        WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code' 
                            AND `check_in` BETWEEN '$check_in' AND '$check_out' OR `check_out` BETWEEN '$check_in' AND '$check_out'
                            AND `status` = 0
                        GROUP BY `hotel_id`, `room_code`";
            $result2 = $conn->query($sql2);
            if ($result2) {
                $row2 = $result2->fetch_assoc();
                if ($row2 !== null) {
                    $booked_room = $row2["SUM(number)"];
                } else {
                    $booked_room = 0;
                }
            }

            if ($number + $booked_room >= $total_room){
                $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
            } else {
                $query = "SELECT * FROM `hotel_room` WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code'";     
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)==0){
                    $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
                }else{
                    $alert= '<div class="alert alert-light mx-auto" role="alert">   Điểm đến: '.$_SESSION['location'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Ngày nhận phòng: '.$_SESSION['checkin'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Ngày trả phòng: '.$_SESSION['checkout'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Loại phòng: '.$_SESSION['roomtype'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Số lượng phòng: '.$_SESSION['numofroom'].
                            '</div>';
                }
            }
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['user_details'])){
            $email = $_SESSION['account'];
            $query = "SELECT * FROM `user_cred` WHERE `email`='$email'";     
            $result = mysqli_query($conn, $query);
        }
    }


?>