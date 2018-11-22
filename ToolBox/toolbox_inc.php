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


  /***********************Encryptage *************************/
function dec_enc($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}


/*
 *
 * Mail password
 *
 */
function mail_reset_mdp($mail){
    $mail = $mail;
    $objet = "Mot de passe compte : ViaBahuet.";
    $entete = "From: yannther99@gmail.com";

    $SQL="SELECT * FROM utilisateur
                  WHERE email_user='$mail';";
    $Req=$conn->Query($SQL);
    $result=$Req->fetch();

    $text = "Bonjour ".$result['nom_user']."\n";
    $text = $text."Pour changer votre mot de passe utiliser le lien ci-dessous : \n";
    $text = $text."http://localhost/PPE3/login_page/pass_reset.php?id=".urlencode($result['id_user'])."\n\n\n";
    $text = $text."Ceci est un mail automatique, merci de ne pas y répondre.";

    mail($mail, $objet, $text, $entete);
}

function mail_forgot_login($mail){
    $mail = $mail;
    $objet = "Login compte : ViaBahuet.";
    $entete = "From: yannther99@gmail.com";

    $SQL="SELECT * FROM utilisateur
                  WHERE email_user='$mail';";
    $Req=$conn->Query($SQL);
    $result=$Req->fetch();

    $text = "Bonjour ".$result['nom_user']."\n";
    $text = $text."Votre login est : \n";
    $text = $text.$result['login_user']."\n\n\n";
    $text = $text."Ceci est un mail automatique, merci de ne pas y répondre.";

    mail($mail, $objet, $text, $entete);
}
?>
