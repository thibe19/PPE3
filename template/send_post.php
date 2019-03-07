<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                             Post traitement                              ////
////                               13/12/2018                                 ////
////                                V0.0.3                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

session_start();
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');

if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
  $mdp=$_SESSION['mdp'];
  $ndc=$_SESSION['login'];
}

if (isset($_POST['post']) ) {
  $titre = $_POST['post_titre'];
  $desc = $_POST['post_desc'];

  if (($titre && $desc)!= NULL) {
    $sql="SELECT * FROM Utilisateur WHERE login_user = '$ndc'";
    $res = $conn -> query($sql)or die($conn -> errorInfo());
    $data = $res -> fetch();
    $id=$data['id_user'];

    $titre = $_POST['post_titre'];
    $desc = $_POST['post_desc'];
    $cat = $_POST['cat'];
    $date = date("Y-m-d");
    $heur = date("H:i:s");

    $chemin = dirname(__DIR__);
    $chemin = $chemin."/template/images/post/";

    $namepho = $_FILES['file']['name'];
    $logininf = $ndc;
    $photo2 = $_FILES['file']['tmp_name'];


    move_uploaded_file($photo2,$chemin.$namepho);
    rename ($chemin.$namepho, $chemin.$logininf.date("dmYHi").".jpg");

    $photo = $logininf.date("dmYHi").".jpg";

    $unpost = new Post ('',$titre,$desc,$photo,$date,$heur,$cat,$id);
    $unpost ->insert_post($conn);

    echo "<script> alert('Le Post a été crée.');
                    window.location.href='./index.php';
          </script>";
  }
  else {

    echo "<script> alert('Tous les champs n\'ont pas été remplis.');
                    window.location.href='./index.php';
          </script>";
  }


}

?>
