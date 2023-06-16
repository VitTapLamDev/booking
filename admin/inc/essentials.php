<?php

    function adminLogin(){
        session_start();
        if(!isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true){
           header('Location: index.php');
           exit();
        }
    }

    function redirect($url){
        echo"<script>
            window.location.href='$url';
        </script>";
    }

    function alert($type, $msg){
        $bs_class=($type=='success') ? "alert-success" : "alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

?>