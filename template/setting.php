<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:36 GMT -->
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
    <nav class="header_area">
        <div class="custom_container">
            <div class="nav-wrapper">
                <a href="index-2.html" class="brand-logo"><img src="images/logo.png" alt=""></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <a href="#post_modal" class="waves-effect btn post_btn sm_post_btn modal-trigger"><i class="ion-plus"></i>Add Post</a>
                <ul class="left_menu hide-on-med-and-down">
                    <li><a href="index-2.html">Home</a></li>
                    <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown6">All Pages</a>
                        <div id="dropdown6" class="dropdown-content submenu row">
                           <div class="col m4 menu_column">
                               <ul>
                                   <li><a href="get-started.html">Get started</a></li>
                                   <li><a href="dashboard.html">Dashboard</a></li>
                                   <li><a href="details.html">Post details</a></li>
                                   <li><a href="details-2.html">Post details 2</a></li>
                                   <li><a href="profile.html">Profile</a></li>
                               </ul>
                           </div>
                           <div class="col m4 menu_column">
                               <ul>
                                   <li><a href="messages.html">Messages</a></li>
                                   <li><a href="requests.html">Requests</a></li>
                                   <li><a href="read-later.html">Read-Later</a></li>
                                   <li><a href="notifications.html">Notifications</a></li>
                                   <li><a href="block-list.html">Block-list</a></li>
                               </ul>
                           </div>
                           <div class="col m4 menu_column">
                               <ul>
                                   <li><a href="photos.html" class="active">Photos</a></li>
                                   <li><a href="photos-2.html">Photos v2</a></li>
                                   <li><a href="video.html">Videos</a></li>
                                   <li><a href="error.html">Error (404)</a></li>
                               </ul>
                           </div>

                        </div>
                    </li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li class="notifications search_sm"><a class="dropdown-button" href="#!" data-activates="dropdown5"><i class="ion-ios-search"></i></a>
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
                       <div class="search_from">
                            <input placeholder="Search Here" type="text">
                            <a href="#" class="search_icon"><i class="ion-ios-search"></i></a>
                       </div>
                    </li>
                    <li><a href="#post_modal" class="waves-effect btn post_btn modal-trigger"><i class="ion-plus"></i><span>Add Post</span></a></li>
                    <!-- Follow feed -->
                    <li class="notifications follow"><a class="dropdown-button" href="#!" data-activates="dropdown4"><i class="ion-ios-person-outline"></i><b class="n-number">7</b></a>
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
                            <li><a href="requests.html" class="waves-effect chack_all_btn">Check All Follow Requests</a></li>
                        </ul>
                    </li>
                    <!-- Messages -->
                    <li class="notifications messages"><a class="dropdown-button" href="#!" data-activates="dropdown3"><i class="ion-ios-chatboxes-outline"></i><b class="n-number">3</b></a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown3" class="dropdown-content">
                            <li class="hed_notic">Messages <span>Mark all as read <i class="ion-ios-gear-outline"></i></span></li>
                            <li>
                               <a href="#">
                                   <div class="media">
                                        <img src="images/profile-1.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4>Emran Khan <small>12:40pm</small></h4>
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
                                            <h4>Masum Rana <small>2 hours ago</small></h4>
                                            <p>One of the best ways to make a great vacation quickly horrible is to choose the...</p>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li>
                               <a href="#">
                                   <div class="media seen">
                                        <img src="images/profile-8.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4>Jakaria Khan <small>3 hours ago</small></h4>
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
                                            <h4>Papia Sultana <small>2 days ago</small></h4>
                                            <p>Hey Masum, I’m looking for you as a new actor for upcoming “Equalizer 2” movie...</p>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li>
                               <a href="#">
                                   <div class="media seen">
                                        <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4>Samuel L. <small>5 days ago</small></h4>
                                            <p>Hello</p>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li><a href="messages.html" class="waves-effect chack_all_btn">Check All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications -->
                    <li class="notifications"><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="ion-ios-bell-outline"></i><b class="n-number">5</b></a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown2" class="dropdown-content">
                            <li class="hed_notic">Notifications <span>Mark all as read <i class="ion-ios-gear-outline"></i></span></li>
                            <li>
                               <a href="#">
                                   <div class="media">
                                        <img src="images/profile-6.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <p><b>Dan Fisher</b> submitted a new photo  to a <small>post</small> post you are following.</p>
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
                                            <p><b>James Richardman </b>downvoted your <small>answer</small> in a post.</p>
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
                                            <p><b>Margot Robbie</b> commented on your <small>photo</small>.</p>
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
                                            <p><b>Dan Fisher </b> submitted a new photo  to a <small>post</small> you are following.</p>
                                            <h6>5 Minute ago</h6>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li><a href="notifications.html" class="waves-effect chack_all_btn">Check All Notifications</a></li>
                        </ul>
                    </li>
                    <!-- Profile -->
                    <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown1"><img src="images/profile-pic.png" alt="" class="circle p_2"></a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="profile.html"><i class="ion-person"></i>My profile</a></li>
                            <li><a href="read-later.html"><i class="ion-android-folder-open"></i>Saved Articles</a></li>
                            <li class="b_t"><a href="#"><i class="ion-android-notifications"></i>Notification settings</a></li>
                            <li class="b_b"><a href="#"><i class="ion-ios-locked"></i>Change Password</a></li>
                            <li><a href="#"><i class="ion-gear-b"></i>Settings</a></li>
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
                    <li><a href="index-2.html">Home</a></li>
                    <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown_s0">All Pages</a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown_s0" class="dropdown-content">
                           <li><a href="get-started.html">Get started</a></li>
                           <li><a href="dashboard.html">Dashboard</a></li>
                           <li><a href="details.html">Post details</a></li>
                           <li><a href="details-2.html">Post details 2</a></li>
                           <li><a href="profile.html">Profile</a></li>
                           <li><a href="messages.html">Messages</a></li>
                           <li><a href="requests.html">Requests</a></li>
                           <li><a href="read-later.html">Read-Later</a></li>
                           <li><a href="notifications.html">Notifications</a></li>
                           <li><a href="block-list.html">Block-list</a></li>
                           <li><a href="photos.html">Photos</a></li>
                           <li><a href="photos-2.html">Photos v2</a></li>
                           <li><a href="video.html">Videos</a></li>
                           <li><a href="block-list.html">Error (404)</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shortcodes</a></li>
                    <li><a href="#">All Elements</a></li>
                    <!-- Follow feed -->
                    <li class="notifications follow"><a class="dropdown-button" href="#!" data-activates="dropdown_s1"><i class="ion-ios-person-outline"></i><b class="n-number">7</b></a>
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
                            <li><a href="requests.html" class="waves-effect chack_all_btn">Check All Follow Requests</a></li>
                        </ul>
                    </li>
                    <!-- Messages -->
                    <li class="notifications messages"><a class="dropdown-button" href="#!" data-activates="dropdown_s2"><i class="ion-ios-chatboxes-outline"></i><b class="n-number">3</b></a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown_s2" class="dropdown-content">
                            <li class="hed_notic">Messages <span>Mark all as read <i class="ion-ios-gear-outline"></i></span></li>
                            <li>
                               <a href="#">
                                   <div class="media">
                                        <img src="images/profile-1.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4>Emran Khan <small>12:40pm</small></h4>
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
                                            <h4>Masum Rana <small>2 hours ago</small></h4>
                                            <p>One of the best ways to make a great vacation quickly horrible is to choose the...</p>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li>
                               <a href="#">
                                   <div class="media seen">
                                        <img src="images/profile-8.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4>Jakaria Khan <small>3 hours ago</small></h4>
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
                                            <h4>Papia Sultana <small>2 days ago</small></h4>
                                            <p>Hey Masum, I’m looking for you as a new actor for upcoming “Equalizer 2” movie...</p>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li>
                               <a href="#">
                                   <div class="media seen">
                                        <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4>Samuel L. <small>5 days ago</small></h4>
                                            <p>Hello</p>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li><a href="messages.html" class="waves-effect chack_all_btn">Check All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications -->
                    <li class="notifications"><a class="dropdown-button" href="#!" data-activates="dropdown_s3"><i class="ion-ios-bell-outline"></i><b class="n-number">5</b></a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown_s3" class="dropdown-content">
                            <li class="hed_notic">Notifications <span>Mark all as read <i class="ion-ios-gear-outline"></i></span></li>
                            <li>
                               <a href="#">
                                   <div class="media">
                                        <img src="images/profile-6.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <p><b>Dan Fisher</b> submitted a new photo  to a <small>post</small> post you are following.</p>
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
                                            <p><b>James Richardman </b>downvoted your <small>answer</small> in a post.</p>
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
                                            <p><b>Margot Robbie</b> commented on your <small>photo</small>.</p>
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
                                            <p><b>Dan Fisher </b> submitted a new photo  to a <small>post</small> you are following.</p>
                                            <h6>5 Minute ago</h6>
                                        </div>
                                   </div>
                               </a>
                            </li>
                            <li><a href="notifications.html" class="waves-effect chack_all_btn">Check All Notifications</a></li>
                        </ul>
                    </li>
                    <!-- Profile -->
                    <li class="user_dropdown"><a class="dropdown-button" href="#!" data-activates="dropdown_s4"><img src="images/profile-pic.png" alt="" class="circle p_2"></a>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown_s4" class="dropdown-content">
                            <li><a href="profile.html"><i class="ion-person"></i>My profile</a></li>
                            <li><a href="read-later.html"><i class="ion-android-folder-open"></i>Saved Articles</a></li>
                            <li class="b_t"><a href="#"><i class="ion-android-notifications"></i>Notification settings</a></li>
                            <li class="b_b"><a href="#"><i class="ion-ios-locked"></i>Change Password</a></li>
                            <li><a href="#"><i class="ion-gear-b"></i>Settings</a></li>
                            <li><a href="#"><i class="ion-ios-flag"></i>Privacy Policy</a></li>
                            <li><a href="#"><i class="ion-podium"></i>FAQ</a></li>
                            <li><a href="#"><i class="ion-power"></i>Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End  Header_Area -->

    <!-- Tranding-select and banner Area -->
    <div class="banner_area banner_2">
        <img src="images/banner-2.jpg" alt="" class="banner_img">
        <div class="media profile_picture">
            <a href="profile.html"><img src="images/profile-hed-1.jpg" alt="" class="circle"></a>
            <div class="media_body">
                <a href="profile.html">Denzel Washington</a>
                <h6>Dhaka, Bangladesh</h6>
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

    <!-- Option -->
    <div class="middle_section col">
      <div class="post profile_post">
        <div class="post_content">

          <section class="min_container photo_pages">
            <div class="section_row row">
              <div class="col s12">
                <h2>Option Profile </h2>
              </div>
                <div class="profile">
                  <div class="modif-image">
                      <div class="modif-image-image">
                        <img src="images/profile-pic.png" alt="">
                      </div>
                    <div class="modif-image-bouton">
                        <div>
                          <button class="btn btn-primary btn-block mt-5" type="button">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change Photo</span>
                          </button>
                        </div>
                    </div>
                  </div>
                  <!-- fin modif image -->
                  <br>
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <form class="form" novalidate="">

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
                                  <input type="text" class="form-control" name="nom" placeholder="Nom de famille">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Prenom</label>
                                  <input class="form-control" type="text" name="prenom" placeholder="Prenom">
                                </div>
                              </div>
                            </div>

                            <!-- mail/utilisateur-->
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Email</label>
                                  <input class="form-control" type="text" name="mail" placeholder="user@example.com">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Nom d'utilisateur</label>
                                  <input class="form-control" type="text" name="user" placeholder="Nom d'utilisateur">
                                </div>
                              </div>
                            </div>
                            <!-- A propos -->
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label class="form-label">A propos de moi</label>
                                  <textarea class="form-control" rows="2" placeholder="My Bio"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12 col-sm-6 mb-3">

                            <div class="col s12">
                              <h2>Information complémentaire</h2>
                            </div>

                            <div class="row">
                              <div class="col">
                                <label class="form-label">Date de naissance</label>
                                <input type="date" name="dateU" value="">
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">N°Mobile</label>
                                  <input class="form-labelt" type="text" name="tel" placeholder="N°Mobile">
                                </div>
                              </div>
                            </div>

                          </div>
                          </div>
                          <div class="col-12 col-sm-6 mb-3">
                            <div class="col s12">
                              <h2>Mot de passe</h2>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group"> <label class="form-label">Current Password</label>
                                  <input class="form-control" type="password" placeholder="••••••">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">New Password</label>
                                  <input class="form-control" type="password" placeholder="••••••">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="form-label">Confirm <span class="d-none d-xl-inline">Password</span></label>
                                  <input class="form-control" type="password" placeholder="••••••">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="float-right mt-0 mb-0">
                          <button class="btn btn-secondary mr-3" type="submit">Cancel</button>
                          <button class="btn btn-primary " type="submit">Update Profile</button>
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
    <!-- Option -->




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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/photos.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:40:08 GMT -->
</html>