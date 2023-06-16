<?php 

    $conn = mysqli_connect("localhost", 'root', '');
    $db = mysqli_select_db($conn, 'booking_web');
    session_start();

    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $location = $_SESSION['location'] ;
        $check_in = $_SESSION['checkin'];
        $check_out = $_SESSION['checkout'];
        $number = $_SESSION['numofroom'];
        $room_code = $_SESSION['roomtype'];

        $sql1 = "SELECT `number` FROM `hotel_room` WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code'";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            if (mysqli_num_rows($result1) > 0) {
                $row1 = mysqli_fetch_assoc($result1);
                $total_room = $row1["number"];
            }else{
                $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
                $total_room = 0;
            }
        }
        $sql2 = "SELECT SUM(number) FROM `booking` 
                    WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code' 
                        AND `check_in` BETWEEN '$check_in' AND '$check_out' OR `check_out` BETWEEN '$check_in' AND '$check_out'
                        AND (`status` = 'payed' OR `status` = 'process')
                    GROUP BY `hotel_id`, `room_code`";
        $result2 = $conn->query($sql2);
        if ($result2) {
            $row2 = $result2->fetch_assoc();
            if ($row2 !== null) {
                $booked_room = $row2["SUM(number)"];
            } else {
                $booked_room = 0;
            }
        }

        if ($number + $booked_room >= $total_room){
            $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
        } else {
            $query = "SELECT * FROM `hotel_room` WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code'";     
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)==0){
                $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
            }else{
                $alert= '<div class="alert alert-success mx-auto sticky-top" role="alert" style="top: 68px;">   Điểm đến: '.$_SESSION['location'].
                                                                        ' <i class="bi bi-diamond-fill"></i> Ngày nhận phòng: '.$_SESSION['checkin'].
                                                                        ' <i class="bi bi-diamond-fill"></i> Ngày trả phòng: '.$_SESSION['checkout'].
                                                                        ' <i class="bi bi-diamond-fill"></i> Loại phòng: '.$_SESSION['roomtype'].
                                                                        ' <i class="bi bi-diamond-fill"></i> Số lượng phòng: '.$_SESSION['numofroom'].
                        '</div>';
            }
        }
    }
    
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        if(isset($_POST['search_hotels'])){
            $location = $_POST['location_inp'];
            $room_code = $_POST['room_code'];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out']; 
            $number = $_POST['number'];

            $_SESSION['location'] = $location;
            $_SESSION['checkin'] = $check_in;
            $_SESSION['checkout'] = $check_out;
            $_SESSION['numofroom'] = $number;
            $_SESSION['roomtype'] = $room_code;

            $sql1 = "SELECT `number` FROM `hotel_room` WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code'";
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    $total_room = $row1["number"];
                }else{
                    $alert = '<div class="alert alert-danger sticky-top" style="top:68px;" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
                    $total_room = 0;
                }
            }
            $sql2 = "SELECT SUM(number) FROM `booking` 
                        WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code' 
                            AND `check_in` BETWEEN '$check_in' AND '$check_out' OR `check_out` BETWEEN '$check_in' AND '$check_out'
                            AND (`status` = 'payed' OR `status` = 'process')
                        GROUP BY `hotel_id`, `room_code`";
            $result2 = $conn->query($sql2);
            if ($result2) {
                $row2 = $result2->fetch_assoc();
                if ($row2 !== null) {
                    $booked_room = $row2["SUM(number)"];
                } else {
                    $booked_room = 0;
                }
            }

            if ($number + $booked_room >= $total_room){
                $alert = '<div class="alert alert-danger sticky-top" style="top:68px;" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
            } else {
                $query = "SELECT * FROM `hotel_room` WHERE `location` LIKE '$location' AND `room_code` LIKE '$room_code'";     
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)==0){
                    $alert = '<div class="alert alert-danger" role="alert">Không tìm thấy khách sạn phù hợp. Vui lòng thử lại!</div>';
                }else{
                    $alert= '<div class="alert alert-success mx-auto sticky-top" role="alert" style="top: 68px;">   Điểm đến: '.$_SESSION['location'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Ngày nhận phòng: '.$_SESSION['checkin'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Ngày trả phòng: '.$_SESSION['checkout'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Loại phòng: '.$_SESSION['roomtype'].
                                                                            ' <i class="bi bi-diamond-fill"></i> Số lượng phòng: '.$_SESSION['numofroom'].
                            '</div>';
                }
            }
        }
    }
?>