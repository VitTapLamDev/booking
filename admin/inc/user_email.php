<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_email_admin'])) {
        $_SESSION['user_email_admin'] = $_POST['user_email_admin'];
        echo 'success';
    } else {
        echo 'error';
    }
    }
?>