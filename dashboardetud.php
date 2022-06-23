<?php
include('includes/header.php');
include('includes/verif_login.php');
include('includes/dbconn.php');
$message = $_SESSION['message'];

$examen_acheve = $con->query("SELECT COUNT(numExamen) as countdemande FROM examen where dateExamen < SYSDATE() ");
$count_row = $examen_acheve->fetch(PDO::FETCH_ASSOC);
$countx = $count_row['countdemande'];



$nb_etd_insc = $con->query("SELECT COUNT(idEtd) as countdemande FROM etudiant where statu = 'accepter'");
$count_rowse = $nb_etd_insc->fetch(PDO::FETCH_ASSOC);
$coun = $count_rowse['countdemande'];
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('includes/sidebaretd.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <?php
                    include('includes/top_bar_etd.php');
                    ?>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">



                    <!-- Content Row -->
                    <div class="row">

                        <!-- examen_encour -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                examen en cours</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countxe; ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Examen Achevé -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Examen Achevée</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countx; ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                nombre d'étudiants inscrits</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $coun; ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


            </div>


            <!-- Footer -->
            <?php
                include('includes/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>





</body>

</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>