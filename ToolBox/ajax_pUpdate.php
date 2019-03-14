<?php
session_start();
 require('bdd.inc.php');
 require('toolbox_inc.php');
 require('../objet/classes.php');

$unpost = new Post();
$param = array(
  "FiltreWhere" => "id_post=".$_GET['q']
);
$data = $unpost->getAll($param,$conn)[0];



if (isset($_SESSION['Eleve']) ) {
  $uneleve = unserialize($_SESSION['Eleve']);
  $id_user_eleve = $uneleve->getIdUser();
}

if (isset($_SESSION['Entreprise']) ) {
  $uneleve = unserialize($_SESSION['Entreprise']);
  $id_user_eleve = $uneleve->getIdUser();
}

$unuser = new Utilisateur();
$param = array (
  'FiltreWhere' => "id_user=".$data->id_user
);
$dataU = $unuser->getAll($param,$conn)[0];

$unecat = new Categorie();
$dataC = $unecat->getAll(array(),$conn);


$html = "";
$html = $html.'<div class="post_content">
  <div class="post_img" style="min-height:50px ">
    <img width="600px" height="323px" src="images/post/'.testphoto($data->photo_post).'" alt="">
    <span height="100px"><i class="ion-android-radio-button-off"></i>

  </div>
  <div class="row author_area">
    <div class="col s4 author">
      <a href="about.php?visit='.dec_enc('encrypt',$id_user_eleve).'">
        <div class="col s4 media_left"><img height="53px" width="53px"
                                            src="images/profil/'.testphoto($dataU->photo_user).'"
                                            alt="profil picture"
                                            class="circle">
        </div>
      </a>

      <div class="col s8 media_body" style="padding-left: 10px;">

        <a href="#">'.$dataU->nom_user.'</a>
        <span>'.$data->date_post.'<br>'.$data->heure_post.'</span>
      </div>
    </div>
    <div class="col s4 btn_floating">

    </div>

  </div>

  <a class="post_heding"><input type="text" name="UTitrePost" value="'.$data->titre_post.'"></a>

  <p><input type="text" name="UDescPost" value="'.urldecode($data->contenu_post).'"></p>

  <center>
    <button type="submit" onclick="UpdatePostVal('.$_GET['q'].')" class="btn btn-primary btn-block mt-5" name="button">Valider</button>
  </center>
</div>';

print $html;
?>
