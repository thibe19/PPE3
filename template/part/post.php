
<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                             Post Affichage                               ////
////                               13/12/2018                                 ////
////                                V0.0.3                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


 ?>
<script src="../js/dropzone.js"></script>

<div id="post_modal" class="add_post modal">
  <h2>Nouveau post</h2>
  <form class="input_group" action="./send_post.php" method="POST" enctype="multipart/form-data">
    <div class="input-field">

      <input type="text" name="post_titre" class="validate" placeholder="Ajouter un titre">
      <textarea name="post_desc" class="textarea" placeholder="Ajouter une description"></textarea>

    </div>
    <div class="upload_photo row">
      <ul class="tabs tab_nav">
        <li class="tab col s6"><a href="#photo"><i class="ion-ios-camera"></i>Ajouter une Photo</a></li>
      </ul>
      <div id="photo" class="col s12 tabs_content">
        <div class="photo_u">
          <div class="fallback">
            <input name="file" type="file" multiple required/>
          </div>
          <h4>Select files to upload <small>or drag &amp; drop files</small></h4>
        </div>

      </div>
    </div>
    <div class="input-field col s12 select_option">
      <?php
      $unecat = new Categorie();
      $resU = $unecat->selectAllCategorie($conn);
      ?>
      <select name='cat'>
        <?php
        while ($dataC=$resU->fetch())
        {
          echo " <option value=".$dataC['id_cat']."> ".$dataC['lib_cat']." </option>";
        }
        ?>
      </select>

    </div>

    <div class="row submit_btn_area">
      <div class="col s12">
        <button type="submit" name="post" class="waves-effect publish">Publier</button>
      </div>
    </div>
  </form>
</div>
