<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:38:03 GMT -->
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
    require('part/header.php');
    ?>
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
            <div class="col l4 m6">
                <ul class="profile_menu">
                    <li><a href="#">About</a></li>
                    <li><a href="photos.html">Photos</a></li>
                    <li><a href="video.html">Videos</a></li>
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

    <!-- Dashbord area -->
    <section class="your_states">
        <div class="custom_container">
            <div class="row states_row">
               <h2>Your States</h2>
                <div class="col xl3 m6 s12">
                    <div class="post_views">
                        <h6>Post Views</h6>
                        <img src="images/icons/cercle.png" alt="">
                        <h2>1,425<small>+52%</small></h2>
                    </div>
                </div>
                <div class="col xl3 m6 s12">
                    <div class="post_views">
                        <h6>Upvotes</h6>
                        <img src="images/icons/shap.png" alt="">
                        <h2>265<small class="shap">-20%</small></h2>
                    </div>
                </div>
                <div class="col xl3 m6 s12">
                    <div class="post_views">
                        <h6>Comments</h6>
                        <img src="images/icons/shap-2.png" alt="">
                        <h2>1,425<small class="shap_2">+52%</small></h2>
                    </div>
                </div>
                <div class="col xl3 m6 s12">
                    <div class="post_views">
                        <h6>Profile views</h6>
                        <img src="images/icons/shap-3.png" alt="">
                        <h2>198<small class="shap_3"> -10%</small></h2>
                    </div>
                </div>
            </div>
            <div class="chart_area row">
                <div class="col xl4 s12">
                    <div class="cercle_chart">
                        <h6>Pie chart</h6>
                        <div class="input-field">
                            <select>
                                <option value="" disabled selected>Month</option>
                                <option value="1">Years</option>
                            </select>
                        </div>
                        <h5>All Visitors</h5>
                        <h2>20k</h2>
                        <svg id="svg"></svg>
                    </div>
                </div>
                <div class="col xl8 s12">
                   <div class="graph_chart_area">
                        <div class="graph_chart_heder">
                            <h6>Graph Chart</h6>
                            <ul class="views_month">
                                <li><a href="#">Views <i class="ion-ios-arrow-thin-up"></i></a></li>
                                <li><a href="#">Months <i class="ion-ios-arrow-thin-right"></i></a></li>
                            </ul>
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>Month</option>
                                    <option value="1">Years</option>
                                </select>
                            </div>
                        </div>
                        <div class="graph_chart">
                            <div id="chart">
                                <ul id="numbers">
                                    <li><span>20k</span></li>
                                    <li><span>15k</span></li>
                                    <li><span>10k</span></li>
                                    <li><span>5k</span></li>
                                    <li><span>0k</span></li>
                                </ul>

                                <ul id="bars">
                                    <li><div data-percentage="60" class="bar"></div><span>Jul 16</span></li>
                                    <li><div data-percentage="45" class="bar"></div><span></span></li>
                                    <li><div data-percentage="70" class="bar"></div><span></span></li>
                                    <li><div data-percentage="55" class="bar"></div><span>Oct 16</span></li>
                                    <li><div data-percentage="70" class="bar"></div><span></span></li>
                                    <li><div data-percentage="80" class="bar"></div><span></span></li>
                                    <li><div data-percentage="70" class="bar"></div><span>Jan</span></li>
                                    <li><div data-percentage="90" class="bar"></div><span></span></li>
                                    <li><div data-percentage="60" class="bar"></div><span></span></li>
                                    <li><div data-percentage="40" class="bar"></div><span>Apr</span></li>
                                    <li><div data-percentage="50" class="bar"></div><span></span></li>
                                    <li><div data-percentage="60" class="bar"></div><span></span></li>
                                    <li><div data-percentage="70" class="bar"></div><span>Jul</span></li>
                                    <li><div data-percentage="23" class="bar"></div><span></span></li>
                                    <li><div data-percentage="80" class="bar"></div><span>Oct</span></li>
                                    <li><div data-percentage="44" class="bar"></div><span> </span></li>
                                    <li><div data-percentage="23" class="bar"></div><span></span></li>
                                </ul>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
            <div class="row user_signup_area">
                <div class="col s12 xl6">
                    <div class="user_signup">
                       <h4>User signup</h4>
                        <table class="admin_table responsive-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Time</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Isaiah Brewer</td>
                                    <td>noah_kessler@rogahn.biz</td>
                                    <td>4 min ago</td>
                                    <td><a href="#" class="waves-effect">Contributor</a></td>
                                </tr>
                                <tr>
                                    <td>Tyler Tucker</td>
                                    <td>zemlak.tate@lakin.us</td>
                                    <td>20 min ago</td>
                                    <td><a href="#" class="waves-effect active">subscriber</a></td>
                                </tr>
                                <tr>
                                    <td>Chad Peterson</td>
                                    <td>royal_turcotte@bernier.biz</td>
                                    <td>1h ago</td>
                                    <td><a href="#" class="waves-effect moderator">Moderator</a></td>
                                </tr>
                                <tr>
                                    <td>Mathilda Sutton</td>
                                    <td>kirlin.agustin@gmail.com</td>
                                    <td>2h ago</td>
                                    <td><a href="#" class="waves-effect admin">Admin</a></td>
                                </tr>
                                <tr>
                                    <td>Lucas Hampton</td>
                                    <td>labadie_maryse@dawn.org</td>
                                    <td>3h ago</td>
                                    <td><a href="#" class="waves-effect moderator">Moderator</a></td>
                                </tr>
                                <tr>
                                    <td>Harold Robbins</td>
                                    <td>labadie_maryse@dawn.org</td>
                                    <td>4h ago</td>
                                    <td><a href="#" class="waves-effect active">subscriber</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col xl6 s12">
                    <div class="progress_reaches">
                        <h4>Progress for post reaches</h4>
                        <h6>Video Posts</h6>
                        <div class="progress">
                            <div class="determinate">40%</div>
                        </div>
                        <h6>Open Lists</h6>
                        <div class="progress">
                            <div class="determinate openlist_p">90%</div>
                        </div>
                        <h6>Normal Blog Posts</h6>
                        <div class="progress">
                            <div class="determinate normal_p">70%</div>
                        </div>
                        <h6>Audio Posts</h6>
                        <div class="progress">
                            <div class="determinate audio_p">20%</div>
                        </div>
                        <h6>Images & Videos</h6>
                        <div class="progress">
                            <div class="determinate img_p">50%</div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <div class="graph_gradient">
                        <div class="graph_chart_heder">
                            <h4>Line Graph with gradient</h4>
                            <ul class="views_month">
                                <li><a href="#">Traffic <i class="ion-ios-arrow-thin-up"></i></a></li>
                                <li><a href="#">Minutes <i class="ion-ios-arrow-thin-right"></i></a></li>
                            </ul>
                            <ul class="day_month_btn">
                                <li><a href="#" class="waves-effect active">Daily</a></li>
                                <li><a href="#" class="waves-effect">Weekly</a></li>
                            </ul>
                        </div>
                        <div class="highcharts-container" id="purchase-graph"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashbord area -->

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
    <!-- chart js -->
    <script src="vendors/chart/snap.svg-min.js"></script>
    <script src="vendors/chart/svg-donut-chart-framework.js"></script>
    <script src="vendors/chart/highcharts.js"></script>
    <script src="vendors/chart/graph-chart.js"></script>
    <!-- Theme JS -->
    <script src="js/theme.js"></script>
</body>

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:38:14 GMT -->
</html>
