<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Emploi                                    ////
////                                19/12/2018                                ////
////                                V0.0.3                                    ////
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
        <li class="tab"><a  onclick="window.location.href='./oemploi.php'" class="waves-effect btn active">Offre Emploi</a></li>
    </ul>
    <!-- crée un stage -->
    <section class="messages_area">
      <div class="messages_row row">
        <div class="section_row row">
          <br>
          <div class="col s12">
            <h2>Crée une offre d'emploi</h2><br><br>
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
                <form class="form" method="POST" action='./oemploi.php'>
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
                <h5>Information sur l'emploi </h5>
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
                    <label class="form-label">Date de debut d'emploi</label>
                    <input type="date" class="form-control" name="dateDemp" value="">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Salaire </label>
                    <input type="text" class="form-control" name="salaire" value="" placeholder="Exemple : 5000">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Type contrat</label>
                    <input type="text" class="form-control" name="typeC" value="" placeholder="Exemple : CDI">
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
                    <textarea name="descemp" rows="8" cols="80"
                              style="margin: 0px; height: 86px; width: 619px;"></textarea>
                  </div>
                </div>
              </div>
              <br>
              <div class="float-right mt-0 mb-0">

                <button class="btn btn-secondary mr-3"  type="submit">Annuler</button>
                <button class="btn btn-primary " name='validOE' type="submit">Valider</button>

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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
</html>


<?php

if (isset($_POST['validOE'])) {
  $id_user;
  $nreq = $_POST['Nivreq'];
  $dateDemp = $_POST['dateDemp'];
  $salaire = $_POST['salaire'];
  $typeC = $_POST['typeC'];
  $lib_offre = $_POST['lib_offre'];
  $descemp = $_POST['descemp'];
  $cat = $_POST['cat'];
  $ent = $_POST['ent'];
  $date = date("Y-m-d");

  if ( ($nreq && $lib_offre && $descemp) != NULL) {

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
      $unemploi = new Emploi('',$lib_offre,$nreq,$dateDemp,$date,$descemp,$id_user,$cat,$id_ent,'',$salaire,$typeC);
      $unemploi->insert_emploi($conn);



      if (($nomEnt && $telEnt) != NULL) {

        echo "<script> alert('L\'ffre d\'emploi a été crée.');
                        window.location.href='./index.php';
              </script>";
      }

      echo "<script> alert('L\'offre d\'emploi a été crée.');
                      window.location.href='./index.php';
            </script>";


    }else {
      echo "<script> alert('Erreur zone non remplie.');
                      window.location.href='./oemploi.php';
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
          <li class="tab"><a  onclick="window.location.href='./oemploi.php'" class="waves-effect btn active">Offre Emploi</a></li>
      </ul>
      <!-- crée un stage -->
      <section class="messages_area">
        <div class="messages_row row">
          <div class="section_row row">
            <div class="col s12">
              <br>
              <h2>Crée une offre d'emploi</h2><br><br>
            </div>
              <div class="row">
                <div class="col">
                <form class="form" method="POST" action='./oemploi.php'>
                  <div class="col s12">
                    <h5>Information sur l'emploi </h5>
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
                        <label class="form-label">Date de debut d'emploi</label>
                        <input type="date" class="form-control" name="dateDemp" value="">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Salaire </label>
                        <input type="text" class="form-control" name="salaire" value="" placeholder="Exemple : 5000">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Type contrat</label>
                        <input type="text" class="form-control" name="typeC" value="" placeholder="Exemple : CDI">
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
                        <textarea name="descemp" rows="8" cols="80"
                                  style="margin: 0px; height: 86px; width: 619px;"></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="float-right mt-0 mb-0">

                    <button class="btn btn-secondary mr-3"  type="submit">Annuler</button>
                    <button class="btn btn-primary " name='validOEn' type="submit">Valider</button>

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

  <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
  </html>


  <?php

  if (isset($_POST['validOEn'])) {
    $id_user;
    $nreq = $_POST['Nivreq'];
    $dateDemp = $_POST['dateDemp'];
    $salaire = $_POST['salaire'];
    $typeC = $_POST['typeC'];
    $lib_offre = $_POST['lib_offre'];
    $descemp = $_POST['descemp'];
    $cat = $_POST['cat'];
    $ent = unserialize($_SESSION['Entreprise'])->getIdUser();
    $date = date("Y-m-d");


    $unemploi = new Emploi('',$lib_offre,$nreq,$dateDemp,$date,$descemp,$id_user,$cat,$ent,'',$salaire,$typeC);
    $unemploi->insert_emploi($conn);


    echo "<script> alert('l\'offre d'emploi a été crée.');
                    window.location.href='./index.php';
          </script>";
  } //fin valider entreprise


}// fin entreprise
