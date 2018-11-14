<?php

//date 14/11/2018

/////////////////// CREATION CLASS POUR INSCRIPTION

class Utilisateur {
  Private $SQL;	//déclaration des variables -- [  BDD  ]
	Private $conn;
	Private $req;
  /////////////
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

  Public function __construct($SQL="", $conn="", $req="", $id="", $nom="", $login="", $mdp="", $mdpc="", $email="", $numt="", $numa="", $rue="", $CP="",
  $ville="", $photo="", $prenom="", $choix="", $nomresp="", $code="", $site="", $amis="")	{  //Constructeur
    $this -> SQL = $SQL;
    $this -> conn = $conn;
    $this -> req = $req;
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

  Public function inscription($SQL, $conn, $req, $mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $prenom, $choix, $nomresp, $code, $site) {
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

  Public function modififier_entreprise($SQL, $conn, $req, $mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $nomresp, $code, $site, $id) {
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

  Public function modifier_eleve($SQL, $conn, $req, $mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $prenom, $choix, $id) {
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

  Public function ajouter_amis($SQL, $conn, $req, $id, $amis) {
    $requet="INSERT INTO ajoute-amis
             VALUES ('$id', '$amis');";
    $conn->Query($requet);
  }

}



/**
* Evenement
*/
class Evenement
{

  Private $id_event;
  Private $date_event;
  Private $desc_event;
  Private $lib_type_event;


  function __construct($id_event='',$date_event='',$desc_event='',$lib_type_event='' )
  {
    $this -> id_event = $id_event;
    $this -> date_event = $date_event;
    $this -> desc_event = $desc_event;
    $this -> lib_type_event = $lib_type_event;

  }
  ///////////////////////////////////////// Get ///////////////////////////////////////////
  public function getid_event()
  {
    return $this-> id_event;
  }
  public function getdate_event()
  {
    return $this-> date_event;
  }
  public function getdesc_event()
  {
    return $this-> desc_event;
  }
  public function getlib_type_event()
  {
    return $this-> lib_type_event;
  }
  //////////////////////////////////////////// SET  /////////////////////////////////////////////
  public function setid_event($id_event)
  {
    $this-> id_event = $id_event;
  }
  public function setdate_event($date_event)
  {
    $this-> date_event = $date_event;
  }
  public function setdesc_event($desc_event)
  {
    $this-> desc_event = $desc_event;
  }
  public function setlib_type_event($lib_type_event)
  {
    $this-> lib_type_event = $lib_type_event;
  }
  ///////////////////////////////////////////// Insert  ////////////////////////////////////////////
  public function insert_event($date_event,$desc_event ,$lib_type_event ,$conn )
  {
    $date_event = $this-> date_event;
    $desc_event = $this-> desc_event;
    $lib_type_event = $this-> lib_type_event;

    $SQL = "INSERT INTO Evenement VALUES('','$date_event','$desc_event','$lib_type_event')";
    $res = $conn->Query($SQL);

  }

  ///////////////////////////////////////////// Update  ////////////////////////////////////////////
  public function update_event($id_event ,$date_event ,$desc_event ,$lib_type_event ,$conn)
  {
    $id_event = $this-> id_event;
    $date_event = $this-> date_event;
    $desc_event = $this-> desc_event;
    $lib_type_event = $this-> lib_type_event;

    $SQL = "UPDATE Evenement SET date_event = '$date_event',
                                 desc_event = '$desc_eventsc',
                                 lib_type_event = '$lib_type_event'
                            WHERE id_event = $id_event";
    $res = $conn->Query($SQL);

  }

}




/**
* Post
*/
class Post
{
  Private $id_post;
  Private $titre_post;
  Private $contenu_post;
  Private $date_post;
  Private $heure_post;
  Private $id_cat; //categorie

  function __construct($id_post='',$titre_post='',$contenu_post='',$contenu_post='',$date_post='',$date_post='',$heure_post='',$id_cat='')
  {
    $this -> id_post = $id_post;
    $this -> titre_post = $titre_post;
    $this -> contenu_post = $contenu_post;
    $this -> date_post = $date_post;
    $this -> heure_post = $heure_post;
    $this -> id_cat = $id_cat;
  }

  ///////////////////////////////////////// Get ///////////////////////////////////////////
  public function getid_post()
  {
    return $this-> id_post;
  }
  public function gettitre_post()
  {
    return $this-> titre_post;
  }
  public function getcontenu_post()
  {
    return $this-> contenu_post;
  }
  public function getdate_post()
  {
    return $this-> date_post;
  }
  public function getheure_post()
  {
    return $this-> heure_post;
  }
  public function getid_cat()
  {
    return $this-> id_cat;
  }

  //////////////////////////////////////////// SET  /////////////////////////////////////////////
  public function setid_post($id_post)
  {
    $this-> id_post = $id_post;
  }
  public function settitre_post($titre_post)
  {
    $this-> titre_post = $titre_post;
  }
  public function setcontenu_post($contenu_post)
  {
    $this-> contenu_post = $contenu_post;
  }
  public function setdate_post($date_post)
  {
    $this-> date_post = $date_post;
  }
  public function setheure_post($heure_post)
  {
    $this-> heure_post = $heure_post;
  }
  public function setid_cat($id_cat)
  {
    $this-> id_cat = $id_cat;
  }

  ///////////////////////////////////////////// Insert  ////////////////////////////////////////////
  public function insert_post($titre_post ,$contenu_post ,$date_post ,$heure_post ,$id_cat ,$conn )
  {
    $titre_post = $this-> titre_post;
    $contenu_post = $this-> contenu_post;
    $date_post = $this-> date_post;
    $heure_post = $this-> heure_post;
    $id_cat = $this-> id_cat;


    $SQL = "INSERT INTO post VALUES('','$titre_post','$contenu_post','$date_post','$heure_post','$id_cat')";
    $res = $conn->Query($SQL);

  }

  ///////////////////////////////////////////// Update  ////////////////////////////////////////////
  public function update_post($id_post ,$titre_post ,$contenu_post ,$date_post ,$heure_post ,$id_cat ,$conn)
  {
    $id_post = $this-> id_post;
    $titre_post = $this-> titre_post;
    $contenu_post = $this-> contenu_post;
    $date_post = $this-> date_post;
    $heure_post = $this-> heure_post;
    $id_cat = $this-> id_cat;


    $SQL = "UPDATE post SET titre_post = '$titre_post',
                                  contenu_post = '$contenu_post',
                                  date_post = '$date_post'
                                  heure_post = '$heure_post'
                                  id_cat = '$id_cat'
                            WHERE id_post = $id_post";
    $res = $conn->Query($SQL);

  }

}

/**
 * Offre
 */
class Offre
{
  Private $id_offre;
  Private $lib_offre;
  Private $niveau_req;
  Private $date_debut_offre;
  /////Starge/////
  Private $Date_fin_stage;
  Private $note_stage;
  Private $desc_utilisateur_stage;
  ////Emploi/////
  Private $salaire_emploi;
  Private $desc_emploi;



  function __construct($id_offre='',$lib_offre='',$niveau_req='',$date_offre='',$Date_fin_stage='',$note_stage='',$desc_utilisateur_stage='',$salaire_emploi='',$desc_emploi='')
  {
    $this -> id_offre = $id_offre;
    $this -> lib_offre = $lib_offre;
    $this -> niveau_req = $niveau_req;
    $this -> date_debut_offre = $date_debut_offre;
    //Stage
    $this -> Date_fin_stage = $Date_fin_stage;
    $this -> note_user_stage = $note_stage;
    $this -> desc_user_stage = $desc_utilisateur_stage;
    //Emploi
    $this -> salaire_emp = $salaire_emp;
    $this -> desc_emp = $desc_emp;

  }

  ///////////////////////////////////////// Get ///////////////////////////////////////////
  public function getid_offre()
  {
    return $this-> id_offre;
  }
  public function getlib_offre()
  {
    return $this-> lib_offre;
  }
  public function getniveau_req()
  {
    return $this-> niveau_req;
  }
  public function getdate_debut_offre()
  {
    return $this-> date_debut_offre;
  }
  public function getDate_fin_stage()
  {
    return $this-> Date_fin_stage;
  }
  public function getnote_user_stage()
  {
    return $this-> note_user_stage;
  }
  public function getdesc_user_stage()
  {
    return $this-> desc_user_stage;
  }
  public function getsalaire_emp()
  {
    return $this-> salaire_emp;
  }
  public function getdesc_emp()
  {
    return $this-> desc_emp;
  }

  //////////////////////////////////////////// SET  /////////////////////////////////////////////
  public function setid_offre($id_offre)
  {
    $this-> id_offre = $id_offre;
  }
  public function setlib_offre($lib_offre)
  {
    $this-> lib_offre = $lib_offre;
  }
  public function setniveau_req($niveau_req)
  {
    $this-> niveau_req = $niveau_req;
  }
  public function setdate_debut_offre($date_debut_offre)
  {
    $this-> date_debut_offre = $date_debut_offre;
  }
  public function setDate_fin_stage($Date_fin_stage)
  {
    $this-> Date_fin_stage = $Date_fin_stage;
  }
  public function setnote_user_stage($note_stage)
  {
    $this-> note_stage = $note_stage;
  }
  public function setdesc_user_stage($desc_user_stage)
  {
    $this-> desc_user_stage = $desc_user_stage;
  }
  public function setsalaire_emp($salaire_emp)
  {
    $this-> salaire_emp = $salaire_emp;
  }
  public function setdesc_emp($desc_emp)
  {
    $this-> desc_emp = $desc_emp;
  }

  ///////////////////////////////////////////// Insert  ////////////////////////////////////////////
  public function insert_offre_stage($lib_offre ,$niveau_req ,$date_debut_offre ,$Date_fin_stage ,$note_stage,$desc_utilisateur_stage ,$conn )
  {
    $lib_offre = $this-> lib_offre;
    $niveau_req = $this-> niveau_req;
    $date_debut_offre = $this-> date_debut_offre;
    $Date_fin_stage = $this-> Date_fin_stage;
    $note_stage = $this-> note_stage;
    $desc_utilisateur_stage = $this-> desc_utilisateur_stage;


    $SQL = "INSERT INTO OStage VALUES('','$lib_offre','$niveau_req','$date_debut_offre','$Date_fin_stage')";     //A faire
    $res = $conn->Query($SQL);

  }

  public function insert_offre_emploi($lib_offre ,$niveau_req ,$date_debut_offre ,$salaire_emp ,$desc_emp ,$conn )
  {
    $lib_offre = $this-> lib_offre;
    $niveau_req = $this-> niveau_req;
    $date_debut_offre = $this-> date_debut_offre;
    $salaire_emp = $this-> salaire_emp;
    $desc_emp = $this-> desc_emp;


    $SQL = "INSERT INTO OEmploi VALUES('', ...)";     //A faire
    $res = $conn->Query($SQL);

  }
  ///////////////////////////////////////////// Update  ////////////////////////////////////////////
  public function update_offre($id_offre , $lib_offre ,$niveau_req ,$date_debut_offre ,$Date_fin_stage ,$note_stage,$desc_utilisateur_stage ,$salaire_emp ,$desc_emp ,$conn)
  {
    $id_offre = $this-> id_offre;
    $lib_offre = $this-> lib_offre;
    $niveau_req = $this-> niveau_req;
    $date_debut_offre = $this-> date_debut_offre;
    //Emploi
    $salaire_emp = $this-> salaire_emp;
    $desc_emp = $this-> desc_emp;
    //Stage
    $Date_fin_stage = $this-> Date_fin_stage;
    $note_stage = $this-> note_stage;
    $desc_utilisateur_stage = $this-> desc_utilisateur_stage;

    $SQL = "UPDATE offre SET ******
                            WHERE id_offre = $id_offre";
    $res = $conn->Query($SQL);

  }



}












 ?>
