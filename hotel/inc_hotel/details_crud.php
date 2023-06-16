<?php 

    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');

    session_start();
    $hotel_id = $_SESSION['hotel_account'];
    $get_detail = "SELECT * FROM `hotel_cred` WHERE `id_hotel` LIKE '$hotel_id'";
    $result = mysqli_query($conn, $get_detail);

    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['details_btn'])){
            $hotel_id = $_POST['id_hotel'];
            $hotel_name = $_POST['hotel_name_inp'];
            $hotel_intro = $_POST['hotel_intro_inp'];
            $hotel_about = $_POST['hotel_about_inp'];

            $query = "UPDATE `hotel_cred` SET `hotel_name`='$hotel_name',`hotel_intro`='$hotel_intro',`hotel_about`='$hotel_about' WHERE `id_hotel` = '$hotel_id'";     
            if(mysqli_query($conn, $query)){
                $result = mysqli_query($conn, $get_detail);
                $alert = '<div class="alert alert-success alert-dismissible" role="alert">Cập nhật thông tin thành công!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="details.php"></button>
                        </div>';
            }else{
                $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Cập nhật thông tin thất bại. Vui lòng thử lại!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="details.php"></button>
                </div>';
            }
        }
    }
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['contact_setBtn'])){
            $hotel_id = $_POST['id_hotel'];
            $hotel_address = $_POST['address'];
            $hotel_phone_number = $_POST['phone_number'];
            $hotel_email = $_POST['email'];
            $hotel_fb = $_POST['fb'];
            $hotel_ins = $_POST['ins'];
            $hotel_tw = $_POST['tw'];
            $hotel_gmap = $_POST['gmap'];
 
            $query = "UPDATE `hotel_cred` SET   `details`='$hotel_address',
                                                `hotline`='$hotel_phone_number',
                                                `hotel_email`='$hotel_email', 
                                                `fb_link` = '$hotel_fb',
                                                `insta_link` = '$hotel_ins',
                                                `twitter_link` = '$hotel_tw',
                                                `gmap` = '$hotel_gmap'
                                                WHERE `id_hotel` = '$hotel_id'";     
            if(!mysqli_query($conn, $query)){
                $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Cập nhật thông tin thất bại. Vui lòng thử lại!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }else{
                $result = mysqli_query($conn, $get_detail);
                $alert = '<div class="alert alert-success alert-dismissible" role="alert">Cập nhật thông tin thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
            
        }
    }

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['changePass'])){
            $id_hotel = $_POST['hotel_id'];
            $old_pass = md5($_POST['old_pass']);
            $new_pass = md5($_POST['new_pass']);
            $cnew_pass = md5($_POST['cnew_pass']);

            $sql = "SELECT `hpass` FROM `hotel_cred` WHERE `id_hotel` = '$id_hotel' AND `hpass` = '$old_pass'";     
            $result_check = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_check)==0){
                $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Mật khẩu cũ không đúng. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }elseif($new_pass != $cnew_pass){
                $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Mật khẩu không trùng khớp. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }else{
                $udt_pass = "UPDATE `hotel_cred` SET `hpass`='$new_pass' WHERE `id_hotel` = '$id_hotel'";
                if(!mysqli_query($conn, $udt_pass)){
                    $alert = '<div class="alert alert-danger alert-dismissible" role="alert">Đổi mật khâu không thành công. Vui lòng thử lại!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }else{
                    $alert = '<div class="alert alert-success alert-dismissible" role="alert">Đổi mật khẩu thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    
                }
            }
        }
    }
?>