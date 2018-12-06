<?php

/*
 *  05/12/18
 *  Profil
 *  v0.0.7
 */

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
$mdp=$_SESSION['mdp'];
$ndc=$_SESSION['login'];
}

require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');
if (isset($_SESSION['Eleve'])) {
      $uneleve = unserialize($_SESSION['Eleve']);
      $id_user = $uneleve->getIdUser();
}

$sql="SELECT * FROM Utilisateur WHERE login_user = '$ndc'";
$res = $conn -> query($sql)or die($conn -> errorInfo());
$data = $res -> fetch();
$id=$data['id_user'];

$sqlE="SELECT * FROM Eleve WHERE id_user = '$id'";
$resE = $conn -> query($sqlE)or die($conn -> errorInfo());
$dataE = $resE -> fetch();

$sqlEn="SELECT * FROM Entreprise WHERE id_user = '$id'";
$resEn = $conn -> query($sqlEn)or die($conn -> errorInfo());
$dataEn = $resEn -> fetch();

if ($id==$dataE['id_user']) {
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
          <img src="images/banner-2.jpg" alt="" class="banner_img">
          <div class="media profile_picture">
              <a href="profile.php"><img style='width: 170px;height: 165px;' src="images/profil/<?php select_image_profil($id_user, $conn) ?>" alt="" class="circle"></a>
              <div class="media_body">
                  <a href="profile.php"><?php echo$data['nom_user']; ?>  <?php echo$dataE['prenom_eleve']; ?></a>
                  <h6><?php print $uneleve->getNumAddr()." ".$uneleve->getRueAddr(); ?></h6>
                  <h6><?php print $uneleve->getVilleAddr(); ?></h6>
              </div>
          </div>
      </div>
      <section class="author_profile">
          <div class="row author_profile_row">
              <br><br>
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

  <!----------------------------------------------------------------------------------------------------------- -->

      <!-- Option -->
      <section class="messages_area">
        <div class="messages_row row">
          <div class="section_row row">

            <div class="option-profil">
            <section class="min_container photo_pages">
              <div class="section_row row">
                <div class="col s12">
                  <h1>Option Profil</h1><br><br>
                </div>
                <div class="profil">
                <form class="" action="setting.php" method="post" enctype="multipart/form-data">
                  <div class="modif-image">
                    <div class="modif-image-image">
                      <img src="<?php $data['photo_user'] ?>" >
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
                                  <textarea class="form-control" rows="2" name="desc" value="<?php echo$data['desc_user']; ?>"><?php echo$data['desc_user']; ?></textarea>
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
                                <label class="form-label">Date de naissance</label>
                                <input type="date" name="dateU" value="<?php echo$dataE['date_naiss']; ?>">
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
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $user = $_POST['user'];
    $desc = $_POST['desc'];
    $tel = $_POST['tel'];
    $Nrue = $_POST['Nrue'];
    $rue = $_POST['rue'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $photo='123456';    //////////////////////////////Pas fini!

    $mdpA = $_POST['mdpA'];
    $mdpN = $_POST['mdpN'];
    $mdpNC = $_POST['mdpNC'];

    //eleve
    $prenom = $_POST['prenom'];
    $date = $_POST['dateU'];
    $choixpos = '1';




    if (($mdpA or $mdpN) == '' ) {

      $uneleve = new Eleve($id,$nom,$user,$mdp,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo,$desc,$prenom,$date,$choixpos);

      $uneleve->modifier_eleve($uneleve,$conn);


      echo "<script>window.location='./setting.php'</script>";
    } else {

      if ($mdpA==$mdp) {

        if ($mdpN==$mdpNC) {

          $uneleve = new Eleve($id,$nom,$user,$mdpNC,$mail,$tel,$Nrue,$rue,$cp,$ville,$photo,$desc,$prenom,$date,$choixpos);
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




///////////
///////////
///////////
///////////
//////////////////////////////////////////////////////////// Nieaux Entreprise /////////////////////////////////////////////////

elseif ($id==$dataEn['id_user']) {
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
            <img src="images/banner-2.jpg" alt="" class="banner_img">
            <div class="media profile_picture">
                <a href="profile.php"><img src="images/profile-hed-1.jpg" alt="" class="circle"></a>
                <div class="media_body">
                    <a href="profile.php"><?php echo$data['nom_user']; ?> </a>
                    <h6><?php echo$data['num_addr_user']; ?> <?php echo$data['rue_addr_user']; ?> <?php echo$data['CP_addr_user']; ?>, <?php echo$data['ville_addr_user']; ?></h6>
                </div>
            </div>
        </div>
        <section class="author_profile">
            <div class="row author_profile_row">
                <br><br>
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

    <!----------------------------------------------------------------------------------------------------------- -->

        <!-- Option -->
        <div class="middle_section col">
          <div class="post profile_post">
            <div class="post_content">

              <div class="option-profil">
              <section class="min_container photo_pages">
                <div class="section_row row">
                  <div class="col s12">
                    <h1>Option Profil</h1><br><br>
                  </div>
                  <div class="profil">
                    <div class="modif-image">
                      <div class="modif-image-image">
                        <img src="<?php $data['photo_user'] ?>" >
                      </div>
                      <div class="modif-image-bouton">
                        <div>
                          <input type='file' name='photo'>
                          <button class="btn btn-primary btn-block mt-5" type="button">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change la Photo</span>
                          </button>
                        </div>
                      </div>
                    </div>
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
                                    <textarea class="form-control" rows="2" name="desc" value="<?php echo$data['desc_user']; ?>"><?php echo$data['desc_user']; ?></textarea>
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
        </div>

        <!-- /Option -->

    <!-----------------------------------------------------------------------------------------------------------------------------------------------------------  -->


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
      $tel = $_POST['tel'];
      $Nrue = $_POST['Nrue'];
      $rue = $_POST['rue'];
      $ville = $_POST['ville'];
      $cp = $_POST['cp'];
      $desc = $_POST['desc'];
          //////////////////////////////Pas fini!

      $mdpA = $_POST['mdpA'];
      $mdpN = $_POST['mdpN'];
      $mdpNC = $_POST['mdpNC'];

      //entreprise
      $nomresp = $_POST['nom_resp'];
      $ape = $_POST['ape'];
      $siteweb = $_POST['site'];



      if (($mdpA or $mdpN) == '' ) {

        $unentreprise = new Entreprise($id,$nom,$user,$mdp,$mail,$tel,$Nrue,$rue,$cp,$ville,'',$desc,$nomresp,$ape,$siteweb);
        $unentreprise->updateentreprise($unentreprise,$conn);

        echo "<script>window.location='./setting.php'</script>";
      } else {

        if ($mdpA==$mdp) {

          if ($mdpN==$mdpNC) {

            $unentreprise = new Entreprise($id,$nom,$user,$mdpNC,$mail,$tel,$Nrue,$rue,$cp,$ville,'',$desc,$nomresp,$ape,$siteweb);
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
 ?>
