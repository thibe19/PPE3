<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Right                                     ////
////                                19/12/2018                                ////
////                                V0.0.5                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


 if (isset($_SESSION['Eleve'])) {
     $uneleve = unserialize($_SESSION['Eleve']);
     $id_user = $uneleve->getIdUser();


 ?>
<div class="right_side_bar col">
    <div class="right_sidebar_iner">

      <div class="trending_area">
          <h3 class="categories_tittle">Mes Demande(s)</h3>
          <ul class="collapsible trending_collaps" data-collapsible="accordion">
            <?php

            $unedemande = new Offre();
            $resD = $unedemande->selectRightDemande($id_user,$conn);

            while ($dataD=$resD->fetch())
            {
              $id_offre=$dataD['id_offre'];
              $uneoffre = new Offre();
              $resO = $uneoffre->selectAllOffre($id_offre,$conn);
              $dataO=$resO->fetch();

              $id_userE= $dataD['id_user_entreprise'];

              $unutilisateur = new Utilisateur();
              $resU = $unutilisateur->selectAllUtilisateur($id_userE,$conn);
              $dataUE = $resU -> fetch();


              ?>
              <li id="demande<?php print $dataD['id_demande'] ?>">
                  <div class="collapsible-header"><i class="ion-chevron-right"></i><?php print urldecode($dataO['lib_offre']);?></div>
                  <div class="collapsible-body">
                      <div class="row collaps_wrpper">
                          <div class="col s11 media_b">
                            <a  class="close_btn"><i onclick="annuldemande2(<?php print $dataD['id_demande'] ?>)" style="font-size:20px;cursor:pointer;" class="ion-close-round"></i></a>
                              <h5><a href="#"><?php print($dataUE['nom_user']); ?></a></h5>
                              <h7><a href="#" ><?php print($dataUE['email_user']); ?></a></h7>
                              <p><?php print urldecode($dataO['desc_offre']); ?></p>
                          </div>
                      </div>
                  </div>
              </li>
              <hr>
            <?php
            }?>
          </ul>
      </div>
    </div>
</div>



<?php }// fin eleve

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                              Entreprise                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

elseif(isset($_SESSION['Entreprise'])){

  $id = dec_enc('decrypt',$_SESSION['id']);
  $uneent= unserialize($_SESSION['Entreprise']);
  $id_user = $uneent->getIdUser();

  ?>
  <div class="right_side_bar col">
      <div class="right_sidebar_iner">

          <div class="trending_area">
              <h3 class="categories_tittle">Demande</h3>
              <ul class="collapsible trending_collaps" data-collapsible="accordion">
                <?php

                $unedemande = new Offre();
                $resD = $unedemande->selectRightDemandeEnt($id_user,$conn);

                while ($dataD=$resD->fetch())
                {
                  $T=0;
                  $idoffre=$dataD['id_offre'];
                 $sql="SELECT O.id_user_Eleve,O.lib_offre,COUNT(D.id_user_eleve) as total FROM Offre O,demande D
                          WHERE D.id_offre=O.id_offre
                          AND D.id_offre='$idoffre'";

                  foreach (reqtoobj($sql,$conn) as $data) {

                  $SQL = "SELECT U.id_user,U.nom_user, U.email_user, U.desc_user FROM demande D,Utilisateur U
                          WHERE D.id_user_Eleve=U.id_user
                          AND D.id_offre='$idoffre'";

                  ?>
                  <li id="demande<?php print $dataD['id_demande'] ?>">
                      <div class="collapsible-header"><i class="ion-chevron-right"></i><?php print urldecode($data->lib_offre);?> avec <?php print ($data->total); ?> demande(s)</div>
                      <hr>
                      <?php foreach (reqtoobj($SQL,$conn) as $data_user) {

                        $T=$T+1;
                        ?>
                      <div class="collapsible-body">
                          <div class="row collaps_wrpper">
                              <div class="col s1 media_l">
                                  <b><?php print$T; ?></b>

                              </div>

                              <div class="col s11 media_b">

                                  <h5><a href="#"><?php print($data_user->nom_user); ?></a></h5>
                                  <h7><a href="#" ><?php print($data_user->email_user); ?></a></h7>
                                  <p><?php print urldecode($data_user->desc_user); ?></p>
                              </div>
                              <?php
                              if ($data->id_user_Eleve != 0) { ?>
                                <div class="col s11 media_b" id="demandeaccepte<?php print $dataD['id_demande'] ?>" style="display:block;">
                                  <center>
                                    <br>
                                  <span  class="btn btn-primary" style="cursor:default;">demande accepté</span>
                                </center>
                                </div>

                                  <div class="col s11 media_b" id="demandeencours<?php print $dataD['id_demande'] ?>" style="display:none;">
                                    <center>
                                      <button type="submit" class="but_right_A" onclick="acceptedemande(<?php print $dataD['id_demande'] ?>)" name="accepte">Accepter</button>
                                      &nbsp&nbsp
                                      <button type="submit" class="but_right_R" onclick="refuserdemande(<?php print $dataD['id_demande'] ?>)"name="refuser">Refuser</button>
                                    </center>
                                  </div>
                              <?php
                            }else { ?>
                              <div class="col s11 media_b" id="demandeaccepte<?php print $dataD['id_demande'] ?>" style="display:none;">
                                <center>
                                  <br>
                                <span  class="btn btn-primary" style="cursor:default;">demande accepté</span>
                              </center>
                              </div>
                              <div class="col s11 media_b" id="demandeencours<?php print $dataD['id_demande'] ?>" style="display:block;">
                                <center>
                                  <button type="submit" class="but_right_A" onclick="acceptedemande(<?php print $dataD['id_demande'] ?>)" name="accepte">Accepter</button>
                                  &nbsp&nbsp
                                  <button type="submit" class="but_right_R" onclick="refuserdemande(<?php print $dataD['id_demande'] ?>)"name="refuser">Refuser</button>
                                </center>
                              </div>
                            <?php
                            } ?>
                          </div>
                          <hr>
                      </div>

                      <?php
                      } ?>
                  </li>
                <?php }
              }?>
              </ul>

          </div>

      </div>
  </div>
<?php

} //fin entreprise
?>
