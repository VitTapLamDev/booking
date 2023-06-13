<?php
    require('inc/db_config.php');
    $sql = "SELECT * FROM `user_queries`";
    $result_queries = mysqli_query($con, $sql);
    
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <?php require('inc/links.php'); ?>
    <style>
        body{
        background:#eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }

        .avatar-md {
            height: 5rem;
            width: 5rem;
        }

        .fs-19 {
            font-size: 19px;
        }

        .primary-link {
            color: #314047;
            -webkit-transition: all .5s ease;
            transition: all .5s ease;
        }

        a {
            color: #02af74;
            text-decoration: none;
        }

        .bookmark-post .favorite-icon a, .job-box.bookmark-post .favorite-icon a {
            background-color: #da3746;
            color: #fff;
            border-color: danger;
        }
        .favorite-icon a {
            display: inline-block;
            width: 30px;
            height: 30px;
            font-size: 18px;
            line-height: 30px;
            text-align: center;
            border: 1px solid #eff0f2;
            border-radius: 6px;
            color: rgba(173,181,189,.55);
            -webkit-transition: all .5s ease;
            transition: all .5s ease;
        }


        .candidate-list-box .favorite-icon {
            position: absolute;
            right: 22px;
            top: 22px;
        }
        .fs-14 {
            font-size: 14px;
        }
        .bg-soft-secondary {
            background-color: rgba(116,120,141,.15)!important;
            color: #74788d!important;
        }

        .mt-1 {
            margin-top: 0.25rem!important;
        }
    </style>
</head>
<body class="bg-light">
    <?php require('inc/header.php') ?>
    
    <div class="container-fluid">
        <form method="post">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo isset($alert) ? $alert : ''; ?>
                    <section class="section">
                        <div class="container">
                            <div class="row">
                                <h5 style="margin-top: 20px;"><span class="me-1">QUERIES</span></h5>
                                <?php while($row = mysqli_fetch_assoc($result_queries)): ?>
                                <div class="col-lg-6">
                                    <form method="post">
                                        <div class="candidate-list">
                                            <div class="candidate-list-box card mt-4">
                                                <div class="p-4 card-body">
                                                    <div class="">
                                                        <div class="candidate-list-content mt-3 mt-lg-0">
                                                            <div class="row">
                                                                <div class="col-lg-6 d-flex align-items-center">
                                                                    <h5 class="fs-19 mb-0">
                                                                        <span class="badge bg-secondary ms-1 align-items-center"><?php echo $row['name'] ?></span>
                                                                        <a class="primary-link"><?php echo $row['email'] ?></a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="text-muted mb-2"><?php echo $row['subject'] ?></p>
                                                            <ul class="list-inline mb-0 text-muted">
                                                                <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> <?php echo $row['message'] ?></li>
                                                            </ul>
                                                        </div>                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </form>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </form>
    </div>
    
    <?php require('inc/scripts.php') ?>
</body>
</html>

