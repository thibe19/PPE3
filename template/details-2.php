<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/details-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:09 GMT -->
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

    <!-- Min Container area -->
    <section class="min_container min_container_2">
        <div class="section_row">
            <div class="middle_section col">
                <!-- Post -->
                <div class="post post_details">
                   <div class="post_content">
                        <a href="#" class="post_img">
                            <img src="images/post-7.jpg" alt="">
                        </a>
                        <div class="row author_area">
                            <div class="col s1 btn_floating">
                                <a class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a>
                            </div>
                            <div class="col s6 like_user">
                                <ul class="like_img">
                                    <li><a href="#" class="single_l_1"><img src="images/like-client-1.png" alt=""></a></li>
                                    <li><a href="#" class="single_l"><img src="images/like-client-2.png" alt=""></a></li>
                                    <li><a href="#" class="single_l"><img src="images/like-client-3.png" alt=""></a></li>
                                    <li><a href="#" class="single_l"><img src="images/like-client-4.png" alt=""></a></li>
                                    <li><a href="#" class="mor_like">257 people added list</a></li>
                                </ul>
                            </div>
                            <div class="col s5 add_btn_col">
                                <a href="#" class="add_btn waves-effect">Add open list</a>
                            </div>
                        </div>
                        <div class="post_heding_aea">
                            <a href="#" class="post_heding">Why Is It I Can Never Think Of Anything Good To Make For Supper</a>
                            <h4 class="by_author"><img src="images/author-s-1.jpg" alt="" class="circle"><a href="#">Masum Rana</a>5 minutes ago</h4>
                        </div>
                        <div class="socail_share_area row">
                           <ul class="socail_share">
                               <li class="share_count">2.3K</li>
                               <li><a href="#" class="waves-effect"><i class="fa fa-facebook-square"></i></a></li>
                               <li><a href="#" class="waves-effect twitter"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#" class="plus_round"><i class="ion-plus-round"></i></a></li>
                           </ul>
                           <p>In the last 10 years Americans have seen a boom in local food markets and for good reason. While Americans continue to buy more fast food, they still expect perfect ingredients and they are finding them.</p>
                           <p>So why are they turning to their local markets more and more? In a nutshell they want fresh, healthy produce with great flavor. There are numerous other benefits to buying local products and it would seem Americans are now rediscovering what their local growers have to offer. FRESHER</p>
                        </div>
                   </div>

                    <div class="like_comment_area row">
                        <div class="col s6 updown_btn comment_c">
                            <a href="#"><i class="ion-ios-chatboxes-outline"></i></a>
                            <a href="#" class="count_n">14 comments</a>
                        </div>
                        <div class="col s6 updown_btn">
                            <a href="#"><i class="ion-android-arrow-dropdown-circle"></i></a>
                            <a href="#"><i class="ion-android-arrow-dropup-circle"></i></a>
                            <a href="#" class="count_n">483</a>
                        </div>
                        <div class="col s12 comment_input_box">
                            <div class="input-field comment_input">
                                <input placeholder="Placeholder" type="text" class="validate">
                                <i class="ion-camera"></i>
                                <span>Post</span>
                            </div>
                        </div>
                        <div class="col p0 s12">
                            <div class="media">
                                <img src="images/comment-a.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4><a href="#">Masum Rana</a>5 minutes ago</h4>
                                    <p>Care for fresher ingredients? Locally grown items are usually harvested 1 or 2 days before hitting the market making them significantly fresher then traditional store bought ingredients</p>
                                    <span><a href="#"><i class="ion-ios-arrow-thin-up"></i></a>483<a href="#"><i class="ion-ios-arrow-thin-down"></i></a></span>
                                    <a href="#" class="replay_btn">Reply</a>
                                    <div class="media">
                                        <img src="images/comment-a.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4><a href="#">Masum Rana</a>5 minutes ago</h4>
                                            <p>Locally grown items are usually harvested 1 or 2 days </p>
                                            <span><a href="#"><i class="ion-ios-arrow-thin-up"></i></a>483<a href="#"><i class="ion-ios-arrow-thin-down"></i></a></span>
                                            <a href="#" class="replay_btn">Reply</a>
                                        </div>
                                    </div>
                                    <a href="#" class="view_mor_r">View more replies...</a>
                                </div>
                            </div>
                            <a href="#" class="view_mor_c">View more comments <i class="ion-chevron-down"></i></a>
                        </div>
                    </div>
                </div><!-- End Post -->
                <!-- Post -->
                <div class="post post_details">
                   <div class="post_content">
                        <a href="#" class="post_img">
                            <img src="images/post-7.jpg" alt="">
                        </a>
                        <div class="post_heding_aea">
                            <a href="#" class="post_heding">Mother Earth Hosts Our Travels</a>
                            <h4 class="by_author"><span>Added by</span><img src="images/author-s-2.jpg" alt="" class="circle"><a href="#">Denszel</a>5 minutes ago</h4>
                        </div>
                        <div class="socail_share_area row">
                           <ul class="socail_share">
                               <li class="share_count">2.3K</li>
                               <li><a href="#" class="waves-effect"><i class="fa fa-facebook-square"></i></a></li>
                               <li><a href="#" class="waves-effect twitter"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#" class="plus_round"><i class="ion-plus-round"></i></a></li>
                           </ul>
                           <p>So why are they turning to their local markets more and more? In a nutshell they want fresh, healthy produce with great flavor. There are numerous other benefits to buying local products and it would seem Americans are now</p>
                        </div>
                   </div>

                    <div class="like_comment_area row">
                        <div class="col s4 updown_btn comment_c">
                            <a href="#"><i class="ion-ios-chatboxes-outline"></i></a>
                            <a href="#" class="count_n">14 comments</a>
                        </div>
                        <div class="col s8 updown_btn">
                            <a href="#"><i class="ion-android-arrow-dropdown-circle"></i></a>
                            <a href="#"><i class="ion-android-arrow-dropup-circle"></i></a>
                            <a href="#" class="count_n">483</a>
                        </div>
                        <div class="col s12 comment_input_box">
                            <div class="input-field comment_input">
                                <input placeholder="Placeholder" type="text" class="validate">
                                <i class="ion-camera"></i>
                                <span>Post</span>
                            </div>
                        </div>
                        <div class="col p0 s12">
                            <div class="media">
                                <img src="images/comment-a-2.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4><a href="#">Emran Khan</a>5 minutes ago</h4>
                                    <p>Care for fresher ingredients? Locally grown items are usually harvested 1 or 2 days before hitting the</p>
                                    <span><a href="#"><i class="ion-ios-arrow-thin-up"></i></a>483<a href="#"><i class="ion-ios-arrow-thin-down"></i></a></span>
                                    <a href="#" class="replay_btn">Reply</a>
                                    <a href="#" class="view_mor_r">View more replies...</a>
                                </div>
                            </div>
                            <a href="#" class="view_mor_c">View more comments <i class="ion-chevron-down"></i></a>
                        </div>
                    </div>
                </div><!-- End Post -->
                <!-- Post -->
                <div class="post post_details">
                   <div class="post_content">
                        <a href="#" class="post_img">
                            <img src="images/post-details-1.jpg" alt="">
                        </a>
                        <div class="post_heding_aea">
                            <a href="#" class="post_heding">Mother Earth Hosts Our Travels</a>
                            <h4 class="by_author"><span>Added by</span><img src="images/author-s-3.jpg" alt="" class="circle"><a href="#">Ghosh</a>5 minutes ago</h4>
                        </div>
                        <div class="socail_share_area row">
                           <ul class="socail_share">
                               <li class="share_count">2.3K</li>
                               <li><a href="#" class="waves-effect"><i class="fa fa-facebook-square"></i></a></li>
                               <li><a href="#" class="waves-effect twitter"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#" class="plus_round"><i class="ion-plus-round"></i></a></li>
                           </ul>
                           <p>So why are they turning to their local markets more and more? In a nutshell they want fresh, healthy produce with great flavor. There are numerous other benefits to buying local products and it would seem Americans are now</p>
                        </div>
                   </div>

                    <div class="like_comment_area row">
                        <div class="col s4 updown_btn comment_c">
                            <a href="#"><i class="ion-ios-chatboxes-outline"></i></a>
                            <a href="#" class="count_n">14 comments</a>
                        </div>
                        <div class="col s8 updown_btn">
                            <a href="#"><i class="ion-android-arrow-dropdown-circle"></i></a>
                            <a href="#"><i class="ion-android-arrow-dropup-circle"></i></a>
                            <a href="#" class="count_n">483</a>
                        </div>
                        <div class="col s12 comment_input_box">
                            <div class="input-field comment_input">
                                <input placeholder="Placeholder" type="text" class="validate m0">
                                <i class="ion-camera"></i>
                                <span>Post</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Post -->
                <!-- Post -->
                <div class="post post_details">
                   <div class="post_content">
                        <a href="#" class="post_img">
                            <img src="images/post-details-2.jpg" alt="">
                        </a>
                        <div class="post_heding_aea">
                            <a href="#" class="post_heding">The 3 Golden Rules Professional Graphic</a>
                            <h4 class="by_author"><span>Added by</span><img src="images/author-s-3.jpg" alt="" class="circle"><a href="#">Riad</a>5 minutes ago</h4>
                        </div>
                        <div class="socail_share_area row">
                           <ul class="socail_share p0">
                               <li class="share_count">2.3K</li>
                               <li><a href="#" class="waves-effect"><i class="fa fa-facebook-square"></i></a></li>
                               <li><a href="#" class="waves-effect twitter"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#" class="plus_round"><i class="ion-plus-round"></i></a></li>
                           </ul>
                        </div>
                   </div>

                    <div class="like_comment_area row">
                        <div class="col s4 updown_btn comment_c">
                            <a href="#"><i class="ion-ios-chatboxes-outline"></i></a>
                            <a href="#" class="count_n">14 comments</a>
                        </div>
                        <div class="col s8 updown_btn">
                            <a href="#"><i class="ion-android-arrow-dropdown-circle"></i></a>
                            <a href="#"><i class="ion-android-arrow-dropup-circle"></i></a>
                            <a href="#" class="count_n">483</a>
                        </div>
                        <div class="col s12 comment_input_box">
                            <div class="input-field comment_input">
                                <input placeholder="Placeholder" type="text" class="validate m0">
                                <i class="ion-camera"></i>
                                <span>Post</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Post -->
                <!-- Post -->
                <div class="post post_details">
                   <div class="post_content">
                       <div class="next_btn_col">
                           <a href="#" class="next_btn waves-effect">Next Page (10/22)</a>
                       </div>
                        <div class="row author_area">
                            <div class="col s1 btn_floating">
                                <a class="btn-floating waves-effect"><i class="ion-navicon-round"></i></a>
                            </div>
                            <div class="col s6 like_user">
                                <ul class="like_img">
                                    <li><a href="#" class="single_l_1"><img src="images/like-client-1.png" alt=""></a></li>
                                    <li><a href="#" class="single_l"><img src="images/like-client-2.png" alt=""></a></li>
                                    <li><a href="#" class="single_l"><img src="images/like-client-3.png" alt=""></a></li>
                                    <li><a href="#" class="single_l"><img src="images/like-client-4.png" alt=""></a></li>
                                    <li><a href="#" class="mor_like">257 people added list</a></li>
                                </ul>
                            </div>
                            <div class="col s5 add_btn_col">
                                <a href="#" class="add_btn waves-effect">Add open list</a>
                            </div>
                        </div>
                        <div class="socail_share_area row">
                           <ul class="socail_share">
                               <li class="share_count">2.3K</li>
                               <li><a href="#" class="waves-effect"><i class="fa fa-facebook-square"></i></a></li>
                               <li><a href="#" class="waves-effect twitter"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#" class="plus_round"><i class="ion-plus-round"></i></a></li>
                           </ul>
                        </div>
                   </div>
                    <div class="like_comment_area p0 row">
                        <div class="col s12 updown_btn updown_btn_2">
                            <a href="#"><i class="ion-android-arrow-dropdown-circle"></i></a>
                            <a href="#" class="count_n">483</a>
                            <a href="#"><i class="ion-android-arrow-dropup-circle"></i></a>
                        </div>
                    </div>
                </div><!-- End Post -->

                <!-- Sponsored Stories -->
                <div class="sponsored_stories row">
                    <h2 class="sponsored_tittle sponsored_t_2">Sponsored Stories <span>Taboola ads</span></h2>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-1.jpg" alt="">
                        <a href="#">Family Safari Vacation To The Home Of The Gods</a>
                        <h6>viralvideo</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-2.jpg" alt="">
                        <a href="#">How To Achieve Victory In A Cooking Contest</a>
                        <h6>ozzy man reviews</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-3.jpg" alt="">
                        <a href="#">Southern Cooking Brings Soul To Food</a>
                        <h6>facebook</h6>
                    </div>
                </div>
                <div class="sponsored_stories row">
                    <h2 class="sponsored_tittle">Popular On Open List</h2>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-4.jpg" alt="">
                        <a href="#">From Wetlands To Canals And Dams Amsterdam Is</a>
                        <h6>5 days ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-5.jpg" alt="">
                        <a href="#">Mg Shadow Computer Monitoring Software A </a>
                        <h6>2 hours ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-6.jpg" alt="">
                        <a href="#">The Skinny On Lcd Monitors Monitors</a>
                        <h6>3 month ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-2.jpg" alt="">
                        <a href="#">Online Games How To Play To Win</a>
                        <h6>4 days ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-7.jpg" alt="">
                        <a href="#">Are You Ready To Buy A Home Theater Audio</a>
                        <h6>2 hours ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-8.jpg" alt="">
                        <a href="#">Computer Forensics Finding Out What The Bad</a>
                        <h6>6 days ago</h6>
                    </div>
                </div>
                <div class="sponsored_stories row sponsored_end">
                    <h2 class="sponsored_tittle">Featured Contents</h2>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-6.jpg" alt="">
                        <a href="#">Como Mantener Tu Salud Mental</a>
                        <h6>5 days ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-9.jpg" alt="">
                        <a href="#">Helen Keller A Teller And A Seller</a>
                        <h6>2 hours ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-10.jpg" alt="">
                        <a href="#">Do You Think Motivational Thoughts</a>
                        <h6>3 month ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-11.jpg" alt="">
                        <a href="#">Hypnosis Quit Smoking Techniques</a>
                        <h6>4 days ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-12.jpg" alt="">
                        <a href="#">Dream Interpretation Common Symbols And</a>
                        <h6>2 hours ago</h6>
                    </div>
                    <div class="col m4 s6 sponsored">
                        <img src="images/sponsored/sponsored-4.jpg" alt="">
                        <a href="#">Going Wireless With Your Headphones</a>
                        <h6>6 days ago</h6>
                    </div>
                </div>
                <!-- Post -->
                <div class="post post_details">
                    <div class="like_comment_area row">
                        <div class="col s4 updown_btn comment_c">
                            <a href="#"><i class="ion-ios-chatboxes-outline"></i></a>
                            <a href="#" class="count_n">14 comments</a>
                        </div>
                        <div class="col s12 comment_input_box">
                            <div class="input-field comment_input">
                                <input placeholder="Placeholder" type="text" class="validate">
                                <i class="ion-camera"></i>
                                <span>Post</span>
                            </div>
                        </div>
                        <div class="col p0 s12">
                            <div class="media">
                                <img src="images/comment-a.jpg" alt="" class="circle responsive-img">
                                <div class="media_body">
                                    <h4><a href="#">Masum Rana</a>5 minutes ago</h4>
                                    <p>Care for fresher ingredients? Locally grown items are usually harvested 1 or 2 days before hitting the market making them significantly fresher then traditional store bought ingredients</p>
                                    <span><a href="#"><i class="ion-ios-arrow-thin-up"></i></a>483<a href="#"><i class="ion-ios-arrow-thin-down"></i></a></span>
                                    <a href="#" class="replay_btn">Reply</a>
                                    <div class="media">
                                        <img src="images/comment-a.jpg" alt="" class="circle responsive-img">
                                        <div class="media_body">
                                            <h4><a href="#">Masum Rana</a>5 minutes ago</h4>
                                            <p>Locally grown items are usually harvested 1 or 2 days </p>
                                            <span><a href="#"><i class="ion-ios-arrow-thin-up"></i></a>483<a href="#"><i class="ion-ios-arrow-thin-down"></i></a></span>
                                            <a href="#" class="replay_btn">Reply</a>
                                        </div>
                                    </div>
                                    <a href="#" class="view_mor_r">View more replies...</a>
                                </div>
                            </div>
                            <a href="#" class="load_more">Load more comments</a>
                        </div>
                    </div>
                </div><!-- End Post -->
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
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-10.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-11.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-12.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-13.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-14.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-15.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-16.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-17.jpg" alt=""></a></div>
                        <div class="col s4 p_img"><a href="#"><img src="images/gallery/gallry-s-18.jpg" alt=""></a></div>
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

<!-- Mirrored from uxart.io/downloads/openlist-html/all-template/details-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Nov 2018 13:39:13 GMT -->
</html>
