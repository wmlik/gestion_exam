<?php
if (isset($_POST['save_user_btn'])) {
    session_start();
    include('includes/dbconn.php');
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
    $sql = "INSERT INTO etudiant(idEtd,idDep,idParcours,idNiveaux,nomEtd,prenomEtd,adresseMail,dateNaissance,tel,photoEtd,cin,mdp) values(". 0 . ",".$depar . ",". $parcour. "," . $niveaux . "," ."'" . $nom . "'" . "," . "'" . $prenom . "'" . "," . "'" . $email . "'" . "," . "'" . $date . "'" . "," . $tlf . "," . "'" . $image . "'" . "," .  $cin . "," . "'" . $mdp  . "'" . ")";
    $con->query($sql);
    header("Location: demande_envoyer.php");
    $_SESSION['ok'] = true;
} else {
    header("Location: index.php");
    exit(0);
}


?>