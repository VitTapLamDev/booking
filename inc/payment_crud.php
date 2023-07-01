
<?php
    require('inc/db_config.php');
    session_start();
    $email_log = $_SESSION['account'];
    
    $query_user = "SELECT * FROM `user_cred` WHERE `email`='$email_log'";     
    $result_user = mysqli_query($conn, $query_user);

    $id_hotel = $_SESSION['id_hotel'];
    $room_code = $_SESSION['roomtype'];
    $query_hotel = "SELECT * FROM `hotel_cred` WHERE `id_hotel`='$id_hotel'";     
    $result_hotel = mysqli_query($conn, $query_hotel);

    while($row = mysqli_fetch_assoc($result_hotel)){
        $hotel_name = $row['hotel_name'];
        $hotline = $row['hotline'];
        $hotel_email = $row['hotel_email'];
        $address = $row['details'];
        $intro = $row['hotel_intro'];
        $about = $row['hotel_about'];
        $hotel_img = $row['img_hotel'];
        $fb_link = $row['fb_link'];
        $insta_link = $row['insta_link'];
        $tw_link = $row['twitter_link'];
    }

    
    $sql_rating = "SELECT * FROM `user_rating` WHERE `hotel_id` LIKE '$id_hotel'";
    $ratings = mysqli_query($conn, $sql_rating);
    
    $sql_room = "SELECT * FROM `rooms` WHERE `hotel_id` LIKE '$id_hotel' AND `room_code` LIKE '$room_code'";
    $result_room = mysqli_query($conn, $sql_room);

    $query_rating = "SELECT COUNT(bill_code) AS 'number', AVG(sore) AS 'avgscore' FROM `rating_bill` WHERE `hotel_id` = '$id_hotel'";
    $result_rating =  mysqli_query($conn, $query_rating);
    while($row = mysqli_fetch_assoc($result_rating)){
        $num_of_order = $row['number'];
        $avg_score = $row['avgscore'];
    }

    $query_bill = "SELECT
                COUNT(bill_code) AS sl
            FROM
                booking_bill
            WHERE booking_bill.hotel_id = '$id_hotel'";
    $result_bill = mysqli_query($conn, $query_bill);

    $checkin = $_SESSION['checkin'];
    $checkout = $_SESSION['checkout'];
    $price = $_SESSION['price'];
    $numofroom = $_SESSION['numofroom'];

    $startDate = new DateTime($checkin);
    $endDate = new DateTime($checkout);
    $interval = $startDate->diff($endDate);
    $days = $interval->d;

    $total = $days * $price * $numofroom;
    $_SESSION['total'] = $total;

    function generateBillCode($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }

        return $code;
    }

    $billcode = generateBillCode();
    $_SESSION['bill_id'] = $billcode;

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['payed'])){
            session_start();
            $hotel_id = $_SESSION['id_hotel'];
            $bill_code = $_SESSION['bill_id'];
            $check_in = $_SESSION['checkin'];
            $check_out = $_SESSION['checkout'];
            $number = $_SESSION['numofroom'];
            $total = $_SESSION['total'];
            $room_code = $_SESSION['roomtype'];
            $user_email = $_SESSION['account'];


            $booking = "INSERT INTO `booking_bill`(`bill_code`, `hotel_id`, `room_code`, `email_user`, `number`, `check_in`, `check_out`, `price`) 
                        VALUES ('$bill_code','$hotel_id','$room_code','$user_email','$number','$check_in','$check_out','$total')";
            if (!mysqli_query($conn, $booking)){
                die('Error: ' . mysqli_error($conn));
            }else{
                header('Location: vnpay_php/vnpay_pay.php');
                exit();
            }
        }
    }
?>