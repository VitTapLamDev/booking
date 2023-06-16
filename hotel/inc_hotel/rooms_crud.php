<?php 
    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');

    session_start();

    $hotel_id = $_SESSION['hotel_account'];
    $sql = "SELECT DISTINCT * FROM `rooms` WHERE `hotel_id` LIKE '$hotel_id'";
    $result = mysqli_query($conn, $sql);
    $room = mysqli_num_rows($result);
    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['room_Editbtn'])){
            $hotel_id = $_SESSION['hotel_account'];
            $room_code = $_POST['room_code'];
            $room_conven = $_POST['room_conve'];
            $room_number = $_POST['room_number'];
            $room_price = $_POST['room_price'];
 
            $upd_room = "UPDATE `rooms` SET `number`='$room_number',`convenient`='$room_conven',`price`='$room_price'
                                        WHERE `hotel_id` = '$hotel_id' AND `room_code` = '$room_code' ";    
            if(!mysqli_query($conn, $upd_room)){
                $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Cập nhật thông tin thất bại. Vui lòng thử lại!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }else{
                $result = mysqli_query($conn, $sql);
                $alert = '<div class="alert alert-success alert-dismissible" role="alert">Cập nhật thông tin thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
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
            if(!mysqli_query($conn, $insert_room)){
                $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Cập nhật thông tin thất bại, Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }else{
                $result = mysqli_query($conn, $sql);
                $alert = '<div class="alert alert-succes alert-dismissible" role="alert">Cập nhật thông tin thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
    }
?>