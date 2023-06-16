<?php 
    require('ajax/hotel_crud.php');
    
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
            <?php echo isset($alert) ? $alert : ''; ?>
                <div class="d-flex justify-content-between align-items-lg-center flex-column flex-lg-row mb-3">
                    <h4>HOTEL MANAGEMENT</h4>
                    <div class="hstack gap-3">
                        <button name="new_hotel" type="button" class="btn btn-primary btn-sm btn-icon-text btn-sm " data-bs-toggle="modal" data-bs-target="#addHotel"><i class="bi bi-building-add me-1"></i>New Hotel</button>
                    </div>
                </div>
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
                                                                <a class="dropdown-item" onclick="getData(this); window.location.href ='hotel_detail.php'">Details</a>
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




        <div class="modal fade" id="addHotel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Hotel Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Name</label>
                                        <input type="text" name="hotel_name" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Email</label>
                                        <input type="email" name="hotel_email" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Location</label>
                                        <input type="text" name="hotel_location" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Password</label>
                                        <input type="password" name="hotel_pw" class="form-control shadow-none" required>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">ID</label>
                                        <input type="text" name="hotel_id" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Address</label>
                                        <input type="text" name="hotel_address" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Hotline</label>
                                        <input type="number" name="hotel_hotline" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Confirm Password</label>
                                        <input type="password" name="hotel_pwc" class="form-control shadow-none" required>
                                    </div>                            
                                </div>
                            </div>
                            
                        </div>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_newhotel" class="btn btn-primary">Add New Hotel</button>
                    </div>
                </div>
                </form>
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