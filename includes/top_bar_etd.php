<?php
include('includes/dbconn.php');
$nb_etud_demand = $con->query("SELECT COUNT(idEtd) as countdemande FROM  etudiant where statu = 'en cours de traitement'");
$count_row = $nb_etud_demand->fetch(PDO::FETCH_ASSOC);
$count = $count_row['countdemande'];
$message = $_SESSION['message'];
?>
<ul class="navbar-nav ml-auto">
    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <?php if ($count != 0) {
            ?>
                <span class="badge badge-danger badge-counter">
                    <h6><?php echo $countxe; ?></h6>
                </span>
            <?php }
            ?>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <span class="font-weight-bold">neveaux examen</span>
                </div>
            </a>
        </div>
    </li>
    <!-- Nav Item - Messages -->
    <div class="topbar-divider d-none d-sm-block"></div>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $message ?></span>
            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="Logout.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>

        </div>
    </li>

</ul>