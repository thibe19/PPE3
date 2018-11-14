<?php
/**
 * Eleve   date modif : 14/11/2018  vertion:0.0.1
 */
class Eleve extends Utilisateur
{

  Private $prenom_eleve; // déclaration des variables -- [  ELEVE  ]
  Private $choix_position;
  /////////////////////
  Private $id_amis; // déclaration des variables -- [  AMIS  ]

  function __construct($amis="",$prenom="" ,$choix="" ,$conn)
  {
    $this -> prenom_eleve = $prenom;
    $this -> choix_position = $choix;

    // variables -- [  AMIS  ]
    $this -> id_amis = $amis;
  }


}

 ?>
