<?php
include('includes/header.php');
include('includes/dbconn.php');
if (isset($_POST['verifier'])) {
    $_SESSION['idEtd'] = $_POST['idEtd'];
    $id_etd_deamnd = $_POST['idEtd'];
} else {
    $id_etd_deamnd = $_SESSION['idEtd'];
}
$table_etud_demand = $con->query('SELECT * FROM etudiant where idEtd = ' . $id_etd_deamnd);
while ($donnee = $table_etud_demand->fetch()) {
    $nom = $donnee["nomEtd"];
    $prenom = $donnee["prenomEtd"];
    $email = $donnee["adresseMail"];
    $dateNaissance = $donnee["dateNaissance"];
    $tel = $donnee["tel"];
    $image = $donnee["photoEtd"];
    $cin = $donnee["cin"];
    $idDep_etud = $donnee["idDep"];
    $idParcours_etud = $donnee["idParcours"];
    $idNiveaux_etud = $donnee["idNiveaux"];
    $mdp = $donnee["mdp"];
}
if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // image file directory
    $target = "img/dbimage/" . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}
$table_departement = $con->query('SELECT * FROM departement ');
$table_dparcours = $con->query('SELECT * FROM parcours ');
$table_niveau = $con->query('SELECT * FROM niveau ');


?>
<!DOCTYPE html>
<html lang="en">

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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <?php
                    include('includes/top_bar_admin.php');
                    ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <form class="user" action="verif_demande_etud.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="size" value="1000000">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <?php
                                // if (isset($_POST['upload'])) {
                                echo "<div id='img_div'>";
                                echo "<img src='img/dbimage/" . $image . "' height='100' >";
                                echo "</div>";
                                // }
                                ?>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input type="file" name="image" class="form-control " required value="<?php echo $image ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <button type=" submit" name="upload" class="btn btn-primary btn-sm" required>upload</button>
                        </div>
                    </form>

                    <hr>
                    <form class=" user" action="verif_demande_etud_code.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nom" name="nom" required value="<?php echo $nom ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Prenom" name="prenom" required value="<?php echo $prenom ?>">
                            </div>
                        </div>
                        <div class=" form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email" required value="<?php echo $email ?>">
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" onChange="onChange()" placeholder="Mot de passe" name="mdp" required value="<?php echo $mdp ?>">
                            </div>
                            <div class=" col-sm-6">
                                <input type="password" class="form-control form-control-user" onChange="onChange()" placeholder=" Confirmer Mot de passe" required value="<?php echo $mdp ?>">
                                <span id='message'></span>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" name="date" min="1970-01-01" max="2004-12-31" class="form-control form-control-user" name="date" required value="<?php echo $dateNaissance ?>">
                            </div>
                            <div class=" col-sm-6">
                                <input type="number" name="tlf" required class="form-control form-control-user" placeholder="numéro de téléphone" name="tlf" required value="<?php echo $tel ?>">
                            </div>
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user" placeholder="Num Cin" name="cin" required value="<?php echo $cin ?>">
                            </div>
                            <select name="depar" id="" class="col-sm-6 " id="exampleFirstName" required>
                                <option value="">sélectionner le departement</option>
                                <?php
                                while ($donnees = $table_departement->fetch()) {
                                ?>
                                    <option value="<?php echo $donnees['idDep']; ?>" <?php if ($donnees['idDep'] == $idDep_etud)  echo "selected"; ?>><?php echo $donnees['nomDep']; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group row">
                            <select name="parcour" id="" class="col-sm-6 mb-3 mb-sm-0" required>
                                <option value="">sélectionner le parcour</option>
                                <?php
                                while ($donnees = $table_dparcours->fetch()) {
                                ?>
                                    <option value="<?php echo $donnees['idParcours']; ?>" <?php if ($donnees['idParcours'] == $idParcours_etud)  echo "selected"; ?>><?php echo $donnees['nomParcours']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="niveaux" id="" class="col-sm-6 " required>
                                <option value="">sélectionner le Niveaux</option>
                                <?php
                                while ($donnees = $table_niveau->fetch()) {
                                ?>
                                    <option value="<?php echo $donnees['idNiveaux']; ?>" <?php if ($donnees['idNiveaux'] == $idNiveaux_etud)  echo "selected"; ?>><?php echo $donnees['nomNiveaux']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="image_name" value="<?php echo $image ?>" required>
                        <input type="hidden" name="idetd" value="<?php echo $id_etd_deamnd ?>" required>
                        <hr>
                        <button type="submit" name="accepter" class="btn btn-primary btn-user btn-block">Accepter</button>
                        <hr>
                        <button type="submit" name="modifier" class="btn btn-facebook btn-user btn-block">Modifier & Accepter</button>
                        <hr>
                        <button type="submit" name="attente" class="btn btn-facebook btn-user btn-block">mettre en attente</button>
                        <hr>
                        <button type="submit" name="refuser" class="btn btn-google btn-user btn-block">Refuser</button>
                        <hr>

                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>