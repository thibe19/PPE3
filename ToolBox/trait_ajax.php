<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Ajax                                       ////
////                               20/12/2018                                 ////
////                               V0.0.3                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


header('Content-Type: application/json');
include 'bdd.inc.php';
include 'toolbox_inc.php';
require_once('../objet/classes.php');

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

    $suprprefsql = "DELETE FROM eleve_pref
    WHERE id_user='$id_user';";
    $ressuprsql = $conn->Query($suprprefsql) or die('Erreur suppresion pref');

    foreach ($pref as $p){
        $SQL = "INSERT INTO eleve_pref VALUES('$p','$id_user')";
        $req = $conn->Query($SQL)or die('Erreur insert pref eleve');
    }

}

//Traitement acceptation des demandes
if ($_GET['acceptedemande']) {
  $id_demande=$_GET['id_demande'];

  $sql="SELECT id_offre,id_user_Eleve FROM demande WHERE id_demande = '$id_demande' ";
  $res = $conn -> query($sql)or die($conn -> errorInfo());
  $data = $res -> fetch();
  $id_offre = $data['id_offre'];
  $id_user_eleve = $data['id_user_Eleve'];


  $uneoffre = new Emploi($id_offre,'','','','','','','','',$id_user_eleve,'','');

  if ($uneoffre->selectOEmploibyid($id_offre,$conn)) {
      $uneoffre->modifiUserEleveEmp($id_user_eleve,$id_offre,$conn);
  }
  else {
    $uneoffre = new Stage($id_offre,'','','','','','','','',$id_user_eleve,'','');
    $uneoffre->modifiUserEleveStage($id_user_eleve,$id_offre,$conn);
  }
}

if ($_GET['refuserdemande']) {
  $id_demande=$_GET['id_demande'];

  $sql="DELETE FROM demande WHERE id_demande = '$id_demande'";
  $res = $conn->Query($sql) or die();
}


if ($_GET['annuldemande']) {
  $id_demande=$_GET['id_demande'];

  $sql="DELETE FROM demande WHERE id_demande = '$id_demande'";
  $res = $conn->Query($sql) or die();
}
?>
