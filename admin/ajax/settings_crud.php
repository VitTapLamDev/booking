<?php
    require('/Code/GitHub/booking/admin/inc/db_config.php');
    require('/Code/GitHub/booking/admin/inc/essentials.php');
    
    adminLogin();

    if(isset($_POST['get_general'])){
        $q = "SELECT * FROM `settings` WHERE `sr_no`= ?";
        $value = [1];
        $res = select($q, $value, "i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data;
    }
?>