<?php

/*
 *  29/11/18
 *  Stage
 *  v0.0.2
 */
 session_start();
  require('../ToolBox/bdd.inc.php');
  require('../objet/classes.php');

 if (isset($_SESSION['Eleve'])) {
 ?>


<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
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

    <!-- Tranding-select and banner Area -->

    <div class="banner_area">
        <img src="images/banner.jpg" alt="" class="banner_img">
    </div>
    <!-- End Tranding Area -->

    <!-- crée un stage -->
    <section class="messages_area">
      <div class="messages_row row">
        <div class="section_row row">
          <div class="col s12">
            <h2>Crée un stage</h2><br><br>
          </div>

            <?php
            $sqlEnt="SELECT * FROM Utilisateur U, Entreprise E WHERE U.id_user=E.id_user ";
            $resEnt = $conn -> query($sqlEnt)or die($conn -> errorInfo());
            ?>
            <div class="row">
              <div class="col">
                <div class="col s12">
                  <h5>Entreprise </h5>
                  <br>
                </div>

                <!-- entreprise -->
                <form class="form" method="POST" action='./ostage.php'>
                <div class="row">
                  <div class="col">
                    <div class="form-group">

                      <label class="form-label">Choisissez une entreprise :</label>
                      <select name='ent'>
                        <?php
                        while ($dataEnt=$resEnt->fetch())
                        {

                          echo " <option value=".$dataEnt['id_user']."> ".$dataEnt['nom_user']." </option>";
                        }
                        ?>
                      </select>

                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Ajouter une entreprise :  </label>
                      <br>
                      <button type="button" onclick="document.getElementById('id1').style.display = 'block'"
                              id="updateabout" value="1" name="addtabout"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>


                <!-- Ajout d'une entreprise -->
                <div style="display:none" id="id1">
                    <p> Nom de l'entreprise : <input type="text" name="nomEnt" value=""
                                                placeholder="Exemple : Google">

                    tel : <input type="text" name="telEnt" value=""
                                        placeholder="">  </p>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">N°Rue</label>
                      <input type="text" class="form-control" name="NrueEnt" value="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Rue</label>
                      <input class="form-control" type="text" name="rueEnt" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Ville</label>
                      <input class="form-control" type="text" name="villeEnt" value="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Code postal</label>
                      <input class="form-control" type="text" name="cpEnt" value="">
                    </div>
                  </div>
                </div>
                <br><br>
              </div>  <!-- Fin création entreprise -->

              <div class="col s12">
                <h5>Information sur le stage </h5>
                <br>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Niveau require </label>
                    <input type="text" class="form-control" name="Nivreq" value="" placeholder="Exemple : bac +5">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Categorie</label>
                    <?php
                    $sqlC="SELECT * FROM Categorie ORDER BY lib_cat ";
                    $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                    ?>
                    <select name='cat'>
                      <?php
                      while ($dataC=$resC->fetch())
                      {
                        echo " <option value=".$dataC['id_cat']."> ".$dataC['lib_cat']." </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Date de debut du stage</label>
                    <input type="date" class="form-control" name="dateDstage" value="">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Date de Fin du stage</label>
                    <input type="date" class="form-control"  name="dateFstage" value="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Titre de l'annonce</label>
                    <input type="text" class="form-control" name="lib_offre" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Description de l'annonce :</label>
                    <br><br>
                    <textarea name="descstage" rows="8" cols="80"
                              style="margin: 0px; height: 86px; width: 619px;"></textarea>
                  </div>
                </div>
              </div>
              <br>
              <div class="float-right mt-0 mb-0">

                <button class="btn btn-secondary mr-3"  type="submit">Annuler</button>
                <button class="btn btn-primary " name='validSE' type="submit">Valider</button>

              </div>
              <br><br>
            </form>
              </div>
            </div>
          </div>
        </div>

      </section>
    <!-- Fin crée un stage -->

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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
</html>


<?php

if (isset($_POST['validSE'])) {

  $nreq = $_POST['Nivreq'];
  $dateDS = $_POST['dateDstage'];
  $dateFS = $_POST['dateFstage'];
  $lib_offre = $_POST['lib_offre'];
  $descstage = $_POST['descstage'];
  $cat = $_POST['cat'];
  $enp = $_POST['ent'];
  $date = date("Y-m-d");

  if ( ($nreq && $lib_offre && $descstage) != NULL) {

    $unstage = new Stage('',$lib_offre,$nreq,$dateDS,$date,$descstage,'',$cat,$enp,$dateFS,'','');
    //$unstage->insert_stage($unstage,$conn);

    echo $unstage -> getAllStage();

    $nomEnt = $_POST['nomEnt'];
    $telEnt = $_POST['telEnt'];

    if (($nomEnt && $telEnt) != NULL) {
      $NrueEnt = $_POST['NrueEnt'];
      $rueEnt = $_POST['rueEnt'];
      $villeEnt = $_POST['villeEnt'];
      $cpEnt = $_POST['cpEnt'];

      $unentreprise = new Entreprise($nomEnt,$telEnt,$NrueEnt,$rueEnt,$cpEnt,$villeEnt);
      $unentreprise->inscriptionent($unentreprise,$conn);

      echo "<script> alert('Le stage a été crée.');
                      window.location.href='./index.php';
            </script>";
    }

    echo "<script> alert('Le stage a été crée.');
                    window.location.href='./index.php';
          </script>";


  }else {
    echo "<script> alert('Erreur zone non remplie.');
                    window.location.href='./ostage.php';
          </script>";

  }
} //fin valider eleve

}// fin eleve


//
//
//
//
///////////////////////////////////////////Entreprise//////////////////////////////////////

if (isset($_SESSION['Entreprise'])) {

  ?>
  <!DOCTYPE html>
  <html lang="fr">

  <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
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

      <!-- Tranding-select and banner Area -->

      <div class="banner_area">
          <img src="images/banner.jpg" alt="" class="banner_img">
      </div>
      <!-- End Tranding Area -->

      <!-- crée un stage -->
      <section class="messages_area">
        <div class="messages_row row">
          <div class="section_row row">
            <div class="col s12">
              <h2>Crée un stage</h2><br><br>
            </div>

              <?php
              $sqlEnt="SELECT * FROM Utilisateur U, Entreprise E WHERE U.id_user=E.id_user ";
              $resEnt = $conn -> query($sqlEnt)or die($conn -> errorInfo());
              ?>
              <div class="row">
                <div class="col">
                <form class="form" method="POST" action='./ostage.php'>
                  <div class="col s12">
                    <h5>Information sur le stage </h5>
                    <br>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Niveau require </label>
                        <input type="text" class="form-control" name="Nivreq" value="" placeholder="Exemple : bac +5">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Categorie</label>
                        <?php
                        $sqlC="SELECT * FROM Categorie ORDER BY lib_cat ";
                        $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
                        ?>
                        <select name='cat'>
                          <?php
                          while ($dataC=$resC->fetch())
                          {
                            echo " <option value=".$dataC['id_cat']."> ".$dataC['lib_cat']." </option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Date de debut du stage</label>
                        <input type="date" class="form-control" name="dateDstage" value="">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Date de Fin du stage</label>
                        <input type="date" class="form-control"  name="dateFstage" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Titre de l'annonce</label>
                        <input type="text" class="form-control" name="lib_offre" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Description de l'annonce :</label>
                        <br><br>
                        <textarea name="descstage" rows="8" cols="80"
                                  style="margin: 0px; height: 86px; width: 619px;"></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="float-right mt-0 mb-0">

                    <button class="btn btn-secondary mr-3"  type="submit">Annuler</button>
                    <button class="btn btn-primary " name='validSEn' type="submit">Valider</button>

                  </div>
                  <br><br>
                </form>
                </div>
              </div>
            </div>
          </div>

        </section>
      <!-- Fin crée un stage -->

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

  <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
  </html>


  <?php

  if (isset($_POST['validSEn'])) {

    $nreq = $_POST['Nivreq'];
    $dateDS = $_POST['dateDstage'];
    $dateFS = $_POST['dateFstage'];
    $lib_offre = $_POST['lib_offre'];
    $descstage = $_POST['descstage'];
    $cat = $_POST['cat'];
    $enp = unserialize($_SESSION['Entreprise'])->getIdUser();
    $date = date("Y-m-d");

    $unstage = new Stage('',$lib_offre,$nreq,$dateDS,$date,$descstage,'',$cat,$enp,$dateFS,'','');
    //$unstage->insert_stage($unstage,$conn);

    echo $unstage -> getAllStage();

    echo "<script> alert('Le stage a été crée.');
                    window.location.href='./index-2.php';
          </script>";
  } //fin valider entreprise


}// fin entreprise
