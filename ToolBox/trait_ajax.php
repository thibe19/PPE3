<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/12/18
 * Time: 08:54
 */


header('Content-Type: application/json');
include 'bdd.inc.php';

if ($_GET['postule']){
    $offre = $_GET['id_offre'];
    $user = $_GET['id_user'];
    $ent = $_GET['id_ent'];

    $SQL = "INSERT INTO demande VALUES ('','$user','$ent','$offre')";
    $req = $conn->Query($SQL)or die('erreur demande offre');
}

if ($_GET['canceldemande']){
    $offre = $_GET['id_offre'];
    $user = $_GET['id_user'];
    $ent = $_GET['id_ent'];

    $SQL = "DELETE FROM demande 
            WHERE id_user_eleve='$user'
            AND id_user_entreprise='$ent'
            AND id_offre='$offre'";
    $req = $conn->Query($SQL)or die('erreur suppression demande offre');
}

if ($_GET['modifpref']){

    $id_user = $_GET['id_user'];
    $pref = json_decode($_GET['preferences']);

    foreach ($pref as $p){
        $SQL = "INSERT INTO eleve_pref VALUES('$p','$id_user')";
        $req = $conn->Query($SQL)or die('Erreur insert pref eleve');
    }

}
?>