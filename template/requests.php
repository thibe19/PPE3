<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Request                                   ////
////                                10/12/2018                                ////
////                                V0.0.7                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////
session_start();
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');
if (isset($_SESSION['Eleve'])) {
    $uneleve = unserialize($_SESSION['Eleve']);
    $id_user = $uneleve->getIdUser();


?>
<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/requests.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
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
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
    <!-- Check-button CSS-->
    <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">
    <!-- Calendar CSS-->
    <link rel="stylesheet" href="vendors/check-button/jqflipswitch.default.style.css">

    <!--Theme Styles CSS-->
	<link rel="stylesheet" href="css/style.css" media="all" />

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
    <ul class="tranding_select ">
        <li class="tab"><a href="requests.php?groupe=elve" class="waves-effect btn <?php if ($_GET['groupe'] == "elve") { echo "active"; } ?>">élèves</a></li>
        <li class="tab"><a href="requests.php?groupe=entr" class="waves-effect btn <?php if ($_GET['groupe'] == "entr") { echo "active"; } ?>">Entreprises</a></li>
    </ul>
    <!-- Notifications area -->
    <section class="liste_user">
        <div class="notifications">
            <!-- Dropdown Structure -->

              <?php

            //////////// eleves affichage

            if ($_GET['groupe'] == "elve") {

              ?>
              <div class="hed_notic">Tout les élèves <span><i class="ion-ios-gear-outline"></i></span></div>
              <ul class="notifications_content follow">
              <?php

              $uneleve = new Eleve();
              $reseleve = $uneleve -> selectEleve($conn);
              while ($res = $reseleve->fetch()) {


                  $id_user2 = $res['id_user'];

                  $SQL2 = "SELECT * FROM Utilisateur
                           WHERE id_user = $id_user2
                           AND id_user != $id_user";
                  $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
                  while ($res2 = $req2->fetch()) {

                    if ($res2['photo_user'] == "") {
                      $photo = "avatar.png";
                    }
                    else {
                      $photo = $res2['photo_user'];
                    }

                    $id_user_amis = $res2['id_user']

               ?>


                <li>
                   <a href="#">
                       <div class="media first_child">
                         <a href="about.php?visit=<?php print dec_enc('encrypt',$id_user_amis) ?>">
                            <img src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle responsive-img">
                          </a>
                            <div class="media_body">
                                <p><b><?php echo $res2['nom_user']; ?></b></p>
                                <h6> <?php echo $res2['num_addr_user'].", ".$res2['rue_addr_user'].", ".$res2['CP_addr_user']." ".$res2['ville_addr_user']; ?> </h6>

                                <div class="btn_group">

                                     <table>
                                       <tr>
                                         <td><span onClick="window.location='requests.php?groupe=elve&ctc';" class="waves-effect follow_b">Contacter</span></td>
                                         <td width="200px">
                                         <?php

                                         $SQL3 = "SELECT * FROM ajoute_amis
                                                  WHERE id_user_Eleve = $id_user_amis
                                                  AND id_user = $id_user";
                                         $req3 = $conn->Query($SQL3) or die("L'utilisateur n'existe pas");
                                         //$res3 = $req3->fetch();
                                         if ($res3 = $req3->fetch()) {
                                           ?> <span onClick="window.location='requests.php?groupe=elve&dela=<?php echo $res2['id_user']; ?>';" class="waves-effect">Supprimer amis</span> <?php
                                         }
                                         else {
                                           ?> <span onClick="window.location='requests.php?groupe=elve&adda=<?php echo $res2['id_user']; ?>';" class="waves-effect">Ajouter amis</span> <?php
                                         }
                                          ?>
                                        </td>
                                       </tr>
                                     </table>
                                </div>
                            </div>
                       </div>
                   </a>
                </li>
              <?php }}}


              if (isset($_GET['adda'])) {
                $id_user_amis = $_GET['adda'];

                $SQL = "INSERT INTO ajoute_amis
                        VALUES('$id_user', '$id_user_amis');";
                $res = $conn->Query($SQL)or die('');
                ?>
                  <script type="text/javascript">
                    window.location='requests.php?groupe=elve';
                  </script>
                <?php
              }

              if (isset($_GET['dela'])) {
                $id_user_amis = $_GET['dela'];

                $SQL = "DELETE FROM ajoute_amis
                        WHERE id_user_Eleve = $id_user_amis
                        AND id_user = $id_user;";
                $res = $conn->Query($SQL)or die('');
                ?>
                  <script type="text/javascript">
                    window.location='requests.php?groupe=elve';
                  </script>
                <?php
              }


              ///////////////// entreprise affichage


              if ($_GET['groupe'] == "entr") {

                ?>
                <div class="hed_notic">Toutes les entreprises <span><i class="ion-ios-gear-outline"></i></span></div>
                <ul class="notifications_content follow">
                <?php

                $uneentreprise = new Entreprise();
                $resentreprise = $uneentreprise -> selectEntreprise($conn);
                while ($res = $resentreprise -> fetch()) {


                  $id_user2 = $res['id_user'];

                    $SQL2 = "SELECT * FROM Utilisateur
                            WHERE id_user = $id_user2
                            AND id_user != $id_user";
                    $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
                    while ($res2 = $req2->fetch()) {

                      if ($res2['photo_user'] == "") {
                        $photo = "avatar2.png";
                      }
                      else {
                        $photo = $res2['photo_user'];
                      }

                      $id_user_amis = $res2['id_user']
                 ?>


                  <li>
                     <a href="#">
                         <div class="media first_child">
                              <img src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle responsive-img">
                              <div class="media_body">
                                  <p><b><?php echo $res2['nom_user']; ?></b> </p>
                                  <h6> <?php echo $res2['num_addr_user'].", ".$res2['rue_addr_user'].", ".$res2['CP_addr_user']." ".$res2['ville_addr_user']; ?> </h6>
                                  <div class="btn_group">
                                    <table>
                                      <tr>
                                        <td><span onClick="window.location='messages.php?ctc=<?php echo $res2['id_user']; ?>';" class="waves-effect follow_b">Contacter</span></td>
                                        <td width="200px">
                                        <?php
                                        $SQL3 = "SELECT * FROM ajoute_amis
                                                 WHERE id_user_Eleve = $id_user_amis";
                                        $req3 = $conn->Query($SQL3) or die("L'utilisateur n'existe pas");
                                        if ($res3 = $req3->fetch()) {
                                          ?> <span onClick="window.location='requests.php?groupe=entr&dele=<?php echo $res2['id_user']; ?>';" class="waves-effect">Arrêter de suivre</span> <?php
                                        }
                                        else {
                                          ?> <span onClick="window.location='requests.php?groupe=entr&adde=<?php echo $res2['id_user']; ?>';" class="waves-effect">Suivre </span> <?php
                                        }
                                         ?>
                                       </td>
                                      </tr>
                                    </table>
                                  </div>
                              </div>
                         </div>
                     </a>
                  </li>
                <?php }}}
                if (isset($_GET['adde'])) {
                  $id_user_amis = $_GET['adde'];

                  $SQL = "INSERT INTO ajoute_amis
                          VALUES('$id_user', '$id_user_amis');";
                  $res = $conn->Query($SQL)or die('');
                  ?>
                    <script type="text/javascript">
                      window.location='requests.php?groupe=entr';
                    </script>
                  <?php
                }

                if (isset($_GET['dele'])) {
                  $id_user_amis = $_GET['dele'];

                  $SQL = "DELETE FROM ajoute_amis
                          WHERE id_user_Eleve = $id_user_amis;";
                  $res = $conn->Query($SQL)or die('');
                  ?>
                    <script type="text/javascript">
                      window.location='requests.php?groupe=entr';
                    </script>
                  <?php
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- End Notifications area -->

    <!-- Footer area -->
    <footer class="footer_area">
        <div class="footer_row row">
            <div class="col l3 m6 footer_col">
                <div class="popular_posts">
                    <h3 class="categories_tittle">Popular Posts</h3>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                           <a href="#">
                                <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                           </a>
                        </div>
                        <div class="col s9 p_content">
                           <a href="#">Poster can be one of the <br> effective marketing and </a>
                            <span class="black_text">2 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                           <a href="#">
                                <img src="images/recent-post-2.jpg" alt="" class="circle responsive-img">
                           </a>
                        </div>
                        <div class="col s9 p_content">
                           <a href="#">Color is so powerful that it can persuade, motivate, inspire</a>
                            <span class="black_text">3 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                           <a href="#">
                                <img src="images/recent-post-3.jpg" alt="" class="circle responsive-img">
                           </a>
                        </div>
                        <div class="col s9 p_content">
                           <a href="#">What makes one logo better than another?</a>
                            <span class="black_text">4 days ago</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 footer_col footer_trending">
                <h3 class="categories_tittle">Trending</h3>
                <div class="trending_area">
                    <ul class="collapsible trending_collaps" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Healthy Environment For Self Esteem</div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropup-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Burn The Ships</div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropup-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="ion-chevron-right"></i>Harness The Power Of Your Dreams</div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropup-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col l3 m6 footer_col">
                <div class="badges">
                    <h3 class="categories_tittle">Badges</h3>
                    <ul class="badges_list">
                        <li><a href="#"><i class="ion-bonfire"></i><span>6</span></a></li>
                        <li><a href="#"><i class="ion-bluetooth"></i></a></li>
                        <li><a href="#"><i class="ion-coffee"></i></a></li>
                        <li><a href="#"><i class="ion-clock"></i> <span>3</span></a></li>
                        <li><a href="#"><i class="ion-camera"></i></a></li>
                        <li><a href="#"><i class="ion-ios-bell-outline"></i><span>2</span></a></li>
                        <li><a href="#"><i class="ion-bluetooth"></i></a></li>
                        <li><a href="#"><i class="ion-coffee"></i></a></li>
                        <li><a href="#"><i class="ion-clock"></i></a></li>
                    </ul>
                </div>

                <div class="social_Sharing">
                    <h3 class="categories_tittle">Social Sharing</h3>
                    <ul class="social_icon">
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#" class="tumblr"><i class="ion-social-tumblr"></i></a></li>
                        <li><a href="#" class="googleplus"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#" class="facebook"><i class="ion-social-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col l3 m6 footer_col">
                <img src="images/advertis-3.jpg" alt="" class="responsive-img">
            </div>
        </div>
        <div class="copy_right">
            © 2018 <a href="#">Open List</a>. All rights reserved.
        </div>
    </footer>
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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/requests.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
</html>

<?php

}// fin eleves

//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                                                          ////
////                            Entreprise                                    ////
////                                                                          ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

elseif (isset($_SESSION['Entreprise'])) {

  $unentreprise = unserialize($_SESSION['Entreprise']);
  $id_user = $unentreprise->getIdUser();

?>
<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/requests.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
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
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
    <!-- Check-button CSS-->
    <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">
    <!-- Calendar CSS-->
    <link rel="stylesheet" href="vendors/check-button/jqflipswitch.default.style.css">

    <!--Theme Styles CSS-->
	<link rel="stylesheet" href="css/style.css" media="all" />

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
    <ul class="tranding_select ">
        <li class="tab"><a href="requests.php?groupe=elve" class="waves-effect btn <?php if ($_GET['groupe'] == "elve") { echo "active"; } ?>">élèves</a></li>
        <li class="tab"><a href="requests.php?groupe=entr" class="waves-effect btn <?php if ($_GET['groupe'] == "entr") { echo "active"; } ?>">Entreprises</a></li>
    </ul>
    <!-- Notifications area -->
    <section class="liste_user">
        <div class="notifications">
            <!-- Dropdown Structure -->

              <?php

            //////////// eleves affichage

            if ($_GET['groupe'] == "elve") {

              ?>
              <div class="hed_notic">Tout les élèves <span><i class="ion-ios-gear-outline"></i></span></div>
              <ul class="notifications_content follow">
              <?php

              $SQL = "SELECT * FROM Eleve";
              $req = $conn->Query($SQL) or die("Erreur selection des eleves");
              while ($res = $req->fetch()) {


                $id_user2 = $res['id_user'];

                $SQL2 = "SELECT * FROM Utilisateur
                           WHERE id_user = $id_user2
                           AND id_user != $id_user";
                  $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
                  while ($res2 = $req2->fetch()) {

                    if ($res2['photo_user'] == "") {
                      $photo = "avatar.png";
                    }
                    else {
                      $photo = $res2['photo_user'];
                    }

                    $id_user_amis = $res2['id_user']

               ?>


                <li>
                   <a href="#">
                       <div class="media first_child">
                            <img src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle responsive-img">
                            <div class="media_body">
                                <p><b><?php echo $res2['nom_user']; ?></b></p>
                                <h6> <?php echo $res2['num_addr_user'].", ".$res2['rue_addr_user'].", ".$res2['CP_addr_user']." ".$res2['ville_addr_user']; ?> </h6>

                                <div class="btn_group">

                                     <table>
                                       <tr>
                                         <td><span onClick="window.location='requests.php?groupe=elve&ctc';" class="waves-effect follow_b">Contacter</span></td>
                                         <td>
                                         <?php
                                         $SQL3 = "SELECT * FROM ajoute_amis
                                                  WHERE id_user_Eleve = $id_user_amis
                                                  AND id_user = $id_user";
                                         $req3 = $conn->Query($SQL3) or die("L'utilisateur n'existe pas");
                                         if ($res3 = $req3->fetch()) {
                                           ?> <span onClick="window.location='requests.php?groupe=elve&dela=<?php echo $res2['id_user']; ?>';" class="waves-effect">Supprimer amis</span> <?php
                                         }
                                         else {
                                           ?> <span onClick="window.location='requests.php?groupe=elve&adda=<?php echo $res2['id_user']; ?>';" class="waves-effect">Ajouter amis</span> <?php
                                         }
                                          ?>
                                        </td>
                                       </tr>
                                     </table>
                                </div>
                            </div>
                       </div>
                   </a>
                </li>
              <?php }}}


              if (isset($_GET['adda'])) {
                print $id_user_amis = $_GET['adda'];

                $SQL = "INSERT INTO ajoute_amis
                        VALUES('$id_user', '$id_user_amis');";
                $res = $conn->Query($SQL)or die('');
                ?>
                  <script type="text/javascript">
                    window.location='requests.php?groupe=elve';
                  </script>
                <?php
              }

              if (isset($_GET['dela'])) {
                $id_user_amis = $_GET['dela'];

                $SQL = "DELETE FROM ajoute_amis
                        WHERE id_user_Eleve = $id_user_amis
                        AND id_user = $id_user;";
                $res = $conn->Query($SQL)or die('');
                ?>
                  <script type="text/javascript">
                    window.location='requests.php?groupe=elve';
                  </script>
                <?php
              }


              ///////////////// entreprise affichage


              if ($_GET['groupe'] == "entr") {

                ?>
                <div class="hed_notic">Toutes les entreprises <span><i class="ion-ios-gear-outline"></i></span></div>
                <ul class="notifications_content follow">
                <?php

                $SQL = "SELECT * FROM Entreprise";
                $req = $conn->Query($SQL) or die("L'utilisateur n'existe pas");
                while ($res = $req->fetch()) {


                  $id_user2 = $res['id_user'];

                    $SQL2 = "SELECT * FROM Utilisateur
                            WHERE id_user = $id_user2
                            AND id_user != $id_user";
                    $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
                    while ($res2 = $req2->fetch()) {

                      if ($res2['photo_user'] == "") {
                        $photo = "avatar2.png";
                      }
                      else {
                        $photo = $res2['photo_user'];
                      }

                      $id_user_amis = $res2['id_user']
                 ?>


                  <li>
                     <a href="#">
                         <div class="media first_child">
                              <img src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle responsive-img">
                              <div class="media_body">
                                  <p><b><?php echo $res2['nom_user']; ?></b> </p>
                                  <h6> <?php echo $res2['num_addr_user'].", ".$res2['rue_addr_user'].", ".$res2['CP_addr_user']." ".$res2['ville_addr_user']; ?> </h6>
                                  <div class="btn_group">
                                    <table>
                                      <tr>
                                        <td><span onClick="window.location='messages.php?ctc=<?php echo $res2['id_user']; ?>';" class="waves-effect follow_b">Contacter</span></td>
                                        <td>
                                        <?php
                                        $SQL3 = "SELECT * FROM ajoute_amis
                                                 WHERE id_user_Eleve = $id_user_amis";
                                        $req3 = $conn->Query($SQL3) or die("L'utilisateur n'existe pas");
                                        if ($res3 = $req3->fetch()) {
                                          ?> <span onClick="window.location='requests.php?groupe=entr&dele=<?php echo $res2['id_user']; ?>';" class="waves-effect">Arrêter de suivre</span> <?php
                                        }
                                        else {
                                          ?> <span onClick="window.location='requests.php?groupe=entr&adde=<?php echo $res2['id_user']; ?>';" class="waves-effect">Suivre </span> <?php
                                        }
                                         ?>
                                       </td>
                                      </tr>
                                    </table>
                                  </div>
                              </div>
                         </div>
                     </a>
                  </li>
                <?php }}}
                if (isset($_GET['adde'])) {
                  $id_user_amis = $_GET['adde'];

                  $SQL = "INSERT INTO ajoute_amis
                          VALUES('$id_user', '$id_user_amis');";
                  $res = $conn->Query($SQL)or die('');
                  ?>
                    <script type="text/javascript">
                      window.location='requests.php?groupe=entr';
                    </script>
                  <?php
                }

                if (isset($_GET['dele'])) {
                  $id_user_amis = $_GET['dele'];

                  $SQL = "DELETE FROM ajoute_amis
                          WHERE id_user_Eleve = $id_user_amis;";
                  $res = $conn->Query($SQL)or die('');
                  ?>
                    <script type="text/javascript">
                      window.location='requests.php?groupe=entr';
                    </script>
                  <?php
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- End Notifications area -->


    <!-- Footer area -->
    <footer class="footer_area">
        <div class="footer_row row">
            <div class="col l3 m6 footer_col">
                <div class="popular_posts">
                    <h3 class="categories_tittle">Popular Posts</h3>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                           <a href="#">
                                <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                           </a>
                        </div>
                        <div class="col s9 p_content">
                           <a href="#">Poster can be one of the <br> effective marketing and </a>
                            <span class="black_text">2 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                           <a href="#">
                                <img src="images/recent-post-2.jpg" alt="" class="circle responsive-img">
                           </a>
                        </div>
                        <div class="col s9 p_content">
                           <a href="#">Color is so powerful that it can persuade, motivate, inspire</a>
                            <span class="black_text">3 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                           <a href="#">
                                <img src="images/recent-post-3.jpg" alt="" class="circle responsive-img">
                           </a>
                        </div>
                        <div class="col s9 p_content">
                           <a href="#">What makes one logo better than another?</a>
                            <span class="black_text">4 days ago</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 footer_col footer_trending">
                <h3 class="categories_tittle">Trending</h3>
                <div class="trending_area">
                    <ul class="collapsible trending_collaps" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Healthy Environment For Self Esteem</div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropup-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Burn The Ships</div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropup-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="ion-chevron-right"></i>Harness The Power Of Your Dreams</div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropup-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col l3 m6 footer_col">
                <div class="badges">
                    <h3 class="categories_tittle">Badges</h3>
                    <ul class="badges_list">
                        <li><a href="#"><i class="ion-bonfire"></i><span>6</span></a></li>
                        <li><a href="#"><i class="ion-bluetooth"></i></a></li>
                        <li><a href="#"><i class="ion-coffee"></i></a></li>
                        <li><a href="#"><i class="ion-clock"></i> <span>3</span></a></li>
                        <li><a href="#"><i class="ion-camera"></i></a></li>
                        <li><a href="#"><i class="ion-ios-bell-outline"></i><span>2</span></a></li>
                        <li><a href="#"><i class="ion-bluetooth"></i></a></li>
                        <li><a href="#"><i class="ion-coffee"></i></a></li>
                        <li><a href="#"><i class="ion-clock"></i></a></li>
                    </ul>
                </div>

                <div class="social_Sharing">
                    <h3 class="categories_tittle">Social Sharing</h3>
                    <ul class="social_icon">
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#" class="tumblr"><i class="ion-social-tumblr"></i></a></li>
                        <li><a href="#" class="googleplus"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#" class="facebook"><i class="ion-social-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col l3 m6 footer_col">
                <img src="images/advertis-3.jpg" alt="" class="responsive-img">
            </div>
        </div>
        <div class="copy_right">
            © 2018 <a href="#">Open List</a>. All rights reserved.
        </div>
    </footer>
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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/requests.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
</html>

<?php
}
 ?>
