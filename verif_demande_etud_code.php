<?php
session_start();
include('includes/verif_login.php');
include('includes/dbconn.php');
if (isset($_POST['accepter'])) {
    $idetd =    $_POST['idetd'];
    $prenom =  $_POST['prenom'];
    $nom =  $_POST['nom'];
    $email =  $_POST['email'];
    $mdp =  $_POST['mdp'];
    $login = $nom . $prenom;
    $sql = "update etudiant  set statu='accepter' where idEtd = " . $idetd;
    $con->query($sql);
    $sql2 = "INSERT INTO compteuser(idUser,idEtd,login,	email,password,role) 
    values
    (" . 0 . "," . $idetd . ","  . "'" . $login . "'" . "," . "'" . $email . "'" . "," . "'" . $mdp . "'" . "," .  "'etudiant'" . ")";
    $con->query($sql2);
    header("Location: dashboardadmin.php");
}
if (isset($_POST['modifier'])) {
    $idetd =    $_POST['idetd'];
    $prenom =  $_POST['prenom'];
    $nom =  $_POST['nom'];
    $email =  $_POST['email'];
    $mdp =  $_POST['mdp'];
    $date =  $_POST['date'];
    $tlf =  $_POST['tlf'];
    $cin =  $_POST['cin'];
    $depar =  $_POST['depar'];
    $parcour =  $_POST['parcour'];
    $niveaux =  $_POST['niveaux'];
    $image =   $_POST['image_name'];
    $login = $nom . $prenom;
    $sql = "update etudiant  set statu='accepter',idDep=" . $depar . ",idParcours=" . $parcour . ",idNiveaux=" . $niveaux . ",prenomEtd='" . $prenom . "',adresseMail='" . $email . "',dateNaissance='" . $date . "',tel=" . $tlf . ",photoEtd='" . $image . "',cin=" . $cin . ",mdp='" . $mdp . "',nomEtd='" . $nom . "' where idEtd = " . $idetd;
    $con->query($sql);
    $sql2 = "INSERT INTO compteuser(idUser,idEtd,login,	email,password,role) 
    values
    (" . 0 . "," . $idetd . ","  . "'" . $login . "'" . "," . "'" . $email . "'" . "," . "'" . $mdp . "'" . "," .  "'etudiant'" . ")";
    $con->query($sql2);
    header("Location: dashboardadmin.php");
}
if (isset($_POST['refuser'])) {
    $idetd =    $_POST['idetd'];
    $email =  $_POST['email'];
    $sql = "update etudiant  set statu='refuser' where idEtd = " . $idetd;
    $con->query($sql);
    $sql2 = "delete FROM compteuser where email  ='$email'";
    $con->query($sql2);
    header("Location: dashboardadmin.php");
}
if (isset($_POST['attente'])) {
    $idetd =    $_POST['idetd'];
    $email =  $_POST['email'];
    $sql = "update etudiant  set statu='en cours de traitement' where idEtd = " . $idetd;
    $con->query($sql);
    $sql2 = "delete FROM compteuser where email ='$email'";
    $con->query($sql2);
    header("Location: dashboardadmin.php");
}
