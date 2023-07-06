<?php 
    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');
    
    session_start();  
    $hotel_id = $_SESSION['hotel_account'];
    $sql = "SELECT * FROM `booking` WHERE `hotel_id` LIKE '$hotel_id'";
    $result = mysqli_query($conn, $sql);

    $query_bill = "SELECT
                COUNT(bill_code) AS sl ,
                COUNT(CASE WHEN (Status = 'success' OR Status = 'payed' OR Status = 'rated') THEN bill_code END) AS sl_success,
                COUNT(CASE WHEN Status = 'cancel' THEN bill_code END) AS sl_cancel,
                SUM(CASE WHEN (Status = 'success' OR Status = 'payed' OR Status = 'process' OR Status = 'rated') THEN Price END) AS total
            FROM
                booking_bill
            WHERE booking_bill.hotel_id = '$hotel_id'";
    $result_bill = mysqli_query($conn, $query_bill);
    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['search_bill'])){
            $hotel_id = $_POST['hotel_id'];
            $email = $_POST['email_bill'];
            $day_start = $_POST['day_start'];
            $day_end = $_POST['day_end'];

            if(!$day_start || !$day_end || $email){
                $sql = "SELECT * FROM `booking` WHERE `hotel_id` = '$hotel_id' AND `email_user` = '$email' ";     
                $result = mysqli_query($conn, $sql);
                unset($_SESSION['$email']);
                unset($_SESSION['day_start']);
                unset($_SESSION['$day_end']);
            }elseif($day_end && $day_start && $email){
                $sql = "SELECT * FROM `booking` WHERE `hotel_id` = '$hotel_id' AND `email_user` = '$email' AND `time_booked` BETWEEN '$day_start' AND '$day_end' ";     
                $result = mysqli_query($conn, $sql);
                unset($_SESSION['$email']);
                unset($_SESSION['day_start']);
                unset($_SESSION['$day_end']);
            }elseif($day_end && $day_start && !$email){
                $sql = "SELECT * FROM `booking` WHERE `hotel_id` = '$hotel_id' AND `time_booked` BETWEEN '$day_start' AND '$day_end'";     
                $result = mysqli_query($conn, $sql);
                unset($_SESSION['$email']);
                unset($_SESSION['day_start']);
                unset($_SESSION['$day_end']);
            }elseif(!$day_start && !$day_end && !$email){
                $sql = "SELECT * FROM `booking` WHERE `hotel_id` = '$hotel_id'";     
                $result = mysqli_query($conn, $sql);
            }
 
            
        }
    }
?>