<?php
    require('inc_hotel/db_config.php');
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        $hotel_id = $_SESSION['hotel_account'];
        $sql = "SELECT `hotel_name` FROM `hotel_cred` WHERE `id_hotel` LIKE '$hotel_id'";
        $result_header = mysqli_query($conn, $sql);
    }
?>

<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">HOTEL BOOKING - <?php while($row = mysqli_fetch_assoc($result_header)){echo $row['hotel_name'];} ?></h3>
    <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
</div>
<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu" >
    <nav class="navbar navbar-expand-lg navbar-dark" >
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">QUẢN LÝ</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <h5 class="text-light">Trang chủ</h5>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="details.php">THÔNG TIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="rooms.php">PHÒNG NGỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="bills.php">ĐƠN ĐẶT PHÒNG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="ratings.php">ĐÁNH GIÁ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
