<?php
    require('inc/essentials.php');
    adminLogin();
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="https://www.freepnglogos.com/uploads/hotel-logo-png/download-building-hotel-clipart-png-33.png">
    <title>Settings</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('inc/header.php') ?>
    
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <?php echo isset($alert) ? $alert : ''; ?>
                <h3 class="mb-4">SETTINGS</h3>
                <!-- General setting  -->
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
                <!-- Modal detail -->
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
                <!-- Shutdown section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form action="">
                                    <input onclick="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                    </form>
                            </div>
                        </div>
                        <p class="card-text">
                            No customers will be allowed to book hotel room, when shutdown mode is turned on (Only for Website Maintenance).
                        </p>
                    </div>
                </div>
                <!-- Contact settings -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contact Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">Edit</button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1"> 
                                        <i class="bi bi-telephone-fill me-1"></i> 
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text"> 
                                        <i class="bi bi-telephone-fill me-1"></i> 
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1"> 
                                        <i class="bi bi-twitter mb-1"></i> 
                                        <span id="tw"></span>
                                    </p>
                                    <p class="card-text mb-1"> 
                                        <i class="bi bi-facebook mb-1"></i> 
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text"> 
                                        <i class="bi bi-instagram mb-1"></i> 
                                        <span id="insta"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form" action="">                        
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">Contact Settings</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label fw-bold">Address</label>
                                                    <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label fw-bold">Google Map Link</label>
                                                    <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label fw-bold">Phone Numbers (with country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-telephone-fill"></i> </span>
                                                        <input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none" require>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-telephone-fill"></i> </span>
                                                        <input type="text" name="pn2" id="pn2_inp" class="form-control shadow-none">
                                                    </div> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label fw-bold">Email</label>
                                                    <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label fw-bold">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-facebook"></i> </span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" require>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-instagram"></i> </span>
                                                        <input type="text" name="ins" id="insta_inp" class="form-control shadow-none" require>
                                                    </div> 
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-twitter"></i> </span>
                                                        <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" require>
                                                    </div> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label fw-bold">iFrame Scr</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" require>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" onclick="upd_contacts()" data-bs-dismiss="modal" class="btn btn-success text-white shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php') ?>

    <script>
        let general_data, contacts_data;
        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');
        let contacts_s_form = document.getElementById('contacts_s_form');

// Function get data
        function get_general(){
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');
            let shutdown_toggle =document.getElementById('shutdown-toggle')
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                general_data = JSON.parse(this.responseText);
                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;
                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;
                if(general_data.shutdown == 0){
                    shutdown_toggle.checked = false;
                    shutdown_toggle.value = 0;
                }else{
                    shutdown_toggle.checked = true;
                    shutdown_toggle.value = 1;
                }
            }
        xhr.send('get_general');
        }
        function get_contacts(){
            let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw'];
            let iframe = document.getElementById('iframe');
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                contacts_data = JSON.parse(this.responseText);
                contacts_data =Object.values(contacts_data);
                for(i=0; i<contacts_p_id.length; i++){
                    document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
                }
                iframe.src = contacts_data[9];
                contacts_inp(contacts_data);
            }
        xhr.send('get_contacts');
        }  
// Function Update data
        function upd_general(site_title_val, site_about_val){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                if(this.responseText==1){
                    alert('success', 'Changes saved!')
                    get_general();
                }else{
                    alert('error', 'No changes made!')
                }
            }
        xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
        }
        function upd_shutdown(val){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                if(this.responseText==1 && general_data.shutdown==0){
                    alert('success', 'Site has been shutdown!')
                }else{
                    alert('error', 'Shutdown mode off!')
                }
                get_general();
            }
        xhr.send('upd_shutdown='+val);
        }
        function upd_contacts(){
            let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw', 'iframe'];
            let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];
            let data_str = "";
            for(i=0;i<index.length;i++){
                data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value +'&';
            }
            data_str += "upd_contacts";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                if(this.responseText==1 && general_data.shutdown==0){
                    alert('success', 'Changes saved!')
                }else{
                    alert('error', 'No changes made!')
                }
            }
            xhr.send(data_str);
        }
// Get data from input
        function contacts_inp(data){
            let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];
            for(i=0; i<contacts_inp_id.length; i++){
                document.getElementById(contacts_inp_id[i]).value = data[i+1];
            }
        }
// Listen eventClick on button
        general_s_form.addEventListener('submit', function(e){
            e.preventDefault();
            upd_general(site_title_inp.value, site_about_inp.value);
        })
        contacts_s_form.addEventListener('submit', function(e){
            e.preventDefault();
            upd_contacts();
        })

        window.onload = function(){
            get_general();
            get_contacts();
        }
    </script>
</body>
</html>

