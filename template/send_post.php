<?php
/*
*  22/11/18
*  post traitement
*  v0.0.1
*/
session_start();

if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
  $mdp=$_SESSION['mdp'];
  $ndc=$_SESSION['login'];
}

require('../ToolBox/bdd.inc.php');

if (isset($_POST['post'])) {

  $sql="SELECT * FROM Utilisateur WHERE login_user = '$ndc'";
  $res = $conn -> query($sql)or die($conn -> errorInfo());
  $data = $res -> fetch();
  $id=$data['id_user'];

  $titre = $_POST['post_titre'];
  $desc = $_POST['post_desc'];
  $photo= '123456';
  $cat = $_POST['cat'];
  $date = date("Y-m-d");
  $heur = date("H:i:s");

  $sqlI="INSERT INTO Post VALUES (NULL,'$titre','$desc','$photo','$date','$heur','$cat','$id') ";
  $resI = $conn->Query($sqlI)or die('Erreur modification user');

  echo "<script> alert('Le Post a été crée.');
                  window.location.href='./index-2.php';
        </script>";

}

?>
