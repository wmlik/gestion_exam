<?php
$e = "disabled";
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
    $e = "";
}
include('includes/header.php');
include('includes/dbconn.php');
$table_departement = $con->query('SELECT * FROM departement ');
$table_dparcours = $con->query('SELECT * FROM parcours ');
$table_niveau = $con->query('SELECT * FROM niveau ');
?>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <img src="img/insc.jpg" alt="" class="col-lg-5 d-none d-lg-block">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nouveau Utilisateur</h1>
                            </div>
                            <form class="user" action="inscrit_form.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <?php
                                        if (isset($_POST['upload'])) {
                                            echo "<div id='img_div'>";
                                            echo "<img src='img/dbimage/" . $image . "' height='100' >";
                                            echo "</div>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <input type="file" name="image" class="form-control " required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button type=" submit" name="upload" class="btn btn-primary btn-sm" required>upload</button>
                                </div>
                            </form>
                            <hr>
                            <form class=" user" action="inscrit_code.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nom" name="nom" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Prenom" name="prenom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" onChange="onChange()" placeholder="Mot de passe" name="mdp" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" onChange="onChange()" placeholder=" Confirmer Mot de passe" required>
                                        <span id='message'></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" name="date" min="1970-01-01" max="2004-12-31" class="form-control form-control-user" name="date" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" name="tlf" required class="form-control form-control-user" placeholder="numéro de téléphone" name="tlf" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" placeholder="Num Cin" name="cin" required>
                                    </div>
                                    <select name="depar" id="" class="col-sm-6 " id="exampleFirstName" required>
                                        <option value="">sélectionner le departement</option>
                                        <?php
                                        while ($donnees = $table_departement->fetch()) {
                                        ?>
                                            <option value="<?php echo $donnees['idDep']; ?>"><?php echo $donnees['nomDep']; ?></option>
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
                                            <option value="<?php echo $donnees['idParcours']; ?>"><?php echo $donnees['nomParcours']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="niveaux" id="" class="col-sm-6 " required>
                                        <option value="">sélectionner le Niveaux</option>
                                        <?php
                                        while ($donnees = $table_niveau->fetch()) {
                                        ?>
                                            <option value="<?php echo $donnees['idNiveaux']; ?>"><?php echo $donnees['nomNiveaux']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <hr>
                                <?php if (isset($_POST['upload'])) { ?>
                                    <input type="hidden" name="image_name" value="<?php echo $image ?>" required>
                                <?php } ?>
                                <button <?php echo $e ?> type="submit" name="save_user_btn" class="btn btn-primary btn-user btn-block">Enregistrer</button>
                                <hr>
                        </div>
                        </form>
                        <div class="text-center">
                            <a class="small" href="index.php">Vous avez déjà un compte? Connexion!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=confirm]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Les mots de passe ne correspondent pas');
            }
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>