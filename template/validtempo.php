<?php
require('../ToolBox/bdd.inc.php');
$dsn = $_POST["domaine_about_sn"];
$ddsn = $_POST["date_about_debut_sn"];
$dfsn = $_POST["date_about_fin_sn"];
$psn = $_POST["place_about_sn"];
$descsn = $_POST["desc_about_sn"];
require('../objet/classes.php');
$uneentreprise= new Entreprise("", $psn, "", "", "", "", "", "", "",
                     "",  "",  "", "", "");
$uneentreprise->inscriptionent($uneentreprise,$conn);
//$unstage->insert_offre_stage("", $descsn, "", $ddsn, "");
 ?>
