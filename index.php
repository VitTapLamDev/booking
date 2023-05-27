<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - DỊCH VỤ</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require('inc/links.php')?>
</head>
<body class="bg-light">
    
    <?php 
        session_start();
        if (isset($_SESSION['account'])){
            require('inc/header_login.php');
        }else{
            require('inc/header.php');
        }
    ?>
    <!-- Swiper -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/du-lich-tinh-nguyen.jpg" class="w-100 d-100" />
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/dulichsinhthai.jpg" class="w-100 d-100"/>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/dulichtamlinh.jpg" class="w-100 d-100"/>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/hcmcity.jpg" class="w-100 d-100"/>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/lang-chu-tich-ho-chi-minh.jpg" class="w-100 d-100"/>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/mucangchai2.jpg" class="w-100 d-100"/>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/swiper/sapa.jpg" class="w-100 d-100"/>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Booking Form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Tìm kiếm khách sạn</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label for="" class="form-label check-in">Địa điểm</label>
                            <input type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="" class="form-label check-in">Check-in</label>
                            <input type="date" class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="" class="form-label check-in">Check-out</label>
                            <input type="date" class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label for="" class="form-label check-in">Số lượng phòng ngủ</label>
                            <select class="form-select shadow-none" required>
                                <option disabled selected>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="More">Khác</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class=" btn-sm custom-bg text-white shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">HỆ THỐNG KHÁCH SẠN</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow custom-card">
                    <img src="/assets/images/room/single.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Phòng đơn</h5>
                        <h6 class="mb-4">200.000 - 500.000VND/Night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Tiện nghi</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Bed
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Tiện ích</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                Fridge
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                AC
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Đánh giá: 
                                <span class="badge bg-light rounded-pill">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow custom-card">
                    <img src="/assets/images/room/double-bed.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Phòng đôi</h5>
                        <h6 class="mb-4">500.000 - 1.000.000VND/Night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Tiện nghi</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                2 Bed
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Tiện ích</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                Fridge
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                AC
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Đánh giá: 
                                <span class="badge bg-light rounded-pill">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow custom-card">
                    <img src="/assets/images/room/residential-suite-phong-khach-san.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Phòng chủ tịch</h5>
                        <h6 class="mb-4">1.000.000 - 2.000.000VND/Night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Tiện nghi</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                2 Room
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                2 Bathroom
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Tiện ích</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                Fridge
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                AC
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Đánh giá: 
                                <span class="badge bg-light rounded-pill">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </h6>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Tìm hiểu thêm >>></a>
            </div>
        </div>
    </div>
    
    <!--Facilities  -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TIỆN ÍCH</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-12 text-center bg-white rounded shadow py-4 my-3">
                <img src="/assets/images/feautures/wifi.png" class="custom-features">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-12 text-center bg-white rounded shadow py-4 my-3">
                <img src="/assets/images/feautures/television.png" class="custom-features">
                <h5 class="mt-3">Television</h5>
            </div>
            <div class="col-lg-2 col-md-12 text-center bg-white rounded shadow py-4 my-3">
                <img src="/assets/images/feautures/sofa.png" class="custom-features">
                <h5 class="mt-3">Sofa</h5>
            </div>
            <div class="col-lg-2 col-md-12 text-center bg-white rounded shadow py-4 my-3">
                <img src="/assets/images/feautures/fridge.png" class="custom-features">
                <h5 class="mt-3">Fridge</h5>
            </div>
            <div class="col-lg-2 col-md-12 text-center bg-white rounded shadow py-4 my-3">
                <img src="/assets/images/feautures/air-conditioner.png" class="custom-features">
                <h5 class="mt-3">AC</h5>
            </div>
            
        </div>
    </div>

    <!-- Service -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">DỊCH VỤ</h2>
    <div class="container">
        <div class="swiper">
            <div class="swiper swiper-service">
                <div class="swiper-wrapper">
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/bar.jpg" alt="">
                        <h5 class="mt-3">Bar</h5>
                    </div>
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/dua-don.jpg" alt=""> 
                        <h5 class="mt-3">Đưa đón</h5>
                    </div>
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/giatla.jpg" alt=""> 
                        <h5 class="mt-3">Giặt là</h5>
                    </div>
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/gym.jpg" alt="">
                        <h5 class="mt-3">Gym</h5>
                    </div>
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/pool.jpg" alt=""> 
                        <h5 class="mt-3">Bể Bơi</h5>
                    </div>
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/restaurant.jpg" alt="">
                        <h5 class="mt-3">Nhà hàng</h5>
                    </div>
                    <div class="swiper-slide me-1 text-center bg-white rounded shadow">
                        <img src="/assets/images/service/spa.jpg" alt=""> 
                        <h5 class="mt-3">Spa</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="service.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Tìm hiểu thêm >>></a>
            </div>
        </div>
    </div>
    <!-- Rating -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">ĐÁNH GIÁ</h2>
    <div class="container">
        <div class="swiper swiper-rating">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="/assets/images/profile.png" class="custom-rating">
                        <h6 class="m-0 ms-2">User 1</h6>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis tempore explicabo voluptatem quisquam, 
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="/assets/images/profile.png" class="custom-rating">
                        <h6 class="m-0 ms-2">User 2</h6>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis tempore explicabo voluptatem quisquam, 
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="/assets/images/profile.png" class="custom-rating">
                        <h6 class="m-0 ms-2">User 3</h6>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis tempore explicabo voluptatem quisquam, 
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Contact US -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">LIÊN HỆ CHÚNG TÔI</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59595.347641166954!2d105.77399541953127!3d21.00428974666735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1683270571454!5m2!1svi!2s" height="320"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>LIÊN HỆ:</h5>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel; +841810293120" class="d-inline-block mb-2 text-decoration-none text-dark">+841810293120</a> 
                    <br>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel; +841810293120" class="d-inline-block mb-2 text-decoration-none text-dark">+841810293120</a> 
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow us</h5>
                    <a href="#" class="d-inline-block mb-3"> 
                        <span class="badge bg-light text-dark fs-6 ps-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3"> 
                        <span class="badge bg-light text-dark fs-6 ps-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3"> 
                        <span class="badge bg-light text-dark fs-6 ps-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <?php require('inc/footer.php')?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay:{
                delay: 3500,
                disableOnInteraction: false,
            }
        });
        var swiper = new Swiper(".swiper-service", {
            watchSlidesProgress: true,
            loop: true,
            slidesPerView: 3,
          });
        var swiper = new Swiper(".swiper-rating", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            // slidesPerView: "auto",
            loop: true,
            slidesPerView: 3,
    
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints:{
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
      </script>
</body>
</html>