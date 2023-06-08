<?php 
    session_start();
    if (isset($_POST['data'])) {    
        $rowData = json_decode($_POST['data'], true);
        $_SESSION['id_hotel'] = $rowData[0];
        $_SESSION['hotel_booked'] = $rowData[1];
        $_SESSION['price'] = $rowData[2];
        redirect('payment.php');
    }

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Retrieve the data from the AJAX request
      $data1 = $_POST['data1'];
      $data2 = $_POST['data2'];
    
      // Save the data in session variables
      $_SESSION['hotel_id'] = $data1;
      $_SESSION['bill_code'] = $data2;
    
      // Send a success response
      http_response_code(200);
    } else {
      // Send an error response
      http_response_code(400);
    }
    
?>