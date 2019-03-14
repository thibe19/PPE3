<?php
//V2
session_start();
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');
if (empty($_GET['visit'])) {
if (isset($_SESSION['Eleve'])) {

        $uneleve = unserialize($_SESSION['Eleve']);
        $pos_user = $uneleve->getChoixPosition();
        $desc_user = $uneleve->getDescUser();
        $photo_user = $uneleve->getPhotoUser();
        $tel_user = $uneleve->getNumTelUser();
        $mail_user = $uneleve->getEmailUser();
        $pass_user = $uneleve->getMdpUser();
        $login_user = $uneleve->getLoginUser();
        $id_user = $uneleve->getIdUser();
        $nom = $uneleve->getNomUser();
        $prenom = $uneleve->getPrenomEleve();
        $pren = $uneleve->getPrenomEleve() . " " . $uneleve->getNomUser();
        $skill = $uneleve->getDomActi();
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $birth = $uneleve->getdateEleve();
        $births = explode('-', $uneleve->getdateEleve());
        $birthphrase = strftime("%d %B %Y.", mktime(0, 0, 0, $births[1], $births[2], $births[0])); //Affichera par exemple "date du jour en français : samedi 24 juin 2006."
        $desc = empty($uneleve->getDescUser()) ? "Vous n'avez pas encore entré de description." : false;
        $date = "A remplir avec date de 'Offre'";
        $Nrue = $uneleve->getNumAddr();
        $rue = $uneleve->getRueAddr();
        $cp = $uneleve->getCPAddr();
        $ville = $uneleve->getVilleAddr();
        $placephrase = $Nrue . " " . $rue . " " . $ville . " " . $cp;




        $uneoffre = new Stage(1, 'test doffre', 'bac +5', date('Y-m-d'), date('Y-m-d'), $id_user, '2', 1, date('Y-m-d'), '3', 'pas mal');


        $list_ent = reqtoobj("SELECT E.id_user,nom_user FROM Utilisateur U,Entreprise E
                              WHERE U.id_user=E.id_user", $conn);
        $domaine = data_base_in_object('Categorie', $conn);

        $descs = "A remplir avec la desc user de l'offre de stage";


        $unutilisateur = new Utilisateur();
        $resU = $unutilisateur->selectAllUtilisateur($id_user,$conn);
        $data = $resU -> fetch();

        $uneleve = new Eleve();
        $resE = $uneleve->selectAllEleve($id_user,$conn);
        $dataE = $resE -> fetch();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:13 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Open List | Html template</title>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!-- Tooltip CSS -->
    <link rel="stylesheet" href="vendors/tooltip/balloon.min.css">
    <!-- Icon CSS-->
    <link rel="stylesheet" href="vendors/ionicons/css/ionicons.min.css">
    <link href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
    <!-- Calendar CSS-->
    <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">

    <!--Theme Styles CSS-->
    <link rel="stylesheet" href="css/style.css" media="all"/>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header_Area -->

<?php
require('part/header.php');
?>
<!-- End  Header_Area -->

<!-- Tranding-select and banner Area -->
<div class="banner_area banner_2">
    <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt="" class="banner_img">
    <div class="media profile_picture">
        <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
        <div class="media_body">
            <a href="profile.php"><?php print $dataE['prenom_eleve']." ".$data['nom_user']; ?></a>
            <h6><?php print $data['num_addr_user']." ".$data['rue_addr_user']; ?></h6>
            <h6><?php print $data['CP_addr_user']." ".$data['ville_addr_user']; ?></h6>
        </div>
    </div>
</div>
<section class="author_profile">
    <div class="row author_profile_row">
        <div class="col l4 m6">
            <ul class="profile_menu">
                <li><a href="profile.php">Activiter</a></li>
                <li><a href="about.php">A propos</a></li>
                    <!-- Dropdown Structure -->
                    <!-- <ul id="dro_pm" class="dropdown-content">
                        <li><a href="#">Popular Post</a></li>
                        <li><a href="#">Save Post</a></li>
                    </ul> -->
                <!-- </li> -->
            </ul>
        </div>
        <?php

        $untoto = new Post;
        $resP = $untoto->countPosts($id_user,$conn);
        $dataP=$resP->fetch();
        $total=$dataP['resulta'];

        $unamie = new Post;
        $resA = $unamie->countAmis($id_user,$conn);
        $dataA=$resA->fetch();
        $amis=$dataA['amis'];
        $suivi=$dataA['suivi'];

         ?>
        <div class="col l4 m6">
            <ul class="post_follow">
                <li>Posts <b><?php print $total; ?></b></li>
                <li>Following <b><?php print $amis;  ?></b></li>
                <li>Followers <b><?php print $suivi; ?></b></li>
            </ul>
        </div>
        <!-- <div class="col l4 m6">
            <ul class="follow_messages">
                <li><a href="#" class="waves-effect">Follow</a></li>
                <li><a href="#" class="waves-effect">Messages</a></li>
            </ul>
        </div> -->
    </div>
</section>
<!-- End Tranding Area -->

<!-- Min Container area -->

    <section class="min_container profile_pages">
        <div class="section_row">

            <!-- CENTRE PROFIL, CV, MODIFICATION -->
            <div class="middle_section col">
                <div class="post profile_post">
                    <div class="post_content">

                        <?php if (empty($_POST['updateabout']) && empty($_POST['valstabout']) && empty($_POST['delabout']) && empty($_POST['valstabouts']) && empty($_POST['valprofil']) && empty($_POST['contactcvs'])) { ?>

                            <form action="about.php" method="post">

                              <?php
                                if (empty($_GET['visit'])) {

                               ?>
                                <button type="submit" id="updateabout" value="1" name="updateabout"><i
                                            class="fas fa-pen"></i></button>
                              <?php } ?>

                                <br><br>


                                <!-- A PROPOS -->



                                <h5>A propos</h5>
                                <table>
                                    <tr>
                                        <td width="22%"><p>Nom</p></td>
                                        <td width="5%"><p> : </p></td>
                                        <td><p><?php echo $data['nom_user']; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td width="22%"><p>Prénom</p></td>
                                        <td width="5%"><p> : </p></td>
                                        <td><p><?php echo $dataE['prenom_eleve']; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Compétences</p></td>
                                        <td><p> : </p></td>
                                        <td><p><?php echo $data['dom_acti']; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Date de naissance</p></td>
                                        <td><p> : </p></td>
                                        <td><p><?php echo $dataE['date_naiss']; ?></p></td>
                                    </tr>
                                </table>
                                <br>
                                <hr>
                                <br>

                                <!-- DESCRIPTION -->

                                <h5>Description</h5>
                                <p><?php echo $data['desc_user'] ?></p>
                                <br>
                                <hr>
                                <br>

                                <!-- EXPERIENCE -->

                                <h5>Experience</h5>
                                <br>
                                <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>
                                <br>
                                <?php
                                $desoffres = new Offre();
                                $resStg = $desoffres->selectStageEleve("OStage", $id_user,$conn);
                                while ($res_aff_stg3 = $resStg->fetch()) {

                                  $id_offre_req = $res_aff_stg3['id_offre'];

                                  $unstagee = new Stage();
                                  $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                                  $res_aff_stg2 = $resStge->fetch();
                                 ?>

                                   <h5><?php echo urldecode($res_aff_stg3['lib_offre']) ?></h5>
                                   <p>du <?php echo $res_aff_stg3['date_debut_offre']; ?> au <?php echo urldecode($res_aff_stg2['date_fin_stage']); ?> à
                                   <?php
                                   $unutilisateur = new Utilisateur();
                                   $resEn = $unutilisateur->selectAllUtilisateur($res_aff_stg3['id_ent'],$conn);
                                   $dataEn = $resEn -> fetch();
                                   print $dataEn['nom_user'];
                                   ?>
                                  </p>

                                   <p>Domaine : <?php
                                   $unecat = new Categorie();
                                   $resC = $unecat->selectCategorie($res_aff_stg3['id_cat'],$conn);
                                   $dataC = $resC -> fetch();
                                   print $dataC['lib_cat'] ?> </p>

                                   <p><?php echo $res_aff_stg2['desc_user_stage']; ?></p>

                                   <p>Note : <?php echo $res_aff_stg2['note_user_stage']; ?> / 5</p>




                                <?php } ?>

                                <br>
                                <hr>
                                <br>
                                <h5 class="categories_tittle">Travail <i class="fas fa-caret-down"></i></h5>

                                <?php
                                $desoffres = new Offre();
                                $resStg = $desoffres->selectStageEleve("OEmploi", $id_user,$conn);
                                while ($res_aff_stg3 = $resStg->fetch()) {

                                  $id_offre_req = $res_aff_stg3['id_offre'];

                                  $unstagee = new Stage();
                                  $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                                  $res_aff_stg2 = $resStge->fetch();
                                 ?>

                                   <h5><?php echo urldecode($res_aff_stg3['lib_offre']) ?></h5>
                                   <p>Début le <?php echo $res_aff_stg3['date_debut_offre']; ?> à <?php
                                   $unutilisateur = new Utilisateur();
                                   $resEn = $unutilisateur->selectAllUtilisateur($res_aff_stg3['id_ent'],$conn);
                                   $dataEn = $resEn -> fetch();
                                   print $dataEn['nom_user'];
                                    ?></p>

                                   <p>Domaine : <?php
                                   $unecat = new Categorie();
                                   $resC = $unecat->selectCategorie($res_aff_stg3['id_cat'],$conn);
                                   $dataC = $resC -> fetch();
                                   print $dataC['lib_cat'] ?> </p>

                                   <p><?php echo $res_aff_stg2['desc_user_stage']; ?></p>






                                <?php } ?>
                                <br>
                                <hr>
                                <br>
                                <!-- CONTACT -->

                                <h5>Contact</h5>
                                <table>
                                    <tr>
                                        <td width="14%"><p>Téléphone</p></td>
                                        <td width="5%"><p> : </p></td>
                                        <td><p><?php echo "0".$data['tel_user']; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p>E-mail</p></td>
                                        <td><p> : </p></td>
                                        <td><p><?php echo $data['email_user'] ?></p></td>
                                    </tr>

                                </table>
                            </form>
                        <?php } else {

                          //////////////////////////////////////////////////////////////////////////////////
                          ////                                                                          ////
                          ////                                                                          ////
                          ////                              MODDIFICATION                               ////
                          ////                                                                          ////
                          ////                                                                          ////
                          //////////////////////////////////////////////////////////////////////////////////
                            ?>

                            <h3>Modification</h3>
                            <h5>A propos</h5>
                            <form class="" action="about.php" method="post">
                            <table>
                                <tr>
                                    <td width="22%"><p>Nom</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><input type="text" name="surname_about" value="<?php echo $data['nom_user']; ?>"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="22%"><p>Prénom</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><input type="text" name="name_about" value="<?php echo $dataE['prenom_eleve']; ?>"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Compétences</p></td>
                                    <td><p> : </p></td>
                                    <td><p><input type="text" name="skill_about" value="<?php echo $data['dom_acti']; ?>"></p></td>
                                </tr>
                                <tr>
                                    <td><p>Date de naissance</p></td>
                                    <td><p> : </p></td>
                                    <td><p><input type="date" name="birth_about" value="<?php echo $dataE['date_naiss']; ?>"></p></td>
                                </tr>
                            </table>
                            <br>
                            <hr>
                            <br>

                            <!-- DESCRIPTION -->

                            <h5>Description</h5>
                            <?php ?>
                            <p><textarea name="desc_about" class="textareabout" rows="8" placeholder="Vous n'avez pas encore entré de description."
                                         cols="80"><?php echo $data['desc_user']; ?></textarea>
                                         <?php ////////ICI prof ?>
                                         <button type="submit" id="updateabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="valprofil"><i
                                                     class="fas fa-check"></i></button>

                                                   </form>
                            </p>
                            <br>
                            <hr>
                            <br>

                            <!-- EXPERIENCE -->

                            <h5>Experience</h5>
                            <br>


                            <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>

                            <?php
                            $desoffres = new Offre();
                            $resStg = $desoffres->selectStageEleve("OStage", $id_user,$conn);
                            while ($res_aff_stg = $resStg->fetch()) {

                              $id_offre_req = $res_aff_stg['id_offre'];

                              $unstagee = new Stage();
                              $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                              $res_aff_stg2 = $resStge->fetch();
                             ?>
                             <form action="about.php" method="post">
                               Titre : <input type="text" name="titres" value="<?php echo urldecode($res_aff_stg['lib_offre']) ?>">
                            <div class="select_option">
                                <p> Domaine :</p>
                                    <select name="selectdomaines">
                                        <?php foreach ($domaine as $d) { ?>
                                            <option value="<?php print $d->id_cat ?>" <?php ($d->id_cat == $res_aff_stg['id_cat']) ? print "selected" : false ?> >
                                                <?php print $d->lib_cat ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="select_option">
                                <p> Entreprise :</p>
                                    <select name="selectents">
                                        <?php foreach ($list_ent as $le) { ?>
                                            <option value="<?php print $le->id_user ?>" <?php ($le->id_user == $res_aff_stg['id_ent']) ? print "selected" : false ?> >
                                                <?php print $le->nom_user ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                            </div>

                            Date :
                            <table>
                                <tr>
                                    <td>Début</td>
                                    <td>Fin</td>
                                </tr>
                                <tr>
                                    <td><input type="date" name="date_about_debut_s" value="<?php echo $res_aff_stg['date_debut_offre']; ?>"
                                               placeholder="Exemple : 2015 - 2017"></td>
                                    <td><input type="date" name="date_about_fin_s" value="<?php echo $res_aff_stg2['date_fin_stage']; ?>"
                                               placeholder="Exemple : 2015 - 2017"></td>
                                </tr>
                            </table>
                            <!-- Place : <input type="text" name="place_about_s" value=""
                                           placeholder="Exemple : Paris">  </p> -->
                            <p> Description : <textarea name="desc_about_s" class="textareabout" rows="8"
                                                        cols="80"><?php echo $res_aff_stg2['desc_user_stage']; ?></textarea></p>

                            <input type="number" name="quantitys" min="1" max="5" value="<?php echo $res_aff_stg2['note_user_stage']; ?>" placeholder="Note">

                            <button type="submit" id="updateabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="valstabouts"><i
                                        class="fas fa-check"></i></button>
                            </form>
                            <br>
                            <form action="about.php" method="post">
                              <button type="submit" id="cancelabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="delabout"><i
                                          class="fas fa-trash-alt"></i></button>

                            </form>
                            <?php } ?>


                            <!-- AJOUT DE STAGE -->

                            <div style="display:none" id="id2">
                                <form action="about.php" method="post">
                                  Titre : <input type="text" name="titresn" value="">
                                    <div class="select_option">
                                        <p> Domaine :
                                            <select name="selectdomainesn">
                                                <?php foreach ($domaine as $d) { ?>
                                                    <option value="<?php print $d->id_cat ?>">
                                                        <?php print $d->lib_cat ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div class="select_option">
                                        <p> Entreprise :
                                            <select name="selectentsn">
                                                <?php foreach ($list_ent as $le) { ?>
                                                    <option value="<?php print $le->id_user ?>">
                                                        <?php print $le->nom_user ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                    </div>

                                    Date :
                                    <table>
                                        <tr>
                                            <td>Début</td>
                                            <td>Fin</td>
                                        </tr>
                                        <tr>
                                            <td><input type="date" name="date_about_debut_sn" value=""
                                                       placeholder="Exemple : 2015 - 2017"></td>
                                            <td><input type="date" name="date_about_fin_sn" value=""
                                                       placeholder="Exemple : 2015 - 2017"></td>
                                        </tr>
                                    </table>
                                    <!-- Place : <input type="text" name="place_about_sn" value=""
                                                   placeholder="Exemple : Paris">  </p> -->
                                    <p> Description : <textarea name="desc_about_sn" class="textareabout" rows="8" placeholder="Description du stage"
                                                                cols="80"></textarea></p>

                                   <input type="number" name="quantitysn" min="1" max="5" placeholder="Note">

                                    <button type="submit" id="updateabout" value="1" name="valstabout"><i
                                                class="fas fa-check"></i></button>
                                </form>
                            </div>

                            <br><br>

                            <button type="submit" onclick="document.getElementById('id2').style.display = 'block'"
                                    id="updateabout" value="1" name="addsabout"><i class="fas fa-plus"></i></button>


                            <br>
                            <hr>
                            <br>




                            <h5 class="categories_tittle">Travail <i class="fas fa-caret-down"></i></h5>

                            <?php
                            $desoffres = new Offre();
                            $resStg = $desoffres->selectStageEleve("OEmploi", $id_user,$conn);
                            while ($res_aff_stg = $resStg->fetch()) {

                              $id_offre_req = $res_aff_stg['id_offre'];

                              $unstagee = new Stage();
                              $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                              $res_aff_stg2 = $resStge->fetch();
                             ?>

                             <form action="about.php" method="post">
                               Titre : <input type="text" name="titret" value="<?php echo urldecode($res_aff_stg['lib_offre']) ?>">
                            <div class="select_option">
                                <p> Domaine :</p>
                                    <select name="selectdomainet">
                                        <?php foreach ($domaine as $d) { ?>
                                            <option value="<?php print $d->id_cat ?>" <?php ($d->id_cat == $res_aff_stg['id_cat']) ? print "selected" : false ?> >
                                                <?php print $d->lib_cat ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="select_option">
                                <p> Entreprise :</p>
                                    <select name="selectentt">
                                        <?php foreach ($list_ent as $le) { ?>
                                            <option value="<?php $le->id_user ?>" <?php ($le->id_user == $res_aff_stg['id_ent']) ? print "selected" : false ?> >
                                                <?php print $le->nom_user ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                            </div>

                            Date :
                            <table>
                                <tr>
                                    <td>Début</td>

                                </tr>
                                <tr>
                                    <td><input type="date" name="date_about_debut_t" value="<?php echo $res_aff_stg['date_debut_offre']; ?>"
                                               placeholder="Exemple : 2015 - 2017"></td>

                                </tr>
                            </table>
                            <!-- Place : <input type="text" name="place_about_s" value=""
                                           placeholder="Exemple : Paris">  </p> -->
                            <p> Description : <textarea name="desc_about_t" class="textareabout" rows="8"
                                                        cols="80"><?php echo $res_aff_stg['desc_offre']; ?></textarea></p>



                            <button type="submit" id="updateabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="valstabouttt"><i
                                        class="fas fa-check"></i></button>
                            </form>
                            <br>
                            <form action="about.php" method="post">
                              <button type="submit" id="cancelabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="delaboutt"><i
                                          class="fas fa-trash-alt"></i></button>

                            </form>

                            <?php } ?>















                            <!-- Ajout d'un pour nouveau travail fait -->
                            <div style="display:none" id="id1">
                              <form action="about.php" method="post">
                                Titre : <input type="text" name="titretn" value="">
                                  <div class="select_option">
                                      <p> Domaine :
                                          <select name="selectdomainetn">
                                              <?php foreach ($domaine as $d) { ?>
                                                  <option value="<?php print $d->id_cat ?>">
                                                      <?php print $d->lib_cat ?>
                                                  </option>
                                              <?php } ?>
                                          </select>
                                  </div>
                                  <div class="select_option">
                                      <p> Entreprise :
                                          <select name="selectenttn">
                                              <?php foreach ($list_ent as $le) { ?>
                                                  <option value="<?php print $le->id_user ?>">
                                                      <?php print $le->nom_user ?>
                                                  </option>
                                              <?php } ?>
                                          </select>
                                  </div>

                                  Date :
                                  <table>
                                      <tr>
                                          <td>Début</td>

                                      </tr>
                                      <tr>
                                          <td><input type="date" name="date_about_debut_tn" value=""
                                                     placeholder="Exemple : 2015 - 2017"></td>

                                      </tr>
                                  </table>
                                  <!-- Place : <input type="text" name="place_about_sn" value=""
                                                 placeholder="Exemple : Paris">  </p> -->
                                  <p> Description : <textarea name="desc_about_tn" class="textareabout" rows="8" placeholder="Description du stage"
                                                              cols="80"></textarea></p>



                                  <button type="submit" id="updateabout" value="1" name="valstaboutt"><i
                                              class="fas fa-check"></i></button>
                                              <?php //////////// ICI TRAV ?>
                              </form>
                            </div>

                            <br><br>

                            <button type="submit" onclick="document.getElementById('id1').style.display = 'block'"
                                    id="updateabout" value="1" name="addtabout"><i class="fas fa-plus"></i></button>

                            <hr>
                            <br>





                            <!-- CONTACT -->
                              <form action="about.php" method="post">
                            <h5>Contact</h5>
                            <table>
                                <tr>
                                    <td width="14%"><p>Téléphone</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><input type="text" name="tel_about" value="<?php echo "0".$data['tel_user']; ?>"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>E-mail</p></td>
                                    <td><p> : </p></td>
                                    <td><p><input type="text" name="mail_about" value="<?php echo $data['email_user']; ?>"></p>
                                    </td>
                                </tr>

                            </table>

                            <table>
                                <tr>
                                    <td>
                                        <button type="submit" id="updateabout" value="1" name="contactcvs"><i
                                                    class="fas fa-check"></i></button>
                                    </td>
                                  </form>
                                </tr>
                                <tr>
                                  <form action="about.php" method="post">
                                      <td>
                                          <button type="submit" id="cancelabout" value="1" name="cancelabout"><i
                                                      class="fas fa-ban"></i></button>
                                      </td>
                                  </form>
                                </tr>
                            </table>

                            <?php
                        } ?>
                    </div>
                </div>
            </div>


            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">About Me</h3>
                        <p><?php (!empty($uneleve->getDescUser()))? print $uneleve->getDescUser() : print 'Encore aucune description' ?></p>
                    </div>
                    <?php require ('./part/left.php')?>
                    <!-- Right side bar -->
                    <?php require ('./part/right.php')?>
            <!-- Right bar end -->
                </div>
            </section>

<?php } elseif (isset($_SESSION['Entreprise'])) {
  $id = dec_enc('decrypt',$_SESSION['id']);
  $uneent= unserialize($_SESSION['Entreprise']);
  $id_user = $uneent->getIdUser();


  $unutilisateur = new Utilisateur();
  $resU = $unutilisateur->selectAllUtilisateur($id_user,$conn);
  $data = $resU -> fetch();

  $unentreprise = new Entreprise();
  $resEn = $unentreprise->selectAllEntreprise($id_user,$conn);
  $dataEn = $resEn -> fetch();
  ?>

    <!DOCTYPE html>
    <html lang="fr">

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:36 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>ViaBahuet</title>

        <!-- Favicon -->
        <link rel="icon" href="images/favicon.png" type="image/x-icon" />
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="css/materialize.min.css">
        <!-- Tooltip CSS -->
        <link rel="stylesheet" href="vendors/tooltip/balloon.min.css">
        <!-- Icon CSS-->
        <link rel="stylesheet" href="vendors/ionicons/css/ionicons.min.css">
        <link href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
        <!-- Calendar CSS-->
        <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">

        <!--Theme Styles CSS-->
    	<link rel="stylesheet" href="css/style.css" media="all" />

      <!-- Option -->
      <link href="./css/option.css" rel="stylesheet" />


        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <!-[endif]-->

    </head>
    <body>
      <!-- Header_Area -->
      <?php
      require('part/header.php');
      ?>
      <!-- End  Header_Area -->

      <!-- Tranding-select and banner Area -->
      <div class="banner_area banner_2">
          <img src="images/banner-2.jpg" alt="" class="banner_img">
          <div class="media profile_picture">
              <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
              <div class="media_body">
                  <a href="profile.php"><?php echo$data['nom_user'] ?></a>
                  <h6><?php echo$data['num_addr_user']." ".$data['rue_addr_user']; ?></h6>
                  <h6><?php echo$data['CP_addr_user']." ".$data['ville_addr_user']; ?></h6>
              </div>
          </div>
      </div>
      <section class="author_profile">
          <div class="row author_profile_row">
              <div class="col l4 m6">
                  <ul class="profile_menu">
                      <li><a href="profile.php">Activiter</a></li>
                      <li><a href="about.php">A propos</a></li>
                      <li class="post_d"><a class="dropdown-button" href="#!" data-activates="dro_pm">...</a>
                          <!-- Dropdown Structure -->
                          <ul id="dro_pm" class="dropdown-content">
                              <li><a href="#">Popular Post</a></li>
                              <li><a href="#">Save Post</a></li>
                          </ul>
                      </li>
                  </ul>
              </div>
              <?php
              $sqlP="SELECT COUNT(*) as post FROM Post WHERE id_user = '$id_user'";$sqlO="SELECT COUNT(*) as offre FROM Offre WHERE id_user = '$id_user'";
              $resP = $conn -> query($sqlP)or die($conn -> errorInfo()); $resO = $conn -> query($sqlO)or die($conn -> errorInfo());
              $dataP=$resP->fetch(); $dataO=$resO->fetch();$post=$dataP['post'];$offre=$dataO['offre'];$total=$post+$offre;

              $sqlAM="SELECT COUNT(*) as amis FROM ajoute_amis WHERE id_user = '$id_user'";$sqlF="SELECT COUNT(*) as suivi FROM ajoute_amis WHERE id_user_Eleve = '$id_user'";
              $resAM = $conn -> query($sqlAM)or die($conn -> errorInfo());$resF = $conn -> query($sqlF)or die($conn -> errorInfo());
              $dataAM=$resAM->fetch();$ami=$dataAM['amis']; $dataF=$resF->fetch();$suivi=$dataF['suivi'];

               ?>
              <div class="col l4 m6">
                  <ul class="post_follow">
                      <li>Posts <b><?php print $total; ?></b></li>
                      <li>Following <b><?php print $ami;  ?></b></li>
                      <li>Followers <b><?php print $suivi; ?></b></li>
                  </ul>
              </div>
              <!-- <div class="col l4 m6">
                  <ul class="follow_messages">
                      <li><a href="#" class="waves-effect">Follow</a></li>
                      <li><a href="#" class="waves-effect">Messages</a></li>
                  </ul>
              </div> -->
          </div>
      </section>
      <!-- End Tranding Area -->

      <!-- Min Container area -->

    <section class="min_container profile_pages">
        <div class="section_row">

            <!-- CENTRE PROFIL, CV, MODIFICATION -->
            <div class="middle_section col">
                <div class="post profile_post">
                    <div class="post_content">
                        <table>
                          <tr>
                            <td><p>Nom de l'entreprise : </p></td>
                            <td><p><?php echo $data['nom_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Domaine d'activité : </p></td>
                            <td><p><?php echo $dataEn['code_APE']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Téléphone : </p></td>
                            <td><p><?php echo "0".$data['tel_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Mail : </p></td>
                            <td><p><?php echo $data['email_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Adresse : </p></td>
                            <td><p><?php echo$data['num_addr_user']; ?> <?php echo$data['rue_addr_user']; ?> <?php echo$data['CP_addr_user']; ?>, <?php echo$data['ville_addr_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Site Internet : </p></td>
                            <td><p> <a href="<?php echo $dataEn['site_web']; ?>"><?php echo $dataEn['site_web']; ?></a> </p></td>
                          </tr>
                        </table>

                    </div>
                </div>
            </div>


            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">About Me</h3>
                        <p><?php (!empty($uneent->getDescUser()))? print urldecode($uneent->getDescUser()) : print 'Encore aucune description' ?></p>
                    </div>
                    <?php require ('./part/left.php')?>
            <!-- Right side bar -->
                    <?php require ('./part/right.php')?>
            <!-- Right bar end -->
        </div>
    </section>
<?php }}
else {
  // visite des cv
  $id_user = dec_enc('decrypt',$_GET['visit']);
  $uneentreprise = new Entreprise();
  $resU = $uneentreprise->selectAllEntreprise($id_user,$conn);
  $data = $resU -> fetch();

  $uneleve = new Eleve();
  $resE = $uneleve->selectAllEleve($id_user,$conn);
  $dataE = $resE -> fetch();

  if (isset($data['id_user'])) {
    $unuser = new Utilisateur();
    $resUs = $unuser->selectAllUtilisateur($id_user,$conn);
    $dataUs = $resUs -> fetch();
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:36 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>ViaBahuet</title>

        <!-- Favicon -->
        <link rel="icon" href="images/favicon.png" type="image/x-icon" />
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="css/materialize.min.css">
        <!-- Tooltip CSS -->
        <link rel="stylesheet" href="vendors/tooltip/balloon.min.css">
        <!-- Icon CSS-->
        <link rel="stylesheet" href="vendors/ionicons/css/ionicons.min.css">
        <link href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
        <!-- Calendar CSS-->
        <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">

        <!--Theme Styles CSS-->
      <link rel="stylesheet" href="css/style.css" media="all" />

      <!-- Option -->
      <link href="./css/option.css" rel="stylesheet" />


        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <!-[endif]-->

    </head>
    <body>
      <!-- Header_Area -->
      <?php
      require('part/header.php');
      ?>
      <!-- End  Header_Area -->

      <!-- Tranding-select and banner Area -->
      <div class="banner_area banner_2">
          <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt="" class="banner_img">
          <div class="media profile_picture">
              <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
              <div class="media_body">
                  <a href="profile.php"><?php echo $dataUs['nom_user'] ?></a>
                  <h6><?php echo $dataUs['num_addr_user']." ".$dataUs['rue_addr_user']; ?></h6>
                  <h6><?php echo $dataUs['CP_addr_user']." ".$dataUs['ville_addr_user']; ?></h6>
              </div>
          </div>
      </div>
      <section class="author_profile">
          <div class="row author_profile_row">
              <div class="col l4 m6">
                  <ul class="profile_menu">
                      <li><a href="profile.php">Activiter</a></li>
                      <li><a href="about.php">A propos</a></li>
                      <li class="post_d"><a class="dropdown-button" href="#!" data-activates="dro_pm">...</a>
                          <!-- Dropdown Structure -->
                          <ul id="dro_pm" class="dropdown-content">
                              <li><a href="#">Popular Post</a></li>
                              <li><a href="#">Save Post</a></li>
                          </ul>
                      </li>
                  </ul>
              </div>
              <?php

              $untoto = new Post;
              $resP = $untoto->countPosts($id_user,$conn);
              $dataP=$resP->fetch();
              $total=$dataP['resulta'];

              $unamie = new Post;
              $resA = $unamie->countAmis($id_user,$conn);
              $dataA=$resA->fetch();
              $amis=$dataA['amis'];
              $suivi=$dataA['suivi'];

               ?>
              <div class="col l4 m6">
                  <ul class="post_follow">
                      <li>Posts <b><?php print $total; ?></b></li>
                      <li>Following <b><?php print $amis;  ?></b></li>
                      <li>Followers <b><?php print $suivi; ?></b></li>
                  </ul>
              </div>
              <!-- <div class="col l4 m6">
                  <ul class="follow_messages">
                      <li><a href="#" class="waves-effect">Follow</a></li>
                      <li><a href="#" class="waves-effect">Messages</a></li>
                  </ul>
              </div> -->
          </div>
      </section>
      <!-- End Tranding Area -->

      <!-- Min Container area -->

    <section class="min_container profile_pages">
        <div class="section_row">

            <!-- CENTRE PROFIL, CV, MODIFICATION -->
            <div class="middle_section col">
                <div class="post profile_post">
                    <div class="post_content">
                        <table>
                          <tr>
                            <td><p>Nom de l'entreprise : </p></td>
                            <td><p><?php echo $dataUs['nom_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Domaine d'activité : </p></td>
                            <td><p><?php echo $data['code_APE']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Téléphone : </p></td>
                            <td><p><?php echo "0".$dataUs['tel_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Mail : </p></td>
                            <td><p><?php echo $dataUs['email_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Adresse : </p></td>
                            <td><p><?php echo $dataUs['num_addr_user']; ?> <?php echo $dataUs['rue_addr_user']; ?> <?php echo $dataUs['CP_addr_user']; ?>, <?php echo $dataUs['ville_addr_user']; ?></p></td>
                          </tr>
                          <tr>
                            <td><p>Site Internet : </p></td>
                            <td><p> <a href="<?php echo $data['site_web']; ?>"><?php echo $data['site_web']; ?></a> </p></td>
                          </tr>
                        </table>

                    </div>
                </div>
            </div>


            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">About Me</h3>
                        <p><?php if (isset($dataUs['desc_user'])) { print urldecode($dataUs['desc_user']); } else { print 'Encore aucune description'; } ?></p>
                    </div>
                    <?php require ('./part/left.php')?>
            <!-- Right side bar -->
                    <?php require ('./part/right.php')?>
            <!-- Right bar end -->
        </div>
    </section>
    <?php
  }

  if (isset($dataE['id_user'])) {
    $unuser = new Utilisateur();
    $resUs = $unuser->selectAllUtilisateur($id_user,$conn);
    $dataUs = $resUs -> fetch();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:13 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Open List | Html template</title>

        <!-- Favicon -->
        <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="css/materialize.min.css">
        <!-- Tooltip CSS -->
        <link rel="stylesheet" href="vendors/tooltip/balloon.min.css">
        <!-- Icon CSS-->
        <link rel="stylesheet" href="vendors/ionicons/css/ionicons.min.css">
        <link href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
        <!-- Calendar CSS-->
        <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">

        <!--Theme Styles CSS-->
        <link rel="stylesheet" href="css/style.css" media="all"/>


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
              integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <!-- Header_Area -->

    <?php
    require('part/header.php');
    ?>
    <!-- End  Header_Area -->

    <!-- Tranding-select and banner Area -->
    <div class="banner_area banner_2">
        <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt="" class="banner_img">
        <div class="media profile_picture">
            <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
            <div class="media_body">
                <a href="profile.php"><?php print $dataE['prenom_eleve']." ".$dataUs['nom_user']; ?></a>
                <h6><?php print $dataUs['num_addr_user']." ".$dataUs['rue_addr_user']; ?></h6>
                <h6><?php print $dataUs['CP_addr_user']." ".$dataUs['ville_addr_user']; ?></h6>
            </div>
        </div>
    </div>
    <section class="author_profile">
        <div class="row author_profile_row">
            <div class="col l4 m6">
                <ul class="profile_menu">
                    <li><a href="profile.php">Activiter</a></li>
                    <li><a href="about.php">A propos</a></li>
                        <!-- Dropdown Structure -->
                        <!-- <ul id="dro_pm" class="dropdown-content">
                            <li><a href="#">Popular Post</a></li>
                            <li><a href="#">Save Post</a></li>
                        </ul> -->
                    <!-- </li> -->
                </ul>
            </div>
            <?php

            $untoto = new Post;
            $resP = $untoto->countPosts($id_user,$conn);
            $dataP=$resP->fetch();
            $total=$dataP['resulta'];

            $unamie = new Post;
            $resA = $unamie->countAmis($id_user,$conn);
            $dataA=$resA->fetch();
            $amis=$dataA['amis'];
            $suivi=$dataA['suivi'];

             ?>
            <div class="col l4 m6">
                <ul class="post_follow">
                    <li>Posts <b><?php print $total; ?></b></li>
                    <li>Following <b><?php print $amis;  ?></b></li>
                    <li>Followers <b><?php print $suivi; ?></b></li>
                </ul>
            </div>
            <!-- <div class="col l4 m6">
                <ul class="follow_messages">
                    <li><a href="#" class="waves-effect">Follow</a></li>
                    <li><a href="#" class="waves-effect">Messages</a></li>
                </ul>
            </div> -->
        </div>
    </section>
    <!-- End Tranding Area -->

    <!-- Min Container area -->

        <section class="min_container profile_pages">
            <div class="section_row">

                <!-- CENTRE PROFIL, CV, MODIFICATION -->
                <div class="middle_section col">
                    <div class="post profile_post">
                        <div class="post_content">

                            <?php if (empty($_POST['updateabout']) && empty($_POST['valstabout']) && empty($_POST['delabout']) && empty($_POST['valstabouts']) && empty($_POST['valprofil']) && empty($_POST['contactcvs'])) { ?>

                                <form action="about.php" method="post">

                                  <?php
                                    if (empty($_GET['visit'])) {

                                   ?>
                                    <button type="submit" id="updateabout" value="1" name="updateabout"><i
                                                class="fas fa-pen"></i></button>
                                  <?php } ?>

                                    <br><br>


                                    <!-- A PROPOS -->



                                    <h5>A propos</h5>
                                    <table>
                                        <tr>
                                            <td width="22%"><p>Nom</p></td>
                                            <td width="5%"><p> : </p></td>
                                            <td><p><?php echo $dataUs['nom_user']; ?></p></td>
                                        </tr>
                                        <tr>
                                            <td width="22%"><p>Prénom</p></td>
                                            <td width="5%"><p> : </p></td>
                                            <td><p><?php echo $dataE['prenom_eleve']; ?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Compétences</p></td>
                                            <td><p> : </p></td>
                                            <td><p><?php echo $dataUs['dom_acti']; ?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Date de naissance</p></td>
                                            <td><p> : </p></td>
                                            <td><p><?php echo $dataE['date_naiss']; ?></p></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <hr>
                                    <br>

                                    <!-- DESCRIPTION -->

                                    <h5>Description</h5>
                                    <p><?php echo $data['desc_user'] ?></p>
                                    <br>
                                    <hr>
                                    <br>

                                    <!-- EXPERIENCE -->

                                    <h5>Experience</h5>
                                    <br>
                                    <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>
                                    <br>
                                    <?php
                                    $desoffres = new Offre();
                                    $resStg = $desoffres->selectStageEleve("OStage", $id_user,$conn);
                                    while ($res_aff_stg3 = $resStg->fetch()) {

                                      $id_offre_req = $res_aff_stg3['id_offre'];

                                      $unstagee = new Stage();
                                      $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                                      $res_aff_stg2 = $resStge->fetch();
                                     ?>

                                       <h5><?php echo urldecode($res_aff_stg3['lib_offre']) ?></h5>
                                       <p>du <?php echo $res_aff_stg3['date_debut_offre']; ?> au <?php echo urldecode($res_aff_stg2['date_fin_stage']); ?> à
                                       <?php
                                       $unutilisateur = new Utilisateur();
                                       $resEn = $unutilisateur->selectAllUtilisateur($res_aff_stg3['id_ent'],$conn);
                                       $dataEn = $resEn -> fetch();
                                       print $dataEn['nom_user'];
                                       ?>
                                      </p>

                                       <p>Domaine : <?php
                                       $unecat = new Categorie();
                                       $resC = $unecat->selectCategorie($res_aff_stg3['id_cat'],$conn);
                                       $dataC = $resC -> fetch();
                                       print $dataC['lib_cat'] ?> </p>

                                       <p><?php echo $res_aff_stg2['desc_user_stage']; ?></p>

                                       <p>Note : <?php echo $res_aff_stg2['note_user_stage']; ?> / 5</p>




                                    <?php } ?>

                                    <br>
                                    <hr>
                                    <br>
                                    <h5 class="categories_tittle">Travail <i class="fas fa-caret-down"></i></h5>

                                    <?php
                                    $desoffres = new Offre();
                                    $resStg = $desoffres->selectStageEleve("OEmploi", $id_user,$conn);
                                    while ($res_aff_stg3 = $resStg->fetch()) {

                                      $id_offre_req = $res_aff_stg3['id_offre'];

                                      $unstagee = new Stage();
                                      $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                                      $res_aff_stg2 = $resStge->fetch();
                                     ?>

                                       <h5><?php echo urldecode($res_aff_stg3['lib_offre']) ?></h5>
                                       <p>Début le <?php echo $res_aff_stg3['date_debut_offre']; ?> à <?php
                                       $unutilisateur = new Utilisateur();
                                       $resEn = $unutilisateur->selectAllUtilisateur($res_aff_stg3['id_ent'],$conn);
                                       $dataEn = $resEn -> fetch();
                                       print $dataEn['nom_user'];
                                        ?></p>

                                       <p>Domaine : <?php
                                       $unecat = new Categorie();
                                       $resC = $unecat->selectCategorie($res_aff_stg3['id_cat'],$conn);
                                       $dataC = $resC -> fetch();
                                       print $dataC['lib_cat'] ?> </p>

                                       <p><?php echo $res_aff_stg2['desc_user_stage']; ?></p>






                                    <?php } ?>
                                    <br>
                                    <hr>
                                    <br>
                                    <!-- CONTACT -->

                                    <h5>Contact</h5>
                                    <table>
                                        <tr>
                                            <td width="14%"><p>Téléphone</p></td>
                                            <td width="5%"><p> : </p></td>
                                            <td><p><?php echo "0".$dataUs['tel_user']; ?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p>E-mail</p></td>
                                            <td><p> : </p></td>
                                            <td><p><?php echo $dataUs['email_user'] ?></p></td>
                                        </tr>

                                    </table>
                                </form>
                            <?php } else {

                              //////////////////////////////////////////////////////////////////////////////////
                              ////                                                                          ////
                              ////                                                                          ////
                              ////                              MODDIFICATION                               ////
                              ////                                                                          ////
                              ////                                                                          ////
                              //////////////////////////////////////////////////////////////////////////////////
                                ?>

                                <h3>Modification</h3>
                                <h5>A propos</h5>
                                <form class="" action="about.php" method="post">
                                <table>
                                    <tr>
                                        <td width="22%"><p>Nom</p></td>
                                        <td width="5%"><p> : </p></td>
                                        <td><p><input type="text" name="surname_about" value="<?php echo $data['nom_user']; ?>"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="22%"><p>Prénom</p></td>
                                        <td width="5%"><p> : </p></td>
                                        <td><p><input type="text" name="name_about" value="<?php echo $dataE['prenom_eleve']; ?>"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>Compétences</p></td>
                                        <td><p> : </p></td>
                                        <td><p><input type="text" name="skill_about" value="<?php echo $data['dom_acti']; ?>"></p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Date de naissance</p></td>
                                        <td><p> : </p></td>
                                        <td><p><input type="date" name="birth_about" value="<?php echo $dataE['date_naiss']; ?>"></p></td>
                                    </tr>
                                </table>
                                <br>
                                <hr>
                                <br>

                                <!-- DESCRIPTION -->

                                <h5>Description</h5>
                                <?php ?>
                                <p><textarea name="desc_about" class="textareabout" rows="8" placeholder="Vous n'avez pas encore entré de description."
                                             cols="80"><?php echo $data['desc_user']; ?></textarea>
                                             <?php ////////ICI prof ?>
                                             <button type="submit" id="updateabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="valprofil"><i
                                                         class="fas fa-check"></i></button>

                                                       </form>
                                </p>
                                <br>
                                <hr>
                                <br>

                                <!-- EXPERIENCE -->

                                <h5>Experience</h5>
                                <br>


                                <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>

                                <?php
                                $desoffres = new Offre();
                                $resStg = $desoffres->selectStageEleve("OStage", $id_user,$conn);
                                while ($res_aff_stg = $resStg->fetch()) {

                                  $id_offre_req = $res_aff_stg['id_offre'];

                                  $unstagee = new Stage();
                                  $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                                  $res_aff_stg2 = $resStge->fetch();
                                 ?>
                                 <form action="about.php" method="post">
                                   Titre : <input type="text" name="titres" value="<?php echo urldecode($res_aff_stg['lib_offre']) ?>">
                                <div class="select_option">
                                    <p> Domaine :</p>
                                        <select name="selectdomaines">
                                            <?php foreach ($domaine as $d) { ?>
                                                <option value="<?php print $d->id_cat ?>" <?php ($d->id_cat == $res_aff_stg['id_cat']) ? print "selected" : false ?> >
                                                    <?php print $d->lib_cat ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="select_option">
                                    <p> Entreprise :</p>
                                        <select name="selectents">
                                            <?php foreach ($list_ent as $le) { ?>
                                                <option value="<?php print $le->id_user ?>" <?php ($le->id_user == $res_aff_stg['id_ent']) ? print "selected" : false ?> >
                                                    <?php print $le->nom_user ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                </div>

                                Date :
                                <table>
                                    <tr>
                                        <td>Début</td>
                                        <td>Fin</td>
                                    </tr>
                                    <tr>
                                        <td><input type="date" name="date_about_debut_s" value="<?php echo $res_aff_stg['date_debut_offre']; ?>"
                                                   placeholder="Exemple : 2015 - 2017"></td>
                                        <td><input type="date" name="date_about_fin_s" value="<?php echo $res_aff_stg2['date_fin_stage']; ?>"
                                                   placeholder="Exemple : 2015 - 2017"></td>
                                    </tr>
                                </table>
                                <!-- Place : <input type="text" name="place_about_s" value=""
                                               placeholder="Exemple : Paris">  </p> -->
                                <p> Description : <textarea name="desc_about_s" class="textareabout" rows="8"
                                                            cols="80"><?php echo $res_aff_stg2['desc_user_stage']; ?></textarea></p>

                                <input type="number" name="quantitys" min="1" max="5" value="<?php echo $res_aff_stg2['note_user_stage']; ?>" placeholder="Note">

                                <button type="submit" id="updateabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="valstabouts"><i
                                            class="fas fa-check"></i></button>
                                </form>
                                <br>
                                <form action="about.php" method="post">
                                  <button type="submit" id="cancelabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="delabout"><i
                                              class="fas fa-trash-alt"></i></button>

                                </form>
                                <?php } ?>


                                <!-- AJOUT DE STAGE -->

                                <div style="display:none" id="id2">
                                    <form action="about.php" method="post">
                                      Titre : <input type="text" name="titresn" value="">
                                        <div class="select_option">
                                            <p> Domaine :
                                                <select name="selectdomainesn">
                                                    <?php foreach ($domaine as $d) { ?>
                                                        <option value="<?php print $d->id_cat ?>">
                                                            <?php print $d->lib_cat ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <div class="select_option">
                                            <p> Entreprise :
                                                <select name="selectentsn">
                                                    <?php foreach ($list_ent as $le) { ?>
                                                        <option value="<?php print $le->id_user ?>">
                                                            <?php print $le->nom_user ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                        </div>

                                        Date :
                                        <table>
                                            <tr>
                                                <td>Début</td>
                                                <td>Fin</td>
                                            </tr>
                                            <tr>
                                                <td><input type="date" name="date_about_debut_sn" value=""
                                                           placeholder="Exemple : 2015 - 2017"></td>
                                                <td><input type="date" name="date_about_fin_sn" value=""
                                                           placeholder="Exemple : 2015 - 2017"></td>
                                            </tr>
                                        </table>
                                        <!-- Place : <input type="text" name="place_about_sn" value=""
                                                       placeholder="Exemple : Paris">  </p> -->
                                        <p> Description : <textarea name="desc_about_sn" class="textareabout" rows="8" placeholder="Description du stage"
                                                                    cols="80"></textarea></p>

                                       <input type="number" name="quantitysn" min="1" max="5" placeholder="Note">

                                        <button type="submit" id="updateabout" value="1" name="valstabout"><i
                                                    class="fas fa-check"></i></button>
                                    </form>
                                </div>

                                <br><br>

                                <button type="submit" onclick="document.getElementById('id2').style.display = 'block'"
                                        id="updateabout" value="1" name="addsabout"><i class="fas fa-plus"></i></button>


                                <br>
                                <hr>
                                <br>




                                <h5 class="categories_tittle">Travail <i class="fas fa-caret-down"></i></h5>

                                <?php
                                $desoffres = new Offre();
                                $resStg = $desoffres->selectStageEleve("OEmploi", $id_user,$conn);
                                while ($res_aff_stg = $resStg->fetch()) {

                                  $id_offre_req = $res_aff_stg['id_offre'];

                                  $unstagee = new Stage();
                                  $resStge = $unstagee->selectUnStage($id_offre_req,$conn);
                                  $res_aff_stg2 = $resStge->fetch();
                                 ?>

                                 <form action="about.php" method="post">
                                   Titre : <input type="text" name="titret" value="<?php echo urldecode($res_aff_stg['lib_offre']) ?>">
                                <div class="select_option">
                                    <p> Domaine :</p>
                                        <select name="selectdomainet">
                                            <?php foreach ($domaine as $d) { ?>
                                                <option value="<?php print $d->id_cat ?>" <?php ($d->id_cat == $res_aff_stg['id_cat']) ? print "selected" : false ?> >
                                                    <?php print $d->lib_cat ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="select_option">
                                    <p> Entreprise :</p>
                                        <select name="selectentt">
                                            <?php foreach ($list_ent as $le) { ?>
                                                <option value="<?php $le->id_user ?>" <?php ($le->id_user == $res_aff_stg['id_ent']) ? print "selected" : false ?> >
                                                    <?php print $le->nom_user ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                </div>

                                Date :
                                <table>
                                    <tr>
                                        <td>Début</td>

                                    </tr>
                                    <tr>
                                        <td><input type="date" name="date_about_debut_t" value="<?php echo $res_aff_stg['date_debut_offre']; ?>"
                                                   placeholder="Exemple : 2015 - 2017"></td>

                                    </tr>
                                </table>
                                <!-- Place : <input type="text" name="place_about_s" value=""
                                               placeholder="Exemple : Paris">  </p> -->
                                <p> Description : <textarea name="desc_about_t" class="textareabout" rows="8"
                                                            cols="80"><?php echo $res_aff_stg['desc_offre']; ?></textarea></p>



                                <button type="submit" id="updateabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="valstabouttt"><i
                                            class="fas fa-check"></i></button>
                                </form>
                                <br>
                                <form action="about.php" method="post">
                                  <button type="submit" id="cancelabout" value="<?php echo $res_aff_stg['id_offre']; ?>" name="delaboutt"><i
                                              class="fas fa-trash-alt"></i></button>

                                </form>

                                <?php } ?>















                                <!-- Ajout d'un pour nouveau travail fait -->
                                <div style="display:none" id="id1">
                                  <form action="about.php" method="post">
                                    Titre : <input type="text" name="titretn" value="">
                                      <div class="select_option">
                                          <p> Domaine :
                                              <select name="selectdomainetn">
                                                  <?php foreach ($domaine as $d) { ?>
                                                      <option value="<?php print $d->id_cat ?>">
                                                          <?php print $d->lib_cat ?>
                                                      </option>
                                                  <?php } ?>
                                              </select>
                                      </div>
                                      <div class="select_option">
                                          <p> Entreprise :
                                              <select name="selectenttn">
                                                  <?php foreach ($list_ent as $le) { ?>
                                                      <option value="<?php print $le->id_user ?>">
                                                          <?php print $le->nom_user ?>
                                                      </option>
                                                  <?php } ?>
                                              </select>
                                      </div>

                                      Date :
                                      <table>
                                          <tr>
                                              <td>Début</td>

                                          </tr>
                                          <tr>
                                              <td><input type="date" name="date_about_debut_tn" value=""
                                                         placeholder="Exemple : 2015 - 2017"></td>

                                          </tr>
                                      </table>
                                      <!-- Place : <input type="text" name="place_about_sn" value=""
                                                     placeholder="Exemple : Paris">  </p> -->
                                      <p> Description : <textarea name="desc_about_tn" class="textareabout" rows="8" placeholder="Description du stage"
                                                                  cols="80"></textarea></p>



                                      <button type="submit" id="updateabout" value="1" name="valstaboutt"><i
                                                  class="fas fa-check"></i></button>
                                                  <?php //////////// ICI TRAV ?>
                                  </form>
                                </div>

                                <br><br>

                                <button type="submit" onclick="document.getElementById('id1').style.display = 'block'"
                                        id="updateabout" value="1" name="addtabout"><i class="fas fa-plus"></i></button>

                                <hr>
                                <br>





                                <!-- CONTACT -->
                                  <form action="about.php" method="post">
                                <h5>Contact</h5>
                                <table>
                                    <tr>
                                        <td width="14%"><p>Téléphone</p></td>
                                        <td width="5%"><p> : </p></td>
                                        <td><p><input type="text" name="tel_about" value="<?php echo "0".$data['tel_user']; ?>"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>E-mail</p></td>
                                        <td><p> : </p></td>
                                        <td><p><input type="text" name="mail_about" value="<?php echo $data['email_user']; ?>"></p>
                                        </td>
                                    </tr>

                                </table>

                                <table>
                                    <tr>
                                        <td>
                                            <button type="submit" id="updateabout" value="1" name="contactcvs"><i
                                                        class="fas fa-check"></i></button>
                                        </td>
                                      </form>
                                    </tr>
                                    <tr>
                                      <form action="about.php" method="post">
                                          <td>
                                              <button type="submit" id="cancelabout" value="1" name="cancelabout"><i
                                                          class="fas fa-ban"></i></button>
                                          </td>
                                      </form>
                                    </tr>
                                </table>

                                <?php
                            } ?>
                        </div>
                    </div>
                </div>


                <!-- left side bar -->
                <div class="col">
                    <div class="left_side_bar">
                        <div class="categories">
                            <h3 class="categories_tittle me_tittle">About Me</h3>
                            <p><?php (!empty($uneleve->getDescUser()))? print $uneleve->getDescUser() : print 'Encore aucune description' ?></p>
                        </div>
                        <?php require ('./part/left.php')?>
                        <!-- Right side bar -->
                        <?php require ('./part/right.php')?>
                <!-- Right bar end -->
                    </div>
                </section>
    <?php
  }


} ?>
<!-- End Min Container area -->

<!-- Footer area -->
<?php require('part/footer.php'); ?>



<?php
/// TRAITEMENT

//////////AJOUT STAGE

if (isset($_POST['valstabout'])) {
   $id_catsn = $_POST['selectdomainesn'];
   $id_entsn = $_POST['selectentsn'];
   $dated = $_POST['date_about_debut_sn'];
   $datef = $_POST['date_about_fin_sn'];
   //$addsn = $_POST['place_about_sn'];
   $descsn = $_POST['desc_about_sn'];
   $libo = $_POST['titresn'];
   $notesn = $_POST['quantitysn'];
   $date = date("Y-m-d");
   $id_user_eleve = $id_user;

    $unstage = new Stage('',$libo,'',$dated,$date,'',$id_user,$id_catsn,$id_entsn,$id_user_eleve,$datef,$notesn,$descsn);
    $unstage->insert_stage($conn);
   ?>
     <script>
       window.location='./about.php';
     </script>
   <?php
}

//////////DELETE STAGE

if (isset($_POST['delabout'])) {
  $id_offre = $_POST['delabout'];
  $unstage = new Stage($id_offre);
  $unstage->delete_stage($conn);
  $unstage = new Offre($id_offre);
  $unstage->delete_offre($conn);

  ?>
    <script>
      window.location='./about.php';
    </script>
  <?php
}

//////////MOFIFIER STAGE

if (isset($_POST['valstabouts'])) {
  $id_offre = $_POST['valstabouts'];
  $datef = $_POST['date_about_fin_s'];
  $notes = $_POST['quantitys'];
  $descs = $_POST['desc_about_s'];
  $libo = $_POST['titres'];
  $dated = $_POST['date_about_debut_s'];
  $id_cats = $_POST['selectdomaines'];
  $id_ents = $_POST['selectents'];
  $id_user_Eleve = $id_user;


  $unstage = new Stage($id_offre, $libo, '', $dated, '', $descs, '', $id_cats, $id_ents, $id_user_Eleve, $datef, $notes, $descs);
  $unstage->modifier_stage($conn);
  ?>
    <script>
      window.location='./about.php';
    </script>
  <?php
}



////////////////////////////



//////////AJOUT TRAVAIL

if (isset($_POST['valstaboutt'])) {
   $id_cattn = $_POST['selectdomainetn'];
   $id_enttn = $_POST['selectenttn'];
   $dated = $_POST['date_about_debut_tn'];
   $datef = $_POST['date_about_fin_tn'];
   //$addsn = $_POST['place_about_sn'];
   $desctn = $_POST['desc_about_tn'];
   $libo = $_POST['titretn'];
   $notetn = $_POST['quantitytn'];
   $date = date("Y-m-d");
   $id_user_eleve = $id_user;

   $unemploi = new Emploi('',$libo,'',$dated,$date,$desctn,$id_user,$id_cattn,$id_enttn,$id_user_eleve,'','');
   $unemploi->insert_emploi($conn);
   ?>
     <script>
       window.location='./about.php';
     </script>
   <?php
}

//////////DELETE TRAVAIL

if (isset($_POST['delaboutt'])) {
  $id_offre = $_POST['delaboutt'];
  $unstage = new Emploi($id_offre);
  $unstage->delete_emploi($conn);
  $unstage = new Offre($id_offre);
  $unstage->delete_offre($conn);

  ?>
    <script>
      window.location='./about.php';
    </script>
  <?php
}

//////////MOFIFIER TRAVAIL

if (isset($_POST['valstabouttt'])) {
  $id_offre = $_POST['valstabouttt'];
  $desct = $_POST['desc_about_t'];
  $libo = $_POST['titret'];
  $dated = $_POST['date_about_debut_t'];
  $id_catt = $_POST['selectdomainet'];
  $id_entt = $_POST['selectentt'];
  $id_user_Eleve = $id_user;

  $unstage = new Emploi($id_offre, $libo, '', $dated, '', $desct, '', $id_catt, $id_entt, $id_user_Eleve, '', '');
  $unstage->modifier_emploi($conn);
  ?>
    <script>
      window.location='./about.php';
    </script>
  <?php
}


if (isset($_POST['valprofil'])) {
  $nom = $_POST['surname_about'];
  $prenom = $_POST['name_about'];
  $daten = $_POST['birth_about'];
  $comp = $_POST['skill_about'];
  $desc = $_POST['desc_about'];
  $mdp = $_SESSION['mdp'];
  $photo = $uneleve->getPhotoUser();
  $choixpos = $uneleve->getChoixPosition();


  $unstage = new Eleve($id_user,$nom,$login_user,$mdp,$mail_user,$tel_user,$Nrue,$rue,$cp,$ville,$photo,$desc,$comp,$prenom,$daten,$choixpos);
  $unstage->modifier_eleve($unstage,$conn);
  ?>
    <script>
      window.location='./about.php';
    </script>
  <?php
}


if (isset($_POST['contactcvs'])) {
  $tel = $_POST['tel_about'];
  $mail = $_POST['mail_about'];
  $mdp = $_SESSION['mdp'];

  $unstage = new Eleve($id_user,$nom,$login_user,$mdp,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo_user,$desc_user,$skill,$prenom,$birth,$choixpos);
  $unstage->modifier_eleve($unstage,$conn);
  ?>
    <script>
      window.location='./about.php';
    </script>
  <?php
}


// $surname_a = $_POQT['surname_about'];
// $name_a = $_POST['name_about'];
// $skill_a = $_POST['skill_about'];
// $birth_a = $_POST['birth_about'];
//
// $uneleve = new Eleve($id_user,$surname_a,$login_user,$pass_user,$mail_user,$tel_user,$Nrue,$rue,$cp,$ville,$photo_user,$desc_user,$skill_a,$name_a,$birth_a,$pos_user);
//
// $uneleve->modifier_eleve($uneleve,$conn);
 ?>












<!-- End Footer area -->

<!-- Add post poup area -->
<?php
require('part/post.php');


?>
<!-- End Add post poup area -->

<!-- jQuery JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Materialize JS -->
<script src="js/materialize.min.js"></script>
<!-- Calendar JS -->
<script src="vendors/calendar/dcalendar.picker.js"></script>
<!-- Load JS -->
<script src="vendors/infinite-scroll/jquery.jscroll.js"></script>
<!-- Check Button js -->
<script src="vendors/check-button/jquery.jqflipswitch.min.js"></script>
<script src="vendors/check-button/jquery.jqflipswitch.js"></script>
<!-- Theme JS -->
<script src="js/theme.js"></script>
</body>

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
</html>
