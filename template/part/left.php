<?php
    require ('./../ToolBox/bdd.inc.php');
    if (isset($_SESSION['Eleve'])){
        $iduser = unserialize($_SESSION['Eleve'])->getIdUser();

        if(isset($_POST['prefusermodif'])){
          $suprprefsql = "DELETE FROM eleve_pref
                          WHERE id_user='$iduser';";
          $ressuprsql = $conn->Query($suprprefsql)or die('Erreur suppresion pref');

          foreach($_POST['prefusermodif'] as $p){
            $addpref = "INSERT INTO eleve_pref
                        VALUES ('$p','$iduser');";
            $resaddpref = $conn->Query($addpref)or dirname('Erreur ajout des preferences');
          }

        }

        $pref = data_base_in_object('Preferences',$conn);
        $SQL = "SELECT id_pref FROM eleve_pref WHERE id_user='$iduser';";
        $res = $conn->Query($SQL)or die('Erreur');
        $i = 0;
        while($data=$res->fetch()){
          $prefuser[$i] = $data['id_pref'];
          $i++;
        }
    }
    if(isset($_SESSION['Profilon'])){

    }
    else{
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
            <?php } ?>
        <div class="interests">
          <form method="post" name="checkboxform" action="<?php print $_SERVER['SCRIPT_NAME']."#intersets"; ?>">
            <h3 id="intersets" class="categories_tittle">Vos préférences <span onclick="checkboxform.submit()">Modifier</span></h3>
            <ul class="interests_list">
                <?php if (isset($pref)) {
                    foreach ($pref as $p) {
                        if(in_array($p->id_pref,$prefuser)){
                        ?>
                        <div class="checkbox">
                          <input id="checkbox<?php print $p->id_pref ?>" class="styled" name="prefusermodif[]" value="<?php print $p->id_pref ?>" type="checkbox" checked>
                          <label for="checkbox<?php print $p->id_pref ?>">
                            <?php print $p->lib_pref ?>
                          </label>
                        </div>
                    <?php }
                    else
                    { ?>
                      <div class="checkbox">
                        <input id="checkbox<?php print $p->id_pref ?>" class="styled" name="prefusermodif[]" value="<?php print $p->id_pref ?>" type="checkbox" >
                        <label for="checkbox<?php print $p->id_pref ?>">
                          <?php print $p->lib_pref ?>
                        </label>
                      </div>
                    <?php }
                    }
                }
                ?>
            </ul>
          </form>
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
