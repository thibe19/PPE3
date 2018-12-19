<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Stage                                     ////
////                                19/12/2018                                ////
////                                V0.0.4                                    ////
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
    <ul class="tranding_select tabs">
        <li class="tab"><a  onclick="window.location.href='./ostage.php'" class="waves-effect btn">Offre Stage</a></li>
        <li class="tab"><a  onclick="window.location.href='./oemploi.php'" class="waves-effect btn">Offre Emploi</a></li>
    </ul>

    <!-- crée un stage -->
    <section class="messages_area">
      <div class="messages_row row">
        <div class="section_row row">
          <br>
          <div class="col s12">
            <h2>Crée un stage</h2><br><br>
          </div>

            <?php
            $unentreprise = new Entreprise();
            $resEn = $unentreprise->selectStageEnt($conn);
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
                        while ($dataEnt=$resEn->fetch())
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

                    $uncat = new Categorie;
                    $resC = $uncat->selectAllCategorie($conn);

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
  $id_user;
  $nreq = $_POST['Nivreq'];
  $dateDS = $_POST['dateDstage'];
  $dateFS = $_POST['dateFstage'];
  $lib_offre = $_POST['lib_offre'];
  $descstage = $_POST['descstage'];
  $cat = $_POST['cat'];
  $ent = $_POST['ent'];
  $date = date("Y-m-d");

  if ( ($nreq && $lib_offre && $descstage) != NULL) {
      if (!empty($nomEnt = $_POST['nomEnt']) && !empty($telEnt = $_POST['telEnt'])){
          $NrueEnt = $_POST['NrueEnt'];
          $rueEnt = $_POST['rueEnt'];
          $villeEnt = $_POST['villeEnt'];
          $cpEnt = $_POST['cpEnt'];
          $nomEnt = $_POST['nomEnt'];
          $telEnt = $_POST['telEnt'];

          $unentreprise = new Entreprise('',$nomEnt,'','','',$telEnt,$NrueEnt,$rueEnt,$cpEnt,$villeEnt,'','','','','','');
          $unentreprise->inscriptionent($unentreprise,$conn);
          $SQL = "SELECT id_user FROM Entreprise WHERE id_user=LAST_INSERT_ID()";
          foreach (reqtoobj($SQL,$conn) as $id){
              $id_ent = $id->id_user;
          }
      }

      $id_ent = isset($id_ent)?$id_ent:$ent;
    $unstage = new Stage('',$lib_offre,$nreq,$dateDS,$date,$descstage,$id_user,$cat,$id_ent,$dateFS,'','');
    $unstage->insert_stage($conn);





    if (($nomEnt && $telEnt) != NULL) {

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


//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                                                          ////
////                              Entreprise                                  ////
////                                                                          ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


if (isset($_SESSION['Entreprise'])) {
  $unentreprise = unserialize($_SESSION['Entreprise']);
  $id_user = $unentreprise->getIdUser();

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
      <ul class="tranding_select tabs">
          <li class="tab"><a  onclick="window.location.href='./ostage.php'" class="waves-effect btn">Offre Stage</a></li>
          <li class="tab"><a  onclick="window.location.href='./oemploi.php'" class="waves-effect btn">Offre Emploi</a></li>
      </ul>
      <!-- crée un stage -->
      <section class="messages_area">
        <div class="messages_row row">
          <div class="section_row row">
            <div class="col s12">
              <br>
              <h2>Crée un stage</h2><br><br>
            </div>

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
                        $uncat = new Categorie;
                        $resC = $uncat->selectAllCategorie($conn);
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
    $id_user;
    $nreq = $_POST['Nivreq'];
    $dateDS = $_POST['dateDstage'];
    $dateFS = $_POST['dateFstage'];
    $lib_offre = $_POST['lib_offre'];
    $descstage = $_POST['descstage'];
    $cat = $_POST['cat'];
    $ent = unserialize($_SESSION['Entreprise'])->getIdUser();
    $date = date("Y-m-d");

    $unstage = new Stage('',$lib_offre,$nreq,$dateDS,$date,$descstage,$id_user,$cat,$ent,$dateFS,'','');
    $unstage->insert_stage($conn);

    echo "<script> alert('Le stage a été crée.');
                    window.location.href='./index.php';
          </script>";
  } //fin valider entreprise


}// fin entreprise
