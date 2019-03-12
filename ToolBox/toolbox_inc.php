<?php
//a
include 'bdd.inc.php';

/******************
 * / 1.DATA BASES
 * /******************/
function browse_data_base($tbname,$conn)
{
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL) or die("La requete n'a pas aboutie");

    return $res;
}

function browse_by_id($tbname, $columid, $id,$conn)
{
    $SQL = "SELECT * FROM $tbname WHERE $columid=$id";
    $res = $conn->Query($SQL) or die("La requete n'a pas aboutie");
    $res = $res->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function display_data_base($tbname,$conn)
{
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL) or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    print "<pre>";
    print_r($arrayRes);
    print"</pre>";
}

function data_base_in_array($tbname,$conn)
{
    $SQL = "SELECT * FROM $tbname";
    $res = $conn->Query($SQL) or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    return $arrayRes;
}

function data_base_in_array_desc($tbname,$coltrie,$conn)
{
    $SQL = "SELECT * FROM $tbname ORDER BY $coltrie DESC";
    $res = $conn->Query($SQL) or die("La requete n'a pas aboutie");
    $arrayRes = $res->fetchAll();
    return $arrayRes;
}

function data_base_in_object($tbname, $conn)
{
    $SQL = "SELECT * FROM $tbname";
    $req = $conn->Query($SQL) or die("La requete n'a pas aboutie");
    $req = $req->fetchAll(PDO::FETCH_OBJ);
    return $req; //ok
}


/*
 * !!!!! Uniquement pour le PPE3 !!!!!
 */


/***************REcuperation ID user (uniquement pour le PPE3 **********/
function getIDBDD($login, $mdp, $email, $conn)
{
    $SQL = "SELECT id_user,mdp_user FROM Utilisateur
            WHERE login_user = '$login'
            AND email_user = '$email'";
    $req = reqtoobj($SQL,$conn);
    if ($req) {
        foreach ($req as $r) {
            $t_pass = password_verify($mdp, $r->mdp_user);

            if ($t_pass) {
                return $r->id_user;
            }
        }
    } else {
        return 0;
    }
}



/********* Recupéré un utilisateur grace a son id ******/


function getnomuser($id,$conn)
{
    $SQL = "SELECT nom_user FROM Utilisateur
            WHERE id_user='$id'";
    $req = $conn->Query($SQL) or die ('Erreur selection utilisateur');
    $res = $req->fetch();

    return $res['nom_user'];
}






//recuperation de la categorie en fonction de l'id
function getnomcategorie($id,$conn)
{
    $SQL = "SELECT lib_cat FROM Categorie
            WHERE id_cat='$id'";
    $req = $conn->Query($SQL) or die ('Erreur selection utilisateur');
    $res = $req->fetch();

    return $res['lib_cat'];
}



//REcupération du nom utilisateur d'une entreprise
function getnoment($id,$conn)
{
    $SQL = "SELECT nom_user FROM Utilisateur U,Entreprise E
            WHERE  E.id_user=U.id_user
            AND U.id_user='$id'";
    $req = $conn->Query($SQL) or die ($SQL.'Erreur selection entreprise');
    $res = $req->fetch();

    return $res['nom_user'];
}


//Recupération des données d'un stage a partir d'une offre
function getoffrestagebdd($id,$conn)
{
    $SQL = "SELECT OS.* FROM OStage OS,Offre O
            WHERE  O.id_offre=OS.id_offre
            AND O.id_offre='$id'";

    return reqtoobj($SQL,$conn);
}


//Recupération des données d'un emploi a partir d'une offre
function getoffreempbdd($id,$conn)
{
    $SQL = "SELECT OE.* FROM OEmploi OE,Offre O
            WHERE  O.id_offre=OE.id_offre
            AND O.id_offre='$id'";

    return reqtoobj($SQL,$conn);
}



/*********************** Fetch en objet ******************/
function reqtoobj($SQL,$conn)
{
    $req = $conn->Query($SQL) or die('Erreur');
    $req = $req->fetchAll(PDO::FETCH_OBJ);
    return $req;
}


/***********************Encryptage *************************/
function dec_enc($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}



/* Affichage en beauté du var_dump*/
function affiche_vardump($affiche){

    print '<pre>';
    var_dump($affiche);
    print '<pre>';
}



/*
 *
 * Mail password
 *
 */
function mail_reset_mdp($mail, $conn)
{
    $mail = $mail;
    $objet = "Mot de passe compte : ViaBahuet.";
    $entete = "From: yannther99@gmail.com";

    $SQL = "SELECT * FROM Utilisateur
                  WHERE email_user='$mail';";
    $Req = $conn->Query($SQL);
    $result = $Req->fetch();

    $text = "Bonjour " . $result['nom_user'] . "\n";
    $text = $text . "Pour changer votre mot de passe utiliser le lien ci-dessous : \n";
    $text = $text . "http://localhost/PPE3/login_page/pass_reset.php?id=" . urlencode(dec_enc('encrypt',$result['id_user'])) . "\n\n\n";
    $text = $text . "Ceci est un mail automatique, merci de ne pas y répondre.";

    mail($mail, $objet, $text, $entete);
}

