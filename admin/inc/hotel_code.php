<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hotel_code'])) {
        $_SESSION['hotel_code'] = $_POST['hotel_code'];
        echo 'success';
    } else {
        echo 'error';
    }
    }
?>