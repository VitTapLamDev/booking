<?php require('inc/booking_cred.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Booking - KHÁCH SẠN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        #suggestionsList {
            position: absolute;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #suggestionsList>li {
            position: relative;
            background-color: white;
            padding: 10px;
            border: solid 0.5px #dddddd;
            z-index: 99;
            min-width: 300px;
        }

        #suggestionsList>li:hover {
            background-color: #dddddd;
            cursor: pointer;
        }
    </style>
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">
    <?php
    if (isset($_SESSION['account'])) {
        require('inc/header_login.php');
    } else {
        require('inc/header.php');
    }
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">PHÒNG KHÁCH SẠN</h2>
        <div class="h-line bg-dark"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-lg-3 mb-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow col-lg-12 col-md-12" style="justify-content: space-around; ">
                    <form method="POST" action="">
                        <h4 class="mt-2" style="margin-left: 20px;">ĐẶT PHÒNG NGAY</h4>
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid col-lg-12 col-md-12">
                                <div class="border p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Bạn muốn đi đâu?</h5>
                                    <label for="" class="form-label">Điểm đến</label>
                                    <input type="text" name="location_inp" id="searchInput" class="form-control shadow-none mb-3" onkeyup="handleInput(this.value)" autocomplete="off" value="<?php echo $_SESSION['location']; ?>" required>
                                    <ul id="suggestionsList"></ul>
                                </div>
                                <div class="border p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Ngày đến - Ngày Đi</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Check-in</label>
                                            <input name="check_in" id="checkin" type="date" class="form-control shadow-none mb-3" value="<?php echo $_SESSION['checkin']; ?>" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Check-out</label>
                                            <input name="check_out" id="checkout" min="" type="date" class="form-control shadow-none mb-3" value="<?php echo $_SESSION['checkout']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="border p-3 rounded mb-3" style="margin: 10px;">
                                    <h5 class="mb-3" style="font-size: 18px;">Số lượng phòng</h5>
                                    <div class="col-lg-12">
                                        <label for="" class="form-label">Số lượng phòng: </label>
                                        <input name="number" type="number" class="form-control shadow-none mb-3" min="1" value="<?php echo $_SESSION['numofroom'] ?>" required>
                                    </div>
                                </div>
                                <div class="border p-3 rounded mb-3" style="margin: 10px; white-space:nowrap;">
                                    <h5 class="mb-3" style="font-size: 18px;">Hạng phòng</h5>
                                    <label for="" class="form-label">Hạng phòng tìm kiếm: </label> <br>
                                    <select name="room_code" class="form-control shadow-none mb-3" required>
                                        <option disabled selected value="">Bạn muốn ở đâu?</option>
                                        <option <?php if ($_SESSION['roomtype'] == "standard") { ?> selected <?php } ?> value="standard">Cơ bản</option>
                                        <option <?php if ($_SESSION['roomtype'] == "double") { ?> selected <?php } ?> value="double">Phòng đôi</option>
                                        <option <?php if ($_SESSION['roomtype'] == "vip") { ?> selected <?php } ?> value="vip">Vip</option>
                                    </select>
                                </div>
                                <form class="d-flex">
                                    <div class="row justify-content-between align-items-center" style="margin: 10px;">
                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <button name="search_hotels" type="submit" class='btn btn-dark shadow-none mybtn'>TÌM KIẾM</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </form>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-12 px-4">
        <table class="table shadow table-bordered" id="hotel_room">

            <thead>
                <tr class="text-nowrap">
                    <th class="text-center">ID</th>
                    <th class="text-center">Khách sạn</th>
                    <th class="text-center">Hotline</th>
                    <th class="text-center">Địa chỉ</th>
                    <th class="text-center">Hạng phòng</th>
                    <th class="text-center">Giá (VNĐ/Đêm)</th>
                    <th class="text-center">Bản đồ</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <?php if ($status == 1) { ?> <div class="alert alert-info fs-5 text-center" role="alert">Có thể bạn quan tâm</div> <?php }
                                                                                                                        while ($row = mysqli_fetch_assoc($result)) : ?>

                <tbody>
                    <tr>
                        <td class="text-center"><?php echo $row['id_hotel'] ?></td>
                        <td class="text-center"><?php echo $row['hotel_name']; ?></td>
                        <td class="text-center"><?php echo $row['hotline'] ?></td>
                        <td class="text-center"><?php echo $row['details']; ?></td>
                        <td class="text-center"><?php echo ($row['room_code'] == 'double') ? "Phòng đôi" : (($row['room_code']) == 'standard' ? "Cơ bản" : "Vip"); ?></td>
                        <td class="text-center"><?php echo $row['price'] ?></td>
                        <td class="text-center"><iframe width="200" height="120" src="<?php echo $row['gmap']; ?>" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                        <?php if ($_SESSION['account']) { ?><td class="text-center"><button name="booking_room" type="button" class='btn btn-dark shadow-none mybtn text-nowrap' onclick="getData(this); window.location.href='payment.php'">Chi Tiết</button></td> <?php } else { ?> <td class="text-center"><button type="button" class='btn btn-dark shadow-none mybtn' data-bs-toggle="modal" data-bs-target="#Loginrequied">ĐẶT PHÒNG NGAY</button></td> <?php } ?>
                    </tr>
                </tbody>
            <?php endwhile;  ?>
        </table>
    </div>
    <div class="modal fade" id="Loginrequied" tabindex="-1" aria-labelledby="LoginrequiedLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LoginrequiedLabel">Bạn chưa đăng nhập ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vui lòng đăng nhập để sử dụng chức năng này!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập ngay</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <?php require('inc/footer.php') ?>
    <script>
        function getData(button) {
            var row = button.parentNode.parentNode;
            var rowData = [];
            var cells = row.getElementsByTagName('td');
            rowData.push(cells[0].textContent);
            rowData.push(cells[1].textContent);
            rowData.push(cells[5].textContent);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc/save_data.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {}
            };
            xhr.send('data=' + encodeURIComponent(JSON.stringify(rowData)));
        }

        // Lấy ngày hôm nay
        var today = new Date().toISOString().split('T')[0];

        // Đặt giá trị min của trường check-in thành ngày hôm nay
        document.getElementById("checkin").setAttribute("min", today);

        var checkinInput = document.getElementById("checkin");
        var checkoutInput = document.getElementById("checkout");

        checkinInput.addEventListener("change", function() {
            var checkinDate = new Date(checkinInput.value);
            var checkoutDate = new Date(checkoutInput.value);

            if (checkoutDate < checkinDate) {
                checkoutInput.value = ""; // Reset the checkout date if it's before the checkin date
            }

            checkoutInput.min = checkinInput.value;
        });
    </script>
    <script>
        // Array of values for auto-suggestion
        var suggestions = ["An Giang", "Bà Rịa – Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước",
            "Bình Thuận", "Cà Mau", "Cần Thơ", "Cao Bằng", "Đà Nẵng", "Đắk Lắk", "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai",
            "Hà Giang", "Hà Nam", "Hà Nội", "Hà Tĩnh", "Hải Dương", "Hải Phòng", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang",
            "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Phú Yên",
            "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa",
            "Thừa Thiên Huế", "Tiền Giang", "Hồ Chí Minh", "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "An Giang", "Ba Ria - Vung Tau",
            "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Can Tho", "Cao Bang",
            "Da Nang", "Dak Lak", "Dak Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Ha Nam", "Ha Noi", "Ha Tinh", "Hai Duong", "Hai Phong",
            "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An",
            "Ninh Binh", "Ninh Thuan", "Phu Tho", "Phu Yen", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh",
            "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien Hue", "Tien Giang", "Ho Chi Minh", "Tra Vinh", "Tuyen Quang", "Vinh Long", "Vinh Phuc", "Yen Bai"
        ];

        function handleInput(inputValue) {
            var suggestionsList = document.getElementById("suggestionsList");
            suggestionsList.innerHTML = ""; // Clear the previous suggestions

            // Filter the suggestions based on the input value
            var filteredSuggestions = suggestions.filter(function(suggestion) {
                return suggestion.toLowerCase().startsWith(inputValue.toLowerCase());
            });

            // Display the filtered suggestions
            filteredSuggestions.forEach(function(suggestion) {
                var li = document.createElement("li");
                li.textContent = suggestion;
                suggestionsList.appendChild(li);
                li.addEventListener("click", function() {
                    var selectedSuggestion = li.textContent;
                    var input = document.getElementById("searchInput");
                    input.value = selectedSuggestion;
                    suggestionsList.innerHTML = ""; // Clear the suggestions after selection
                });
            });
            document.addEventListener("click", function(event) {
                var target = event.target;
                if (!target.closest("#suggestionsList") && !target.closest("#searchInput")) {
                    suggestionsList.innerHTML = ""; // Clear the suggestions
                }
            });
        }
    </script>

</html>