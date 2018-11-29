
<?php ///////:YANN THER 10h22 - 22/11/2018 - V0.0.5
$auto_compl = "";
$sql = "SELECT id_user, nom_user FROM Utilisateur";
$req = $conn->Query($sql)or die('Erreur dans le requete pref');
while ($res = $req->fetch()) {
  $id_auto = $res['id_user'];
  $sql2 = "SELECT prenom_eleve FROM eleve
          WHERE id_user = $id_auto";
  $req2 = $conn->Query($sql2)or die('Erreur dans le requete pref');
  if ($res2 = $req2->fetch()) {
    $auto_compl = $auto_compl."'".$res2['prenom_eleve']." ".$res['nom_user']."',";
  }
  else {
    $auto_compl = $auto_compl."'".$res['nom_user']."',";
  }
}

$auto_compl2 = "";
$sql = "SELECT titre_post FROM Post ";
$req = $conn->Query($sql)or die('Erreur dans le requete pref');
while ($res = $req->fetch()) {
  $auto_compl2 = $auto_compl2."'".$res['titre_post']."',";
}

$auto_compl2_aff = substr($auto_compl2, 0, -1);
$auto_compl_aff = substr($auto_compl, 0, -1);


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  var availableTags = [
    <?php echo $auto_compl_aff; ?>
  ];
  $( "#tags" ).autocomplete({
    source: availableTags
  });
} );
</script>
<script>
$( function() {
  var availableTags = [
    <?php echo $auto_compl2_aff; ?>
  ];
  $( "#titre" ).autocomplete({
    source: availableTags
  });
} );
</script>



