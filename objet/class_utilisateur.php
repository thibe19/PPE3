<?php
/**
* Utilisateur   date modif : 14/11/2018  vertion:0.0.1
*/

/////////////////// CREATION CLASS POUR INSCRIPTION

class Utilisateur {

  Private $id_user; // déclaration des variables -- [  USER  ]
  Private $nom_user;
  Private $login_user;
  Private $mdp_user;
  Private $mdp_user_confirmation; // Confirmation du MOT DE PASSE
  Private $email_user;
  Private $num_tel_user;
  Private $num_addr;
  Private $rue_addr;
  Private $CP_addr;
  Private $ville_addr;
  Private $photo_user;
  /////////////
  Private $prenom_eleve; // déclaration des variables -- [  ELEVE  ]
  Private $choix_position;
  /////////////
  Private $nom_resp; // déclaration des variables -- [  ENTREPRISE  ]
  Private $cope_APE;
  Private $site_web;
  /////////////
  Private $id_amis; // déclaration des variables -- [  AMIS  ]

  Public function __construct( $id="", $nom="", $login="", $mdp="", $mdpc="", $email="", $numt="", $numa="", $rue="", $CP="",
  $ville="", $photo="", $prenom="", $choix="", $nomresp="", $code="", $site="", $amis="")	{  //Constructeur

    $this -> id_user = $id;
    $this -> nom_user = $nom;
    $this -> login_user = $login;
    $this -> mdp_user = $mdp;
    $this -> mdp_user_confirmation = $mdpc;
    $this -> email_user = $email;
    $this -> num_tel_user = $numt;
    $this -> num_addr = $numa;
    $this -> rue_addr = $rue;
    $this -> CP_addr = $CP;
    $this -> ville_addr = $ville;
    $this -> photo_user = $photo;
    // variables -- [  ELEVE  ]
    $this -> prenom_eleve = $prenom;
    $this -> choix_position = $choix;
    // variables -- [  ENTREPRISE  ]
    $this -> nom_resp = $nomresp;
    $this -> cope_APE = $code;
    $this -> site_web = $site;
    // variables -- [  AMIS  ]
    $this -> id_amis = $amis;
  }

  /////////////////// LES GETS /////////////////////
  /// .
  /// .
  /// .
  Public function get_mdp() {		//Récupère la valeur
		Return $this->mdp_user;
	}

  Public function get_mdpc() {		//Récupère la valeur
		Return $this->mdp_user_confirmation;
	}

  /////////////////// LES SETS /////////////////////
  /// .
  /// .
  /// .
  Public function set_mdp($mdp) {	//Modifie la valeur
		$this->mdp_user=$mdp;
	}

  Public function set_mdp($mdpc) {	//Modifie la valeur
		$this->mdp_user_confirmation=$mdpc;
	}


/////////////////////// insert inscription ////////////////////////////////////////
  Public function inscription($mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $prenom, $choix, $nomresp, $code, $site, $conn) {
    if ($mdp == $mdpc) {
      $requet="INSERT INTO Utilisateur
               VALUES (NULL, '$nom', '$login', '$mdp', '$email', '$numt', '$numa', '$rue', '$CP', '$ville','$photo');";
      $conn->Query($requet);
      $requet="INSERT INTO Eleve
               VALUES ('$prenom', '$choix');";
      $conn->Query($requet);
      $requet="INSERT INTO Entreprise
               VALUES ('$nomresp', '$code', '$site');";
      $conn->Query($requet);
      return "Vous êtes inscrit";
    }
    else {
      return "Les mots de passes ne correspondent pas.";
    }
  }
////////////////////////////// Update Entreprise /////////////////////////////
  Public function modififier_entreprise($mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $nomresp, $code, $site, $id, $conn) {
    $requet="UPDATE Utilisateur
						 SET nom_user = '$nom',
                 login_user = '$login',
                 mdp_user = '$mdp',
                 email_user = '$email',
                 tel_user = '$numt',
                 num_addr = '$numa',
                 rue_addr = '$rue',
                 CP_addr = '$CP',
                 ville_addr = '$ville',
                 photo_user = '$photo',
             WHERE id_user = '$id';";
    $req=$conn->Query($requet);

    $requet="UPDATE Entreprise
						 SET nom_resp = '$nomresp',
                 code_APE = '$code',
                 site_web = '$site'
             WHERE id_user = '$id';";
    $req=$conn->Query($requet);
  }

/////////////////// Update Eleve ////////////////////
  Public function modifier_eleve($mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $prenom, $choix, $id, $conn) {
    $requet="UPDATE Utilisateur
						 SET nom_user = '$nom',
                 login_user = '$login',
                 mdp_user = '$mdp',
                 email_user = '$email',
                 tel_user = '$numt',
                 num_addr = '$numa',
                 rue_addr = '$rue',
                 CP_addr = '$CP',
                 ville_addr = '$ville',
                 photo_user = '$photo',
                 prenom_eleve = '$prenom',lk!:
                 choix_position = '$choix'
             WHERE id_user = '$id';";
    $req=$conn->Query($requet);

    $requet="UPDATE Eleve
						 SET prenom_eleve = '$prenom',
                 choix_position = '$choix'
             WHERE id_user = '$id';";
    $req=$conn->Query($requet);
  }

///////////////////////// Insert Amis ///////////////////////////////////////////
  Public function ajouter_amis($id, $amis, $conn) {
    $requet="INSERT INTO ajoute_amis
             VALUES ('$id', '$amis');";
    $conn->Query($requet);
  }



}
 ?>
