<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    $hotel_code = $_SESSION['hotel_code'];
    $sql = "SELECT * FROM `hotel_cred` WHERE `id_hotel` = '$hotel_code'";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $hotel_id = $row['id_hotel'];
        $hotel_name = $row['hotel_name'];
        $hotline = $row['hotline'];
        $hotel_email = $row['hotel_email'];
        $location = $row['location'];
        $address = $row['details'];
        $gmap = $row['gmap'];
        $fb_link = $row['fb_link'];
        $ins_link = $row['insta_link'];
        $tw_link = $row['twitter_link'];
        $note = $row['note'];
    }
    
    $query_rooms = "SELECT DISTINCT * FROM `rooms` WHERE `hotel_id` = '$hotel_code'";
    $result_room = mysqli_query($con, $query_rooms);

    $query_rating = "SELECT DISTINCT * FROM `user_rating` WHERE `hotel_id` = '$hotel_code'";
    $result_rating = mysqli_query($con, $query_rating);

    if(isset($_POST['save_btn'])){
        $hotel_id = $_POST['hotel_code'];
        $hotel_name = $_POST['hotel_name'];
        $hotline = $_POST['hotel_hotline'];
        $hotel_email = $_POST['hotel_email'];;
        $address = $_POST['address'];
        $gmap = $_POST['gmap'];
        $fb_link = $_POST['fb_link'];
        $ins_link = $_POST['insta_link'];
        $tw_link = $_POST['tw_link'];
        $note = $_POST['note'];
        $sql = "UPDATE `hotel_cred` SET `hotel_name`='$hotel_name',
                                        `hotline`='$hotline',
                                        `hotel_email`='$hotel_email',
                                        `details`='$address',
                                        `gmap`='$gmap',
                                        `fb_link`='$fb_link',
                                        `insta_link`='$ins_link',
                                        `twitter_link`='$tw_link',
                                        `note` = '$note'
                WHERE `id_hotel` = '$hotel_code'";
        if(mysqli_query($con, $sql)){
            $alert =    '<div class="alert alert-success alert-dismissible" role="alert">Cập nhật thông tin thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }else{
            $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Cập nhật thông tin thất bại, Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
    }
?>