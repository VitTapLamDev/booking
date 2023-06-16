<?php 
    require('/xampp/htdocs/booking/admin/inc/essentials.php');
    require('/xampp/htdocs/booking/admin/inc/db_config.php');

    if(!isset($_SESSION['adminLogin'])){
        header('Location: index.php');
     }
    if(!$con){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        session_start();
        $sql = "SELECT * FROM `hotel_cred`";
        $result = mysqli_query($con, $sql);
    }

    
    if(isset($_POST['add_newhotel'])){
        $hotel_id = $_POST['hotel_id'];
        $hotel_email = $_POST['hotel_email'];
        $hotel_name = $_POST['hotel_name'];
        $hotel_location = $_POST['hotel_location'];
        $hotel_hotline = $_POST['hotel_hotline'];
        $hotel_add = $_POST['hotel_address'];
        $hotel_pw = md5($_POST['hotel_pw']);
        $hotel_pwc = md5($_POST['hotel_pwc']);

        $q = "SELECT * FROM `hotel_cred` WHERE `id_hotel` = '$hotel_id'";
        $result_regis = mysqli_query($con, $q);
        if($hotel_pw != $hotel_pwc){
            alert('danger', 'Passwords do NOT match. Please Try Again!');
        }elseif(mysqli_num_rows($result_regis)==1){
            alert('danger', 'Hotel exists. Please try again !');
        }else{
            $query = "INSERT INTO `hotel_cred`(`id_hotel`,`hotel_name`, `hotel_email`, `location`, `details`, `hotline`, `hpass`) 
                        VALUES ('$hotel_id','$hotel_name','$hotel_email','$hotel_location','$hotel_add','$hotel_hotline','$hotel_pw')";
            $query_run = mysqli_query($con, $query);
            alert('success', 'New hotel has been created!');
        }
    }
?>