<?php 
    require('inc/db_config.php');
    require('inc/essentials.php');

    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true){
        redirect('dashboard.php');
    }
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ADMIN LOGIN PANEL</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('/Code/GitHub/booking/admin/inc/links.php'); ?>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-none">
        <form method="POST">
            <div class="p-4">
                <h4 class="bg-dark text-center text-white py-3">ADMIN LOGIN</h4>
                <div>
                    <div class="mb-3">
                        <input name="admin_account" required type="text" class="form-control shadow-none" placeholder="Admin Account">
                    </div>
                    <div class="mb-4">
                        <input name="admin_pass" required type="password" class="form-control shadow-none" placeholder="Password">
                    </div>
                    <button name="login" type="submit" class="btn-sm text-white custom-bg shadow-none">LOGIN</button>
                </div>
            </div>
        </form>
    </div>

     <?php 
        if(isset($_POST['login'])){
            $frm_data = filteration($_POST);
            
            $query = "SELECT * FROM `admin_cred` WHERE `admin_account`=? AND `admin_pass` = ?";
            $value = [$frm_data['admin_account'], $frm_data['admin_pass']];
            $datatypes = "ss";
            
            $res = select($query, $value, $datatypes);
            if($res->num_rows==1){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminID'] = $row['sr_no'];
                redirect('dashboard.php');
            }else{
                alert('error', 'Login failed - Invalid Credentials');
            }
        }
     ?> 

    <?php require('inc/scripts.php');  ?> 
</body>
</html>