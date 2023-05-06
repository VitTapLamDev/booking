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
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">ĐẶT PHÒNG NGAY</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Đặt phòng khách sạn</h5>
                                <label for="" class="form-label">Địa điểm</label>
                                <input type="text" class="form-control shadow-none mb-3">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Ngày đến - Ngày Đi</h5>
                                <label for="" class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label for="" class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Dịch vụ - Tiện ích</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Car" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Car">Đưa Đón</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Laundry" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Laundry">Giặt là</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Gym" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Gym">Phòng Gym</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Pool" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Pool">Bể bơi</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Restaurant" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Restaurant">Nhà hàng</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Spa" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Spa">Spa</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Bar" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Bar">Quầy Bar</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-Casino" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-Casino">Casino</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="SV-MeetingRoom" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="SV-MeetingRoom">Phòng họp</label>
                                </div> 
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Số lượng người</h5>
                                <label for="" class="form-label">Số lượng người</label>
                                <input type="number" class="form-control shadow-none mb-3">
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 px-lg-3">
                            <img src="/assets/images/room/single.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-1">Khách Sạn 1</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Dịch vụ</h6>
                                <span class="badge bg-light text-dark text-wrap">
                                    Xe đưa đón sân bay
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Nhà Hàng
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Bể Bơi
                                </span>
                            </div>
                            <div class="col-md-12">
                                <h6 class="mb-6">Địa chỉ: Chiến Thắng, Thanh Trì, Hà Đông, Hà Nội</h5>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 px-lg-3">
                            <img src="/assets/images/room/single.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-1">Khách Sạn 2</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Dịch vụ</h6>
                                <span class="badge bg-light text-dark text-wrap">
                                    Xe đưa đón sân bay
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Nhà Hàng
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Bể Bơi
                                </span>
                            </div>
                            <div class="col-md-12">
                                <h6 class="mb-6">Địa chỉ: Chiến Thắng, Thanh Trì, Hà Đông, Hà Nội</h5>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 px-lg-3">
                            <img src="/assets/images/room/single.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-1">Khách Sạn 3</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Dịch vụ</h6>
                                <span class="badge bg-light text-dark text-wrap">
                                    Xe đưa đón sân bay
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Nhà Hàng
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Bể Bơi
                                </span>
                            </div>
                            <div class="col-md-12">
                                <h6 class="mb-6">Địa chỉ: Chiến Thắng, Thanh Trì, Hà Đông, Hà Nội</h5>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 px-lg-3">
                            <img src="/assets/images/room/single.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-1">Khách Sạn 4</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Dịch vụ</h6>
                                <span class="badge bg-light text-dark text-wrap">
                                    Xe đưa đón sân bay
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Nhà Hàng
                                </span>
                                <span class="badge bg-light text-dark text-wrap">
                                    Bể Bơi
                                </span>
                            </div>
                            <div class="col-md-12">
                                <h6 class="mb-6">Địa chỉ: Chiến Thắng, Thanh Trì, Hà Đông, Hà Nội</h5>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>


        </div>
    </div>
    <?php require('inc/footer.php')?> 

</body>
</html>