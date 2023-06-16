<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if(!isset($_SESSION['adminLogin'])){
        header('Location: index.php');
     }

    $user_email = $_SESSION['user_email_admin'];
    $sql = "SELECT * FROM `user_cred` WHERE `email` = '$user_email'";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)){
       $user_name = $row['user_name'];
       $user_pn = $row['phonenumber'];
       $user_dob = $row['dob'];
       $user_add = $row['address'];
       $note = $row['note'];
    }
    

    $query_booked = "SELECT DISTINCT * FROM `booking` WHERE `email_user` = '$user_email'";
    $result_booked = mysqli_query($con, $query_booked);

    if(isset($_POST['delete_user'])){
        $sql = "DELETE FROM `user_cred` WHERE `email` = '$user_email'";
        if(mysqli_query($con, $sql)){
            alert('success', 'Successfully deleted user!');
        }else{
            alert('danger', 'Delete user failed!');
        }
    }

    if(isset($_POST['save_user'])){
        $name = $_POST['user_name'];
        $phonenumber = $_POST['user_pn'];
        $dob = $_POST['user_dob'];
        $address = $_POST['user_address'];

        $query = "UPDATE `user_cred` 
        SET `user_name`='$name',
            `address`='$address',
            `phonenumber`='$phonenumber',
            `dob`='$dob' 
        WHERE `email` = '$user_email'";     
        if(!mysqli_query($con, $query)){
            $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Cập nhật thông tin thất bại. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else{
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
               $user_name = $row['user_name'];
               $user_pn = $row['phonenumber'];
               $user_dob = $row['dob'];
               $user_add = $row['address'];
               $note = $row['note'];
            }
            $alert = '<div class="alert alert-success alert-dismissible" role="alert">Cập nhật thông tin thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }

    $query_bill = "SELECT
                COUNT(bill_code) AS sl ,
                COUNT(CASE WHEN (Status = 'success' OR Status = 'payed') THEN bill_code END) AS sl_success,
                COUNT(CASE WHEN Status = 'cancel' THEN bill_code END) AS sl_cancel,
                SUM(CASE WHEN (Status = 'success' OR Status = 'payed' OR Status = 'process') THEN Price END) AS total
            FROM
                booking_bill
            WHERE booking_bill.email_user = '$user_email'";
                $result_bill = mysqli_query($con, $query_bill);
?>