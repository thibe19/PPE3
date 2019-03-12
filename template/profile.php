<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Profile                                   ////
////                                07/03/2019                                ////
////                                V0.0.9                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

session_start();
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');

if (isset($_SESSION['Eleve'])) {
    $uneleve = unserialize($_SESSION['Eleve']);
    $id_user = $uneleve->getIdUser();


//TODO PENSER A DESCTIVER LA SESSION Profilon quand navigation en dehors d'une page profil
?>
<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:13 GMT -->
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
    <!-- Calendar CSS-->
    <link rel="stylesheet" href="vendors/calendar/dcalendar.picker.css">
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

    <!-- Tranding-select and banner Area -->


    <!-- TEST ELEVE -->
    <div class="banner_area banner_2">
        <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt="" class="banner_img">
        <div class="media profile_picture">
            <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
            <div class="media_body">
                <a href="profile.php"><?php print $uneleve->getNomUser().' '.$uneleve->getPrenomEleve() ?></a>
                <h6><?php print $uneleve->getNumAddr()." ".$uneleve->getRueAddr(); ?></h6>
                <h6><?php print $uneleve->getVilleAddr(); ?></h6>
            </div>
        </div>
    </div>
    <section class="author_profile">
        <div class="row author_profile_row">
            <div class="col l4 m6">
                <ul class="profile_menu">
                    <li><a href="profile.php">Activiter</a></li>
                    <li><a href="about.php">A propos</a></li>
                    <!-- <li class="post_d"><a class="dropdown-button" href="#!" data-activates="dro_pm">...</a> -->
                        <!-- Dropdown Structure -->
                        <!-- <ul id="dro_pm" class="dropdown-content">
                            <li><a href="#">Popular Post</a></li>
                            <li><a href="#">Save Post</a></li>
                        </ul>
                    </li> -->
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
            <div class="col l4 m6" >
                <ul id="postpro" style="background-color:#ffffff" class="tranding_select tabs">
                  <li class="tab"><a href="#postami" class="waves-effect btn active">>Posts de mes amis</a></li>
                  <li class="tab"><a href="#postmoi" class="waves-effect btn ">>Mes Posts</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Tranding Area -->

    <!-- Min Container area -->
    <section class="min_container profile_pages">
        <div class="section_row">
            <div class="middle_section col">

              <div id="postami">
              <?php

              $unpost = new Post();
              $param = array(
                  "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                  "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                      "INNER JOIN Utilisateur u ON Post.id_user=u.id_user
                      INNER JOIN ajoute_amis ON Post.id_user=ajoute_amis.id_user_Eleve"),
                  "FiltreWhere" => " Post.id_user != '$id_user' "
              );
              $res = $unpost->getAll($param,$conn);
              $lespostsami = "";
              foreach ($res as $data){
                  $lespostsami .= $unpost->affichepost($data->photo_post,$data->lib_cat,$data->id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$data->photo_user,$data->nom_user)."<br>";
              }
              print $lespostsami;
               ?>
            </div>
            <div id="postmoi">
                <?php

                $param = array(
                    "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                    "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                        "INNER JOIN Utilisateur u ON Post.id_user=u.id_user"),
                    "FiltreWhere" => " Post.id_user = '$id_user' "
                );
                $res = $unpost->getAll($param,$conn);
                $mesposts = "";
                foreach ($res as $data){
                    $mesposts .= $unpost->affichepost($data->photo_post,$data->lib_cat,$data->id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$data->photo_user,$data->nom_user)."<br>";
                }
                print $mesposts;
                ?>

            </div>

          </div>
            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">A PROPOS</h3>
                        <p><?php (!empty($uneleve->getDescUser()))? print urldecode($uneleve->getDescUser()) : print 'Encore aucune description' ?></p>
                    </div>
                    <?php require ('./part/left.php')?>
            <!-- Right side bar -->
                    <?php require ('./part/right.php')?>
            <!-- Right bar end -->
        </div>
    </section>
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

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
    </html>

    <?php
}
     ?>
