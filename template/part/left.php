<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                left                                      ////
////                                06/12/2018                                ////
////                                V0.0.2                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

require('./../ToolBox/bdd.inc.php');
//Function de suppression de preferences
function supr_pref($iduser,$conn){
  $suprprefsql = "DELETE FROM eleve_pref
  WHERE id_user='$iduser';";
  $ressuprsql = $conn->Query($suprprefsql) or die('Erreur suppresion pref');
}



if (isset($_SESSION['Eleve'])) {
  $iduser = unserialize($_SESSION['Eleve'])->getIdUser();

  if (isset($_POST['prefusermodif'])) {
    supr_pref($iduser,$conn);

    foreach ($_POST['prefusermodif'] as $p) {
      $addpref = "INSERT INTO eleve_pref
      VALUES ('$p','$iduser');";
      $resaddpref = $conn->Query($addpref) or dirname('Erreur ajout des preferences');
    }

  }
  elseif(isset($_POST['suprisok'])){
    supr_pref($iduser,$conn);
  }

  $pref = data_base_in_object('Preferences', $conn);
  $SQL = "SELECT id_pref FROM eleve_pref WHERE id_user='$iduser';";
  $res = $conn->Query($SQL) or die('Erreur');
  $i = 0;
  while ($data = $res->fetch()) {
    $prefuser[$i] = $data['id_pref'];
    $i++;
  }
  if (empty($prefuser)){
    $prefuser[0] = '';
  }
}

//left bar de la page profil est differents des autres sur le site un test est necessaire

?>
<div class="interests">
    <h3 id="intersets" class="categories_tittle">Vos préférences <span onclick="modifpreferences(<?php print $iduser ?>)">Modifier</span>
    </h3>
    <ul class="interests_list">
      <?php if (isset($pref)) {
        foreach ($pref as $p) {
          if (in_array($p->id_pref, $prefuser)) {
            ?>
            <div class="checkbox">
              <input id="checkbox<?php print $p->id_pref ?>" class="checkedpref styled"
              name="prefusermodif[]"
              value="<?php print $p->id_pref ?>" type="checkbox" checked>
              <label for="checkbox<?php print $p->id_pref ?>">
                <?php print $p->lib_pref ?>
              </label>
            </div>
            <?php
          }
          else { ?>
            <div class="checkbox">
              <input id="checkbox<?php print $p->id_pref ?>" class="checkedpref styled"
              name="prefusermodif[]"
              value="<?php print $p->id_pref ?>" type="checkbox">
              <label for="checkbox<?php print $p->id_pref ?>">
                <?php print $p->lib_pref ?>
              </label>
            </div>
          <?php }
        }
      }
      ?>
    </ul>
    <input type="hidden" name="suprisok" value="1">
</div>
<?php


?>
<div class="profile">
  <h3 class="categories_tittle">Amis <span onclick="window.location='requests.php?groupe=elve'">Modifier</span></h3>
  <ul class="profile_pic">

    <?php
    $sql = "SELECT * FROM ajoute_amis
            WHERE id_user_Eleve != '$id_user'
            AND id_user = '$id_user'";
    $req = $conn->Query($sql)or die('Erreur dans le requete cat');
    while ($res = $req->fetch()) {
      $id_user2 = $res['id_user_Eleve'];
      $SQL2 = "SELECT * FROM Utilisateur
      WHERE id_user = $id_user2";
      $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");
      $res2 = $req2->fetch();

      if ($res2['photo_user'] == "") {
        $photo = "avatar.png";
      }
      else {
        $photo = $res2['photo_user'];
      }

      ?> <li><a href="#"><img width="40px" height="40px" src="<?php echo "images/profil/".$photo; ?>" alt="" class="circle"></a></li> <?php
    } ?>
  </ul>
</div>
<div class="calendar_widget">
  <h3 class="categories_tittle">Calendrier</h3>
  <table class="calendar"></table>
</div>
</div>
</div>
