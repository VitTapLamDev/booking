<?php 
    require('/Code/GitHub/booking/admin/inc/essentials.php');
    require('/Code/GitHub/booking/admin/inc/db_config.php');
    if(!$con){
        die("Connection failed: " + mysqli_connect_errno());
    }else{
        session_start();
        $sql = "SELECT * FROM `hotel_cred`";
        $result = mysqli_query($con, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN MANAGEMENT - HOTELS</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <?php require('inc/links.php'); ?>
</head>
<body>
    <?php require('inc/header.php'); ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="container">
                    <div class="row">
                        <form method="post">
                            <div class="col-12 mb-3 mb-lg-5">
                                <div class="overflow-hidden card table-nowrap table-card">
                                    <div class="card-header d-flex justify-content-between align-items-center text-nowrap">
                                        <h5 class="mb-0">Hotel List:    </h5>
                                        <div class="input-group mb-3" style="margin-left: 20px; margin-top: 5px;">
                                            <input name="email_bill" type="email" class="form-control" placeholder="Hotel Email/Hotel ID" required>
                                            <button name="search_bill" class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="small text-uppercase bg-body text-muted">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Hotel name</th>
                                                    <th>Location</th>
                                                    <th>Hotline</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                <tr class="align-middle">
                                                    <td><span class="h6 mb-0 lh-1"><?php echo $row['id_hotel'] ?></div></td>
                                                    <td><span class="d-inline-block align-middle"><?php echo $row['hotel_name'] ?></span></td>
                                                    <td><span class="d-inline-block align-middle"><?php echo $row['location'] ?></span></td>
                                                    <td><span class="d-inline-block align-middle"><?php echo $row['hotline'] ?></span></td>
                                                    <td class="text-end">
                                                        <div class="drodown">
                                                            <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" onclick="getData(this); window.location.href ='hotel_detail.php'">Chi tiết</a>
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
            
            var hotel_code = rowData[0].textContent;
            console.log(hotel_code);
            saveDataInSession(hotel_code);
        }

        function saveDataInSession(hotel_code) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc/hotel_code.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Data saved in session successfully.');
                }
            };
            xhr.send('hotel_code=' + encodeURIComponent(hotel_code));
        }

    </script>
</body>
</html>