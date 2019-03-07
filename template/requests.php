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

                  $unuser = new Utilisateur();
                  $resuser = $unuser -> selectSpecielUser($id_user,$id_user2,$conn);
                  while ($res2 = $resuser->fetch()) {

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

                                         $resuser = $unuser -> selectAllAmis($id_user,$id_user_amis,$conn);

                                         if ($res3 = $resuser->fetch()) {
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
                $resamis = $unuser -> ajoutAmis($id_user_amis,$id_user,$conn,'elve');
              }

              if (isset($_GET['dela'])) {
                $id_user_amis = $_GET['dela'];
                $resamis = $unuser -> supprimerAmis($id_user_amis,$conn,'elve');
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

                  $unuser = new Utilisateur();
                  $resuser = $unuser -> selectSpecielUser($id_user,$id_user2,$conn);
                  while ($res2 = $resuser->fetch()) {

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
                                        $resuser = $unuser -> selectAllAmis($id_user,$id_user_amis,$conn);

                                        if ($res3 = $resuser->fetch()) {
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
                  $resamis = $unuser -> ajoutAmis($id_user_amis,$id_user,$conn,'entr');
                }

                if (isset($_GET['dele'])) {
                  $id_user_amis = $_GET['dele'];
                  $resamis = $unuser -> supprimerAmis($id_user_amis,$conn,'entr');
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- End Notifications area -->

    <!-- Footer area -->
    <?php require('part/footer.php'); ?>
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

              $uneleve = new Eleve();
              $reseleve = $uneleve -> selectEleve($conn);
              while ($res = $reseleve->fetch()) {

                $id_user2 = $res['id_user'];

                $unuser = new Utilisateur();
                $resuser = $unuser -> selectSpecielUser($id_user,$id_user2,$conn);
                while ($res2 = $resuser->fetch()) {

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
                                         $resuser = $unuser -> selectAllAmis($id_user,$id_user_amis,$conn);

                                         if ($res3 = $resuser->fetch()) {
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
                $resamis = $unuser -> ajoutAmis($id_user_amis,$id_user,$conn,'elve');
              }

              if (isset($_GET['dela'])) {
                $id_user_amis = $_GET['dela'];
                $resamis = $unuser -> supprimerAmis($id_user_amis,$conn,'elve');
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

                  $unuser = new Utilisateur();
                  $resuser = $unuser -> selectSpecielUser($id_user,$id_user2,$conn);
                  while ($res2 = $resuser->fetch()) {

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
                                        $resuser = $unuser -> selectAllAmis($id_user,$id_user_amis,$conn);

                                        if ($res3 = $resuser->fetch()) {
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
                  $resamis = $unuser -> ajoutAmis($id_user_amis,$id_user,$conn,'entr');
                }

                if (isset($_GET['dele'])) {
                  $id_user_amis = $_GET['dele'];
                  $resamis = $unuser -> supprimerAmis($id_user_amis,$conn,'entr');
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- End Notifications area -->


    <!-- Footer area -->
    <?php require('part/footer.php'); ?>
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
