<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">ADMIN MANAGEMENT</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
</div>
<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu" >
    <nav class="navbar navbar-expand-lg navbar-dark" >
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">MANAGEMENT</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="dashboard.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="hotels.php">HOTELS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="users.php">USERS</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn position-relative" style="color: white;" onclick="window.location.href='hotel_request.php'">
                            REQUEST
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="queries.php">USER QUERIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="settings.php">SETTINGS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
