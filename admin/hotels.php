<?php 
    require('/Code/GitHub/booking/admin/inc/essentials.php');
    require('/Code/GitHub/booking/admin/inc/db_config.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN MANAGEMENT - HOTELS</title>
    <?php require('inc/links.php'); ?>
</head>
<body>
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">HOTELS</h3>
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form" action="">                        
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">General Settings</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">About us</label>
                                        <textarea class="form-control shadow-none" name="site_about" id="site_about_inp" rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" onclick="upd_general(site_title.value, site_about.value)" data-bs-dismiss="modal" class="btn btn-success text-white shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>