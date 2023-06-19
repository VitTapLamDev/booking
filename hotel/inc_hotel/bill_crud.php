<?php 
    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');
    
    session_start();  
    $hotel_id = $_SESSION['hotel_account'];
    $sql = "SELECT * FROM `booking` WHERE `hotel_id` LIKE '$hotel_id'";
    $result = mysqli_query($conn, $sql);

    $query_bill = "SELECT
                COUNT(bill_code) AS sl ,
                COUNT(CASE WHEN (Status = 'success' OR Status = 'payed') THEN bill_code END) AS sl_success,
                COUNT(CASE WHEN Status = 'cancel' THEN bill_code END) AS sl_cancel,
                SUM(CASE WHEN (Status = 'success' OR Status = 'payed' OR Status = 'process') THEN Price END) AS total
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
 
            $sql = "SELECT * FROM `booking` WHERE `hotel_id` = '$hotel_id' AND `email_user` = '$email' ";     
            $result = mysqli_query($conn, $sql);
        }
    }
?>