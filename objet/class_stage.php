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


  ///////////////////////////////////////////// Insert  ////////////////////////////////////////////

    public function insert_stage($conn){
        $this->insert_offre($conn);
        $id = $this->getid_offre();
        $id_user = $this->getIdUser();
        $id_ent = $this->getIdEnt();
        $date_fin_stage = $this->date_fin_stage;
        $note_user = $this->note_user;
        $desc_user = $this->desc_user;

        $sql_getid = "SELECT id_offre FROM Offre
                      WHERE id_offre=LAST_INSERT_ID()";
        $res_getid = $conn->Query($sql_getid)or die('Erreur dans le requete get id');
        $res_getid = $res_getid->fetchAll();

        if($res_getid){

          $id_offre = $res_getid[0]['id_offre'];
          $SQL = "INSERT INTO OStage
                  VALUES('$id_offre','$date_fin_stage','$note_user','$desc_user','','')";
          $res = $conn->Query($SQL)or die('Erreur insertion entreprise');
        }
    }



}//fin class
?>
