<?php
/**
 * Utilisateur/Eleve/Stage   date modif : 21/11/2018  vertion:0.0.1
 */

/////////////////// CREATION CLASS POUR INSCRIPTION

class Stage 
{

    Private $id_user; // déclaration des variables -- [  USER  ]
    Private $domaine_about_sn;
    Private $date_about_debut_sn;
    Private $date_about_fin_sn;
    Private $place_about_sn;
    Private $desc_about_sn;


    Public function __construct($id = "", $dsn="", $ddsn="", $dfsn="", $psn="", $descsn="")
    {  //Constructeur

        $this->id_user = $id;
        $this->domaine_about_sn = $dsn;
        $this->date_about_debut_sn = $ddsn;
        $this->date_about_fin_sn = $dfsn;
        $this->place_about_sn = $psn;
        $this->desc_about_sn = $descsn;

    }

    /////////////////// LES GETS /////////////////////
    /// .
    /// .
    /// .
    ///

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
    public function getDomaineSn()
    {
        return $this->domaine_about_sn;
    }
    /**
     * @return string
     */
    public function getDateDebutSn()
    {
        return $this->date_about_debut_sn;
    }
    /**
     * @return string
     */
    public function getDateFinSn()
    {
        return $this->date_about_fin_sn;
    }
    /**
     * @return string
     */
    public function getPlaceSn()
    {
        return $this->place_about_sn;
    }
    /**
     * @return string
     */
    public function getDescSn()
    {
        return $this->desc_about_sn;
    }


    /////////////////// LES SETS /////////////////////
    /// .
    /// .
    /// .
    /**
     * @param string $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }
    /**
     * @param string $id_user
     */
    public function setDomaineSn($dsn)
    {
        $this->DomaineSn = $dsn;
    }
    /**
     * @param string $id_user
     */
    public function setDateDebutSn($ddsn)
    {
        $this->DateDebutSn = $ddsn;
    }
    /**
     * @param string $id_user
     */
    public function setDateFinSn($dfsn)
    {
        $this->DateFinSn = $dfsn;
    }
    /**
     * @param string $id_user
     */
    public function setPlaceSn($psn)
    {
        $this->PlaceSn = $psn;
    }
    /**
     * @param string $id_user
     */
    public function setDescSn($descsn)
    {
        $this->DescSn = $descsn;
    }



/////////////////////// insert inscription ////////////////////////////////////////
    Public function nouveau_stage($id_user, $dsn, $ddsn, $dfsn, $psn, $descsn, $conn)
    {
      $requet = "INSERT INTO
                 VALUES ('', '$psn', '', '');";
      //$sql = $conn->Query($requet)or die('Erreur dans la requete');

    }// fin class
  }
?>
