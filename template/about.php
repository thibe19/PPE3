<?php
session_start();
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');
if (isset($_SESSION['Eleve'])){
    $uneleve = unserialize($_SESSION['Eleve']);
    $id_user = $uneleve->getIdUser();
    $nom = $uneleve->getNomUser();
    $prenom = $uneleve->getPrenomEleve();
    $pren = $uneleve->getPrenomEleve()." ".$uneleve->getNomUser();
    $skill = $uneleve->getDomActi();
    setlocale(LC_TIME, 'fr_FR.utf8','fra');
    $birth = $uneleve->getdateEleve();
    $births = explode('-',$uneleve->getdateEleve());
    $birthphrase = strftime("%d %B %Y.",mktime(0,0,0,$births[1],$births[2],$births[0])); //Affichera par exemple "date du jour en français : samedi 24 juin 2006."
    $desc = empty($uneleve->getDescUser()) ? "Vous n'avez pas encore entré de description." : false;
    $date = "A remplir avec date de 'Offre'";
    $Nrue = $uneleve->getNumAddr();
    $rue = $uneleve->getRueAddr();
    $cp = $uneleve->getCPAddr();
    $ville = $uneleve->getVilleAddr();
    $placephrase = $Nrue." ".$rue." ".$ville." ".$cp;


    $uneoffre = new Stage(1,'test doffre','bac +5',date('Y-m-d'),date('Y-m-d'),$id_user,'2',1,date('Y-m-d'),'3','pas mal');
    var_dump($uneoffre->insert_stage($conn));


    $domaine = data_base_in_object('Categorie',$conn);

    $descs = "A remplir avec la desc user de l'offre de stage";


}
elseif(isset($_SESSION['Entreprise'])){

}

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
    <img src="images/banner-2.jpg" alt="" class="banner_img">
    <div class="media profile_picture">
        <a href="profile.html"><img src="images/profile-hed-1.jpg" alt="" class="circle"></a>
        <div class="media_body">
            <a href="profile.html"><?php print $pren ?></a>
            <h6><?php print $placephrase ?></h6>
        </div>
    </div>
</div>
<section class="author_profile">
    <div class="row author_profile_row">
        <div class="col l4 m6">
            <ul class="profile_menu">
                <li><a href="profile.html">Activiter</a></li>
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
        <div class="col l4 m6">
            <ul class="post_follow">
                <li>Posts <b>102</b></li>
                <li>Followers <b>389</b></li>
                <li>Following <b>51</b></li>
            </ul>
        </div>
        <div class="col l4 m6">
            <ul class="follow_messages">
                <li><a href="#" class="waves-effect">Follow</a></li>
                <li><a href="#" class="waves-effect">Messages</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Tranding Area -->

