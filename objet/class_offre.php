<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Offre class                                 ////
////                               20/12/2018                                 ////
////                               V0.0.4                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


class Offre
{
    Private $id_offre;
    Private $lib_offre;
    Private $niveau_req;
    Private $date_debut_offre;
    private $date_post_offre;
    private $desc_offre;
    private $id_user;
    private $id_cat;
    private $id_ent;
    private $id_user_eleve;

    function __construct($id_offre = '', $lib_offre = '', $niveau_req = '', $date_offre = '', $date_post = '',$desc_offre = '', $id_user = '',$id_cat = '', $id_ent = '',$id_user_eleve='')
    {
        $this->id_offre = $id_offre;
        $this->lib_offre = $lib_offre;
        $this->niveau_req = $niveau_req;
        $this->date_debut_offre = $date_offre;
        $this->date_post_offre = $date_post;
        $this->desc_offre = $desc_offre;
        $this->id_user = $id_user;
        $this->id_cat = $id_cat;
        $this->id_ent = $id_ent;
        $this->id_user_eleve = $id_user_eleve;

    }

    ///////////////////////////////////////// Get ///////////////////////////////////////////


    public function getAllOffre(){
        $data = $this->id_offre.' ';
        $data = $data.$this->lib_offre.' ';
        $data = $data.$this->niveau_req.' ';
        $data = $data.$this->date_debut_offre.' ';
        $data = $data.$this->date_post_offre.' ';
        $data = $data.$this->desc_offre.' ';
        $data = $data.$this->id_user.' ';
        $data = $data.$this->id_cat.' ';
        $data = $data.$this->id_ent.' ';
        $data = $data.$this->id_user_eleve.' ';
        return $data;
    }
    public function getid_offre()
    {
        return $this->id_offre;
    }

    public function getlib_offre()
    {
        return $this->lib_offre;
    }

    public function getniveau_req()
    {
        return $this->niveau_req;
    }

    public function getdate_debut_offre()
    {
        return $this->date_debut_offre;
    }

    /**
     * @return string
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return string
     */
    public function getDatePostOffre()
    {
        return $this->date_post_offre;
    }

    /**
     * @return string
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }
    /**
     * @return string
     */
    public function getIdEnt()
    {
        return $this->id_ent;
    }

    /**
     * @return mixed
     */
    public function getDescOffre()
    {
        return $this->desc_offre;
    }
    public function getIdUserEleve()
    {
        return $this->id_user_eleve;
    }


    //////////////////////////////////////////// SET  /////////////////////////////////////////////


    public function setid_offre($id_offre)
    {
        $this->id_offre = $id_offre;
    }

    public function setlib_offre($lib_offre)
    {
        $this->lib_offre = $lib_offre;
    }

    public function setniveau_req($niveau_req)
    {
        $this->niveau_req = $niveau_req;
    }

    /**
     * @param string $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }
    public function setdate_debut_offre($date_debut_offre)
    {
        $this->date_debut_offre = $date_debut_offre;
    }

    /**
     * @param string $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param string $date_post_offre
     */
    public function setDatePostOffre($date_post_offre)
    {
        $this->date_post_offre = $date_post_offre;
    }

    /**
     * @param mixed $desc_offre
     */
    public function setDescOffre($desc_offre)
    {
        $this->desc_offre = $desc_offre;
    }

    /**
     * @param string $id_ent
     */
    public function setIdEnt($id_ent)
    {
        $this->id_ent = $id_ent;
    }

    public function setIdUserEleve($id_user_eleve)
    {
        $this->id_user_eleve = $id_user_eleve;
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Insert                                    ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////


    public function insert_offre($conn){
        $lib_offre = urlencode($this->lib_offre);
        $niveau_req = $this->niveau_req;
        $date_debut_offre = $this->date_debut_offre;
        $date_post_offre = $this->date_post_offre;
        $desc_offre = urlencode($this->desc_offre);
        $id_user = $this->id_user;
        $id_cat = $this->id_cat;
        $id_ent = $this->id_ent;
        $id_user_eleve = $this->id_user_eleve;


        $SQL = "INSERT INTO Offre
                VALUES(NULL,'$lib_offre','$niveau_req','$date_debut_offre','$date_post_offre','$desc_offre','$id_user','$id_cat','$id_ent','$id_user_eleve')";
        $res = $conn->Query($SQL)or die(errorInfo());
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                DELETE                                    ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    public function delete_offre($conn){
      $id_offre = $this->id_offre;

      $SQL = "DELETE FROM Offre WHERE id_offre = $id_offre";
      $res = $conn->Query($SQL)or die(errorInfo());
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                MODIFIER                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    public function modifier_offre($conn){

      $id_offre = $this->id_offre;
      $lib_offre = $this->lib_offre;
      $date_debut_offre = $this->date_debut_offre;
      $id_cat = $this->id_cat;
      $id_ent = $this->id_ent;
      $desc_offre = $this->desc_offre;
      $id_user_eleve = $this->id_user_eleve;

        $sql="UPDATE Offre
              SET lib_offre='$lib_offre', date_debut_offre='$date_debut_offre', desc_offre='$desc_offre', id_cat='$id_cat', id_ent='$id_ent', id_user_Eleve='$id_user_eleve'
              WHERE id_offre='$id_offre'";
        $res = $conn->Query($sql)or die('Erreur modification offre');


    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Fonction                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    function selectAllOffre ($id_offre,$conn){

      $sqlO="SELECT * FROM Offre WHERE id_offre = '$id_offre'";
      $resO = $conn -> query($sqlO)or die($conn -> errorInfo());
      return $resO;

    }

    function selectRightDemande($id_user,$conn){

      $sqlD="SELECT id_user_entreprise, id_offre FROM demande WHERE  id_user_eleve = '$id_user'";
      $resD = $conn -> query($sqlD)or die($conn -> errorInfo());

      return $resD;
    }

    function selectRightDemandeEnt($id_user,$conn){

      $sqlD="SELECT  DISTINCT(id_offre), id_demande FROM demande WHERE  id_user_entreprise = '$id_user'";
      $resD = $conn -> query($sqlD)or die($conn -> errorInfo());
      return $resD;
    }

    function modifiOffreEleve($id_user_eleve,$id_offre,$conn){
      $sql="UPDATE Offre
            SET id_user_Eleve='$id_user_eleve'
            WHERE id_offre='$id_offre'";
      $res = $conn->Query($sql)or die('Erreur modification offre');
    }
}

?>
