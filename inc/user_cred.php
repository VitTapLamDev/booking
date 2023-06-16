<?php 
    require ('inc/db_config.php');
    session_start();
    if(!$_SESSION['account']){
        header('Location: index.php');
    }
    $email_log = $_SESSION['account'];
    $query_user = "SELECT * FROM `user_cred` WHERE `email`='$email_log'";     
    $result_user = mysqli_query($conn, $query_user);

    $query_booking = "SELECT * FROM `booking` WHERE `email_user`= '$email_log' AND (`status` = 'process' OR `status` = 'payed')";
    $result_booking = mysqli_query($conn, $query_booking);

    $query_history = "SELECT * FROM `booking` WHERE `email_user`= '$email_log' AND (`status` = 'success' OR `status` = 'cancel')";
    $result_hotel = mysqli_query($conn, $query_history);


    while ($row = mysqli_fetch_assoc($result_user)){
        $dob = $row['dob']; 
        $formattedDate = date('d-m-Y', strtotime($dob));
        $user_name = $row['user_name'];
        $user_email = $row['email'];
        $user_address = $row['address'];
        $user_phonenumber = $row['phonenumber'];
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

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['send_feedbackBtn'])){
            $hotel_id = $_POST['hotel_id'];
            $bill_code = $_POST['bill_code'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $score = $_POST['rating'];

            $feedback = "INSERT INTO `rating_bill`(`hotel_id`, `bill_code`, `sore`, `subject`, `message`) 
                        VALUES ('$hotel_id','$bill_code','$score','$subject','$message')";
            if (!mysqli_query($conn, $feedback)){
                die('Error: ' . mysqli_error($conn));
            }else{
                header('Location: success.php');
                exit();
            }
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['edit_user'])){
            $email = $_SESSION['account'];
            $name = $_POST['name'];
            $phonenumber = $_POST['phonenumber'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];

            $query = "UPDATE `user_cred` 
                        SET `user_name`='$name',
                            `address`='$address',
                            `phonenumber`='$phonenumber',
                            `dob`='$dob' 
                        WHERE `email` = '$email'";     
            if(!mysqli_query($conn, $query)){
                $alert = '<div class="alert alert-danger alert-dismissible sticky-top" style="top:68px;" role="alert">Cập nhật thông tin thất bại. Vui lòng thử lại!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }else{
                $result_user = mysqli_query($conn, $query_user);
                while ($row = mysqli_fetch_assoc($result_user)){
                    $dob = $row['dob']; 
                    $formattedDate = date('d-m-Y', strtotime($dob));
                    $user_name = $row['user_name'];
                    $user_email = $row['email'];
                    $user_address = $row['address'];
                    $user_phonenumber = $row['phonenumber'];
                }
                $alert = '<div class="alert alert-success alert-dismissible sticky-top" style="top:68px;"role="alert">Cập nhật thông tin thành công!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['change_pass'])){
            $email = $_SESSION['account'];
            $old_pass = md5($_POST['old_pass']);
            $new_pass = md5($_POST['new_pass']);
            $cnew_pass = md5($_POST['cnew_pass']);

            $sql = "SELECT `password` FROM `user_cred` WHERE `email` = '$email' AND `password` = '$old_pass'";     
            $result_check = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_check)==0){
                $alert = '<div class="alert alert-danger alert-dismissible sticky-top" style="top:68px;" role="alert">Mật khẩu cũ không đúng. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }elseif($new_pass != $cnew_pass){
                $alert = '<div class="alert alert-danger alert-dismissible sticky-top" style="top:68px;" role="alert">Mật khẩu không trùng khớp. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }else{
                $udt_pass = "UPDATE `user_cred` SET `password`='$new_pass' WHERE `email` = '$email'";
                if(!mysqli_query($conn, $udt_pass)){
                    $alert = '<div class="alert alert-danger alert-dismissible sticky-top" style="top:68px;" role="alert">Đổi mật khâu không thành công. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }else{
                    $alert = '<div class="alert alert-success alert-dismissible sticky-top" style="top:68px;" role="alert">Đổi mật khẩu thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    
                }
            }
        }
    }

?>