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
        <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
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
        <link rel="stylesheet" href="css/style.css" media="all"/>

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body onload="onloadprofile()">

    <!-- Header_Area -->
    <?php
    require('part/header.php');
    ?>
    <!-- End  Header_Area -->

    <!-- Tranding-select and banner Area -->


    <!-- TEST ELEVE -->
    <div class="banner_area banner_2">
        <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt=""
             class="banner_img">
        <div class="media profile_picture">
            <a href="profile.php"><img style='width: 170px;height: 165px;'
                                       src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt=""
                                       class="circle"></a>
            <div class="media_body">
                <a href="profile.php"><?php print $uneleve->getNomUser() . ' ' . $uneleve->getPrenomEleve() ?></a>
                <h6><?php print $uneleve->getNumAddr() . " " . $uneleve->getRueAddr(); ?></h6>
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
            $resP = $untoto->countPosts($id_user, $conn);
            $dataP = $resP->fetch();
            $total = $dataP['resulta'];

            $unamie = new Post;
            $resA = $unamie->countAmis($id_user, $conn);
            $dataA = $resA->fetch();
            $amis = $dataA['amis'];
            $suivi = $dataA['suivi'];

            ?>
            <div class="col l4 m6">
                <ul class="post_follow">
                    <li>Posts <b><?php print $total; ?></b></li>
                    <li>Following <b><?php print $amis; ?></b></li>
                    <li>Followers <b><?php print $suivi; ?></b></li>
                </ul>
            </div>
            <div class="col l4 m6">
                <ul id="postpro" class="tranding_select tabs">
                    <li class="tab"><a href="#postami" id="postsamis" onclick="window.location='profile.php?postsamis=true'" class="waves-effect btn active">>Posts de mes amis</a></li>
                    <li class="tab"><a href="#postmoi" id="mesposts" onclick="window.location='profile.php?mesposts=true'" class="waves-effect btn ">>Mes Posts</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Tranding Area -->
    <!-- Min Container area -->
    <section class="min_container profile_pages">
        <div class="section_row">
            <div class="middle_section col">
                <?php if(empty($_REQUEST['mesposts'])){ ?>
                <div id="postami">
                    <ul class="tranding_select tabs">
                        <li class="tab"><a href="#post" class="waves-effect btn active">Post</a></li>
                        <li class="tab"><a href="#stage" class="waves-effect btn">Stage</a></li>
                        <li class="tab"><a href="#emploi" class="waves-effect btn">Emploi</a></li>
                    </ul><br>
                    <div id="post">
                        <?php

                        $unpost = new Post();
                        $param = array(
                            "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                            "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                                                  "INNER JOIN Utilisateur u ON Post.id_user=u.id_user",
                                                  "INNER JOIN ajoute_amis ON Post.id_user=ajoute_amis.id_user_Eleve"),
                            "FiltreWhere" => " Post.id_user != '$id_user' "
                        );
                        $res = $unpost->getAll($param, $conn);
                        $lespostsami = "";
                        foreach ($res as $data) {
                            $lespostsami .= $unpost->affichepost($data->photo_post, $data->lib_cat, $data->id_user, $data->date_post, $data->heure_post, $data->titre_post, $data->contenu_post, $data->photo_user, $data->nom_user) . "<br>";
                        }
                        print $lespostsami;
                        ?>
                    </div>
                    <div id="stage">
                        <?php

                        $uneoffre = new Stage();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,os.date_fin_stage",
                            "FiltreJoin" => array("INNER JOIN OStage os ON Offre.id_offre=os.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user",
                                "INNER JOIN ajoute_amis ON Offre.id_user=ajoute_amis.id_user_Eleve"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user != '$id_user'"
                        );
                        $res = $uneoffre->getAll($param,$conn);

                        $lesstages ="";
                        foreach ($res as $re) {
                            $lesstages.=$uneoffre->affichestage($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->date_fin_stage,$re->desc_offre,$conn)."<br>";
                        }
                        print $lesstages;
                        ?>
                    </div>
                    <div id="emploi">
                        <?php

                        $uneoffre = new Emploi();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,oe.salaire_emp,oe.type_emp",
                            "FiltreJoin" => array("INNER JOIN OEmploi oe ON Offre.id_offre=oe.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user",
                                "INNER JOIN ajoute_amis ON Offre.id_user=ajoute_amis.id_user_Eleve"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user != '$id_user'"
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
                <?php } //fin posts amis
                if (!empty($_REQUEST['mesposts'])) {
                ?>
                <div id="postmoi">
                    <ul class="tranding_select tabs">
                        <li class="tab"><a href="#post1" class="waves-effect btn active">Post</a></li>
                        <li class="tab"><a href="#stage1" class="waves-effect btn">Stage</a></li>
                        <li class="tab"><a href="#emploi1" class="waves-effect btn">Emploi</a></li>
                    </ul><br>
                    <div id="post1">
                        <?php
                        $unpost = new Post();

                        $param = array(
                            "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                            "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Post.id_user=u.id_user
                                        "),
                            "FiltreWhere" => " Post.id_user = '$id_user' "
                        );
                        $res = $unpost->getAll($param,$conn);

                        $mesposts ="";
                        foreach ($res as $data) {
                            $mesposts.=$unpost->affichepost($data->photo_post, $data->lib_cat, $data->id_user, $data->date_post, $data->heure_post, $data->titre_post, $data->contenu_post, $data->photo_user, $data->nom_user) . "<br>";
                        }
                        print $mesposts;

                        ?>
                    </div>
                    <div id="stage1">
                        <?php

                        $uneoffre = new Stage();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,os.date_fin_stage",
                            "FiltreJoin" => array("INNER JOIN OStage os ON Offre.id_offre=os.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user = '$id_user'"
                        );
                        $res = $uneoffre->getAll($param,$conn);

                        $lesstages ="";
                        foreach ($res as $re) {
                            $lesstages.=$uneoffre->affichestage($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->date_fin_stage,$re->desc_offre,$conn)."<br>";
                        }
                        print $lesstages;
                        ?>
                    </div>
                    <div id="emploi1">
                        <?php

                        $uneoffre = new Emploi();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,oe.salaire_emp,oe.type_emp",
                            "FiltreJoin" => array("INNER JOIN OEmploi oe ON Offre.id_offre=oe.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user = '$id_user'"
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
                <?php } ?>
            </div>
            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">A PROPOS</h3>
                        <p><?php (!empty($uneleve->getDescUser())) ? print urldecode($uneleve->getDescUser()) : print 'Encore aucune description' ?></p>
                    </div>
                    <?php require('./part/left.php') ?>
                    <!-- Right side bar -->
                    <?php require('./part/right.php') ?>
                    <!-- Right bar end -->
                </div>
    </section>
    <!-- Footer area -->
    <?php require('part/footer.php'); ?>
    <!-- End Footer area -->

    <!-- Header_Area a -->
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

if (isset($_SESSION['Entreprise'])) {
    $uneleve = unserialize($_SESSION['Entreprise']);
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
        <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
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
        <link rel="stylesheet" href="css/style.css" media="all"/>

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
        <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt=""
             class="banner_img">
        <div class="media profile_picture">
            <a href="profile.php"><img style='width: 170px;height: 165px;'
                                       src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt=""
                                       class="circle"></a>
            <div class="media_body">
                <a href="profile.php"><?php print $uneleve->getNomUser() ?></a>
                <h6><?php print $uneleve->getNumAddr() . " " . $uneleve->getRueAddr(); ?></h6>
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
            $resP = $untoto->countPosts($id_user, $conn);
            $dataP = $resP->fetch();
            $total = $dataP['resulta'];

            $unamie = new Post;
            $resA = $unamie->countAmis($id_user, $conn);
            $dataA = $resA->fetch();
            $amis = $dataA['amis'];
            $suivi = $dataA['suivi'];

            ?>
            <div class="col l4 m6">
                <ul class="post_follow">
                    <li>Posts <b><?php print $total; ?></b></li>
                    <li>Following <b><?php print $amis; ?></b></li>
                    <li>Followers <b><?php print $suivi; ?></b></li>
                </ul>
            </div>
            <div class="col l4 m6">
                <ul id="postpro" class="tranding_select tabs">
                    <li class="tab"><a href="#postami" id="postsamis" class="waves-effect btn active">>Posts de mes amis</a></li>
                    <li class="tab"><a href="#postmoi" id="mesposts" onclick="chargemespots()" class="waves-effect btn ">>Mes Posts</a></li>
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
                    <ul class="tranding_select tabs">
                        <li class="tab"><a href="#post" class="waves-effect btn active">Post</a></li>
                        <li class="tab"><a href="#stage" class="waves-effect btn">Stage</a></li>
                        <li class="tab"><a href="#emploi" class="waves-effect btn">Emploi</a></li>
                    </ul><br>
                    <div id="post">
                        <?php

                        $unpost = new Post();
                        $param = array(
                            "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                            "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                                                  "INNER JOIN Utilisateur u ON Post.id_user=u.id_user",
                                                  "INNER JOIN ajoute_amis ON Post.id_user=ajoute_amis.id_user_Eleve"),
                            "FiltreWhere" => " Post.id_user != '$id_user' "
                        );
                        $res = $unpost->getAll($param, $conn);
                        $lespostsami = "";
                        foreach ($res as $data) {
                            $lespostsami .= $unpost->affichepost($data->photo_post, $data->lib_cat, $data->id_user, $data->date_post, $data->heure_post, $data->titre_post, $data->contenu_post, $data->photo_user, $data->nom_user) . "<br>";
                        }
                        print $lespostsami;
                        ?>
                    </div>
                    <div id="stage">
                        <?php

                        $uneoffre = new Stage();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,os.date_fin_stage",
                            "FiltreJoin" => array("INNER JOIN OStage os ON Offre.id_offre=os.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user",
                                "INNER JOIN ajoute_amis ON Offre.id_user=ajoute_amis.id_user_Eleve"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user != '$id_user'"
                        );
                        $res = $uneoffre->getAll($param,$conn);

                        $lesstages ="";
                        foreach ($res as $re) {
                            $lesstages.=$uneoffre->affichestage($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->date_fin_stage,$re->desc_offre,$conn)."<br>";
                        }
                        print $lesstages;
                        ?>
                    </div>
                    <div id="emploi">
                        <?php

                        $uneoffre = new Emploi();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,oe.salaire_emp,oe.type_emp",
                            "FiltreJoin" => array("INNER JOIN OEmploi oe ON Offre.id_offre=oe.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user",
                                "INNER JOIN ajoute_amis ON Offre.id_user=ajoute_amis.id_user_Eleve"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user != '$id_user'"
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
                <div id="postmoi">
                    <ul class="tranding_select tabs">
                        <li class="tab"><a href="#post1" class="waves-effect btn active">Post</a></li>
                        <li class="tab"><a href="#stage1" class="waves-effect btn">Stage</a></li>
                        <li class="tab"><a href="#emploi1" class="waves-effect btn">Emploi</a></li>
                    </ul><br>
                    <div id="post1">
                        <?php

                        $param = array(
                            "FiltreSelect" => "u.nom_user,u.id_user,c.lib_cat,u.photo_user",
                            "FiltreJoin" => array("INNER JOIN Categorie c ON Post.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Post.id_user=u.id_user
                                        "),
                            "FiltreWhere" => " Post.id_user = '$id_user' "
                        );
                        $res = $unpost->getAll($param,$conn);

                        $mesposts ="";
                        foreach ($res as $data) {
                            $mesposts.=$unpost->affichepost($data->photo_post, $data->lib_cat, $data->id_user, $data->date_post, $data->heure_post, $data->titre_post, $data->contenu_post, $data->photo_user, $data->nom_user) . "<br>";
                        }
                        print $mesposts;

                        ?>
                    </div>
                    <div id="stage1">
                        <?php

                        $uneoffre = new Stage();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,os.date_fin_stage",
                            "FiltreJoin" => array("INNER JOIN OStage os ON Offre.id_offre=os.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user = '$id_user'"
                        );
                        $res = $uneoffre->getAll($param,$conn);

                        $lesstages ="";
                        foreach ($res as $re) {
                            $lesstages.=$uneoffre->affichestage($re->lib_cat,$re->id_user,$re->photo_user,$re->nom_user,$re->id_offre,$re->id_ent,$re->date_post_offre,$re->lib_offre,$re->niveau_req,$re->date_debut_offre,$re->date_fin_stage,$re->desc_offre,$conn)."<br>";
                        }
                        print $lesstages;
                        ?>
                    </div>
                    <div id="emploi1">
                        <?php

                        $uneoffre = new Emploi();
                        $param = array(
                            "FiltreSelect" => "c.lib_cat,u.photo_user,u.nom_user,oe.salaire_emp,oe.type_emp",
                            "FiltreJoin" => array("INNER JOIN OEmploi oe ON Offre.id_offre=oe.id_offre",
                                "INNER JOIN Categorie c ON Offre.id_cat=c.id_cat",
                                "INNER JOIN Utilisateur u ON Offre.id_ent=u.id_user",
                                "INNER JOIN Entreprise ent ON Offre.id_ent=ent.id_user"),
                            "FiltreWhere" => "Offre.id_user_Eleve = 0 AND Offre.id_user = '$id_user'"
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
            </div>
            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle me_tittle">A PROPOS</h3>
                        <p><?php (!empty($uneleve->getDescUser())) ? print urldecode($uneleve->getDescUser()) : print 'Encore aucune description' ?></p>
                    </div>
                    <?php require('./part/left.php') ?>
                    <!-- Right side bar -->
                    <?php require('./part/right.php') ?>
                    <!-- Right bar end -->
                </div>
    </section>
    <!-- Footer area -->
    <?php require('part/footer.php'); ?>
    <!-- End Footer area -->

    <!-- Header_Area a -->
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
