<?php

include 'bdd.inc.php';

/******************
/ 1.DATA BASES
/******************/
  function browse_data_base($tbname){
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");

    return $res;
  }

  function browse_by_id($tbname,$columid,$id){
    $SQL = "SELECT * FROM $tbname WHERE $columid=$id";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");
    $res = $res->fetchAll();
    return $res;
  }

  function display_data_base($tbname){
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    print "<pre>";
    print_r($arrayRes);
    print"</pre>";
  }

  function data_base_in_array($tbname){
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL)or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    return $arrayRes;
  }

  /***************REcuperation ID user (uniquement pour le PPE3 **********/
  function getIDBDD($login,$mdp,$email,$conn){
    $SQL = "SELECT id_user,mdp_user FROM Utilisateur
            WHERE login_user = '$login'
            AND email_user = '$email'";
    $req = $conn->Query($SQL)or die('Erreur');
    $req = reqtoobj($req);
    if($req){
      foreach ($req as $r){
        $t_pass = password_verify($mdp,$r->mdp_user);

          if($t_pass){
            return $r->id_user;
          }
      }
    }
    else{
      return 0;
    }
  }

  /*********************** Fetch en objet ******************/
  function reqtoobj($req){
      $req = $req->fetchAll(PDO::FETCH_OBJ);
      return $req;
  }
?>
