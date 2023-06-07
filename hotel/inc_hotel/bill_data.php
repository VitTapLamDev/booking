<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bill_code'])) {
        $_SESSION['bill_code'] = $_POST['bill_code'];
        echo 'success';
    } else {
        echo 'error';
    }
    }
?>