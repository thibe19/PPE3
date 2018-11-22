<?php
// YANN THER - 10h20 - 22/11/2018
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/requests.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Open List | Html template</title>

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
    require('../ToolBox/bdd.inc.php');
    require('../ToolBox/toolbox_inc.php');
    require('part/header.php');
    ?>
    <!-- End  Header_Area -->
    <ul class="tranding_select ">
        <li class="tab"><a href="requests.php?groupe=elve" class="waves-effect btn <?php if ($_GET['groupe'] == "elve") { echo "active"; } ?>">élèves</a></li>
        <li class="tab"><a href="requests.php?groupe=entr" class="waves-effect btn <?php if ($_GET['groupe'] == "entr") { echo "active"; } ?>">Entreprises</a></li>
    </ul>
    <!-- Notifications area -->
    <section class="notifications_area">
        <div class="notifications">
            <!-- Dropdown Structure -->

              <?php

            //////////// eleves affichage

            if ($_GET['groupe'] == "elve") {

              ?>
              <div class="hed_notic">Tout les élèves <span><i class="ion-ios-gear-outline"></i></span></div>
              <ul class="notifications_content follow">
              <?php

              $SQL = "SELECT * FROM eleve";
              $req = $conn->Query($SQL) or die("L'utilisateur n'existe pas");
              while ($res = $req->fetch()) {


                $id_user = $res['id_user'];

                  $SQL2 = "SELECT * FROM utilisateur
                          WHERE id_user = $id_user";
                  $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
                  while ($res2 = $req2->fetch()) {

                    if ($res2['photo_user'] == "") {
                      $photo = "avatar.png";
                    }
                    else {
                      $photo = $res2['photo_user'];
                    }


               ?>


                <li>
                   <a href="#">
                       <div class="media first_child">
                            <img src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle responsive-img">
                            <div class="media_body">
                                <p><b><?php echo $res2['nom_user']; ?></b></p>
                                <h6> <?php echo $res2['num_addr_user'].", ".$res2['rue_addr_user'].", ".$res2['CP_addr_user']." ".$res2['ville_addr_user']; ?> </h6>

                                <div class="btn_group">
                                    <span class="waves-effect follow_b">Contacter</span>
                                    <span class="waves-effect">Ajouter amis</span>
                                </div>
                            </div>
                       </div>
                   </a>
                </li>
              <?php }}}


              ///////////////// entreprise affichage


              if ($_GET['groupe'] == "entr") {

                ?>
                <div class="hed_notic">Toutes les entreprises <span><i class="ion-ios-gear-outline"></i></span></div>
                <ul class="notifications_content follow">
                <?php

                $SQL = "SELECT * FROM entreprise";
                $req = $conn->Query($SQL) or die("L'utilisateur n'existe pas");
                while ($res = $req->fetch()) {


                  $id_user = $res['id_user'];

                    $SQL2 = "SELECT id_user, nom_user, photo_user FROM utilisateur
                            WHERE id_user = $id_user";
                    $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
                    while ($res2 = $req2->fetch()) {

                      if ($res2['photo_user'] == "") {
                        $photo = "avatar2.png";
                      }
                      else {
                        $photo = $res2['photo_user'];
                      }


                 ?>


                  <li>
                     <a href="#">
                         <div class="media first_child">
                              <img src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle responsive-img">
                              <div class="media_body">
                                  <p><b><?php echo $res2['nom_user']; ?></b> </p>
                                  <h6> </h6>
                                  <div class="btn_group">
                                      <span class="waves-effect follow_b">Contacter</span>
                                      <span class="waves-effect">Ajouter amis</span>
                                  </div>
                              </div>
                         </div>
                     </a>
                  </li>
                <?php }}} ?>
            </ul>
        </div>
    </section>
    <!-- End Notifications area -->


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
    <div id="post_modal" class="add_post modal">
        <h2>Create A New Post</h2>
        <form class="input_group">
            <div class="input-field">
                <input  type="text" class="validate" placeholder="Add a tittle">
                <textarea class="textarea" placeholder="Add some description"></textarea>
            </div>
            <div class="upload_photo row">
                <ul class="tabs tab_nav">
                    <li class="tab col s6"><a href="#photo"><i class="ion-ios-camera"></i>Add Photo</a></li>
                    <li class="tab col s6"><a class="" href="#video"><i class="ion-ios-videocam"></i>Add video</a></li>
                </ul>
                <div id="photo" class="col s12 tabs_content">
                    <div class="photo_u">
                        <img src="images/upload.png" alt="">
                        <h4>Select files to upload <small>or drag &amp; drop files</small></h4>
                    </div>
                </div>
                <div id="video" class="col s12 tabs_content">
                    <div class="photo_u">
                        <img src="images/upload.png" alt="">
                        <h4>Select files to upload <small>or drag &amp; drop files</small></h4>
                    </div>
                </div>
            </div>
            <div class="input-field col s12 select_option">
                <select>
                    <option value="" disabled selected>Choose a category</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="2">Option 2</option>
                    <option value="2">Option 2</option>
                </select>

                <div class="chips chips-placeholder" data-index="0" data-initialized="true">
                    <input class="input" placeholder="Enter a tag">
                </div>
            </div>
            <div class="input-field add_link">
                <input  type="text" class="validate" placeholder="Add a link">
                <span>optional</span>
            </div>
            <div class="yes_no">
                <h4>Anyone can submit?</h4>
                <div class="flipswitch"></div>
            </div>
            <div class="row submit_btn_area">
               <div class="col s6">
                    <button class="waves-effect"><i class="ion-folder"></i>Save draft</button>
               </div>
               <div class="col s6">
                    <button class="waves-effect col s6"><i class="ion-eye"></i>Preview post</button>
               </div>
               <div class="col s12">
                    <button class="waves-effect publish">Publish</button>
               </div>
            </div>
        </form>
    </div>
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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/requests.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
</html>
