<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=gestion_examen;charset=utf8', 'root', '');
} catch (Exception $e) {
    header("Location: ../errors/dberror.php");
    die('Erreur : ' . $e->getMessage());
}
