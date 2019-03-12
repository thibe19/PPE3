<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Stage class                                 ////
////                               20/12/2018                                 ////
////                               V0.0.5                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


class Stage extends Offre{
    /*
     * DEclaration
     */

    private $date_fin_stage;
    private $note_user;
    private $desc_user;


    public function __construct($id_offre = '', $lib_offre = '', $niveau_req = '', $date_offre = '', $date_post = '',$desc_offre = '', $id_user = '', $id_cat = '', $id_ent = '',
     $id_user_eleve = '', $date_fin_stage = '', $note_user = '', $desc_user = '')
    {
        parent::__construct($id_offre, $lib_offre, $niveau_req, $date_offre, $date_post, $desc_offre, $id_user, $id_cat, $id_ent, $id_user_eleve);
        $this->date_fin_stage = $date_fin_stage;
        $this->note_user = $note_user;
        $this->desc_user = $desc_user;
    }


    /*
     * Getters
     */
    public function getAllStage(){
        $data = $this->getAllOffre().' ';
        $data = $data.$this->date_fin_stage.' ';
        $data = $data.$this->note_user.' ';
        $data = $data.$this->desc_user.' ';

        return $data;
    }

    /**
     * @return string
     */
    public function getDateFinStage()
    {
        return $this->date_fin_stage;
    }

    /**
     * @return string
     */
    public function getNoteUser()
    {
        return $this->note_user;
    }

    /**
     * @return string
     */
    public function getDescUser()
    {
        return $this->desc_user;
    }

    /*
     * Setters
     */
    /**
     * @param string $date_fin_stage
     */
    public function setDateFinStage($date_fin_stage)
    {
        $this->date_fin_stage = $date_fin_stage;
    }

    /**
     * @param string $note_user
     */
    public function setNoteUser($note_user)
    {
        $this->note_user = $note_user;
    }