<nav class="header_area">
    <div class="custom_container">
        <div class="nav-wrapper">
            <a href="index-2.php" class="brand-logo"><img src="images/logo.png" alt=""></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="#post_modal" class="waves-effect btn post_btn sm_post_btn modal-trigger"><i class="ion-plus"></i>Add
                Post</a>
            <ul class="left_menu hide-on-med-and-down">
                <li><a href="index-2.php" class="active">Acueil</a></li>
                <!-- <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown6">All Pages</a> -->
                    <!-- <div id="dropdown6" class="dropdown-content submenu row">
                        <div class="col m4 menu_column">
                            <ul>

                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="details.php">Post details</a></li>
                                <li><a href="details-2.php">Post details 2</a></li>
                                <li><a href="profile.php">Profile</a></li>
                            </ul>
                        </div>
                        <div class="col m4 menu_column">
                            <ul>
                                <li><a href="messages.php">Messages</a></li>
                                <li><a href="requests.php">Requests</a></li>
                                <li><a href="read-later.php">Read-Later</a></li>
                                <li><a href="notifications.php">Notifications</a></li>
                                <li><a href="block-list.php">Block-list</a></li>
                            </ul>
                        </div>
                        <div class="col m4 menu_column">
                            <ul>
                                <li><a href="photos.php">Photos</a></li>
                                <li><a href="photos-2.php">Photos v2</a></li>
                                <li><a href="video.php">Videos</a></li>
                                <li><a href="error.php">Error (404)</a></li>
                                <li><a href="#modal1" class="waves-effect modal-trigger">Sign in</a></li>
                            </ul>
                        </div>
                    </div> -->
                </li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="notifications search_sm"><a class="dropdown-button" href="#!" data-activates="dropdown5"><i
                                class="ion-ios-search"></i></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown5" class="dropdown-content">
                        <li class="search_from">
                            <input placeholder="Search and enter" type="text">
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="right right_menu hide-on-med-and-down">
                <li class="search_min">
                    <ul class="search_from">
                      <form action="index-2.php?search=<?php echo isset($_POST['search'])?$_POST['search']:''; ?>" method="get" id="myform">
                        <li><input type="text" placeholder="Rechercher" id="searchjs" name="search" value="" type="text"></li>
                        <li><a href="#" onclick="document.getElementById('myform').submit()" name="abut" class="search_icon"><i class="ion-ios-search"></i></a></li>
                      </form>






                    </ul>
                </li>
                <li>
                  <a href="javascript: displayul()" class="waves-effect btn post_btn modal-trigger"><i class="ion-plus"></i><span>Trier</span></a>

                  <!-- <li>
                    <a href="requests.php?groupe=elve">
                      <i class="ion-ios-person-outline"> </i>
                    </a>
                  </li> -->
                </li>
                <li><a href="#post_modal" class="waves-effect btn post_btn modal-trigger"><i class="ion-plus"></i><span>Ajouter Post</span></a>
                </li>
                <!-- Follow feed -->
                <!-- POUR les menu déroulant dans le li mettre class="notifications follow" -->
                <li><a href="requests.php?groupe=elve">
                  <i class="ion-ios-person-outline"> </i>
                  <!-- <b class="n-number"></b>    Notification          -->
                  </a>
                    <!-- Dropdown Structure -->

                    <ul id="dropdown4" class="dropdown-content">
                        <li class="hed_notic">Follow feed <span><i class="ion-ios-gear-outline"></i></span></li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-9.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher</b> started following you.</p>
                                        <h6>544 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect follow_b">Follow back</span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-1.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>James Richardman </b>started following you.</p>
                                        <h6>32 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect confirm"><i class="ion-android-done"></i></span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-12.jpg" alt="" class="circle responsive-img w_img">
                                    <div class="media_body">
                                        <p>You are now following <b>Meryl Streep</b></p>
                                        <h6>Check out her most recent updates.</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-2.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>James Richardman </b>started following you.</p>
                                        <h6>90 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect close_b"><i class="ion-android-close"></i></span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher</b> started following you.</p>
                                        <h6>544 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect follow_b">Follow back</span>
                                            <span class="waves-effect"><i class="ion-android-done"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-11.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Edgar Hoover</b> started following you.</p>
                                        <div class="btn_group left">
                                            <span class="waves-effect follow_b">Follow back</span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="requests.php" class="waves-effect chack_all_btn">Check All Follow Requests</a>
                        </li>
                    </ul>

                </li>
                <!-- Messages -->
                <li class="notifications messages"><a class="dropdown-button" href="#!" data-activates="dropdown3"><i
                                class="ion-ios-chatboxes-outline"></i>
                                <!--NOTIFICATION DYNAMIQUE  -->
                                <!-- <b class="n-number"></b></a> -->
                    <!-- Dropdown Structure -->
                    <ul id="dropdown3" class="dropdown-content">
                        <li class="hed_notic">Messages <span>Mark all as read <i
                                        class="ion-ios-gear-outline"></i></span></li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-1.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Emran Khan
                                            <small>12:40pm</small>
                                        </h4>
                                        <p>Listen, I need to talk to you about this!</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-3.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Masum Rana
                                            <small>2 hours ago</small>
                                        </h4>
                                        <p>One of the best ways to make a great vacation quickly horrible is to choose
                                            the...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-8.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Jakaria Khan
                                            <small>3 hours ago</small>
                                        </h4>
                                        <p>Hi</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-5.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Papia Sultana
                                            <small>2 days ago</small>
                                        </h4>
                                        <p>Hey Masum, I am looking for you as a new actor for upcoming Equalizer 2
                                            movie...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Samuel L.
                                            <small>5 days ago</small>
                                        </h4>
                                        <p>Hello</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="messages.php" class="waves-effect chack_all_btn">Check All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="notifications"><a class="dropdown-button" href="#!" data-activates="dropdown2"><i
                                class="ion-ios-bell-outline"></i><b class="n-number">5</b></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown2" class="dropdown-content">
                        <li class="hed_notic">Notifications <span>Mark all as read <i class="ion-ios-gear-outline"></i></span>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-6.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher</b> submitted a new photo to a
                                            <small>post</small>
                                            post you are following.
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>James Richardman </b>downvoted your
                                            <small>answer</small>
                                            in a post.
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-8.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Margot Robbie</b> commented on your
                                            <small>photo</small>
                                            .
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-9.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Peter Parker</b> is now following you.</p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher </b> submitted a new photo to a
                                            <small>post</small>
                                            you are following.
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="notifications.php" class="waves-effect chack_all_btn">Check All Notifications</a>
                        </li>
                    </ul>
                </li>

                <!-- Profile -->
                <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown1"><img
                                src="images/profile-pic.png" alt="" class="circle p_2"></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="profile.php"><i class="ion-person"></i>My profile</a></li>
                        <!-- <li><a href="read-later.php"><i class="ion-android-folder-open"></i>Saved Articles</a></li>
                        <li class="b_t"><a href="#"><i class="ion-android-notifications"></i>Notification settings</a>
                        </li> -->
                        <!-- <li class="b_b"><a href="#"><i class="ion-ios-locked"></i>Change Password</a></li> -->
                        <li><a href="setting.php"><i class="ion-gear-b"></i>Settings</a></li>
                        <li><a href="#"><i class="ion-ios-flag"></i>Privacy Policy</a></li>
                        <li><a href="#"><i class="ion-podium"></i>FAQ</a></li>
                        <li><a href="#"><i class="ion-power"></i>Log out</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="search_min">
                    <div class="search_from">
                        <input placeholder="Search Here" type="text">
                        <a href="#" class="search_icon"><i class="ion-ios-search"></i></a>
                    </div>
                </li>
                <li><a href="index-2.php">Home</a></li>
                <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown_s0">All
                        Pages</a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown_s0" class="dropdown-content">

                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="details.php">Post details</a></li>
                        <li><a href="details-2.php">Post details 2</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="messages.php">Messages</a></li>
                        <li><a href="requests.php">Requests</a></li>
                        <li><a href="read-later.php">Read-Later</a></li>
                        <li><a href="notifications.php">Notifications</a></li>
                        <li><a href="block-list.php">Block-list</a></li>
                        <li><a href="photos.php">Photos</a></li>
                        <li><a href="photos-2.php">Photos v2</a></li>
                        <li><a href="video.php">Videos</a></li>
                        <li><a href="block-list.php">Error (404)</a></li>
                    </ul>
                </li>
                <li><a href="#">Shortcodes</a></li>
                <li><a href="#">All Elements</a></li>
                <!-- Follow feed -->
                <li class="notifications follow"><a class="dropdown-button" href="#!" data-activates="dropdown_s1"><i
                                class="ion-ios-person-outline"></i><b class="n-number">7</b></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown_s1" class="dropdown-content">
                        <li class="hed_notic">Follow feed <span><i class="ion-ios-gear-outline"></i></span></li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-9.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher</b> started following you.</p>
                                        <h6>544 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect follow_b">Follow back</span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-1.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>James Richardman </b>started following you.</p>
                                        <h6>32 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect confirm"><i class="ion-android-done"></i></span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-12.jpg" alt="" class="circle responsive-img w_img">
                                    <div class="media_body">
                                        <p>You are now following <b>Meryl Streep</b></p>
                                        <h6>Check out her most recent updates.</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-2.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>James Richardman </b>started following you.</p>
                                        <h6>90 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect close_b"><i class="ion-android-close"></i></span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher</b> started following you.</p>
                                        <h6>544 mutual</h6>
                                        <div class="btn_group">
                                            <span class="waves-effect follow_b">Follow back</span>
                                            <span class="waves-effect"><i class="ion-android-done"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-11.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Edgar Hoover</b> started following you.</p>
                                        <div class="btn_group left">
                                            <span class="waves-effect follow_b">Follow back</span>
                                            <span class="waves-effect">Block</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="requests.php" class="waves-effect chack_all_btn">Check All Follow Requests</a>
                        </li>
                    </ul>
                </li>
                <!-- Messages -->
                <li class="notifications messages"><a class="dropdown-button" href="#!" data-activates="dropdown_s2"><i
                                class="ion-ios-chatboxes-outline"></i><b class="n-number">3</b></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown_s2" class="dropdown-content">
                        <li class="hed_notic">Messages <span>Mark all as read <i
                                        class="ion-ios-gear-outline"></i></span></li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-1.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Emran Khan
                                            <small>12:40pm</small>
                                        </h4>
                                        <p>Listen, I need to talk to you about this!</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-3.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Masum Rana
                                            <small>2 hours ago</small>
                                        </h4>
                                        <p>One of the best ways to make a great vacation quickly horrible is to choose
                                            the...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-8.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Jakaria Khan
                                            <small>3 hours ago</small>
                                        </h4>
                                        <p>Hi</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-5.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Papia Sultana
                                            <small>2 days ago</small>
                                        </h4>
                                        <p>Hey Masum, I'm looking for you as a new actor for upcoming Equalizer 2
                                            movie...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <h4>Samuel L.
                                            <small>5 days ago</small>
                                        </h4>
                                        <p>Hello</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="messages.php" class="waves-effect chack_all_btn">Check All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="notifications"><a class="dropdown-button" href="#!" data-activates="dropdown_s3"><i
                                class="ion-ios-bell-outline"></i><b class="n-number">5</b></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown_s3" class="dropdown-content">
                        <li class="hed_notic">Notifications <span>Mark all as read <i class="ion-ios-gear-outline"></i></span>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-6.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher</b> submitted a new photo to a
                                            <small>post</small>
                                            post you are following.
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>James Richardman </b>downvoted your
                                            <small>answer</small>
                                            in a post.
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-8.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Margot Robbie</b> commented on your
                                            <small>photo</small>
                                            .
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <img src="images/profile-9.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Peter Parker</b> is now following you.</p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media seen">
                                    <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p><b>Dan Fisher </b> submitted a new photo to a
                                            <small>post</small>
                                            you are following.
                                        </p>
                                        <h6>5 Minute ago</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="notifications.php" class="waves-effect chack_all_btn">Check All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- Profile -->
                <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown_s4"><img
                                src="images/profile-pic.png" alt="" class="circle p_2"></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown_s4" class="dropdown-content">
                        <li><a href="profile.php"><i class="ion-person"></i>Mon profile</a></li>
                        <!-- <li><a href="read-later.php"><i class="ion-android-folder-open"></i>Saved Articles</a></li> -->
                        <!-- <li class="b_t"><a href="#"><i class="ion-android-notifications"></i>Notification settings</a>
                        </li> -->
                        <!-- <li class="b_b"><a href="#"><i class="ion-ios-locked"></i>Change Password</a></li> -->
                        <li><a href="setting.php"><i class="ion-gear-b"></i>Settings</a></li>
                        <li><a href="#"><i class="ion-ios-flag"></i>Privacy Policy</a></li>
                        <li><a href="#"><i class="ion-podium"></i>FAQ</a></li>
                        <li><a href="#"><i class="ion-power"></i>Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script type="text/javascript">
