<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - PHÒNG</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('inc/links.php')?>
</head>
<body class="bg-light">
    <?php require('inc/header.php')?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">PHÒNG KHÁCH SẠN</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil illum quia eaque sequi? Esse explicabo amet
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <form method="POST" action="">
                        <div class="container-fluid flex-lg-column align-items-stretch">
                            <h4 class="mt-2">ĐẶT PHÒNG NGAY</h4>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Đặt phòng khách sạn</h5>
                                    <label for="" class="form-label">Địa điểm</label>
                                    <input type="text" name="location_inp" class="form-control shadow-none mb-3">
                                </div>
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Ngày đến - Ngày Đi</h5>
                                    <label for="" class="form-label">Check-in</label>
                                    <input type="date" class="form-control shadow-none mb-3">
                                    <label for="" class="form-label">Check-out</label>
                                    <input type="date" class="form-control shadow-none">
                                </div>
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Hạng phòng</h5>
                                    <div class="mb-2">
                                        <input type="checkbox" id="SV-Car" class="form-check-input shadow-none me-1">
                                        <label class="form-check-label" for="single_room">Phòng đơn</label>
                                    </div>
                                    <div class="mb-2">
                                        <input type="checkbox" id="SV-Laundry" class="form-check-input shadow-none me-1">
                                        <label class="form-check-label" for="double_room">Phòng đôi</label>
                                    </div>
                                    <div class="mb-2">
                                        <input type="checkbox" id="SV-Gym" class="form-check-input shadow-none me-1">
                                        <label class="form-check-label" for="suit_room">Phòng chủ tịch</label>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col"></div>
                                    <div class="col col-mb-6" >
                                        <button type="submit" name="search_rooms" class='btn btn-dark shadow-none'>TÌM KIẾM</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
            <table class="table shadow table-bordered" >
                <thead>
                    <tr>
                        <th>STT</th>
                        <th class="col-md-3">Khách sạn</th>
                        <th class="col-md-2">Hotline</th>
                        <th class="col-md-2">Địa điểm</th>
                        <th class="col-md-4">Chi tiết</th>
                        <th class="col-md-3">Chỉ đường</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                        $id = 1;
                        while ($row = mysqli_fetch_array($result)) { 
                    ?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['hotline']?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['details']; ?></td>
                            <td><iframe width="200" height="120" src="<?php echo $row['gmap']; ?>" frameborder="0"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>   
    </div>
    <?php require('inc/footer.php')?> 


    <script type="text/javascript">
    var $table = $('#table');
    $table.bootstrapTable({
        url: 'list-user.php',
        search: true,
        pagination: true,
        buttonsClass: 'primary',
        showFooter: true,
        minimumCountColumns: 2,
        columns: [{
            field: 'num',
            title: '#',
            sortable: true,
        },{
            field: 'first',
            title: 'Firstname',
            sortable: true,
        },{
            field: 'last',
            title: 'Lastname',
            sortable: true,
            
        },  ],

    });
</script>
</body>
</html>