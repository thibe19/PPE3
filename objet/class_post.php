<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Post class                                 ////
////                               13/12/2018                                 ////
////                               V0.0.4                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

class Post
{
  Private $id_post;
  Private $titre_post;
  Private $contenu_post;
  Private $photo_post;
  Private $date_post;
  Private $heure_post;
  Private $id_cat; //categorie
  Private $id_user;

  function __construct($id_post='',$titre_post='',$contenu_post='',$photo_post='',$date_post='',$heure_post='',$id_cat='', $id_user='')
  {
    $this->id_post = $id_post;
    $this->titre_post = $titre_post;
    $this->contenu_post = $contenu_post;
    $this->photo_post = $photo_post;
    $this->date_post = $date_post;
    $this->heure_post = $heure_post;
    $this->id_cat = $id_cat;
    $this->id_user = $id_user;
  }

  ///////////////////////////////////////// Get ///////////////////////////////////////////

Public function getAllpost(){
  $data = $this->id_post.' ';
  $data = $data.$this->titre_post.' ';
  $data = $data.$this->contenu_post.' ';
  $data = $data.$this->photo_post.' ';
  $data = $data.$this->date_post.' ';
  $data = $data.$this->heure_post.' ';
  $data = $data.$this->id_cat.' ';
  $data = $data.$this->id_user.' ';

  return $data;
}


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
  public function getphoto_post()
  {
    return $this-> photo_post;
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
  public function getid_user()
  {
    return $this-> id_user;
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
  public function setphoto_post($photo_post)
  {
    $this-> photo_post = $photo_post;
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
  public function setid_user($id_user)
  {
    $this-> id_user = $id_user;
  }




  //////////////////////////////////////////////////////////////////////////////////
  ////                                                                          ////
  ////                                                                          ////
  ////                                Insert                                    ////
  ////                                                                          ////
  ////                                                                          ////
  //////////////////////////////////////////////////////////////////////////////////
  public function insert_post($conn)
  {
    $titre_post = $this->titre_post;
    $contenu_post = urlencode($this->contenu_post);
    $photo = $this->photo_post;
    $date_post = $this->date_post;
    $heure_post = $this->heure_post;
    $id_cat = $this->id_cat;
    $id_user = $this->id_user;


    $SQL = "INSERT INTO Post VALUES(NULL,'$titre_post','$contenu_post','$photo','$date_post','$heure_post','$id_cat','$id_user')";
    $res = $conn->Query($SQL);

  }


  //////////////////////////////////////////////////////////////////////////////////
  ////                                                                          ////
  ////                                                                          ////
  ////                                MODIFIER                                  ////
  ////                                                                          ////
  ////                                                                          ////
  //////////////////////////////////////////////////////////////////////////////////
  public function update_post($conn)
  {
    $id_post = $this->id_post;
    $titre_post = $this->titre_post;
    $photo = $this->photo_post;
    $contenu_post = urlencode($this->contenu_post);
    $date_post = $this->date_post;
    $heure_post = $this->heure_post;
    $id_cat = $this->id_cat;


    $SQL = "UPDATE Post SET titre_post = '$titre_post',
                                  contenu_post = '$contenu_post',
                                  photo_post = '$photo_post',
                                  date_post = '$date_post'
                                  heure_post = '$heure_post'
                                  id_cat = '$id_cat'
                            WHERE id_post = $id_post";
    $res = $conn->Query($SQL);

  }

  function selectpostorderby($conn){
      $sqlP="SELECT * FROM Post ORDER BY date_post DESC";
      $resP = $conn -> query($sqlP)or die($conn -> errorInfo());

      return $resP;
  }
}

 ?>
