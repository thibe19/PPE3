<?php
 //////////////////////////////////////////////////////////////////////////////////
 ////                                                                          ////
 ////                                Profil                                    ////
 ////                                20/12/2018                                ////
 ////                                v0.1.3                                    ////
 ////                                                                          ////
 //////////////////////////////////////////////////////////////////////////////////

session_start();

require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');


if (isset($_SESSION['Eleve'])) {

  $uneleve = unserialize($_SESSION['Eleve']);
  $id_user = $uneleve->getIdUser();
  $ndc = $uneleve->getLoginUser();
  $mdp=$_SESSION['mdp'];
  $photo = $uneleve ->getPhotoUser();

  $unutilisateur = new Utilisateur();
  $resU = $unutilisateur->selectAllUtilisateur($id_user,$conn);
  $data = $resU -> fetch();


  $uneleve = new Eleve();
  $resE = $uneleve->selectAllEleve($id_user,$conn);
  $dataE = $resE -> fetch();



?>

  <!DOCTYPE html>
  <html lang="fr">

  <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:36 GMT -->
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

    <!-- Option -->
    <link href="./css/option.css" rel="stylesheet" />


      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <!-[endif]-->

  </head>
  <body>
    <!-- Header_Area -->
    <?php
    require('part/header.php');
    ?>
    <!-- End  Header_Area -->

    <!-- Tranding-select and banner Area -->
    <div class="banner_area banner_2">
        <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt="" class="banner_img">
        <div class="media profile_picture">
            <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
            <div class="media_body">
                <a href="profile.php"><?php print $dataE['prenom_eleve']." ".$data['nom_user']; ?></a>
                <h6><?php print $data['num_addr_user']." ".$data['rue_addr_user']; ?></h6>
                <h6><?php print $data['CP_addr_user']." ".$data['ville_addr_user']; ?></h6>
            </div>
        </div>
    </div>
    <section class="author_profile">
        <div class="row author_profile_row">
            <div class="col l4 m6">
                <ul class="profile_menu">
                    <li><a href="profile.php">Activiter</a></li>
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
            <!-- <div class="col l4 m6">
                <ul class="follow_messages">
                    <li><a href="#" class="waves-effect">Follow</a></li>
                    <li><a href="#" class="waves-effect">Messages</a></li>
                </ul>
            </div> -->
        </div>
    </section>
    <!-- End Tranding Area -->

  <!----------------------------------------------------------------------------------------------------------- -->

      <!-- Option -->
      <section class="messages_area">
        <div class="messages_row row">
          <div class="section_row row">

            <div class="option-profil">
            <section class="min_container photo_pages">

                <div class="col s12">
                  <h1>Option Profil</h1><br><br>
                </div>
                <p>Image de Profil</p>
                <div class="profil">
                <form class="" action="setting.php" method="post" enctype="multipart/form-data">
                  <div class="modif-image">
                    <div class="modif-image-image">
                      <img style='width: 25%;height: 25%;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" >
                    </div>
                    <div class="modif-image-bouton">
                      <div>
                        <input type='file' name='photo'>
                        <button class="btn btn-primary btn-block mt-5" name="photo_update" value="1" type="submit">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Photo</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                <!--  -->
                <br>
                <p>Bannière - <i>recommandé 1900*400px</i></p>

                <form class="" action="setting.php" method="post" enctype="multipart/form-data">
                  <div class="modif-image">

                    <div class="modif-image-bouton">
                      <div>
                        <input type='file' name='photo_ban'>
                        <button class="btn btn-primary btn-block mt-5" name="photo_banner" value="1" type="submit">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change BANNIERE</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>




                  <!-- fin modif image -->
                  <br>
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <form class="form" method="POST" action='./setting.php'>

                        <div class="col s12">
                          <h4>Information personnelle </h4>
                          <br>
                        </div>

                        <div class="row">
                          <div class="col">
                            <!-- nom/prenom -->
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Nom de famille </label>
                                  <input type="text" class="form-control" name="nom" value="<?php echo$data['nom_user']; ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Prenom</label>
                                  <input class="form-control" type="text" name="prenom" value="<?php echo$dataE['prenom_eleve']; ?>">
                                </div>
                              </div>
                            </div>

                            <!-- mail/utilisateur-->
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Email</label>
                                  <input class="form-control" type="text" name="mail" value="<?php echo$data['email_user']; ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Nom d'utilisateur</label>
                                  <input class="form-control" type="text" name="user" value="<?php echo$data['login_user']; ?>">
                                </div>
                              </div>
                            </div>
                            <!-- A propos -->
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label class="form-label">A propos de moi</label>
                                  <textarea class="form-control" rows="2" name="desc" value="<?php echo urldecode($data['desc_user']); ?>"><?php echo urldecode($data['desc_user']); ?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- DTN + N°tel -->
                        <div class="row">
                          <div class="col-12 col-sm-6 mb-3">

                            <div class="col s12">
                              <h4>Information complémentaire</h4>
                              <br>
                            </div>

                            <div class="row">
                              <div class="col">
                                <label class="form-label">Date de naissance</label>
                                <input type="date" name="dateU" value="<?php echo$dataE['date_naiss']; ?>">
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">N°Mobile</label>
                                  <input class="form-control" type="number" name="tel" value="<?php echo$data['tel_user']; ?>">
                                </div>
                              </div>
                            </div>
                            <!-- <address>  -->

                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">N°Rue</label>
                                  <input type="text" class="form-control" name="Nrue" value="<?php echo$data['num_addr_user']; ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Rue</label>
                                  <input class="form-control" type="text" name="rue" value="<?php echo$data['rue_addr_user']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Ville</label>
                                  <input class="form-control" type="text" name="ville" value="<?php echo$data['ville_addr_user']; ?>">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Code postal</label>
                                  <input class="form-control" type="text" name="cp" value="<?php echo$data['CP_addr_user']; ?>">
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <!-- MDP -->
                        <div class="col-12 col-sm-6 mb-3">
                          <div class="col s12">
                            <h2>Mot de passe</h2>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Ancien Mot de passe</label>
                                <input class="form-control" type="password" name="mdpA" placeholder="Mot de passe">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Nouveau Mot de passe</label>
                                <input class="form-control" type="password" name="mdpN" placeholder="Mot de passe">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Confirmer <span class="d-none d-xl-inline">le Mot de passe</span></label>
                                <input class="form-control" type="password" name="mdpNC" placeholder="Mot de passe">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="float-right mt-0 mb-0">
                          <button class="btn btn-secondary mr-3"  type="submit">Annuler</button>
                          <button class="btn btn-primary " name='modifierE' type="submit">Mettre à jour le profil</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="loding_img">
                  <img src="images/icons/loding.png" alt="">
                </div>
              </div>
            </section>
          </div>
          </div>
        </div>
      </section>

      <!-- /Option -->

  <!-----------------------------------------------------------------------------------------------------------------------------------------------------------  -->


      <!-- Footer area -->
      <?php require('part/footer.php'); ?>
      <!-- End Footer area -->
      <?php
      require('part/post.php');
      ?>
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

  <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:40:08 GMT -->
  </html>

  <?php

  if (isset($_POST['modifierE'])) {

    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $user = $_POST['user'];
    $desc = $_POST['desc'];
    $tel = $_POST['tel'];
    $Nrue = $_POST['Nrue'];
    $rue = $_POST['rue'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $dom_acti = $uneleve ->getDomActi();

    $mdpA = $_POST['mdpA'];
    $mdpN = $_POST['mdpN'];
    $mdpNC = $_POST['mdpNC'];

    //eleve
    $prenom = $_POST['prenom'];
    $date = $_POST['dateU'];
    $choixpos = '1';


    if (($mdpA or $mdpN) == '' ) {

      $uneleve = new Eleve($id_user,$nom,$user,$mdp,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo,$desc,$dom_acti,$prenom,$date,$choixpos);
      $uneleve->modifier_eleve($uneleve,$conn);


      echo "<script>window.location='./setting.php'</script>";
    } else {

      if ($mdpA==$mdp) {

        if ($mdpN==$mdpNC) {

          $uneleve = new Eleve($id_user,$nom,$user,$mdpNC,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo,$desc,$dom_acti,$prenom,$date,$choixpos);
          $uneleve->modifier_eleve($uneleve,$conn);

      echo "<script>window.location='./setting.php'</script>";


        }else {

          echo "<script> alert('Les mots de passe ne sont pas les mêmes.');
                          window.location.href='./setting.php';
                </script>";

        }

      }else {

        echo "<script> alert('L\'ancien mot de passe est incorrect.');
                        window.location.href='./setting.php';
              </script>";
      }

    }


  }// fin de modifier

}// fin du profile eleve



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
  $mdp=$_SESSION['mdp'];
  $photo = $unentreprise ->getPhotoUser();

  $unutilisateur = new Utilisateur();
  $resU = $unutilisateur->selectAllUtilisateur($id_user,$conn);
  $data = $resU -> fetch();

  $unentreprise = new Entreprise();
  $resEn= $unentreprise-> selectAllEntreprise($id_user,$conn);
  $dataEn = $resEn -> fetch();
  ?>

    <!DOCTYPE html>
    <html lang="fr">

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:36 GMT -->
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

      <!-- Option -->
      <link href="./css/option.css" rel="stylesheet" />


        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <!-[endif]-->

    </head>
    <body>
        <!-- Header -->
        <?php
        require('part/header.php');
        ?>
        <!-- End  Header -->

        <!-- Tranding-select and banner Area -->
        <div class="banner_area banner_2">
            <img style='width: 1900px;height: 400px;' src="images/banner/<?php select_image_bann($id_user, $conn) ?>" alt="" class="banner_img">
            <div class="media profile_picture">
                <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
                <div class="media_body">
                    <a href="profile.php"><?php echo$data['nom_user']; ?> </a>
                    <h6><?php echo$data['num_addr_user']; ?> <?php echo$data['rue_addr_user']; ?> <?php echo $data['CP_addr_user']; ?>, <?php echo$data['ville_addr_user']; ?></h6>
                </div>
            </div>
        </div>
        <section class="author_profile">
            <div class="row author_profile_row">
                <div class="col l4 m6">
                    <ul class="profile_menu">
                        <li><a href="profile.php">Activiter</a></li>
                        <li><a href="about.php">A propos</a></li>

                            <!-- Dropdown Structure -->
                            <ul id="dro_pm" class="dropdown-content">
                                <li><a href="#">Popular Post</a></li>
                                <li><a href="#">Save Post</a></li>
                            </ul>
                        </li>
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
                <!-- <div class="col l4 m6">
                    <ul class="follow_messages">
                        <li><a href="#" class="waves-effect">Follow</a></li>
                        <li><a href="#" class="waves-effect">Messages</a></li>
                    </ul>
                </div> -->
            </div>
        </section>
        <!-- End Tranding Area -->

    <!----------------------------------------------------------------------------------------------------------- -->

        <!-- Option -->
        <div class="middle_section col">
          <div class="post profile_post">
            <div class="post_content">

              <section class="min_container photo_pages">
                <div class="section_row row">
                  <div class="col s12">
                    <h1>Option Profil</h1><br><br>
                  </div>
                  <p>Image de Profil</p>
                  <div class="profil">
                  <form class="" action="setting.php" method="post" enctype="multipart/form-data">
                    <div class="modif-image">
                      <div class="modif-image-image">
                        <img style='width: 25%;height: 25%;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" >
                      </div>
                      <div class="modif-image-bouton">
                        <div>
                          <input type='file' name='photo'>
                          <button class="btn btn-primary btn-block mt-5" name="photo_update" value="1" type="submit">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change Photo</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!--  -->
                  <br>
                  <p>Bannière - <i>recommandé 1900*400px</i></p>

                  <form class="" action="setting.php" method="post" enctype="multipart/form-data">
                    <div class="modif-image">

                      <div class="modif-image-bouton">
                        <div>
                          <input type='file' name='photo_ban'>
                          <button class="btn btn-primary btn-block mt-5" name="photo_banner" value="1" type="submit">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change BANNIERE</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                    <!-- fin modif image -->
                    <br>
                    <div class="tab-content pt-3">
                      <div class="tab-pane active">
                        <form class="form" method="POST" action='./setting.php'>

                          <div class="col s12">
                            <h2>Information personnelle </h2>
                          </div>

                          <div class="row">
                            <div class="col">
                              <!-- nom/prenom -->
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Nom de l'entreprise </label>
                                    <input type="text" class="form-control" name="nom" value="<?php echo$data['nom_user']; ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Nom du responsable</label>
                                    <input class="form-control" type="text" name="nom_resp" value="<?php echo$dataEn['nom_resp']; ?>">
                                  </div>
                                </div>
                              </div>

                              <!-- mail/utilisateur-->
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="text" name="mail" value="<?php echo$data['email_user']; ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Nom d'utilisateur</label>
                                    <input class="form-control" type="text" name="user" value="<?php echo$data['login_user']; ?>">
                                  </div>
                                </div>
                              </div>

                              <!-- code APE -->
                              <div class="row">
                                <div class="col mb-3">
                                  <div class="form-group">
                                    <label class="form-label">Code APE</label>
                                    <input class="form-control" type="text" name="ape" value="<?php echo$dataEn['code_APE']; ?>">
                                  </div>
                                </div>
                              </div>

                              <!-- A propos -->
                              <div class="row">
                                <div class="col mb-3">
                                  <div class="form-group">
                                    <label class="form-label">A propos de moi</label>
                                    <textarea class="form-control" rows="2" name="desc" value="<?php echo urldecode($data['desc_user']); ?>"><?php echo urldecode($data['desc_user']); ?></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- DTN + N°tel -->
                          <div class="row">
                            <div class="col-12 col-sm-6 mb-3">

                              <div class="col s12">
                                <h2>Information complémentaire</h2>
                              </div>

                              <div class="row">
                                <div class="col">
                                  <label class="form-label">Site web</label>
                                  <input type="text" name="site" value="<?php echo$dataEn['site_web']; ?>">
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">N°Mobile</label>
                                    <input class="form-control" type="number" name="tel" value="<?php echo$data['tel_ser']; ?>">
                                  </div>
                                </div>
                              </div>
                              <!-- <address>  -->

                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">N°Rue</label>
                                    <input type="text" class="form-control" name="Nrue" value="<?php echo$data['num_addr_user']; ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Rue</label>
                                    <input class="form-control" type="text" name="rue" value="<?php echo$data['rue_addr_user']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Ville</label>
                                    <input class="form-control" type="text" name="ville" value="<?php echo$data['ville_addr_user']; ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Code postal</label>
                                    <input class="form-control" type="text" name="cp" value="<?php echo$data['CP_addr_user']; ?>">
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>

                          <!-- MDP -->
                          <div class="col-12 col-sm-6 mb-3">
                            <div class="col s12">
                              <h2>Mot de passe</h2>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Ancien Mot de passe</label>
                                  <input class="form-control" type="password" name="mdpA" placeholder="Mot de passe">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Nouveau Mot de passe</label>
                                  <input class="form-control" type="password" name="mdpN" placeholder="Mot de passe">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Confirmer <span class="d-none d-xl-inline">le Mot de passe</span></label>
                                  <input class="form-control" type="password" name="mdpNC" placeholder="Mot de passe">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="float-right mt-0 mb-0">
                            <button class="btn btn-secondary mr-3"  type="submit">Annuler</button>
                            <button class="btn btn-primary " name='modifierEn' type="submit">Mettre à jour le profil</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="loding_img">
                    <img src="images/icons/loding.png" alt="">
                  </div>
                </div>
              </section>

            </div>
          </div>
        </div>

        <!-- /Option -->

    <!-----------------------------------------------------------------------------------------------------------------------------------------------------------  -->


        <!-- Footer area -->
        <?php require('part/footer.php'); ?>
        <!-- End Footer area -->
        <?php
        require('part/post.php');
        ?>
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

    <!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:40:08 GMT -->
    </html>

    <?php



    if (isset($_POST['modifierEn'])) {

      $nom = $_POST['nom'];
      $mail = $_POST['mail'];
      $user = $_POST['user'];
      $desc = urlencode($_POST['desc']);
      $tel = $_POST['tel'];
      $Nrue = $_POST['Nrue'];
      $rue = $_POST['rue'];
      $ville = $_POST['ville'];
      $cp = $_POST['cp'];
      $dom_acti = $unentreprise ->getDomActi();

      $mdpA = $_POST['mdpA'];
      $mdpN = $_POST['mdpN'];
      $mdpNC = $_POST['mdpNC'];

      //entreprise
      $nomresp = $_POST['nom_resp'];
      $ape = $_POST['ape'];
      $siteweb = $_POST['site'];



      if (($mdpA or $mdpN) == '' ) {


        $unentreprise = new Entreprise($id_user,$nom,$user,$mdp,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo,$desc,$dom_acti,$nomresp,$ape,$siteweb);
        $unentreprise->updateentreprise($unentreprise,$conn);

        echo "<script>window.location='./setting.php'</script>";
      } else {

        if ($mdpA==$mdp) {

          if ($mdpN==$mdpNC) {

            $unentreprise = new Entreprise($id_user,$nom,$user,$mdpNC,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo,$desc,$dom_acti,$nomresp,$ape,$siteweb);
            $unentreprise->updateentreprise($unentreprise,$conn);


        echo "<script>window.location='./setting.php'</script>";


          }else {

            echo "<script> alert('Les mots de passe ne sont pas les mêmes.');
                            window.location.href='./setting.php';
                  </script>";

          }

        }else {

          echo "<script> alert('L\'ancien mot de passe est incorrect.');
                          window.location.href='./setting.php';
                </script>";
        }

      }


    }// fin de modifier


}//fin entreprise




if (isset($_POST['photo_update'])) {



  $namepho = $_FILES['photo']['name'];
  $login = $ndc;
  $photo2 = $_FILES['photo']['tmp_name'];


   update_image($namepho, $login, $photo2, $id_user, $conn);
?>
  <script>
    window.location='./setting.php';
  </script>
<?php


}

if (isset($_POST['photo_banner'])) {
  $namepho = $_FILES['photo_ban']['name'];
  $login = $ndc;
  $photo2 = $_FILES['photo_ban']['tmp_name'];


  update_image_banner($namepho, $login, $photo2, $id_user, $conn);
?>
 <script>
   window.location='./setting.php';
 </script>
<?php
}
 ?>
