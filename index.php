<?php
include('includes/header.php');
include('includes/dbconn.php');
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div><img src="img/login.jpg" alt="" width=430 height=570></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center" action="logincode.php" method="POST">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue</h1>
                                    </div>
                                    <form class="user" action="logincode.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Login">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                            </div>
                                        </div>
                                        <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">Se connecter</button>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="inscrit_form.php">Créer un compte</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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