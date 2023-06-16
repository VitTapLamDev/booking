<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if(!isset($_SESSION['adminLogin'])){
        header('Location: index.php');
     }

    $sql = "SELECT * FROM `user_cred`";
    $result = mysqli_query($con, $sql);

    if(isset($_POST['add_newuser'])){
        $user_email = $_POST['user_email'];
        $user_name = $_POST['user_name'];
        $user_pn = $_POST['user_pn'];
        $user_dob = $_POST['user_dob'];
        $user_add = $_POST['user_address'];
        $user_pw = md5($_POST['user_pw']);
        $user_pwc = md5($_POST['user_pwc']);

        $q = "SELECT * FROM `user_cred` WHERE `email` = '$user_email'";
        $result_regis = mysqli_query($con, $q);
        if($user_pw != $user_pwc){
            alert('danger', 'Passwords do NOT match. Please Try Again!');
        }elseif(mysqli_num_rows($result_regis)==1){
            alert('danger', 'Email exists. Please try again !');
        }else{
            $query = "INSERT INTO `user_cred`(`user_name`, `email`, `address`, `phonenumber`, `dob`, `password`) 
                        VALUES ('$user_name','$user_email','$user_add','$user_pn','$user_dob','$user_pw')";
            $query_run = mysqli_query($con, $query);
            alert('success', 'New user has been created!');
            $result = mysqli_query($con, $sql);
        }
    }
?>