<?php
    require('inc_hotel/db_config.php');
    session_start();
    if(!$conn){
        die("Connection failed: " + mysqli_connect_errno());
    }else{    
        $hotel_id = $_SESSION['hotel_account'];
        $sql = "SELECT * FROM `booking` WHERE `hotel_id` LIKE '$hotel_id'";
        $result = mysqli_query($conn, $sql);
    }
    if(!$_SESSION['hotel_account']){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐƠN ĐẶT PHÒNG</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets_hotel/bills_style.css">
    <?php require('inc_hotel/links.php') ?>
</head>
<body>
    <?php require('inc_hotel/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="container">
                    <div class="row">
                        <form method="post">
                            <div class="col-12 mb-3 mb-lg-5">
                                <div class="overflow-hidden card table-nowrap table-card">
                                    <div class="card-header d-flex justify-content-between align-items-center text-nowrap">
                                        <h5 class="mb-0">Danh sách đơn:    </h5>
                                        <div class="input-group mb-3" style="margin-left: 20px; margin-top: 5px;">
                                            <input name="hotel_id" type="text" class="form-control" value="<?php echo $_SESSION['hotel_account'] ?>" readonly>
                                            <input name="email_bill" type="email" class="form-control" placeholder="Email đặt phòng" required>
                                            <button name="search_bill" class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="small text-uppercase bg-body text-muted">
                                                <tr>
                                                    <th>Khách Hàng</th>
                                                    <th>Email</th>
                                                    <th class="text-center">Mã đơn</th>
                                                    <th class="text-center">Check-in</th>
                                                    <th class="text-center">Check-out</th>
                                                    <th class="text-center">Trạng thái</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <div class="h6 mb-0 lh-1"><?php echo $row['user_name'] ?></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['email_user'] ?></td>
                                                    <td class="text-center"><span class="d-inline-block align-middle"><?php echo $row['bill_code'] ?></span></td>
                                                    <td class="text-center"><span class="d-inline-block align-middle"><?php echo $row['check_in'] ?></span></td>
                                                    <td class="text-center"><span class="d-inline-block align-middle"><?php echo $row['check_out'] ?></span></td>
                                                    <td class="text-center">
                                                        <?php if($row['status']=='cancel'){ ?>
                                                            <p><span class="badge text-bg-danger">Đã hủy</span></p>
                                                        <?php }else if($row['status']=='success'){ ?>
                                                            <p><span class="badge text-bg-success">Đã trả phòng</span></p>
                                                        <?php }else if($row['status']=='process'){ ?>
                                                            <p><span class="badge text-bg-secondary">Đang xử lý</span></p>
                                                        <?php }else if($row['status']=='payed'){ ?>
                                                            <p><span class="badge text-bg-primary">Đã thanh toán</span></p>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="drodown">
                                                            <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                                <a href="bill_details.php" class="dropdown-item" onclick="getData(this)">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        function getData(element) {
            var row = element.closest('tr');
            var rowData = row.getElementsByTagName('td');
            
            var bill_code = rowData[2].textContent;
            console.log(bill_code);
            saveDataInSession(bill_code);
        }

        function saveDataInSession(bill_code) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc_hotel/bill_data.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Data saved in session successfully.');
                }
            };
            xhr.send('bill_code=' + encodeURIComponent(bill_code));
        }

    </script>

</body>
</html>