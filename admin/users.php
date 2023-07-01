<?php 
    require('ajax/user_crud.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN MANAGEMENT - USERS</title>
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php require('inc/links.php'); ?>
</head>
<body>
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between align-items-lg-center flex-column flex-lg-row">
                <h4>USER MANAGEMENT</h4>
                <div class="hstack gap-3">
                    <button name="save_btn" type="button" class="btn btn-primary btn-sm btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#addUser"><i class="bi bi-building-add me-1"></i>New User</button>
                </div>
            </div>
            <div class="container-fluid" id="main-content">
                <div class="row">
                    <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                        <div class="container">
                            <div class="row">
                                <form method="post">
                                    <div class="col-12 mb-3 mb-lg-5">
                                        <div class="overflow-hidden card table-nowrap table-card">
                                            <div class="card-header d-flex justify-content-between align-items-center text-nowrap">
                                                <h5 class="mb-0">User List:</h5>
                                                <div class="input-group mb-3" style="margin-left: 20px; margin-top: 5px;">
                                                    <input name="user_email" type="email" class="form-control" placeholder="Email" readonly>
                                                    <button name="search_user_email" class="btn btn-outline-secondary" type="button">Search</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="small text-uppercase bg-body text-muted">
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>User Email</th>
                                                            <th>Phonenumber</th>
                                                            <th>Address</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                        <tr class="align-middle">
                                                            <td><span class="d-inline-block align-middle"><?php echo $row['user_name'] ?></span></td>
                                                            <td><span class="d-inline-block align-middle"><?php echo $row['email'] ?></span></td>
                                                            <td><span class="d-inline-block align-middle"><?php echo $row['phonenumber'] ?></span></td>
                                                            <td><span class="d-inline-block align-middle"><?php echo $row['address'] ?></span></td>
                                                            <td class="text-end">
                                                                <div class="drodown">
                                                                    <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" onclick="getData(this); window.location.href ='user_detail.php' ">Chi tiết</a>
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
        </div>

        <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Email</label>
                                    <input type="email" name="user_email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">User Name</label>
                                        <input type="text" name="user_name" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Day of Birth</label>
                                        <input type="date" name="user_dob" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Password</label>
                                        <input type="password" name="user_pw" class="form-control shadow-none" required>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Address</label>
                                        <input type="text" name="user_address" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Phone Numbers</label>
                                        <input type="number" name="user_pn" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Confirm Password</label>
                                        <input type="password" name="user_pwc" class="form-control shadow-none" required>
                                    </div>                            
                                </div>
                            </div>
                            
                        </div>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_newuser" class="btn btn-primary">Add New User</button>
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
            
            var user_email = rowData[1].textContent;
            console.log(user_email);
            saveDataInSession(user_email);
        }

        function saveDataInSession(user_email) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc/user_email.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Data saved in session successfully.');
                }
            };
            xhr.send('user_email_admin=' + encodeURIComponent(user_email));
        }

    </script>                                                       
</body>
</html>