<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                index                                     ////
////                                12/12/2018                                ////
////                                V0.0.6                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

session_start();
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');


if (isset($_SESSION['Eleve']) ) {
  $uneleve = unserialize($_SESSION['Eleve']);
  $id_user = $uneleve->getIdUser();


    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:38:03 GMT -->
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
        <![endif]



        <!-- Gestion des demandes offres -->
        <script>


        </script>




    </head>
    <body>
    <!-- Header_Area -->
    <?php

    require('part/header.php');

    ?>
    <!-- End  Header_Area -->

    <!-- Tranding-select and banner Area -->
    <?php if (!isset($_POST['search'])){ ?>
    <ul class="tranding_select tabs">
        <li class="tab"><a href="#post" class="waves-effect btn active">Post</a></li>
        <li class="tab"><a href="#stage" class="waves-effect btn">Stage</a></li>
        <li class="tab"><a href="#emploi" class="waves-effect btn">Emploi</a></li>
    </ul>
    <?php } ?>
    <div class="banner_area">
        <img src="images/banner.jpg" alt="" class="banner_img">
    </div>
    <!-- End Tranding Area -->

    <!-- Min Container area -->
    <section class="min_container min_pages">
        <div class="section_row">

            <div class="middle_section col" id="infinite_scroll">


                <!-- début de l'affichage des Post -->


                <?php


                //TEST POUR LA RECHERCHE EN COURS


                if(!isset($_POST['search'])){

                //////////////////////////////////////////////////////////////////////////////////
                ////                                                                          ////
                ////                                                                          ////
                ////                                  Post                                    ////
                ////                                                                          ////
                ////                                                                          ////
                //////////////////////////////////////////////////////////////////////////////////
                 ?>
                <div id="post">
                    <div class="fast_post">

                        <?php

                        $sqlP="SELECT * FROM Post ORDER BY date_post DESC";
                        $resP = $conn -> query($sqlP)or die($conn -> errorInfo());

                        while ($dataP=$resP->fetch())
                        {
                            $cat = $dataP['id_cat'];
                            $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                            $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                            $dataC=$resC->fetch();

                            $id_user= $dataP['id_user'];
                            $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user'";
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
                                            <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></div>

                                            <div class="col s8 media_body">

                                                <a href="#"><?php echo urldecode($dataU['nom_user']); ?></a>
                                                <span><?php echo $dataP['date_post']; ?>,<?php echo$dataP['heure_post']; ?></span>
                                            </div>
                                        </div>
                                        <div class="col s4 btn_floating">

                                        </div>

                                    </div>
                                    <a  class="post_heding"><?php echo urldecode($dataP['titre_post']); ?></a>
                                    <p><?php echo urldecode($dataP['contenu_post']); ?></p>
                                </div>
                                <center><a href="#" class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a></center>
                                <br>
                            </div>
                            <!-- End Post -->
                            <br>


                            <?php
                        }

                        ?>
                    </div>
                </div>
              <?php

              //////////////////////////////////////////////////////////////////////////////////
              ////                                                                          ////
              ////                                                                          ////
              ////                                  Stage                                   ////
              ////                                                                          ////
              ////                                                                          ////
              //////////////////////////////////////////////////////////////////////////////////

               ?>
                <div id="stage">
                    <div class="fast_post">

                        <?php

                        $sqlS="SELECT * FROM OStage ";
                        $resS = $conn -> query($sqlS)or die($conn -> errorInfo());

                        while ($dataS=$resS->fetch())
                        {
                            $offre = $dataS['id_offre'];
                            $sqlO="SELECT * FROM Offre WHERE id_offre = '$offre'";
                            $resO = $conn -> query($sqlO)or die($conn -> errorInfo());
                            $dataO=$resO->fetch();

                            $cat = $dataO['id_cat'];
                            $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                            $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                            $dataC=$resC->fetch();

                            $id_user= $dataO['id_user'];
                            $id_user= $dataO['id_user'];
                            ?>
                            <!-- Post -->

                            <?php affichestage($dataC['id_cat'],$id_user,$dataO['id_offre'],$dataO['id_ent'],$dataO['date_post_offre'],
                            $dataO['lib_offre'],$dataO['niveau_req'],$dataO['date_debut_offre'],$dataS['date_fin_stage'],$dataO['desc_offre'],$conn);
                            ?>
                            <!-- End Post -->
                            <br>


                            <?php
                        }

                        ?>

                    </div>
                </div>
                <?php
                //////////////////////////////////////////////////////////////////////////////////
                ////                                                                          ////
                ////                                                                          ////
                ////                                  Emploi                                  ////
                ////                                                                          ////
                ////                                                                          ////
                //////////////////////////////////////////////////////////////////////////////////
                ?>
                    <div id="emploi">
                    <div class="fast_post">
                        <?php
                        $sqlE="SELECT * FROM OEmploi ";
                        $resE = $conn -> query($sqlE)or die($conn -> errorInfo());

                        while ($dataE=$resE->fetch())
                        {

                            $offre = $dataE['id_offre'];
                            $sqlO="SELECT * FROM Offre WHERE id_offre = '$offre' ";
                            $resO = $conn -> query($sqlO)or die($conn -> errorInfo());
                            $dataO=$resO->fetch();

                            $cat = $dataO['id_cat'];
                            $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                            $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                            $dataC=$resC->fetch();

                            $id_user= $dataO['id_user'];

                            ?>
                            <!-- Post -->

                            <?php afficheemploi($dataC['id_cat'],$dataO['id_offre'],$id_user,$dataO['id_ent'],$dataO['date_post_offre'],
                            $dataO['lib_offre'],$dataO['niveau_req'],$dataE['salaire_emp'],$dataE['type_emp'],$dataO['date_debut_offre'],$dataO['desc_offre'],$conn)
                            ?>
                            <!-- End Post -->
                            <br>

                            <?php
                        }

                        ?>
                    </div>
                </div>



                <?php
                }



                //FIN DE TEST DE LA RECHERCHE EN COURS
                else{

                    $resultats = req_recherche($_POST['search'],'',$conn);
                    $trouve = 0;

                    //AFFICHARGE RESULTAT RECHERCHE
                    foreach ($resultats as $r=>$resultat) {
                        if(!empty($resultat)) {
                            $trouve = 1;
                            switch($r)
                            {
                                /*
                                 *
                                 *
                                 * Recherche de posts
                                 *
                                 *
                                 */

                                case "Post":
                                ?>   <div class="fast_post"> <?php
                                    foreach ($resultat as $data) {
                                    affichepost($data->id_cat,$id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$conn);
                                    }
                                ?> </div> <?php
                                break;


                                /*
                                 *
                                 * Recherche d'utilisateurs
                                 *
                                 *
                                 */


                                case "Utilisateur":
                                    ?>
                                    <section class="liste_user">
                                        <div class="notifications">
                                            <!-- Dropdown Structure -->

                                            <div class="hed_notic">Utilisateurs <span></span></div>

                                                <ul class="notifications_content follow">
                                                    <?php
                                                    foreach ($resultat as $data) {
                                                       afficheuser($id_user,$data->num_addr_user,$data->rue_addr_user,$data->CP_addr_user,$data->ville_addr_user,$conn);
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </section>
                                    <?php
                                break;




                                /*
                                 *
                                 *
                                 * Recherche d'offres
                                 *
                                 *
                                 */


                                case "Offre":
                                ?>   <div class="fast_post"> <?php
                                    foreach ($resultat as $data) {
                                        $stage = getoffrestagebdd($data->id_offre,$conn);
                                        $emploi = getoffreempbdd($data->id_offre,$conn);


                                        /*
                                         *
                                         *
                                         * Recherche de stage
                                         *
                                         *
                                         */
                                        if ($stage){
                                            foreach ($stage as $s) {
                                                affichestage($data->id_cat,$id_user,$data->id_offre,$data->id_ent,$data->date_post_offre,
                                                    $data->lib_offre,$data->niveau_req,$data->date_debut_offre,$s->date_fin_stage,$data->desc_offre,$conn);
                                            }
                                        }


                                        /*
                                         *
                                         *
                                         * Recherche d'emploi
                                         *
                                         *
                                         */

                                        elseif ($emploi){
                                            foreach ($emploi as $s) {
                                                afficheemploi($data->id_cat,$data->id_offre,$id_user,$data->id_ent,$data->date_post_offre,$data->lib_offre,
                                                    $data->niveau_req,$s->salaire_emp,$s->type_emp,$data->date_debut_offre,$data->desc_offre,$conn);
                                            }
                                        }
                                    }
                                ?> </div> <?php
                                break;
                            }
                        }
                    }
                    if($trouve == 0){  ?>

                        <span>Pas de résultats</span>

                        <?php
                    }
                }
                ?>


            </div>   <!-- Fin des post/stage/emploi -->

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
    <!-- End Min Container area -->

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
                </div>
            </div>

            <div class="col l3 m6 footer_col">
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

    <!-- Popup area -->
    <div id="modal2" class="login_popup_aera modal">
        <div class="login_popup_row">
            <img src="images/login-logo.png" alt="">
            <h4>Create a new account to Open List or <a href="#modal1" class="modal-trigger modal-close">Sign in</a></h4>
            <form class="input_group">
                <div class="input-field">
                    <input  type="text" class="validate" placeholder="Full Name">
                    <input  type="email" class="validate" placeholder="Email">
                    <input type="password" class="validate" placeholder="Password">
                </div>
                <p>
                    <input type="checkbox" id="test" />
                    <label for="test">I accept the <a href="#">Terms and Services</a></label>
                </p>
                <button class="waves-effect">SIgn in</button>
            </form>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="ion-close-round"></i></a>
        </div>
    </div>
    <!-- Log In Popup -->
    <div id="modal1" class="login_popup_aera modal">
        <div class="login_popup_row">
            <img src="images/login-logo.png" alt="">
            <h4>Log in to Open List or <a href="#modal2" class="modal-trigger modal-close">create an account</a></h4>
            <h6>Sign in using social media</h6>
            <ul class="with_social">
                <li><a href="#" class="waves-effect"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="waves-effect facebook"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#" class="waves-effect google-plus"><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <h6>or Sign in using email address</h6>
            <form class="input_group">
                <div class="input-field">
                    <input  type="email" class="validate" placeholder="Email">
                    <input type="password" class="validate" placeholder="Password">
                </div>
                <p>
                    <input type="checkbox" id="test2" />
                    <label for="test2">Remember me <a href="#">Forget password?</a></label>
                </p>
                <button class="waves-effect">SIgn in</button>
            </form>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="ion-close-round"></i></a>
        </div>
    </div>
    <!-- End Popup area -->

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

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:38:03 GMT -->
    </html>

    <?php




}//fin if eleve








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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:38:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>VivBahuet</title>

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

<!-- Tranding-select and banner Area -->
<ul class="tranding_select tabs">
    <li class="tab"><a href="#post" class="waves-effect btn active">Post</a></li>
    <li class="tab"><a href="#stage" class="waves-effect btn">Stage</a></li>
    <li class="tab"><a href="#emploi" class="waves-effect btn">Emploi</a></li>
</ul>
<div class="banner_area">
    <img src="images/banner.jpg" alt="" class="banner_img">
</div>
<!-- End Tranding Area -->

<!-- Min Container area -->
<section class="min_container min_pages">
    <div class="section_row">

        <div class="middle_section col" id="infinite_scroll">
            <!-- début de l'affichage des Post -->

            <?php
            //////////////////////////////////////////////////////////////////////////////////
            ////                                                                          ////
            ////                                                                          ////
            ////                                  Post                                    ////
            ////                                                                          ////
            ////                                                                          ////
            //////////////////////////////////////////////////////////////////////////////////
             ?>
            <div id="post">
                <div class="fast_post">

                    <?php

                    $sqlP="SELECT * FROM Post ORDER BY date_post DESC";
                    $resP = $conn -> query($sqlP)or die($conn -> errorInfo());

                    while ($dataP=$resP->fetch())
                    {
                        $cat = $dataP['id_cat'];
                        $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                        $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                        $dataC=$resC->fetch();

                        $id_user= $dataP['id_user'];
                        $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user'";
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
                                        <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></div>

                                        <div class="col s8 media_body">

                                            <a href="#"><?php echo urldecode($dataU['nom_user']); ?></a>
                                            <span><?php echo $dataP['date_post']; ?>,<?php echo$dataP['heure_post']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col s4 btn_floating">

                                    </div>

                                </div>
                                <a  class="post_heding"><?php echo urldecode($dataP['titre_post']); ?></a>
                                <p><?php echo urldecode($dataP['contenu_post']); ?></p>
                            </div>
                            <center><a href="#" class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a></center>
                            <br>
                        </div>
                        <!-- End Post -->
                        <br>


                        <?php
                    }

                    ?>
                </div>
            </div>
          <?php

          //////////////////////////////////////////////////////////////////////////////////
          ////                                                                          ////
          ////                                                                          ////
          ////                                  Stage                                   ////
          ////                                                                          ////
          ////                                                                          ////
          //////////////////////////////////////////////////////////////////////////////////

           ?>
            <div id="stage">
                <div class="fast_post">
                    <?php

                    $sqlS="SELECT * FROM OStage ";
                    $resS = $conn -> query($sqlS)or die($conn -> errorInfo());

                    while ($dataS=$resS->fetch())
                    {
                        $offre = $dataS['id_offre'];
                        $sqlO="SELECT * FROM Offre WHERE id_offre = '$offre'";
                        $resO = $conn -> query($sqlO)or die($conn -> errorInfo());
                        $dataO=$resO->fetch();

                        $cat = $dataO['id_cat'];
                        $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                        $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                        $dataC=$resC->fetch();

                        $id_user= $dataO['id_user'];
                        $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user'";
                        $resU = $conn -> query($sqlU)or die($conn -> errorInfo());
                        $dataU = $resU -> fetch();
                        ?>
                        <!-- Post -->

                        <div class="post">
                            <div class="post_content">
                                <a href="details.html" class="post_img">
                                    <img src="images/post.jpg" alt="">
                                    <span><i class="ion-android-radio-button-off"></i><?php echo$dataC['lib_cat']; ?></span>
                                </a>
                                <div class="row author_area">
                                    <div class="col s4 author">
                                        <div class="col s4 media_left"><img src="images/author-1.jpg" alt="" class="circle"></div>

                                        <div class="col s8 media_body">

                                            <a ><?php echo urldecode($dataO['date_post_offre']); ?></a>

                                        </div>
                                    </div>
                                    <div class="col s4 btn_floating">

                                    </div>
                                </div>
                                <a class="post_heding"><?php echo urldecode($dataO['lib_offre']); ?></a>
                                <p><?php echo urldecode($dataO['desc_offre']); ?></p>
                            </div>
                            <center><a href="#" class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a></center>
                            <br>
                        </div>
                        <!-- End Post -->
                        <br>


                        <?php
                    }

                    ?>
                </div>
            </div>
            <?php
            //////////////////////////////////////////////////////////////////////////////////
            ////                                                                          ////
            ////                                                                          ////
            ////                                  Emploi                                  ////
            ////                                                                          ////
            ////                                                                          ////
            //////////////////////////////////////////////////////////////////////////////////
            ?>
            <div id="emploi">
                <div class="fast_post">


                    <?php

                    $sqlE="SELECT * FROM OEmploi ";
                    $resE = $conn -> query($sqlE)or die($conn -> errorInfo());

                    while ($dataE=$resE->fetch())
                    {

                        $offre = $dataE['id_offre'];
                        $sqlO="SELECT * FROM Offre WHERE id_offre = '$offre' ";
                        $resO = $conn -> query($sqlO)or die($conn -> errorInfo());
                        $dataO=$resO->fetch();

                        $cat = $dataO['id_cat'];
                        $sqlC="SELECT * FROM Categorie WHERE id_cat = '$cat' ";
                        $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                        $dataC=$resC->fetch();

                        $id_user= $dataO['id_user'];
                        $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user'";
                        $resU = $conn -> query($sqlU)or die($conn -> errorInfo());
                        $dataU = $resU -> fetch();

                        ?>
                        <!-- Post -->

                        <div class="post">
                            <div class="post_content">
                                <a href="details.html" class="post_img">
                                    <img src="images/post.jpg" alt="">
                                    <span><i class="ion-android-radio-button-off"></i><?php echo$dataC['lib_cat']; ?></span>
                                </a>
                                <div class="row author_area">
                                    <div class="col s4 author">
                                        <div class="col s4 media_left"><img src="images/author-1.jpg" alt="" class="circle"></div>

                                        <div class="col s8 media_body">

                                            <a ><?php echo urldecode($dataO['date_post_offre']); ?></a>

                                        </div>
                                    </div>
                                    <div class="col s4 btn_floating">

                                    </div>
                                </div>
                                <a class="post_heding"><?php echo urldecode($dataO['lib_offre']); ?></a>
                                <p><?php echo urldecode($dataO['desc_offre']); ?></p>
                            </div>
                            <center><a href="#" class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a></center>
                            <br>
                        </div>
                        <!-- End Post -->
                        <br>

                        <?php
                    }

                    ?>
                </div>
            </div>

        </div>   <!-- Fin des post/stage/emploi -->

        <!-- left side bar -->
        <div class="col">
            <div class="left_side_bar">
                <div class="categories">
                    <h3 class="categories_tittle me_tittle">About Me</h3>

                    <p><?php (!empty($unentreprise->getDescUser()))? print $unentreprise->getDescUser() : print 'Encore aucune description' ?></p>
                </div>
                <?php require ('./part/left.php')?>
        <!-- Right side bar -->
                <?php require ('./part/right.php')?>
        <!-- Right bar end -->
    </div>
</section>
<!-- End Min Container area -->

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
            </div>
        </div>

        <div class="col l3 m6 footer_col">
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

<!-- Popup area -->
<div id="modal2" class="login_popup_aera modal">
    <div class="login_popup_row">
        <img src="images/login-logo.png" alt="">
        <h4>Create a new account to Open List or <a href="#modal1" class="modal-trigger modal-close">Sign in</a></h4>
        <form class="input_group">
            <div class="input-field">
                <input  type="text" class="validate" placeholder="Full Name">
                <input  type="email" class="validate" placeholder="Email">
                <input type="password" class="validate" placeholder="Password">
            </div>
            <p>
                <input type="checkbox" id="test" />
                <label for="test">I accept the <a href="#">Terms and Services</a></label>
            </p>
            <button class="waves-effect">SIgn in</button>
        </form>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="ion-close-round"></i></a>
    </div>
</div>
<!-- Log In Popup -->
<div id="modal1" class="login_popup_aera modal">
    <div class="login_popup_row">
        <img src="images/login-logo.png" alt="">
        <h4>Log in to Open List or <a href="#modal2" class="modal-trigger modal-close">create an account</a></h4>
        <h6>Sign in using social media</h6>
        <ul class="with_social">
            <li><a href="#" class="waves-effect"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="waves-effect facebook"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="#" class="waves-effect google-plus"><i class="fa fa-google-plus"></i></a></li>
        </ul>
        <h6>or Sign in using email address</h6>
        <form class="input_group">
            <div class="input-field">
                <input  type="email" class="validate" placeholder="Email">
                <input type="password" class="validate" placeholder="Password">
            </div>
            <p>
                <input type="checkbox" id="test2" />
                <label for="test2">Remember me <a href="#">Forget password?</a></label>
            </p>
            <button class="waves-effect">SIgn in</button>
        </form>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="ion-close-round"></i></a>
    </div>
</div>
<!-- End Popup area -->

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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:38:03 GMT -->
</html>
<?php

}//fin else Entreprise

?>