function mail_forgot_login($mail, $conn)
{
    $mail = $mail;
    $objet = "Login compte : ViaBahuet.";
    $entete = "From: yannther99@gmail.com";

    $SQL = "SELECT * FROM Utilisateur
                  WHERE email_user='$mail';";
    $Req = $conn->Query($SQL);
    $result = $Req->fetch();

    $text = "Bonjour " . $result['nom_user'] . "\n";
    $text = $text . "Votre login est : \n";
    $text = $text . $result['login_user'] . "\n\n\n";
    $text = $text . "Ceci est un mail automatique, merci de ne pas y répondre.";

    mail($mail, $objet, $text, $entete);
}

function mail_accept($id_user, $id_ent, $conn) {

  $SQL = "SELECT * FROM Utilisateur
          WHERE id_user=$id_user;";
  $Req = $conn->Query($SQL);
  $result = $Req->fetch();

  $mail = $result['email_user'];
  $objet = "Demande stage.";
  $entete = "From: yannther99@gmail.com";

  $SQL2 = "SELECT * FROM Entreprise
          WHERE id_user=$id_ent;";
  $Req2 = $conn->Query($SQL2);
  $result2 = $Req2->fetch();

  $text = "Bonjour\n";
  $text = $text."Nous vous informons que votre demande chez".$result2['nom_user']."a été accepté votre demande de stage.\n";
  $text = $text."Pour plus d'informations utiliser leur adresse mail : ".$result2['email.user']." \n\n\n";
  $text = $text . "Ceci est un mail automatique, merci de ne pas y répondre.\n";

  mail($mail, $objet, $text, $entete);
}

function testsql($sql, $conn)
{
    $req = $conn->Query($sql) or die("Erreur requete");
    $req = $req->fetchAll();
    return $req;
}


function testsqlfetch($sql, $conn)
{
    $req = $conn->Query($sql) or die("Erreur requete");
    $req = $req->fetch();
    return $req;
}

/*
 *
 * Ajout images
 *
 */

 function image_profil($namepho, $login, $photo2)  // Nom de la photo - login pour rename la photo - Nom photo en ram
 {

   $chemin = dirname(__DIR__);
   $chemin = $chemin."/template/images/profil/";

   move_uploaded_file($photo2,$chemin.$namepho);
   rename ($chemin.$namepho, $chemin.$login.".jpg");
 }

function select_image_profil($id_user, $conn) {
  $SQL2 = "SELECT U.photo_user FROM Utilisateur U, Eleve E
           WHERE U.id_user = E.id_user
           AND E.id_user = $id_user";
  $reseleve = testsqlfetch($SQL2,$conn);

  $SQL2 = "SELECT U.photo_user FROM Utilisateur U, Entreprise E
           WHERE U.id_user = E.id_user
           AND E.id_user = $id_user";
  $resent = testsqlfetch($SQL2,$conn);
  if($reseleve){
    if(is_null($reseleve['photo_user']) || empty($reseleve['photo_user'])){
      print 'avatar.png';
    }
    else {
      print $reseleve['photo_user'];
    }
  }
  elseif ($resent) {
    if(is_null($resent['photo_user']) || empty($resent['photo_user'])){
      print 'avatar2.png';
    }
    else {
      print $resent['photo_user'];
    }
  }


}


function select_image_banner($id_post, $conn) {
  $SQL2 = "SELECT photo_post FROM Post
           WHERE id_post = '$id_post'";
  $resbanner = testsqlfetch($SQL2,$conn);

  if($resbanner){
    if(is_null($resbanner['photo_post']) || empty($resbanner['photo_post'])){
      print 'post.jpg';
    }
    else {
      print $resbanner['photo_post'];
    }
  }


}



function update_image($namepho, $login, $photo2, $id_user, $conn) {

  $photo = $login.'.jpg';
  $sql="UPDATE Utilisateur
        SET photo_user = '$photo'
        WHERE id_user='$id_user' ";
  $res = $conn->Query($sql)or die('Erreur modification user');
  $chemin = dirname(__DIR__);
  $chemin = $chemin."/template/images/profil/";
  //unlink("C:/xampp/htdocs/PPE3/template/images/profil/".$login);

  move_uploaded_file($photo2,$chemin.$namepho);
  rename ($chemin.$namepho, $chemin.$login.".jpg");

  sleep(5);
}


function update_image_banner($namepho, $login, $photo2, $id_user, $conn) {
  $photo = $login.".jpg";
  $sql="SELECT * FROM Photo
        WHERE id_user = '$id_user'";
  $req = $conn->Query($sql)or die('Erreur modification user');
  $res = $req->fetch();

  $chemin = dirname(__DIR__);
  $chemin = $chemin."/template/images/banner/";

  if (isset($res['lib_banner'])) {
    $sql="UPDATE Photo
          SET lib_banner = '$photo'
          WHERE id_user='$id_user' ";
    $res = $conn->Query($sql)or die('Erreur modification user');

    move_uploaded_file($photo2,$chemin.$namepho);
    rename ($chemin.$namepho, $chemin.$login.".jpg");
  }
  else {
    $sql="INSERT INTO Photo
          VALUES(NULL,'$photo','$id_user')";
    $res = $conn->Query($sql)or die('Erreur modification user');

    move_uploaded_file($photo2,$chemin.$namepho);
    rename ($chemin.$namepho, $chemin.$login.".jpg");
  }
}


