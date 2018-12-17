<?php

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

    $SQL = "SELECT * FROM utilisateur
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

    $SQL = "SELECT * FROM utilisateur
                  WHERE email_user='$mail';";
    $Req = $conn->Query($SQL);
    $result = $Req->fetch();

    $text = "Bonjour " . $result['nom_user'] . "\n";
    $text = $text . "Votre login est : \n";
    $text = $text . $result['login_user'] . "\n\n\n";
    $text = $text . "Ceci est un mail automatique, merci de ne pas y répondre.";

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
             "Post" => array("titre_post","contenu_post", "photo_post", "date_post","heure_post","id_user","id_cat"),
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
        ?>
        <div id="paspostule<?php print $idoffre;?>" style="display:none">
            <input type="hidden" id="id_ent" value="<?php print $id_ent ?>">
            <input type="hidden" id="id_user" value="<?php print $id_user ?>">
            <center><button class="btn btn-primary " id='postulerS' onclick="postuler(<?php print $idoffre; ?>)"><i class="fa fa-bullhorn"> Postuler</i></button></center>
        </div>
        <div id="postule<?php print $idoffre;?>" style="display:block">
        <center>
            <div class="btn btn-primary " style="cursor: default"><i class="fa fa-bullhorn"> En Attente</i></div>
            <div class="btn canceloffre" id="canceloffre<?php print $idoffre ?>" onclick="annuldemande(<?php print $idoffre?>)"><i class="fa fa-times"></i></div>
        </center>
        </div>
        <?php
    }
    else {
        ?>
        <div id="paspostule<?php print $idoffre;?>" style="display:block">
            <input type="hidden" id="id_ent" value="<?php print $id_ent ?>">
            <input type="hidden" id="id_user" value="<?php print $id_user ?>">
            <center><button class="btn btn-primary " id='postulerS' onclick="postuler(<?php print $idoffre; ?>)"><i class="fa fa-bullhorn"> Postuler</i></button></center>
        </div>
        <div id="postule<?php print $idoffre;?>" style="display:none">
            <center>
                <div class="btn btn-primary " style="cursor: default"><i class="fa fa-bullhorn"> En Attente</i></div>
                <div class="btn canceloffre" id="canceloffre<?php print $idoffre ?>" onclick="annuldemande(<?php print $idoffre?>)"><i class="fa fa-times"></i></div>
            </center>
        </div>
        <?php
    }
}











/*
 *
 * Fonction d'affichage d'un stage
 *
 *
 */

function affichestage($id_cat,$id_user,$id_offre,$id_ent,$date_post_offre,$lib_offre,$niveau_req,$date_debut_offre,$date_fin_stage,$desc_offre,$conn){?>


<div class="post">
    <div class="post_content">
        <a href="details.html" class="post_img">
            <img src="images/post.jpg" alt="">
            <span><i class="ion-android-radio-button-off"></i><?php print getnomcategorie($id_cat,$conn) ?></span>
        </a>
        <div class="row author_area">
            <div class="col s4 author">
                <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="profil picture" class="circle"></div>

                <div class="col s8 media_body">

                  <a href="#"><?php print getnoment($id_ent, $conn) ?></a>
                  <span><?php print $date_post_offre ?></span>

                </div>
            </div>
            <div class="col s4 btn_floating">

            </div>
        </div>
        <a class="post_heding"><?php print urldecode($lib_offre) ?></a>
        <p><b>Niveau requis &nbsp:&nbsp </b><?php print $niveau_req ?></p>
        <p><b>Date de début &nbsp:&nbsp </b><?php print $date_debut_offre ?></p>
        <p><b>Date de fin &nbsp:&nbsp </b><?php print $date_fin_stage ?></p>
        <p><b>Description de l'offre &nbsp:&nbsp </b><?php print urldecode($desc_offre) ?></p>
    </div>
    <?php postule($id_offre,$id_user,$id_ent,$conn) ?>
    <br>
</div>
<?php
}






/*
 *
 * Fonction affichage d'emplois
 *
 */
function afficheemploi($id_cat,$id_offre,$id_user,$id_ent,$date_post_offre,$lib_offre,$niveau_req,$salaire_emp,$type_emp,$date_debut_offre,$desc_offre,$conn){?>

    <div class="post">
        <div class="post_content">
            <a href="details.html" class="post_img">
                <img src="images/post.jpg" alt="">
                <span><i class="ion-android-radio-button-off"></i><?php print getnomcategorie($id_cat,$conn) ?></span>
            </a>
            <div class="row author_area">
                <div class="col s4 author">
                    <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></div>

                    <div class="col s8 media_body">

                      <a href="#"><?php print getnoment($id_ent, $conn) ?></a>
                      <span><?php print $date_post_offre ?></span>

                    </div>
                </div>
                <div class="col s4 btn_floating">

                </div>
            </div>
            <a class="post_heding"<?php print urldecode($lib_offre) ?></a>
            <p><b>Niveau requis &nbsp:&nbsp </b><?php print $niveau_req ?></p>
            <p><b>Salaire de départ &nbsp:&nbsp </b><?php print $salaire_emp ?> €</p>
            <p><b>Type de contrat &nbsp:&nbsp </b><?php print $type_emp ?></p>
            <p><b>Date de début &nbsp:&nbsp </b><?php print $date_debut_offre ?></p>
            <p><b>Description de l'offre &nbsp:&nbsp </b><?php print urldecode($desc_offre) ?></p>
        </div>
        <?php postule($id_offre,$id_user,$id_ent,$conn) ?>
        <br>
    </div>
    <?php
}





/*
 *
 *
 *    Fonction affichage posts
 *
 *
 */

function affichepost($id_cat,$id_user,$date_post,$heure_post,$titre_post,$contenu_post,$conn){
    ?>

    <div class="post">
        <div class="post_content">
            <a href="details.html" class="post_img">
                <img src="images/post.jpg" alt="">
                <span><i class="ion-android-radio-button-off"></i>
                    <?php print getnomcategorie($id_cat,$conn) ?>
                                                </span>
            </a>
            <div class="row author_area">
                <div class="col s4 author">
                    <div class="col s4 media_left"><img height="53px" width="53px"
                                                        src="images/profil/<?php select_image_profil($id_user, $conn) ?>"
                                                        alt="profil picture"
                                                        class="circle">
                    </div>

                    <div class="col s8 media_body">

                        <a href="#"><?php print getnomuser($id_user, $conn) ?></a>
                        <span><?php print $date_post."<br>".$heure_post ?></span>
                    </div>
                </div>
                <div class="col s4 btn_floating">

                </div>

            </div>
            <a class="post_heding"><?php print $titre_post ?></a>
            <p><?php print $contenu_post ?></p>
        </div>
        <center><a href="#" class="btn-floating waves-effect"><i
                        class="ion-navicon-round"></i></a>
        </center>
        <br>
    </div>
    <?php
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
                <img src="images/profil/<?php print $test1 ?>" alt="" class="circle responsive-img">
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
