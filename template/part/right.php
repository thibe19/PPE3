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
              <li>
                  <div class="collapsible-header"><i class="ion-chevron-right"></i><?php print urldecode($dataO['lib_offre']);?></div>
                  <div class="collapsible-body">
                      <div class="row collaps_wrpper">
                          <div class="col s11 media_b">
                            <a href="#" class="close_btn"><i class="ion-close-round"></i></a>
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


        <div class="popular_posts popular_fast">
            <h3 class="categories_tittle">My Submisstion</h3>
            <div class="row valign-wrapper popular_item">
                <div class="col s3 p_img">
                   <a href="#">
                        <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                   </a>
                </div>
                <div class="col s9 p_content">
                   <a href="#">You submitted a new photo  to <span>How To Talk With Girls</span></a>
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
                   <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
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
                   <a href="#">You submitted 10 photos  to <span>Best Photos of The Tech Giants</span></a>
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
                   <a href="#">You submitted a new photo  to <span>How To Talk With Girls</span></a>
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
                   <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
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

          <div class="popular_posts popular_fast">
            <h3 class="categories_tittle">My Submisstion</h3>
            <div class="row valign-wrapper popular_item">
                <div class="col s3 p_img">
                   <a href="#">
                        <img src="images/recent-post-1.jpg" alt="" class="circle responsive-img">
                   </a>
                </div>
                <div class="col s9 p_content">
                   <a href="#">You submitted a new photo  to <span>How To Talk With Girls</span></a>
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
                   <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
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
                   <a href="#">You submitted 10 photos  to <span>Best Photos of The Tech Giants</span></a>
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
                   <a href="#">You submitted a new photo  to <span>How To Talk With Girls</span></a>
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
                   <a href="#">You contributed a new paragraph to <span>10 Ways To Make Easy Suicide</span></a>
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
<?php

} //fin entreprise
?>
