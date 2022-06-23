<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "gestion_examen";
try {
    $con = mysqli_connect("$host", "$username", "$password", "$database");
} catch (Exception $e) {
    header("Location: ../errors/dberror.php");
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $verifloginquery = "SELECT * from compteuser WHERE email='$email' and password='$password' LIMIT 1";
    $veriflogin_run = mysqli_query($con, $verifloginquery);
    if (mysqli_num_rows($veriflogin_run) > 0) {
        foreach ($veriflogin_run as $data) {
            $user_id = $data['idUser'];
            $user_login = $data['login'];
            $user_email = $data['email'];
            $user_role = $data['role'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_role"; // 0=admin; 1=etudiant
        $_SESSION['auth_user'] = [
            'idUser' => $user_id,
            'user_login' => $user_login,
            'user_email' => $user_email,
        ];
        if ($user_role == "admin") // admin or etudiant
        {
            $_SESSION['message'] = "Bienvenu " . $user_login;
            header("Location: dashboardadmin.php");
            exit(0);
        } elseif ($user_role == "etudiant") {
            $_SESSION['message'] = "Bienvenu " . $user_login;
            header("Location: dashboardetud.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Paramètre d'accès incorrecte ";
        header("Location: index.php");
        exit(0);
    }
} else {
    $_SESSION['message'] = "Accès interdit ";
    header("Location: index.php");
    exit(0);
}
