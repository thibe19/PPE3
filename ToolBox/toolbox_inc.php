<?php

/******************
/ 1.DATA BASES
/******************/
  function browse_data_base($tbname){
    include 'bdd.inc.php';
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");

    return $res;
  }

  function browse_by_id($tbname,$columid,$id){
    include 'bdd.inc.php';
    $SQL = "SELECT * FROM $tbname WHERE $columid=$id";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");
    $res = $res->fetchAll();
    return $res;
  }

  function display_data_base($tbname){
    include 'bdd.inc.php';
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    print "<pre>";
    print_r($arrayRes);
    print"</pre>";
  }

  function data_base_in_array($tbname){
    include 'bdd.inc.php';
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    return $arrayRes;
  }

  /***************REcuperation ID user (uniquement pour le PPE3 **********/
  /*function getIDBDD($login,$mdp,$email){
    $SQL = "SELECT id_user,mdp_user FROM Utilisateur
            WHERE login_user = '$login'
            AND email_user = $email";

  }*/

  /*********************** Fetch en objet ******************/
  function reqtoobj($req){
      $req = $req->fetchAll(PDO::FETCH_OBJ);
      return $req;
  }
?>
