<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                left                                      ////
////                                06/12/2018                                ////
////                                V0.0.2                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

require('./../ToolBox/bdd.inc.php');



if (isset($_SESSION['Eleve'])) {

  $iduser = unserialize($_SESSION['Eleve'])->getIdUser();

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


if (isset($_SESSION['Eleve']) ) {
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
}

?>
<div class="profile">
  <h3 class="categories_tittle"><?php if (isset($_SESSION['Entreprise']) ) { ?>Contact<?php } if (isset($_SESSION['Eleve']) ) { ?>Amis<?php } ?> <span onclick="window.location='requests.php?groupe=elve'">Modifier</span></h3>
  <ul class="profile_pic">

    <?php
    if (isset($_SESSION['Entreprise'])) {

      $unentreprise = unserialize($_SESSION['Entreprise']);
      $id_user = $unentreprise->getIdUser();
    }
    elseif (isset($_SESSION['Eleve'])){
        $uneleve = unserialize($_SESSION['Eleve']);
        $id_user = $uneleve->getIdUser();
    }

    $unuser = new Utilisateur();
    $resuser = $unuser -> selectAmisCompte($id_user, $conn);
    while ($res = $resuser->fetch()) {
      $id_user2 = $res['id_user_Eleve'];

      $resuser1 = $unuser -> getAllUserDB($id_user2, $conn);
      $res2 = $resuser1[0];



      ?> <li><a href="about.php?visit=<?php print dec_enc('encrypt',$res2->id_user) ?>"><img style='width: 40px;height: 40px;' src="images/profil/<?php select_image_profil($res2->id_user, $conn) ?>" alt="" class="circle"></a></li>
       <?php } ?>
  </ul>
</div>
<div class="calendar_widget">
  <h3 class="categories_tittle">Calendrier</h3>
  <table class="calendar"></table>
</div>
</div>
</div>
