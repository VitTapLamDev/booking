<?php 
    session_start();
    if (isset($_POST['data'])) {
            
        // if (isset($_SESSION['hotel_booked']) && $_SESSION['hotel_booked'] !== null){
        //     unset($_SESSION['hotel_booked']);
        //     unset($_SESSION['price']);
        // }
        $rowData = json_decode($_POST['data'], true);
        $_SESSION['id_hotel'] = $rowData[0];
        $_SESSION['hotel_booked'] = $rowData[1];
        $_SESSION['price'] = $rowData[2];
        redirect('payment.php');
    }

?>