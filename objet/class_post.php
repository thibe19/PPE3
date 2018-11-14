<?php
/**
* Post  date modif : 14/11/2018   vertion:0.0.1
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

 ?>
