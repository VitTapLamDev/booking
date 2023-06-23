<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['hotel_code'])) {
            $_SESSION['hotel_code'] = $_POST['hotel_code'];
            echo 'success';
        } else {
            echo 'error';
        }
        if (isset($_POST['hotel_email_request'])) {
            $_SESSION['hotel_email_request'] = $_POST['hotel_email_request'];
            echo 'success';
        } else {
            echo 'error';
        }
    }
?>