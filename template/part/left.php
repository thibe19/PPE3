<?php
    require ('./../ToolBox/bdd.inc.php');
    require ('./../ToolBox/toolbox_inc.php');
    $SQL = "SELECT * FROM Preferences";
?>
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
