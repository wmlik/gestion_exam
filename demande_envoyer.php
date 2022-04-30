<?php
include('includes/header.php');
if ($_SESSION['ok'] == true) {
?>

    <body>
        <hr>
        <hr>
        <div style="text-align:center">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h2>
                        emande envoyé avec succès, vérifiez votre boîte aux lettres pour validation
                    </h2>
                </div>
            </div>
        </div>
        <hr>
        <hr>
        <div class="text-center">
            <a class="btn btn-primary btn-user btn-block" href="index.php">
                <h3>Vous avez déjà un compte? Connexion!</h3>
            </a>
        </div>
    </body>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<?php
} else {
    header("Location: index.php");
    exit(0);
}
?>