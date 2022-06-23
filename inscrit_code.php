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
    $table_etud = $con->query("SELECT * FROM etudiant ");
    while ($donnees = $table_etud->fetch()) {
        if ($donnees['adresseMail'] == $email) {
            $_SESSION['existLogin'] = "email déja utilisé ";
            if ($donnees['cin'] == $cin) {
                $_SESSION['existLogin'] = "email déja utilisé ,  cin déja utilisé ";
            }
            break;
        }
        if ($donnees['cin'] == $cin) {
            $_SESSION['existLogin'] = "cin déja utilisé";
            break;
        }
    }
    if (isset($_SESSION['existLogin'])) {
        header("Location: inscrit_form.php");
    } else {
        $sql = "INSERT INTO etudiant(idEtd,idDep,idParcours,idNiveaux,nomEtd,prenomEtd,adresseMail,dateNaissance,tel,photoEtd,cin,mdp) values(" . 0 . "," . $depar . "," . $parcour . "," . $niveaux . "," . "'" . $nom . "'" . "," . "'" . $prenom . "'" . "," . "'" . $email . "'" . "," . "'" . $date . "'" . "," . $tlf . "," . "'" . $image . "'" . "," .  $cin . "," . "'" . $mdp  . "'" . ")";
        $con->query($sql);
        $_SESSION['ok'] = true;
        header("Location: demande_envoyer.php");
    }
} else {
    header("Location: index.php");
    exit(0);
}
