<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:22 GMT -->
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

    <!-- Messages Area -->
    <section class="messages_area">
        <div class="messages_row row">
            <div class="messages_heder">
                <h2>All Messages</h2>
                <ul class="mg_btn">
                    <li><a href="#" class="waves-effect btn active"><i class="ion-ios-chatboxes"></i>New Message</a></li>
                    <li><a href="#" class="waves-effect btn">Mark all as read</a></li>
                    <li><a href="#" class="waves-effect btn setting_i"><i class="ion-ios-gear-outline"></i></a></li>
                </ul>
            </div>
           <div class="col s4 tab_panel">
                <div class="search_area">
                    <div class="input-field">
                        <input type="text" placeholder="Search">
                        <i class="ion-ios-search-strong"></i>
                    </div>
                </div>
                <ul class="tabs tab_list">
                    <li class="tab">
                       <a href="#messages-1">
                            <div class="media">
                                <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Dan Fisher <small>12:40pm</small></h4>
                                    <p>Listen, I need to talk to you about this!</p>
                                </div>
                            </div>
                       </a>
                   </li>
                    <li class="tab">
                       <a href="#messages-2">
                           <div class="media">
                                <img src="images/profile-4.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Morgan Freeman <small>2 hours ago</small></h4>
                                    <p>One of the best ways to make a great <br> vacation quickly horrible is to choose the...</p>
                                </div>
                           </div>
                       </a>
                   </li>
                    <li class="tab">
                       <a href="#messages-3">
                           <div class="media">
                                <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Samuel L.<small>3 hours ago</small></h4>
                                    <p>Hi,</p>
                                </div>
                           </div>
                       </a>
                   </li>
                    <li class="tab">
                       <a href="#messages-4" class="active">
                           <div class="media">
                                <img src="images/profile-5-2.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Denzel Washington<small>2 days ago</small></h4>
                                    <p>Hey Masum, I’m looking for you as a new <br>actor for my upcoming “Equalizer 2” movie...</p>
                                </div>
                           </div>
                       </a>
                   </li>
                    <li class="tab">
                       <a href="#messages-1" class="seen">
                            <div class="media">
                                <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Dan Fisher <small>12:40pm</small></h4>
                                    <p>Listen, I need to talk to you about this!</p>
                                </div>
                            </div>
                       </a>
                   </li>
                    <li class="tab">
                       <a href="#messages-2" class="seen">
                           <div class="media">
                                <img src="images/profile-4.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Morgan Freeman <small>2 hours ago</small></h4>
                                    <p>One of the best ways to make a great <br> vacation quickly horrible is to choose the...</p>
                                </div>
                           </div>
                       </a>
                   </li>
                    <li class="tab">
                       <a href="#messages-3" class="seen">
                           <div class="media">
                                <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4>Samuel L.<small>3 hours ago</small></h4>
                                    <p>Hi,</p>
                                </div>
                           </div>
                       </a>
                   </li>
                </ul>
           </div>
            <div class="col s8 tab_content">
                <div id="messages-1" class="col s12 all_messages">
                    <div class="media profile">
                        <img src="images/profile-7.jpg" alt="" class="circle responsive-img">
                        <div class="media_body">
                            <a href="#">Dan Fisher</a>
                            <p>Acting is just a way of making a living, the family is life.</p>
                        </div>
                    </div>
                    <div class="messages_date">
                        <h4>July 13, 2018</h4>
                    </div>
                    <div class="sms">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms">
                        <p>Yeah what’s the matter? You know I’m kinda busy with my new  <br>upcoming Equalizer 2, spending all the time in Hollywood.</p>
                        <p> So tell me what’s exciting? What’s going on?</p>
                        <h6>5:28 pm</h6>
                    </div>
                    <div class="messages_date md_2">
                        <h4>July 15, 2018</h4>
                    </div>

                    <div class="sms_right">
                        <p>Ah got it...</p>
                        <h6>5:29 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Actually nothing so important.. OK it’s important. I heard you were <br>looking for a new villain for Equalizer 2. May be I’m a good fit for this.</p>
                        <p>You know what? I can give good dialogue delivery like Samuel L. Jackson <br>and, and nice expressions like Di Caprio.</p>
                        <h6>5:30 pm</h6>
                    </div>

                    <div class="type_messages">
                        <div class="input-field">
                            <textarea  placeholder="Type something & press enter"></textarea>
                            <ul class="imoji">
                                <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-picture-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="messages-2" class="col s12 all_messages">
                    <div class="media profile">
                        <img src="images/profile-4.jpg" alt="" class="circle responsive-img">
                        <div class="media_body">
                            <a href="#">Morgan Freeman</a>
                            <p>Acting is just a way of making a living, the family is life.</p>
                        </div>
                    </div>
                    <div class="messages_date">
                        <h4>July 13, 2018</h4>
                    </div>
                    <div class="sms">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms">
                        <p>Yeah what’s the matter? You know I’m kinda busy with my new  <br>upcoming Equalizer 2, spending all the time in Hollywood.</p>
                        <p> So tell me what’s exciting? What’s going on?</p>
                        <h6>5:28 pm</h6>
                    </div>
                    <div class="messages_date md_2">
                        <h4>July 15, 2018</h4>
                    </div>

                    <div class="sms_right">
                        <p>Ah got it...</p>
                        <h6>5:29 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Actually nothing so important.. OK it’s important. I heard you were <br>looking for a new villain for Equalizer 2. May be I’m a good fit for this.</p>
                        <p>You know what? I can give good dialogue delivery like Samuel L. Jackson <br>and, and nice expressions like Di Caprio.</p>
                        <h6>5:30 pm</h6>
                    </div>

                    <div class="type_messages">
                        <div class="input-field">
                            <textarea placeholder="Type something & press enter"></textarea>
                            <ul class="imoji">
                                <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-picture-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="messages-3" class="col s12 all_messages">
                    <div class="media profile">
                        <img src="images/profile-10.jpg" alt="" class="circle responsive-img">
                        <div class="media_body">
                            <a href="#">Samuel L.</a>
                            <p>Acting is just a way of making a living, the family is life.</p>
                        </div>
                    </div>
                    <div class="messages_date">
                        <h4>July 13, 2018</h4>
                    </div>
                    <div class="sms">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms">
                        <p>Yeah what’s the matter? You know I’m kinda busy with my new  <br>upcoming Equalizer 2, spending all the time in Hollywood.</p>
                        <p> So tell me what’s exciting? What’s going on?</p>
                        <h6>5:28 pm</h6>
                    </div>
                    <div class="messages_date md_2">
                        <h4>July 15, 2018</h4>
                    </div>

                    <div class="sms_right">
                        <p>Ah got it...</p>
                        <h6>5:29 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Actually nothing so important.. OK it’s important. I heard you were <br>looking for a new villain for Equalizer 2. May be I’m a good fit for this.</p>
                        <p>You know what? I can give good dialogue delivery like Samuel L. Jackson <br>and, and nice expressions like Di Caprio.</p>
                        <h6>5:30 pm</h6>
                    </div>

                    <div class="type_messages">
                        <div class="input-field">
                            <textarea placeholder="Type something & press enter"></textarea>
                            <ul class="imoji">
                                <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-picture-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="messages-4" class="col s12 all_messages">
                    <div class="media profile">
                        <img src="images/profile-5-2.jpg" alt="" class="circle responsive-img">
                        <div class="media_body">
                            <a href="#">Denzel Washington</a>
                            <p>Acting is just a way of making a living, the family is life.</p>
                        </div>
                    </div>
                    <div class="messages_date">
                        <h4>July 13, 2018</h4>
                    </div>
                    <div class="sms">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Hey Masum, How about you?</p>
                        <h6>5:27 pm</h6>
                    </div>
                    <div class="sms">
                        <p>Yeah what’s the matter? You know I’m kinda busy with my new  <br>upcoming Equalizer 2, spending all the time in Hollywood.</p>
                        <p> So tell me what’s exciting? What’s going on?</p>
                        <h6>5:28 pm</h6>
                    </div>
                    <div class="messages_date md_2">
                        <h4>July 15, 2018</h4>
                    </div>

                    <div class="sms_right">
                        <p>Ah got it...</p>
                        <h6>5:29 pm</h6>
                    </div>
                    <div class="sms_right">
                        <p>Actually nothing so important.. OK it’s important. I heard you were <br>looking for a new villain for Equalizer 2. May be I’m a good fit for this.</p>
                        <p>You know what? I can give good dialogue delivery like Samuel L. Jackson <br>and, and nice expressions like Di Caprio.</p>
                        <h6>5:30 pm</h6>
                    </div>

                    <div class="type_messages">
                        <div class="input-field">
                            <textarea placeholder="Type something & press enter"></textarea>
                            <ul class="imoji">
                                <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-picture-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Messages Area -->

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
