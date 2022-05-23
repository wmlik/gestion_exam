<?php

include('includes/header.php');
include('includes/dbconn.php');
$message = $_SESSION['message'];
$table_etud_demand = $con->query("SELECT * FROM etudiant where statu = 'en cours de traitement'");
$table_etud_inscrit = $con->query("SELECT * FROM etudiant where statu = 'accepter'");
$table_etud_refus = $con->query("SELECT * FROM etudiant where statu = 'refuser'");

$examen_acheve = $con->query("SELECT COUNT(numExamen) as countdemande FROM examen where dateExamen < SYSDATE() ");
$count_row = $examen_acheve->fetch(PDO::FETCH_ASSOC);
$countx = $count_row['countdemande'];

$examen_encour = $con->query("SELECT COUNT(numExamen) as countdemande FROM examen where dateExamen > SYSDATE() ");
$count_rows = $examen_encour->fetch(PDO::FETCH_ASSOC);
$countxe = $count_rows['countdemande'];

$nb_etd_insc = $con->query("SELECT COUNT(idEtd) as countdemande FROM etudiant where statu = 'accepter'");
$count_rowse = $nb_etd_insc->fetch(PDO::FETCH_ASSOC);
$coun = $count_rowse['countdemande'];

?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        include('includes/sidebar.php');
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
                    include('includes/top_bar_admin.php');
                    ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <form action="dashboardadmin.php" method="POST">
                            <button type=" submit" name="inscrit" class="btn btn-primary btn-sm" required>les étudiants inscrits</button>
                            <button type=" submit" name="demande" class="btn btn-primary btn-sm" required>les demandes d'inscription</button>
                            <button type=" submit" name="refuser" class="btn btn-primary btn-sm" required>les étudiants refuser</button>
                        </form>
                    </div>

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
                    <!-- ****************************************************************************************** ******************************************-->
                    <!-- DataTales Example -->
                    <?php
                    if (isset($_POST['demande'])) { ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">les demandes d'inscriptio</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            while ($donnees = $table_etud_demand->fetch()) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $donnees['nomEtd']; ?></td>
                                                    <td><?php echo $donnees['prenomEtd']; ?></td>
                                                    <td>
                                                        <form class="user" action="verif_demande_etud.php" method="POST">
                                                            <input type="hidden" name="idEtd" value="<?php echo $donnees['idEtd']; ?>">
                                                            <button type=" submit" name="verifier" class="btn btn-primary btn-sm">vérifier</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    if (isset($_POST['inscrit'])) { ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">les étudiants inscrits</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            while ($donnees = $table_etud_inscrit->fetch()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $donnees['nomEtd']; ?></td>
                                                    <td><?php echo $donnees['prenomEtd']; ?></td>
                                                    <td>
                                                        <form class="user" action="verif_demande_etud.php" method="POST">
                                                            <input type="hidden" name="idEtd" value="<?php echo $donnees['idEtd']; ?>">
                                                            <button type=" submit" name="verifier" class="btn btn-primary btn-sm">vérifier</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    if (isset($_POST['refuser'])) { ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">les étudiants refuse</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            while ($donnees = $table_etud_refus->fetch()) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $donnees['nomEtd']; ?></td>
                                                    <td><?php echo $donnees['prenomEtd']; ?></td>
                                                    <td>
                                                        <form class="user" action="verif_demande_etud.php" method="POST">
                                                            <input type="hidden" name="idEtd" value="<?php echo $donnees['idEtd']; ?>">
                                                            <button type=" submit" name="verifier" class="btn btn-primary btn-sm">vérifier</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- End DataTales Example -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>



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


<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>