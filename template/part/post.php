
  <script src="../js/dropzone.js"></script>

  <div id="post_modal" class="add_post modal">
      <h2>Nouveau post</h2>
      <form class="input_group" action="send_post.php" method="post">
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
                      <input name="file" type="file" multiple />
                    </div>
                      <h4>Select files to upload <small>or drag &amp; drop files</small></h4>
                  </div>

              </div>
          </div>
          <div class="input-field col s12 select_option">
              <select>
                  <option value="" disabled selected>Choisir une catégorie</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="2">Option 2</option>
                  <option value="2">Option 2</option>
              </select>

          </div>

          <div class="row submit_btn_area">
             <div class="col s12">
                  <button type="submit" name="new_post" value="1" class="waves-effect publish">Publier</button>
             </div>
          </div>
      </form>
  </div>
