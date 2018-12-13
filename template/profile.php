<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Profile                                   ////
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
        <img src="images/banner-2.jpg" alt="" class="banner_img">
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
                    <li>Followers <b><?php print $ami;  ?></b></li>
                    <li>Following <b><?php print $suivi; ?></b></li>
                </ul>
            </div>
            <div class="col l4 m6">
                <ul class="follow_messages">
                    <li><a href="./requests.php?groupe=elve" class="waves-effect">Follow</a></li>
                    <li><a href="#" class="waves-effect">Messages</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Tranding Area -->

    <!-- Min Container area -->
    <section class="min_container profile_pages">
        <div class="section_row">
            <div class="middle_section col">

              <?php


              $SQL = "SELECT p.id_post, p.id_cat, p.id_user, p.heure_post, p.date_post, p.titre_post, p.contenu_post FROM Post p, ajoute_amis am WHERE am.id_user_Eleve = p.id_user ORDER BY p.date_post DESC";
              $req = $conn->Query($SQL) or die("La requete n'a pas aboutie (selection post amis)");
              while ($res=$req->fetch()) {


                $cat = $res['id_cat'];
                  $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                  $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                  $dataC=$resC->fetch();

                  $id_user_util = $res['id_user'];
                  $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user_util'";
                  $resU = $conn -> query($sqlU)or die($conn -> errorInfo());
                  $dataU = $resU -> fetch();
                  ?>

               <!-- Post -->
               <div class="post">
                   <div class="post_content">
                       <a href="details.html" class="post_img">
                           <img src="images/post.jpg" alt="">
                           <span><i class="ion-android-radio-button-off"></i><?php echo $dataC['lib_cat']; ?></span>
                       </a>
                       <div class="row author_area">
                           <div class="col s4 author">
                               <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/<?php select_image_profil($id_user_util, $conn) ?>" alt="" class="circle"></div>

                               <div class="col s8 media_body">

                                   <a href="#"><?php echo $dataU['nom_user']; ?></a>
                                   <span><?php echo $res['date_post'].", ".$res['heure_post']; ?></span>
                               </div>
                           </div>
                           <div class="col s4 btn_floating">

                           </div>

                       </div>
                       <a  class="post_heding"><?php echo $res['titre_post']; ?></a>
                       <p><?php echo $res['contenu_post']; ?></p>
                   </div>
                   <center><a href="#" class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a></center>
                   <br>
               </div>
               <!-- End Post -->
             <?php

              }
               ?>


               <!-- Post -->
                <!-- <div class="pagination_area">
                    <ul class="pagination">
                        <li class="disabled"><a href="#!"><i class="ion-chevron-left"></i></a></li>
                        <li class="active"><a href="#!" class="waves-effect">1</a></li>
                        <li><a href="#!" class="waves-effect">2</a></li>
                        <li><a href="#!" class="waves-effect">3</a></li>
                        <li><a href="#!" class="waves-effect">4</a></li>
                        <li><a href="#!" class="waves-effect">...</a></li>
                        <li><a href="#!" class="waves-effect">20</a></li>
                        <li><a href="#!" class="waves-effect"><i class="ion-chevron-right"></i></a></li>
                    </ul>
                </div> -->
            </div>
            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">About Me</h3>
                        <p><?php (!empty($uneleve->getDescUser()))? print urldecode($uneleve->getDescUser()) : print 'Encore aucune description' ?></p>
                    </div>
                    <?php require ('./part/left.php')?>
            <!-- Right side bar -->
                    <?php require ('./part/right.php')?>
            <!-- Right bar end -->
        </div>
    </section>
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

  <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
  </html>








  <?php }// fin eleve profile

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                              Entreprise                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

elseif(isset($_SESSION['Entreprise'])){

  $id = dec_enc('decrypt',$_SESSION['id']);
  $uneent= unserialize($_SESSION['Entreprise']);
  $id_user = $uneent->getIdUser();

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
          <img src="images/banner-2.jpg" alt="" class="banner_img">
          <div class="media profile_picture">
              <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
              <div class="media_body">
                  <a href="profile.php"><?php print $uneent->getNomUser().' '.$uneent->getNomResp() ?></a>
                  <h6><?php print $uneent->getNumAddr()." ".$uneent->getRueAddr(); ?></h6>
                  <h6><?php print $uneent->getVilleAddr(); ?></h6>
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
                      <li>Followers <b><?php print $ami;  ?></b></li>
                      <li>Following <b><?php print $suivi; ?></b></li>
                  </ul>
              </div>
              <div class="col l4 m6">
                  <ul class="follow_messages">
                      <li><a href="./requests.php?groupe=elve" class="waves-effect">Follow</a></li>
                      <li><a href="#" class="waves-effect">Messages</a></li>
                  </ul>
              </div>
          </div>
      </section>
      <!-- End Tranding Area -->

      <!-- Min Container area -->
      <section class="min_container profile_pages">
          <div class="section_row">
              <div class="middle_section col">

                <?php


                $SQL = "SELECT p.id_post, p.id_cat, p.id_user, p.heure_post, p.date_post, p.titre_post, p.contenu_post FROM Post p, ajoute_amis am WHERE am.id_user_Eleve = p.id_user ORDER BY p.date_post DESC";
                $req = $conn->Query($SQL) or die("La requete n'a pas aboutie (selection post amis)");
                while ($res=$req->fetch()) {


                  $cat = $res['id_cat'];
                    $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                    $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                    $dataC=$resC->fetch();

                    $id_user_util = $res['id_user'];
                    $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user_util'";
                    $resU = $conn -> query($sqlU)or die($conn -> errorInfo());
                    $dataU = $resU -> fetch();
                    ?>

                 <!-- Post -->
                 <div class="post">
                     <div class="post_content">
                         <a href="details.html" class="post_img">
                             <img src="images/post.jpg" alt="">
                             <span><i class="ion-android-radio-button-off"></i><?php echo $dataC['lib_cat']; ?></span>
                         </a>
                         <div class="row author_area">
                             <div class="col s4 author">
                                 <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/<?php select_image_profil($id_user_util, $conn) ?>" alt="" class="circle"></div>

                                 <div class="col s8 media_body">

                                     <a href="#"><?php echo $dataU['nom_user']; ?></a>
                                     <span><?php echo $res['date_post'].", ".$res['heure_post']; ?></span>
                                 </div>
                             </div>
                             <div class="col s4 btn_floating">

                             </div>

                         </div>
                         <a  class="post_heding"><?php echo $res['titre_post']; ?></a>
                         <p><?php echo $res['contenu_post']; ?></p>
                     </div>
                     <center><a href="#" class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a></center>
                     <br>
                 </div>
                 <!-- End Post -->
               <?php

                }
                 ?>


                 <!-- Post -->
                  <!-- <div class="pagination_area">
                      <ul class="pagination">
                          <li class="disabled"><a href="#!"><i class="ion-chevron-left"></i></a></li>
                          <li class="active"><a href="#!" class="waves-effect">1</a></li>
                          <li><a href="#!" class="waves-effect">2</a></li>
                          <li><a href="#!" class="waves-effect">3</a></li>
                          <li><a href="#!" class="waves-effect">4</a></li>
                          <li><a href="#!" class="waves-effect">...</a></li>
                          <li><a href="#!" class="waves-effect">20</a></li>
                          <li><a href="#!" class="waves-effect"><i class="ion-chevron-right"></i></a></li>
                      </ul>
                  </div> -->
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

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
    </html>*

    <?php
}
     ?>
