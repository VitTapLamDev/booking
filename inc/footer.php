<?php 
    require('inc/db_config.php');
    $sql_detail = "SELECT * FROM `contact_details` WHERE '1'";
    $result_detail = mysqli_query($conn, $sql_detail);
?>

<!-- Footer -->
<?php while($row = mysqli_fetch_assoc($result_detail)): ?>
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">Hotel Booking</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi obcaecati voluptates doloremque eveniet atque facere eos similique, fugiat laboriosam cumque suscipit illo eum harum nobis at dicta molestiae blanditiis possimus.</p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Link</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="hotels.php" class="d-inline-block mb-2 text-dark text-decoration-none">Hotels</a> <br>
            <a href="service.php" class="d-inline-block mb-2 text-dark text-decoration-none">Service</a> <br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a> <br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a> <br>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow us</h5>
            <a href="<?php echo $row['tw'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                <i class="bi bi-twitter me-1"></i> <?php echo $row['tw'] ?>
            </a><br>
            <a href="<?php echo $row['fb'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                <i class="bi bi-facebook me-1"></i> <?php echo $row['fb'] ?>
            </a><br>
            <a href="<?php echo $row['insta'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                <i class="bi bi-instagram me-1"></i> <?php echo $row['insta'] ?>
            </a><br>
        </div>
    </div>
</div>
<?php endwhile; ?>
<h6 class="text-center bg-dark text-white p-3 m-0">Chuyen De Co So - Hoc Vien Ky Thuat Mat Ma</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