    /**
     * @param string $desc_user
     */
    public function setDescUser($desc_user)
    {
        $this->desc_user = $desc_user;
    }
    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                GetAll                                    ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////
    //@param FiltreJoin jointure de tables -> ["INNER JOIN table ON table.id=table.id]
    //@param FiltreWhere conditions
    //@param FiltreSelect ajout select
    function getAll(array $param,$conn){
        if (isset($param['FiltreJoin'])){
            $join = "";
            foreach ($param['FiltreJoin'] as $data){
                $join .= $data." ";
            }
        }
        else{
            $join = "";
        }

        if (isset($param['FiltreWhere'])){
            $where = "WHERE ".$param['FiltreWhere'];
        }
        else{
            $where = "";
        }

        if (isset($param['FiltreSelect'])){
            $select = ",".$param['FiltreSelect'];
        }
        else{
            $select = "";
        }

        $SQL = "SELECT Offre.*".$select." FROM Offre"
            ." ".$join." "
            ." ".$where." "
            ."ORDER BY date_post_offre DESC";
        $req = $conn->Query($SQL) or die('Erreur selection Stage');
        $req = $req->fetchAll(PDO::FETCH_OBJ);
        return $req;
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Insert                                    ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    public function insert_stage($conn){
        $this->insert_offre($conn);
        $id = $this->getid_offre();
        $id_ent = $this->getIdEnt();
        $date_fin_stage = $this->date_fin_stage;
        $note_user = $this->note_user;
        $desc_user = $this->desc_user;

        $sql_getido = "SELECT id_offre FROM Offre
                      WHERE id_offre=LAST_INSERT_ID()";
        $res_getido = $conn->Query($sql_getido)or die('Erreur dans le requete get id');
        $res_getido = $res_getido->fetchAll();

        $sql_getidus = "SELECT id_user FROM Offre
                      WHERE id_offre=LAST_INSERT_ID()";
        $res_getidus = $conn->Query($sql_getidus)or die('Erreur dans le requete get id');
        $res_getidus = $res_getidus->fetchAll();

        if($res_getido && $res_getidus){

          $id_user = $res_getidus[0]['id_user'];
          $id_offre = $res_getido[0]['id_offre'];
          $SQL = "INSERT INTO OStage
                  VALUES('$id_offre','$date_fin_stage','$note_user','$desc_user','$id_user','')";
          $res = $conn->Query($SQL)or die($SQL);
        }


    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                DELETE                                    ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////


    public function delete_stage($conn){
      $id_offre = $this->getid_offre();

      $SQL = "DELETE FROM OStage WHERE id_offre = $id_offre";
      $res = $conn->Query($SQL)or die(errorInfo());
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                MODIFIER                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    public function modifier_stage($conn){

      $this->modifier_offre($conn);
      $id_offre = $this->getid_offre();
      $dateF = $this->date_fin_stage;
      $note_user_stage = $this->note_user;
      $desc_user_stage = $this->desc_user;

        $sql="UPDATE OStage
              SET date_fin_stage='$dateF', note_user_stage='$note_user_stage', desc_user_stage='$desc_user_stage'
              WHERE id_offre='$id_offre' ";
        $res = $conn->Query($sql)or die('Erreur modification stage');


    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Fonction                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////


    function modifiUserEleveStage($id_user_eleve,$id_offre,$conn){
      $this->modifiOffreEleve($id_user_eleve,$id_offre,$conn);
      $sql="UPDATE OStage
            SET id_user_Eleve='$id_user_eleve'
            WHERE id_offre='$id_offre'";
      $res = $conn->Query($sql)or die('Erreur modification offre');
    }

    function selectUnStage($id_stage, $conn){
      $sql_aff_stg2 = "SELECT * FROM OStage
                       WHERE id_offre = '$id_stage'";
      $req_aff_stg2 = $conn->Query($sql_aff_stg2)or die('Erreur dans le requete pref2');

      return $req_aff_stg2;
    }



    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Affichage                                 ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////
    ///
    ///
    function affichestage($lib_cat,$id_user,$photo_user,$nom_user,$id_offre,$id_ent,$date_post_offre,$lib_offre,$niveau_req,$date_debut_offre,$date_fin_stage,$desc_offre,$conn){

        $offre = new Offre();
        $html = '<div class="post">
            <div class="post_content">
                <div class="post_img">
                    <img src="images/post/hide.png" alt="">
                    <span><i class="ion-android-radio-button-off"></i>'.$lib_cat.'</span>
                </div>
                <div class="row author_area">
                    <div class="col s4 author">
                        <a href="about.php?visit='.dec_enc('encrypt',$id_ent).'">
                            <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/'.testphoto($photo_user).'" alt="profil picture" class="circle"></div>
                        </a>
                        <div class="col s8 media_body" style="padding-left: 10px;">

                            <a href="#">'.$nom_user.'</a>
                            <span>'.$date_post_offre.'</span>
                            <div class="float-right">
                            </div>
                        </div>
                    </div>

                    <div class="col s4 btn_floating">

                    </div>
                </div>
                <a class="post_heding">'.urldecode($lib_offre).'</a>
                <p><b>Niveau requis &nbsp:&nbsp </b>'.$niveau_req.'</p>
                <p><b>Date de début &nbsp:&nbsp </b>'.$date_debut_offre.'</p>
                <p><b>Date de fin &nbsp:&nbsp </b>'.$date_fin_stage.'</p>
                <p><b>'."Description de l'offre &nbsp:&nbsp".' </b>'.urldecode($desc_offre).'</p>
            </div>
            '.$offre->postule($id_offre,$id_user,$id_ent,$conn).'
            <br>
        </div>';

        return $html;
    }

//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                                                          ////
////                                Image                                     ////
////                                                                          ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

    function testphoto($photo){
        if(is_null($photo) || empty($photo)){
            print 'avatar.png';
        }
        else {
            print $photo;
        }
    }



}//fin class
?>
