<?php
    require('ajax/user_detail_crud.php');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="style/hotel_detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php') ?>
    
    <div class="container-fluid">
        <form method="post">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="container-fluid">
                    <div class="container">
                    <!-- Title -->
                        <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                            <h2 class="h5 mb-3 mb-lg-0"><a href="users.php" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a>User Infomation</h2>
                            <div class="hstack gap-3">
                                <button type="button" class="btn btn-danger btn-sm btn-icon-text btn-sm " data-bs-toggle="modal" data-bs-target="#deleteUser"><i class="bi bi-trash me-1"></i>Delete</button>
                                <button name="save_user" class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="" method="post">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6 mb-4">User's contact</h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input name="user_name" type="text" class="form-control" value="<?php echo $user_name ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input name="user_email" type="email" class="form-control" value="<?php echo $user_email ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input name="user_pn" type="number" class="form-control" value="<?php echo $user_pn ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Day of Birth</label>
                                                    <input name="user_dob" type="date" class="form-control" value="<?php echo $user_dob ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input name="user_address" type="text" class="form-control" value="<?php echo $user_add ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
            
                                </div>
                                <!-- Right side -->
                                <div class="col-lg-4">
                                    <!-- Notes -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h3 class="h6">Notes</h3>
                                            <textarea name="note" class="form-control" rows="6"><?php echo $note ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="container ">
            <div class="row">
                <div class="col-10 ms-auto mb-lg-5">
                    <h5 class="mb-0">Booked's History</h5>
                    <div class="row text-center d-flex flex-row op-7 mx-0">
                    <?php while($row = mysqli_fetch_assoc($result_bill)): ?>
                    <div class="col-sm-3 flex-ew text-center py-3 border-bottom border-right pt-0"> <a class="d-block lead font-weight-bold"><?php echo $row['sl'] ?></a>Order</div>
                    <div class="col-sm-3 flex-ew text-center py-3 border-bottom border-right pt-0"> <a class="d-block lead font-weight-bold" style="color: darkgreen;"><?php echo $row['sl_success'] ?> </a>Success</div>
                    <div class="col-sm-3 flex-ew text-center py-3 border-bottom border-right pt-0"> <a class="d-block lead font-weight-bold" style="color: red;"><?php echo $row['sl_cancel'] ?></a>Cancel</div>
                    <div class="col-sm-3 flex-ew text-center py-3 border-bottom border-right pt-0"> <a class="d-block lead font-weight-bold" style="color: darkgreen;"><?php echo $row['total'] ?> VND</a>Payed</div>
                    <?php endwhile; ?>
                    <div class="position-relative card table-nowrap table-card">
                        <div class="table-responsive">
                            
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                    <tr>
                                        <th class="col-md-1">Bill Code</th>
                                        <th class="col-md-2">Time created</th>
                                        <th class="col-md-3">Hotel</th>
                                        <th class="col-md-2">Price</th>
                                        <th class="col-md-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($row = mysqli_fetch_assoc($result_booked)): ?>
                                    <tr>
                                        <td><?php echo $row['bill_code'] ?></td>
                                        <td>
                                            <?php 
                                                $dateString = $row['time_booked']; // Assuming 'date_column' is the name of your column
                                                $dateTime = new DateTime($dateString);
                                                $formattedDate = $dateTime->format('H:i:s d/m/Y');
                                                echo $formattedDate;
                                            ?>
                                        </td>
                                        <td><?php echo $row['hotel_name'] ?></td>
                                        <td><?php echo $row['price'].' VND'?></td>
                                        <td>
                                            <?php if($row['status']=='cancel'){ ?>
                                                <h5><span class="badge text-bg-danger">Đã hủy</span></h5>
                                            <?php }else if($row['status']=='success'){ ?>
                                                <h5><span class="badge text-bg-success">Đã trả phòng</span></h5>
                                            <?php }else if($row['status']=='process'){ ?>
                                                <h5><span class="badge text-bg-secondary">Đang xử lý</span></h5>
                                            <?php }else if($row['status']=='payed'){ ?>
                                                <h5><span class="badge text-bg-primary">Đã thanh toán</span></h5>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5><?php echo 'Delete user '.$user_email; ?></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

