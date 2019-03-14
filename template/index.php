<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                index                                     ////
////                                14/03/2018                                ////
////                                V0.0.7                                    ////
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

                        $unpost = new Post();
                        $param = array(
                                "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                            "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                                                    "INNER JOIN Utilisateur u ON Post.id_user=u.id_user")
                        );
                        $res = $unpost->getAll($param,$conn);
                        $posts = "";
                        foreach ($res as $data){
                            $posts .= $unpost->affichepost($data->id_post,$data->photo_post,$data->lib_cat,$data->id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$data->photo_user,$data->nom_user)."<br>";
                        }
                        print $posts;

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
                        $uneoffre = new Stage();
                        $param = array(
                          "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,os.date_fin_stage",
                          "FiltreJoin" => array("INNER JOIN OStage os ON Offre.id_offre=os.id_offre",
                                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                           "FiltreWhere" => "Offre.id_user_Eleve = 0"
                        );
                        $res = $uneoffre->getAll($param,$conn);

                        $lesstages ="";
                        foreach ($res as $re) {
                            $lesstages.=$uneoffre->affichestage($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->date_fin_stage,$re->desc_offre,$conn)."<br>";
                        }
                        print $lesstages;
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
                        $uneoffre = new Emploi();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,oe.salaire_emp,oe.type_emp",
                            "FiltreJoin" => array("INNER JOIN OEmploi oe ON Offre.id_offre=oe.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0"
                        );
                        $res = $uneoffre->getAll($param,$conn);

                        $lesoemploies = "";
                        foreach ($res as $re) {
                            $lesoemploies .= $uneoffre->afficheemploi($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->salaire_emp,$re->desc_offre,$re->type_emp,$conn)."<br>";
                        }
                        print $lesoemploies;

                        ?>
                    </div>
                </div>



                <?php
                }



                //FIN DE TEST DE LA RECHERCHE EN COURS
                else{

                    $table = array();

                    if (($_POST['type_post']!=0) || ($_POST['cat_post']!=0)){
                        switch ($_POST['type_post']){
                            case "Post" :
                                $table['Post'] = array("id_post","titre_post","contenu_post", "photo_post", "date_post","heure_post","id_user","id_cat");
                                break;

                        }
                    }

                    $resultats = req_recherche($_POST['search'],'',$conn);
                    $trouve = 0;

                    //AFFICHARGE RESULTAT RECHERCHE

                    ?> <div class="fast_post">  <?php

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
                                    foreach ($resultat as $data) {
                                    affichepost($data->id_post,$data->id_cat,$id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$conn);
                                    }
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
                                                       afficheuser($data->id_user,$data->num_addr_user,$data->rue_addr_user,$data->CP_addr_user,$data->ville_addr_user,$conn);
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
                                                affichestage($data->id_cat,$id_user,$s->id_user,$data->id_offre,$data->id_ent,$data->date_post_offre,
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
                                                afficheemploi($data->id_cat,$data->id_offre,$id_user,$s->id_user,$data->id_ent,$data->date_post_offre,$data->lib_offre,
                                                    $data->niveau_req,$s->salaire_emp,$s->type_emp,$data->date_debut_offre,$data->desc_offre,$conn);
                                            }
                                        }
                                    }
                                break;
                            }
                        }
                    }

                    ?> </div> <?php
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
                        <h3 class="categories_tittle me_tittle">A PROPOS</h3>
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
    <?php require('part/footer.php'); ?>
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

}//fin si eleves


//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                                                          ////
////                             Entreprise                                   ////
////                                                                          ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

if (isset($_SESSION['Entreprise']) ) {
  $uneleve = unserialize($_SESSION['Entreprise']);
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

                        $unpost = new Post();
                        $param = array(
                                "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                            "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                                                    "INNER JOIN Utilisateur u ON Post.id_user=u.id_user")
                        );
                        $res = $unpost->getAll($param,$conn);
                        $html = "";
                        foreach ($res as $data){
                            $html .= $unpost->affichepost($data->id_post,$data->photo_post,$data->lib_cat,$data->id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$data->photo_user,$data->nom_user);
                        }
                        print $html;
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
                        $uneoffre = new Stage();
                        $param = array(
                          "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,os.date_fin_stage",
                          "FiltreJoin" => array("INNER JOIN OStage os ON Offre.id_offre=os.id_offre",
                                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                           "FiltreWhere" => "Offre.id_user_Eleve = 0"
                        );
                        $res = $uneoffre->getAll($param,$conn);
                        $html = "";
                        foreach ($res as $re) {
                            $html .= $uneoffre->affichestage($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->date_fin_stage,$re->desc_offre,$conn);

                        }
                        print $html;
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
                        $uneoffre = new Emploi();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,oe.salaire_emp,oe.type_emp",
                            "FiltreJoin" => array("INNER JOIN OEmploi oe ON Offre.id_offre=oe.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0"
                        );
                        $res = $uneoffre->getAll($param,$conn);
                        $html = "";
                        foreach ($res as $re) {
                          $html .= $uneoffre->afficheemploi($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->salaire_emp,$re->desc_offre,$re->type_emp,$conn);

                        }
                        print $html;
                        ?>
                    </div>
                </div>



                <?php
                }



                //FIN DE TEST DE LA RECHERCHE EN COURS
                else{

                    $table = array();

                    if (($_POST['type_post']!=0) || ($_POST['cat_post']!=0)){
                        switch ($_POST['type_post']){
                            case "Post" :
                                $table['Post'] = array("id_post","titre_post","contenu_post", "photo_post", "date_post","heure_post","id_user","id_cat");
                                break;

                        }
                    }

                    $resultats = req_recherche($_POST['search'],'',$conn);
                    $trouve = 0;

                    //AFFICHARGE RESULTAT RECHERCHE

                    ?> <div class="fast_post">  <?php

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
                                    foreach ($resultat as $data) {

                                    affichepost($data->id_post,$data->id_cat,$id_user,$data->date_post,$data->heure_post,$data->titre_post,$data->contenu_post,$conn);
                                    }
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
                                                       afficheuser($data->id_user,$data->num_addr_user,$data->rue_addr_user,$data->CP_addr_user,$data->ville_addr_user,$conn);
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
                                                affichestage($data->id_cat,$id_user,$s->id_user,$data->id_offre,$data->id_ent,$data->date_post_offre,
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
                                                afficheemploi($data->id_cat,$data->id_offre,$id_user,$s->id_user,$data->id_ent,$data->date_post_offre,$data->lib_offre,
                                                    $data->niveau_req,$s->salaire_emp,$s->type_emp,$data->date_debut_offre,$data->desc_offre,$conn);
                                            }
                                        }
                                    }
                                break;
                            }
                        }
                    }

                    ?> </div> <?php
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
                        <h3 class="categories_tittle me_tittle">A PROPOS</h3>
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
    <?php require('part/footer.php'); ?>
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

}//fin si eleves

?>
