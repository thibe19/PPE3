<?php
/**
 * Utilisateur/Eleve/Stage   date modif : 05/12/18  vertion:0.0.2
 */

/////////////////// CREATION CLASS POUR INSCRIPTION

class Stage extends Offre{
    /*
     * DEclaration
     */

    private $date_fin_stage;
    private $note_user;
    private $desc_user;


    public function __construct($id_offre = '', $lib_offre = '', $niveau_req = '', $date_offre = '', $date_post = '',$desc_offre = '', $id_user = '', $id_cat = '', $id_ent = '',
     $date_fin_stage = '', $note_user = '', $desc_user = '')
    {
        parent::__construct($id_offre, $lib_offre, $niveau_req, $date_offre, $date_post, $desc_offre, $id_user, $id_cat, $id_ent);
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
      $id_offre = $this->id_offre;

      $SQL = "DELETE FROM Ostage WHERE id_offre = $id_offre";
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

      $this->insert_offre($conn);
      $id_offre = $this->getid_offre();
      $dateF = $this->date_fin_stage;
      $note_user_stage = $this->note_user;
      $desc_user_stage = $this->desc_user;

        $sql="UPDATE Ostage
              SET date_fin_stage='$dateF', note_user_stage='$note_user_stage', desc_user_stage='$desc_user_stage'
              WHERE id_offre='$id_offre' ";
        $res = $conn->Query($sql)or die('Erreur modification user');


    }

}//fin class
?>
