<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/read-later.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:24 GMT -->
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
    require('part/header.php');
    ?>
    <!-- End  Header_Area -->

    <!-- Tranding-select and banner Area -->
    <ul class="tranding_select">
        <li><a href="#" class="waves-effect btn">Latest</a></li>
        <li><a href="#" class="waves-effect btn">Trending</a></li>
        <li><a href="#" class="waves-effect btn">Featured</a></li>
    </ul>
    <div class="banner_area">
        <img src="images/banner.jpg" alt="" class="banner_img">
    </div>
    <!-- End Tranding Area -->

    <!-- Min Container area -->
    <section class="min_container min_pages">
        <div class="section_row">
            <div class="middle_section col" id="infinite_scroll">
               <!-- Read Later -->
                <div class="notifications read_latter">
                    <!-- Dropdown Structure -->
                    <div class="hed_notic">Saved Items</div>
                    <ul class="notifications_content">
                        <li>
                           <a href="#">
                               <div class="media first_child">
                                    <img src="images/read-later-1.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p>Advertising Defined What S It Good For And How An Online Campaign Can Really Save You Big Bucks</p>
                                        <h6>Saved 10 days ago</h6>
                                    </div>
                               </div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                               <div class="media first_child">
                                    <img src="images/read-later-2.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p>Mouse Hunt Not The Movie Choosing The Perfect Mouse For Your Computer</p>
                                        <h6>Saved 10 days ago</h6>
                                    </div>
                               </div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                               <div class="media first_child">
                                    <img src="images/read-later-3.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p>Advertising Defined What S It Good For And How An Online Campaign Can Really Save You Big Bucks</p>
                                        <h6>Saved 10 days ago</h6>
                                    </div>
                               </div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                               <div class="media first_child">
                                    <img src="images/read-later-4.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p>Direct Mail Advertising How I Made 47 325 In 30 Days By Mailing 2 200 Letters</p>
                                        <h6>Saved 10 days ago</h6>
                                    </div>
                               </div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                               <div class="media first_child">
                                    <img src="images/read-later-5.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p>Vinyl Banners With Its Different Types Kinds And Applications</p>
                                        <h6>Saved 10 days ago</h6>
                                    </div>
                               </div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                               <div class="media first_child">
                                    <img src="images/read-later-6.jpg" alt="" class="circle responsive-img">
                                    <div class="media_body">
                                        <p>12 Handy Tips For Generating Leads Through Cold Calling</p>
                                        <h6>Saved 10 days ago</h6>
                                    </div>
                               </div>
                           </a>
                        </li>
                    </ul>
                </div>
                <!-- End Notifications area -->
                <a href="load-mor.html" class="load-mor btn-large">Loding next</a>
            </div>
            <!-- left side bar -->
            <div class="col">
                <div class="left_side_bar">
                    <div class="categories">
                        <h3 class="categories_tittle">Post Categories</h3>
                        <ul class="categories_icon">
                            <li><a class="tooltip" data-balloon="Rate Post" data-balloon-pos="up"><i class="ion-ios-star"></i></a></li>
                            <li><a href="#" class="tooltip" data-balloon="Time Post" data-balloon-pos="up"><i class="ion-android-time"></i></a></li>
                            <li><a href="#" class="tooltip" data-balloon="Music Post" data-balloon-pos="up"><img src="images/icons/sound.png" alt=""></a></li>
                            <li><a href="#" class="tooltip" data-balloon="Images Post" data-balloon-pos="up"><i class="ion-android-image"></i></a></li>
                            <li><a href="#" class="tooltip" data-balloon="chart Post" data-balloon-pos="up"><i class="large material-icons">insert_chart</i></a></li>
                        </ul>
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
                        <a href="#">
                            <img src="images/advertis-2.jpg" alt="" class="responsive-img">
                        </a>
                        <div class="popular_posts">
                            <h3 class="categories_tittle">Popular Posts</h3>
                            <div class="row valign-wrapper popular_item">
                                <div class="col s3 p_img">
                                   <a href="#">
                                        <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                                   </a>
                                </div>
                                <div class="col s9 p_content">
                                   <a href="#">Poster can be one of the effective marketing and advertising materials.</a>
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
                                   <a href="#">Color is so powerful that it can persuade, motivate, inspire and touch</a>
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
                            <div class="row valign-wrapper popular_item">
                                <div class="col s3 p_img">
                                   <a href="#">
                                        <img src="images/recent-post-4.jpg" alt="" class="circle responsive-img">
                                   </a>
                                </div>
                                <div class="col s9 p_content">
                                   <a href="#">Outdoor advertising is a low budget and effective way of advertising a </a>
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
                                   <a href="#">Famous is as famous does and the famous get known through publicity. </a>
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
                                    <div class="collapsible-header"><i class="ion-chevron-right"></i>Healthy Environment For Self Esteem</div>
                                    <div class="collapsible-body">
                                        <div class="row collaps_wrpper">
                                            <div class="col s1 media_l">
                                                <b>1</b>
                                                <i class="ion-android-arrow-dropdown-circle"></i>
                                            </div>
                                            <div class="col s11 media_b">
                                                <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                                <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem knowing what to pack, but instead have</p>
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
                                                <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the palladium</p>
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
                                                <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem knowing what to pack, but instead have</p>
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
                                                <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the palladium</p>
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
                                                <i class="ion-android-arrow-dropdown-circle"></i>
                                            </div>
                                            <div class="col s11 media_b">
                                                <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                                <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem knowing what to pack, but instead have</p>
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
                                                <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the palladium</p>
                                                <h6>By <a href="#">Thomas Omalley</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="ion-chevron-right"></i>Don T Let The Outtakes Take You Out</div>
                                    <div class="collapsible-body">
                                        <div class="row collaps_wrpper">
                                            <div class="col s1 media_l">
                                                <b>1</b>
                                                <i class="ion-android-arrow-dropdown-circle"></i>
                                            </div>
                                            <div class="col s11 media_b">
                                                <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                                <p>If you will be traveling for a ski vacation, it is often difficult to know what to pack. You may not even have a problem knowing what to pack, but instead have</p>
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
                                                <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the palladium</p>
                                                <h6>By <a href="#">Thomas Omalley</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="ion-chevron-right"></i>Helen Keller A Teller And A Seller</div>
                                    <div class="collapsible-body">
                                        <div class="row collaps_wrpper collaps_2">
                                            <div class="col s1 media_l">
                                                <b>1</b>
                                                <i class="ion-android-arrow-dropdown-circle"></i>
                                            </div>
                                            <div class="col s11 media_b">
                                                <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
                                                <p>The Emerald Buddha is a figurine of a sitting Budha, that is the is the palladium</p>
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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/read-later.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:36 GMT -->
</html>