function displayul() {
  if(document.getElementById('invisible').style.display == 'none'){
    	document.getElementById('invisible').style.display = 'block';
  		}
  		else {
    	document.getElementById('invisible').style.display = 'none';
		}
}
</script>
<div style='display:none;' id='invisible'>
  <nav class="header_area2">
  <center>
    <form class="" action="index-2.php" id="search_more" method="post">
    <table>
      <tr>
        <td width="10%" height="0%">Mots clé</td>
        <td width="10%" height="0%">Membre</td>
        <td width="10%" height="0%">Date Minimum</td>
        <td width="10%" height="0%">Date Maximum</td>
      </tr>
      <tr>
        <td width="10%" height="0%">
          <div class="ui-widget">
            <input name="mot_post" id="titre">
          </div>
        </td>
        <td width="10%" height="0%">
          <div class="ui-widget">
            <input name="member_name" id="tags">
          </div>
        </td>
        <td> <input type="date" name="date_debut" value=""> </td>
        <td> <input type="date" name="date_fin" value=""> </td>
      </tr>
      <tr>
        <td width="10%" height="0%"></td>
        <td width="10%" height="0%">Catégorie</td>
        <td width="10%" height="0%">Type</td>
        <td width="10%" height="0%"></td>
      </tr>
      <tr>
        <td width="10%" height="0%">

        </td>
        <td width="10%" height="0%">
          <select class="" name="cat_post">
            <option value="0"></option>
            <?php
            $sql = "SELECT * FROM Categorie";
            $req = $conn->Query($sql)or die('Erreur dans le requete cat');
            while ($res = $req->fetch()) {
             ?>
            <option value="<?php echo $res['id_cat']; ?>"><?php echo $res['lib_cat']; ?></option>
          <?php } ?>
          </select>
        </td>
        <td width="10%" height="0%">
          <select class="" name="type_post">
            <option value="1">Post</option>
            <option value="2">Stage</option>
            <option value="3">Travail</option>
          </select>
        </td>
        <td width="10%" height="0%">
          <center> <a href="#" onclick="document.getElementById('search_more').submit()" class="waves-effect btn post_btn modal-trigger" name="search_trie" value="0"><i class="ion-plus"><span> Rechercher</span></i></a> </center>
          <!-- onclick="document.getElementById('myform').submit()"  -->
        </td>
      </tr>
    </table>
  </form>
  </center>
  </nav>
</div>
