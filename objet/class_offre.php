<?php
/**
 * Offre  date modif : 14/11/2018   vertion:0.0.1
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
