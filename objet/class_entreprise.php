<?php
/**
 * Entreprise date modif : 14/11/2018  vertion:0.0.1
 */
class Entreprise extends Utilisateur
{

  Private $nom_resp; // déclaration des variables -- [  ENTREPRISE  ]
  Private $cope_APE;
  Private $site_web;

  function __construct($nomresp="", $code="", $site="",)
  {
    $this -> nom_resp = $nomresp;
    $this -> cope_APE = $code;
    $this -> site_web = $site;
  }
}




 ?>