function select_image_bann($id_user, $conn) {
$SQL2 = "SELECT lib_banner FROM Photo
           WHERE id_user = $id_user";
           $req2 = $conn->Query($SQL2)or die('Erreur modification user');
$res2 = $req2->fetch();

    if(isset($res2['lib_banner'])){
      print $res2['lib_banner'];
    }
    else {
      print 'banner.jpg';
    }


}




/*
 *
 *
 *
 * Creation d'une requete a partir d'un inout pour la recherche :)
 *
 *
 *
 */
function req_recherche($searchs,$tables,$conn){

     if(empty($tables)){
         $tables = array(
             "Post" => array("id_post","titre_post","contenu_post", "photo_post", "date_post","heure_post","id_user","id_cat"),
             "Offre" => array("id_offre","lib_offre","desc_offre","niveau_req","date_post_offre","date_debut_offre","id_ent","id_cat"),
             "Entreprise" => array("nom_resp","site_web","code_APE"),
             "Eleve" => array("prenom_eleve"),
             "Utilisateur" => array("id_user","nom_user","num_addr_user","rue_addr_user","ville_addr_user","CP_addr_user"),
         );
     }

    $search_exploded = preg_split ( "/[\s,\/]+/", $searchs );


    foreach ($tables as $t => $table) {
        $req = 'SELECT ';
        $cond = '';
        foreach ($table as $champs) {
            $req .= $champs.', ';
            $champs = explode(", ",$champs);
            foreach ($champs as $champ) {
                if (count($search_exploded) == 1){
                    $cond .= " $champ LIKE '%$searchs%' OR ";
                }
                else{
                    $i = 0;
                    foreach( $search_exploded as $search_each ) {
                        $cond .= "OR $champ LIKE '%$search_each%' ";
                    }
                }
            }
        }
        if (count($search_exploded) == 1){
            $cond = rtrim($cond,'OR ');
        }
        else{
            $cond =ltrim($cond,'OR ');
        }
        $req = rtrim($req,', ').' FROM '.$t.' WHERE '.$cond;
        $result[$t] = reqtoobj($req,$conn);
    }


    return $result;
}



/*
 *
 * Fonction pour posutler a une offre
 *
 *
 */

function postule($idoffre,$id_user,$id_ent,$conn){
    $sqlD ="SELECT * FROM demande WHERE id_user_eleve = '$id_user' AND id_offre = '$idoffre'";
    
    if (testsql($sqlD,$conn)) {
        $html = '<div id="paspostule'.$idoffre.'" style="display:none">
            <center><button class="btn btn-primary " id="postulerS" onclick="postuler('.$idoffre.','.$id_ent.','.$id_user.')"><i class="fa fa-bullhorn"> Postuler</i></button></center>
        </div>
        <div id="postule'.$idoffre.'" style="display:block">
        <center>
            <div class="btn btn-primary " style="cursor: default"><i class="fa fa-bullhorn"> En Attente</i></div>
            <div class="btn canceloffre" id="canceloffre'.$idoffre.'" onclick="annuldemande('.$idoffre.','.$id_ent.','.$id_user.')"><i class="fa fa-times"></i></div>
        </center>
        </div>';
    }
    else {
        $html = '<div id="paspostule'.$idoffre.'" style="display:block">
            <center><button class="btn btn-primary " id="postulerS" onclick="postuler('.$idoffre.','.$id_ent .','.$id_user .')"><i class="fa fa-bullhorn"> Postuler</i></button></center>
        </div>
        <div id="postule'.$idoffre.'" style="display:none">
            <center>
                <div class="btn btn-primary " style="cursor: default"><i class="fa fa-bullhorn"> En Attente</i></div>
                <div class="btn canceloffre" id="canceloffre'.$idoffre.'" onclick="annuldemande('.$idoffre.','.$id_ent .','.$id_user .')"><i class="fa fa-times"></i></div>
            </center>
        </div>';
    }

    return $html;
}










/*
 *
 * Fonction affichage des utilisateurs
 *
 *
 */
function afficheuser($id_user,$numad,$ruead,$villead,$cpad,$conn){
    ?>
        <li>
            <div class="media first_child">
                <img src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle responsive-img">
                <div class="media_body">
                    <p><b><?php print getnomuser($id_user, $conn) ?></b></p>
                    <h6> <?php print $numad.'&nbsp'.$ruead.'&nbsp'.$villead.'&nbsp'.$cpad; ?></h6>

                    <div class="btn_group">

                        <table>
                            <tbody><tr>
                                <td><span class="waves-effect follow_b">Contacter</span></td>
                                <td>
                                    <span class="waves-effect">Ajouter amis</span>                                         </td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
            </div>
        </li>
    <?php
}
?>