<!-- Min Container area -->
<?php if(isset($_SESSION['Eleve'])){?>
<section class="min_container profile_pages">
    <div class="section_row">

        <!-- CENTRE PROFIL, CV, MODIFICATION -->
        <div class="middle_section col">
            <div class="post profile_post">
                <div class="post_content">

                    <?php if (empty($_POST['updateabout']) && empty($_POST['valstabout'])) { ?>

                        <form action="about.php" method="post">


                            <button type="submit" id="updateabout" value="1" name="updateabout"><i
                                        class="fas fa-pen"></i></button>


                            <br><br>


                            <!-- A PROPOS -->

                            <h5>A propos</h5>
                            <table>
                                <tr>
                                    <td width="22%"><p>Nom</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><?php echo $nom; ?></p></td>
                                </tr>
                                <tr>
                                    <td width="22%"><p>Prénom</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><?php echo $prenom; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Compétences</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $skill; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Date de naissance</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $birthphrase; ?></p></td>
                                </tr>
                            </table>
                            <br>
                            <hr>
                            <br>

                            <!-- DESCRIPTION -->

                            <h5>Description</h5>
                            <p><?php echo $desc; ?></p>
                            <br>
                            <hr>
                            <br>

                            <!-- EXPERIENCE -->

                            <h5>Experience</h5>
                            <br>
                            <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>

                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>

                            <br>
                            <hr>
                            <br>
                            <h5 class="categories_tittle">Travail <i class="fas fa-caret-down"></i></h5>

                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>

                            <br>
                            <hr>
                            <br>

                            <!-- CONTACT -->

                            <h5>Contact</h5>
                            <table>
                                <tr>
                                    <td width="14%"><p>Téléphone</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><?php echo $pren; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>E-mail</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $skill; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Localisation</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $skill; ?></p></td>
                                </tr>
                            </table>
                        </form>
                    <?php } else {

                        ////////// MODIFICATION DU ABOUT
                        ?>

                        <h3>Modification</h3>
                        <h5>A propos</h5>
                        <table>
                            <tr>
                                <td width="22%"><p>Nom</p></td>
                                <td width="5%"><p> : </p></td>
                                <td><p><input type="text" name="surname_about" value="<?php echo $pren; ?>"></p></td>
                            </tr>
                            <tr>
                                <td width="22%"><p>Prénom</p></td>
                                <td width="5%"><p> : </p></td>
                                <td><p><input type="text" name="surname_about" value="<?php echo $pren; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>Compétences</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="text" name="skill_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>Date de naissance</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="date" name="birth_about" value="<?php echo $birth; ?>"></p></td>
                            </tr>
                        </table>
                        <br>
                        <hr>
                        <br>

                        <!-- DESCRIPTION -->

                        <h5>Description</h5>
                        <?php  ?>
                            <p><textarea name="desc_about" class="textareabout" rows="8"
                                         cols="80"><?php echo $desc=="Vous n'avez pas encore entré de description."?'':$desc; ?></textarea></p>
                        <br>
                        <hr>
                        <br>

                        <!-- EXPERIENCE -->

                        <h5>Experience</h5>
                        <br>
                        <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>
                        <div class="select_option">
                            <p> Domaine :
                                <select>
                                    <?php foreach($domaine as $d){ ?>
                                        <option name="domaine_about_s" value="<?php $d->id_cat ?>">
                                            <?php print $d->lib_cat ?>
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
                                <td><input type="date" name="date_about_debut_s" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                                <td><input type="date" name="date_about_fin_s" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                            </tr>
                        </table>
                        Place : <input type="text" name="place_about_s" value="<?php echo $placephrase; ?>">  </p>
                        <p> Description : <textarea name="desc_about_s" class="textareabout" rows="8"
                                                    cols="80"><?php echo $descs; ?></textarea></p>
                        <button type="submit" id="cancelabout" value="1" name="delabout"><i
                                    class="fas fa-trash-alt"></i></button>


                        <div style="display:none" id="id2">
                            <form action="validtempo.php" method="post">
                                <p> Domaine : <input type="text" name="domaine_about_sn" value=""
                                                     placeholder="Exemple : Développeur">
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
                                Place : <input type="text" name="place_about_sn" value=""
                                               placeholder="Exemple : Paris">  </p>
                                <p> Description : <textarea name="desc_about_sn" rows="8" cols="80"
                                                            style="margin: 0px; height: 86px; width: 619px;"></textarea>
                                </p>
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

                        <p> Domaine : <input type="text" name="domaine_about_t" value="<?php echo $domaine; ?>">
                            Date :
                        <table>
                            <tr>
                                <td>Début</td>
                                <td>Fin</td>
                            </tr>
                            <tr>
                                <td><input type="date" name="date_about_debut_t" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                                <td><input type="date" name="date_about_fin_t" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                            </tr>
                        </table>
                        Place : <input type="text" name="place_about_t" value="<?php echo $placephrase; ?>">  </p>
                        <p> Description : <textarea name="desc_about_t" class="textareabout" rows="8"
                                                    cols="80"><?php echo $descs; ?></textarea></p>
                        <button type="submit" id="cancelabout" value="1" name="deltabout"><i
                                    class="fas fa-trash-alt"></i></i></button>


                        <!-- Ajout d'un pour nouveau travail fait -->
                        <div style="display:none" id="id1">
                            <p> Domaine : <input type="text" name="domaine_about_tn" value=""
                                                 placeholder="Exemple : Développeur">
                                Date :
                            <table>
                                <tr>
                                    <td>Début</td>
                                    <td>Fin</td>
                                </tr>
                                <tr>
                                    <td><input type="date" name="date_about_debut_tn" value=""
                                               placeholder="Exemple : 2015 - 2017"></td>
                                    <td><input type="date" name="date_about_fin_tn" value=""
                                               placeholder="Exemple : 2015 - 2017"></td>
                                </tr>
                            </table>
                            Entreprise : <input type="text" name="place_about_tn" value=""
                                                placeholder="Exemple : InterMarché">  </p>
                            <p> Description : <textarea name="desc_about_tn" rows="8" cols="80"
                                                        style="margin: 0px; height: 86px; width: 619px;"></textarea></p>
                            <button type="submit" id="updateabout" value="1" name="valtrabout"><i
                                        class="fas fa-check"></i></button>
                        </div>

                        <br><br>

                        <button type="submit" onclick="document.getElementById('id1').style.display = 'block'"
                                id="updateabout" value="1" name="addtabout"><i class="fas fa-plus"></i></button>

                        <hr>
                        <br>

                        <!-- CONTACT -->

                        <h5>Contact</h5>
                        <table>
                            <tr>
                                <td width="14%"><p>Téléphone</p></td>
                                <td width="5%"><p> : </p></td>
                                <td><p><input type="text" name="adress_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>E-mail</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="text" name="adress_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>Adresse</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="text" name="adress_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td>
                                    <button type="submit" id="updateabout" value="1" name="validabout"><i
                                                class="fas fa-check"></i></button>
                                </td>
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
                    <p><?php print $desc ?></p>
                </div>
                <?php require('./part/left.php') ?>
        <!-- Right side bar -->
        <div class="right_side_bar col">
            <div class="right_sidebar_iner">
                <div class="popular_posts popular_fast">
                    <h3 class="categories_tittle">My Submisstion</h3>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                            <a href="#">
                                <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                            </a>
                        </div>
                        <div class="col s9 p_content">
                            <a href="#">You submitted a new photo to <span>How To Talk With Girls</span></a>
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
                            <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
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
                            <a href="#">You submitted 10 photos to <span>Best Photos of The Tech Giants</span></a>
                            <span class="black_text">4 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                            <a href="#">
                                <img src="images/recent-post-4.jpg" alt="" class="circle responsive-img">
                            </a>
                        </div>
                        <div class="col s9 p_content">
                            <a href="#">You submitted a new photo to <span>How To Talk With Girls</span></a>
                            <span class="black_text">5 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                            <a href="#">
                                <img src="images/recent-post-5.jpg" alt="" class="circle responsive-img">
                            </a>
                        </div>
                        <div class="col s9 p_content">
                            <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
                            <span class="black_text">10 days ago</span>
                        </div>
                    </div>
                </div>
                <div class="popular_gallery row">
                    <h3 class="categories_tittle">Images</h3>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-1.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-2.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-3.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-4.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-5.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-6.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-7.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-8.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-9.jpg" alt=""></a></div>
                </div>
                <div class="trending_area">
                    <h3 class="categories_tittle">Trending</h3>
                    <ul class="collapsible trending_collaps" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Healthy Environment For
                                Self Esteem
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
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
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="ion-chevron-right"></i>Harness The Power Of
                                Your Dreams
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Don T Let The Outtakes Take
                                You Out
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Helen Keller A Teller And A
                                Seller
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }elseif(isset($_SESSION['Entreprise'])){?>
<section class="min_container profile_pages">
    <div class="section_row">

        <!-- CENTRE PROFIL, CV, MODIFICATION -->
        <div class="middle_section col">
            <div class="post profile_post">
                <div class="post_content">

                    <?php if (empty($_POST['updateabout']) && empty($_POST['valstabout'])) { ?>

                        <form action="about.php" method="post">


                            <button type="submit" id="updateabout" value="1" name="updateabout"><i
                                        class="fas fa-pen"></i></button>


                            <br><br>


                            <!-- A PROPOS -->

                            <h5>A propos</h5>
                            <table>
                                <tr>
                                    <td width="22%"><p>Nom</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><?php echo $pren; ?></p></td>
                                </tr>
                                <tr>
                                    <td width="22%"><p>Prénom</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><?php echo $pren; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Compétences</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $skill; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Date de naissance</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $birth; ?></p></td>
                                </tr>
                            </table>
                            <br>
                            <hr>
                            <br>

                            <!-- DESCRIPTION -->

                            <h5>Description</h5>
                            <p><?php echo $desc; ?></p>
                            <br>
                            <hr>
                            <br>

                            <!-- EXPERIENCE -->

                            <h5>Experience</h5>
                            <br>
                            <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>

                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>

                            <br>
                            <hr>
                            <br>
                            <h5 class="categories_tittle">Travail <i class="fas fa-caret-down"></i></h5>

                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>
                            <br>
                            <p><b> <?php echo $domaine . " " . $date . "<br>"; ?> </b>
                                <i> <?php echo $placephrase . "<br>"; ?> </i></p>
                            <p> <?php echo $descs; ?> </p>

                            <br>
                            <hr>
                            <br>

                            <!-- CONTACT -->

                            <h5>Contact</h5>
                            <table>
                                <tr>
                                    <td width="14%"><p>Téléphone</p></td>
                                    <td width="5%"><p> : </p></td>
                                    <td><p><?php echo $pren; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>E-mail</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $skill; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Localisation</p></td>
                                    <td><p> : </p></td>
                                    <td><p><?php echo $skill; ?></p></td>
                                </tr>
                            </table>
                        </form>
                    <?php } else {

                        ////////// MODIFICATION DU ABOUT
                        ?>

                        <h3>Modification</h3>
                        <h5>A propos</h5>
                        <table>
                            <tr>
                                <td width="22%"><p>Nom</p></td>
                                <td width="5%"><p> : </p></td>
                                <td><p><input type="text" name="surname_about" value="<?php echo $pren; ?>"></p></td>
                            </tr>
                            <tr>
                                <td width="22%"><p>Prénom</p></td>
                                <td width="5%"><p> : </p></td>
                                <td><p><input type="text" name="surname_about" value="<?php echo $pren; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>Compétences</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="text" name="skill_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>Date de naissance</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="date" name="birth_about" value="<?php echo $birth; ?>"></p></td>
                            </tr>
                        </table>
                        <br>
                        <hr>
                        <br>

                        <!-- DESCRIPTION -->

                        <h5>Description</h5>
                        <p><textarea name="desc_about" class="textareabout" rows="8"
                                     cols="80"><?php echo $desc; ?></textarea></p>
                        <br>
                        <hr>
                        <br>

                        <!-- EXPERIENCE -->

                        <h5>Experience</h5>
                        <br>
                        <h5 class="categories_tittle">Stage <i class="fas fa-caret-down"></i></h5>

                        <p> Domaine : <input type="text" name="domaine_about_s" value="<?php echo $domaine; ?>">
                            Date :
                        <table>
                            <tr>
                                <td>Début</td>
                                <td>Fin</td>
                            </tr>
                            <tr>
                                <td><input type="date" name="date_about_debut_s" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                                <td><input type="date" name="date_about_fin_s" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                            </tr>
                        </table>
                        Place : <input type="text" name="place_about_s" value="<?php echo $placephrase; ?>">  </p>
                        <p> Description : <textarea name="desc_about_s" class="textareabout" rows="8"
                                                    cols="80"><?php echo $descs; ?></textarea></p>
                        <button type="submit" id="cancelabout" value="1" name="delabout"><i
                                    class="fas fa-trash-alt"></i></button>


                        <div style="display:none" id="id2">
                            <form action="validtempo.php" method="post">
                                <p> Domaine : <input type="text" name="domaine_about_sn" value=""
                                                     placeholder="Exemple : Développeur">
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
                                Place : <input type="text" name="place_about_sn" value=""
                                               placeholder="Exemple : Paris">  </p>
                                <p> Description : <textarea name="desc_about_sn" rows="8" cols="80"
                                                            style="margin: 0px; height: 86px; width: 619px;"></textarea>
                                </p>
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

                        <p> Domaine : <input type="text" name="domaine_about_t" value="<?php echo $domaine; ?>">
                            Date :
                        <table>
                            <tr>
                                <td>Début</td>
                                <td>Fin</td>
                            </tr>
                            <tr>
                                <td><input type="date" name="date_about_debut_t" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                                <td><input type="date" name="date_about_fin_t" value=""
                                           placeholder="Exemple : 2015 - 2017"></td>
                            </tr>
                        </table>
                        Place : <input type="text" name="place_about_t" value="<?php echo $placephrase; ?>">  </p>
                        <p> Description : <textarea name="desc_about_t" class="textareabout" rows="8"
                                                    cols="80"><?php echo $descs; ?></textarea></p>
                        <button type="submit" id="cancelabout" value="1" name="deltabout"><i
                                    class="fas fa-trash-alt"></i></i></button>


                        <!-- Ajout d'un pour nouveau travail fait -->
                        <div style="display:none" id="id1">
                            <p> Domaine : <input type="text" name="domaine_about_tn" value=""
                                                 placeholder="Exemple : Développeur">
                                Date :
                            <table>
                                <tr>
                                    <td>Début</td>
                                    <td>Fin</td>
                                </tr>
                                <tr>
                                    <td><input type="date" name="date_about_debut_tn" value=""
                                               placeholder="Exemple : 2015 - 2017"></td>
                                    <td><input type="date" name="date_about_fin_tn" value=""
                                               placeholder="Exemple : 2015 - 2017"></td>
                                </tr>
                            </table>
                            Entreprise : <input type="text" name="place_about_tn" value=""
                                                placeholder="Exemple : InterMarché">  </p>
                            <p> Description : <textarea name="desc_about_tn" rows="8" cols="80"
                                                        style="margin: 0px; height: 86px; width: 619px;"></textarea></p>
                            <button type="submit" id="updateabout" value="1" name="valtrabout"><i
                                        class="fas fa-check"></i></button>
                        </div>

                        <br><br>

                        <button type="submit" onclick="document.getElementById('id1').style.display = 'block'"
                                id="updateabout" value="1" name="addtabout"><i class="fas fa-plus"></i></button>

                        <hr>
                        <br>

                        <!-- CONTACT -->

                        <h5>Contact</h5>
                        <table>
                            <tr>
                                <td width="14%"><p>Téléphone</p></td>
                                <td width="5%"><p> : </p></td>
                                <td><p><input type="text" name="adress_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>E-mail</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="text" name="adress_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                            <tr>
                                <td><p>Adresse</p></td>
                                <td><p> : </p></td>
                                <td><p><input type="text" name="adress_about" value="<?php echo $skill; ?>"></p></td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td>
                                    <button type="submit" id="updateabout" value="1" name="validabout"><i
                                                class="fas fa-check"></i></button>
                                </td>
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
                    <p><?php print $desc ?></p>
                </div>
                <div class="interests">
                    <h3 class="categories_tittle">Your Interests <span>Edit</span></h3>
                    <ul class="interests_list">
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Arts</a></li>
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Beauty</a></li>
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Entertainment</a></li>
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Travel</a></li>
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Personal</a></li>
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Politics</a></li>
                        <li><a href="#"><i class="ion-android-radio-button-off"></i>Space Science</a></li>
                    </ul>
                </div>
                <div class="profile">
                    <h3 class="categories_tittle">Profile <span>Edit</span></h3>
                    <ul class="profile_pic">
                        <li><a href="#"><img src="images/profile-1.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-2.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-3.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-4.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-5.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-6.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-7.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-8.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-9.jpg" alt="" class="circle"></a></li>
                        <li><a href="#"><img src="images/profile-10.jpg" alt="" class="circle"></a></li>
                    </ul>
                </div>
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
                <div class="calendar_widget">
                    <h3 class="categories_tittle">Calendar</h3>
                    <table class="calendar"></table>
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
                <div class="advertis">
                    <a href="#"><img src="images/advertis.jpg" alt=""></a>
                </div>
            </div>
        </div>
        <!-- Right side bar -->
        <div class="right_side_bar col">
            <div class="right_sidebar_iner">
                <div class="popular_posts popular_fast">
                    <h3 class="categories_tittle">My Submisstion</h3>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                            <a href="#">
                                <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                            </a>
                        </div>
                        <div class="col s9 p_content">
                            <a href="#">You submitted a new photo to <span>How To Talk With Girls</span></a>
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
                            <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
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
                            <a href="#">You submitted 10 photos to <span>Best Photos of The Tech Giants</span></a>
                            <span class="black_text">4 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                            <a href="#">
                                <img src="images/recent-post-4.jpg" alt="" class="circle responsive-img">
                            </a>
                        </div>
                        <div class="col s9 p_content">
                            <a href="#">You submitted a new photo to <span>How To Talk With Girls</span></a>
                            <span class="black_text">5 days ago</span>
                        </div>
                    </div>
                    <div class="row valign-wrapper popular_item">
                        <div class="col s3 p_img">
                            <a href="#">
                                <img src="images/recent-post-5.jpg" alt="" class="circle responsive-img">
                            </a>
                        </div>
                        <div class="col s9 p_content">
                            <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
                            <span class="black_text">10 days ago</span>
                        </div>
                    </div>
                </div>
                <div class="popular_gallery row">
                    <h3 class="categories_tittle">Images</h3>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-1.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-2.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-3.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-4.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-5.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-6.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-7.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-8.jpg" alt=""></a></div>
                    <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-9.jpg" alt=""></a></div>
                </div>
                <div class="trending_area">
                    <h3 class="categories_tittle">Trending</h3>
                    <ul class="collapsible trending_collaps" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Healthy Environment For
                                Self Esteem
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
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
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="ion-chevron-right"></i>Harness The Power Of
                                Your Dreams
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Don T Let The Outtakes Take
                                You Out
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>If you will be traveling for a ski vacation, it is often difficult to know
                                            what to pack. You may not even have a problem knowing what to pack, but
                                            instead have</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="ion-chevron-right"></i>Helen Keller A Teller And A
                                Seller
                            </div>
                            <div class="collapsible-body">
                                <div class="row collaps_wrpper collaps_2">
                                    <div class="col s1 media_l">
                                        <b>1</b>
                                        <i class="ion-android-arrow-dropdown-circle"></i>
                                    </div>
                                    <div class="col s11 media_b">
                                        <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                        <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the
                                            palladium</p>
                                        <h6>By <a href="#">Thomas Omalley</a></h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
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
                        <div class="collapsible-header"><i class="ion-chevron-right"></i>Healthy Environment For Self
                            Esteem
                        </div>
                        <div class="collapsible-body">
                            <div class="row collaps_wrpper">
                                <div class="col s1 media_l">
                                    <b>1</b>
                                    <i class="ion-android-arrow-dropup-circle"></i>
                                </div>
                                <div class="col s11 media_b">
                                    <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                    <p>If you will be traveling for a ski vacation, it is often difficult to know what
                                        to pack. You may not even have a problem</p>
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
                                    <p>If you will be traveling for a ski vacation, it is often difficult to know what
                                        to pack. You may not even have a problem</p>
                                    <h6>By <a href="#">Thomas Omalley</a></h6>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header active"><i class="ion-chevron-right"></i>Harness The Power Of
                            Your Dreams
                        </div>
                        <div class="collapsible-body">
                            <div class="row collaps_wrpper">
                                <div class="col s1 media_l">
                                    <b>1</b>
                                    <i class="ion-android-arrow-dropup-circle"></i>
                                </div>
                                <div class="col s11 media_b">
                                    <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                    <p>If you will be traveling for a ski vacation, it is often difficult to know what
                                        to pack. You may not even have a problem</p>
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
