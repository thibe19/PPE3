<?php
/**
 * Utilisateur/Eleve/Entreprise   date modif : 15/11/2018  vertion:0.0.5
 */

require ('../ToolBox/bdd.inc.php');

/////////////////// CREATION CLASS POUR INSCRIPTION

class Utilisateur
{

    Private $id_user; // déclaration des variables -- [  USER  ]
    Private $nom_user;
    Private $login_user;
    Private $mdp_user;
    Private $email_user;
    Private $num_tel_user;
    Private $num_addr;
    Private $rue_addr;
    Private $CP_addr;
    Private $ville_addr;
    Private $photo_user;

    Public function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                                $ville = "", $photo = "")
    {  //Constructeur

        $this->id_user = $id;
        $this->nom_user = $nom;
        $this->login_user = $login;
        $this->mdp_user = $mdp;
        $this->email_user = $email;
        $this->num_tel_user = $numt;
        $this->num_addr = $this->replacebr($numa);
        $this->rue_addr = $this->replacebr($rue);
        $this->CP_addr = $this->replacebr($CP);
        $this->ville_addr = $this->replacebr($ville);
        $this->photo_user = $photo;

    }

    /////////////////// LES GETS /////////////////////
    /// .
    /// .
    /// .
    ///
    public function getAllUser(){
        $data = $this->id_user;
        $data = $data.$this->nom_user;
        $data = $data.$this->login_user;
        $data = $data.$this->mdp_user;
        $data = $data.$this->email_user;
        $data = $data.$this->num_tel_user;
        $data = $data.$this->num_addr;
        $data = $data.$this->rue_addr;
        $data = $data.$this->CP_addr;
        $data = $data.$this->ville_addr;
        $data = $data.$this->photo_user;

        return $data;
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
    public function getNomUser()
    {
        return $this->nom_user;
    }

    /**
     * @return string
     */
    public function getLoginUser()
    {
        return $this->login_user;
    }

    /**
     * @return string
     */
    public function getMdpUser()
    {
        return $this->mdp_user;
    }

    /**
     * @return string
     */
    public function getEmailUser()
    {
        return $this->email_user;
    }

    /**
     * @return string
     */
    public function getNumTelUser()
    {
        return $this->num_tel_user;
    }

    /**
     * @return string
     */
    public function getNumAddr()
    {
        return $this->num_addr;
    }

    /**
     * @return string
     */
    public function getRueAddr()
    {
        return $this->rue_addr;
    }

    /**
     * @return string
     */
    public function getCPAddr()
    {
        return $this->CP_addr;
    }

    /**
     * @return string
     */
    public function getVilleAddr()
    {
        return $this->ville_addr;
    }

    /**
     * @return string
     */
    public function getPhotoUser()
    {
        return $this->photo_user;
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
     * @param string $nom_user
     */
    public function setNomUser($nom_user)
    {
        $this->nom_user = $nom_user;
    }

    /**
     * @param string $login_user
     */
    public function setLoginUser($login_user)
    {
        $this->login_user = $login_user;
    }

    /**
     * @param string $mdp_user
     */
    public function setMdpUser($mdp_user)
    {
        $this->mdp_user = $mdp_user;
    }

    /**
     * @param string $email_user
     */
    public function setEmailUser($email_user)
    {
        $this->email_user = $email_user;
    }

    /**
     * @param string $num_tel_user
     */
    public function setNumTelUser($num_tel_user)
    {
        $this->num_tel_user = $num_tel_user;
    }

    /**
     * @param string $num_addr
     */
    public function setNumAddr($num_addr)
    {
        $this->num_addr = $num_addr;
    }

    /**
     * @param string $rue_addr
     */
    public function setRueAddr($rue_addr)
    {
        $this->rue_addr = $rue_addr;
    }

    /**
     * @param string $CP_addr
     */
    public function setCPAddr($CP_addr)
    {
        $this->CP_addr = $CP_addr;
    }

    /**
     * @param string $ville_addr
     */
    public function setVilleAddr($ville_addr)
    {
        $this->ville_addr = $ville_addr;
    }

    /**
     * @param string $photo_user
     */
    public function setPhotoUser($photo_user)
    {
        $this->photo_user = $photo_user;
    }


/////////////////////// insert inscription ////////////////////////////////////////
    Public function inscription($objet, $conn)
    {
        $email = $this->getEmailUser($objet);
        $mdp = $this->getMdpUser($objet);
        $login = $this->getLoginUser($objet);
        $numa = $this->getNumAddr($objet);
        $rue = $this->getRueAddr($objet);
        $cp = $this->getCPAddr($objet);
        $ville = $this->getVilleAddr($objet);
        $nom = $this->getNomUser($objet);
        $numt = $this->getNumTelUser($objet);
        $photo = $this->getPhotoUser($objet);



        $requet = "INSERT INTO Utilisateur
               VALUES (NULL, '$nom', '$login', '$mdp', '$email', '$numt', '$numa', '$rue', '$cp', '$ville','$photo','');";
        $sql = $conn->Query($requet)or die('Erreur dans la requete');
    }

    function replacebr($var){
        $var = preg_replace("#\n|\t|\r|<br>#","",$var);
        return $var;
    }

}// fin class


//////////////////// class Eleve //////////////////////
class Eleve extends Utilisateur
{

    Private $prenom_eleve;
    Private $choix_position;

    function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                                $ville = "", $photo = "",$prenom = "", $choix = "")
    {
        Utilisateur:Utilisateur($id, $nom, $login, $mdp, $email, $numt, $numa, $rue, $CP,
                                    $ville,$photo);
        $this->prenom_eleve = $prenom;
        $this->choix_position = $choix;
    }


    /////////////////// Update Eleve ////////////////////



    /*
     * GETTERS
     */



    /**
     * @return string
     */
    public function getPrenomEleve()
    {
        return $this->prenom_eleve;
    }

    /**
     * @return string
     */
    public function getChoixPosition()
    {
        return $this->choix_position;
    }



    /*
     * SETTERS
     */

    /**
     * @param string $prenom_eleve
     */
    public function setPrenomEleve($prenom_eleve)
    {
        $this->prenom_eleve = $prenom_eleve;
    }

    /**
     * @param string $choix_position
     */
    public function setChoixPosition($choix_position)
    {
        $this->choix_position = $choix_position;
    }

}//fin class

///////////////////////// class Entreprise ////////////////////////
class Entreprise extends Utilisateur
{

    Private $nom_resp; // déclaration des variables -- [  ENTREPRISE  ]
    Private $cope_APE;
    Private $site_web;

    function __construct($nomresp = "", $code = "", $site = "")
    {
        $this->nom_resp = $nomresp;
        $this->cope_APE = $code;
        $this->site_web = $site;
    }

    ////////////////////////////// Update Entreprise /////////////////////////////
    Public function modififier_entreprise($mdp, $mdpc, $nom, $login, $email, $numt, $numa, $rue, $CP, $ville, $photo, $nomresp, $code, $site, $id, $conn)
    {
        $requet = "UPDATE Utilisateur
  						 SET nom_user = '$nom',
                   login_user = '$login',
                   mdp_user = '$mdp',
                   email_user = '$email',
                   tel_user = '$numt',
                   num_addr = '$numa',
                   rue_addr = '$rue',
                   CP_addr = '$CP',
                   ville_addr = '$ville',
                   photo_user = '$photo',
               WHERE id_user = '$id';";
        $req = $conn->Query($requet);

        $requet = "UPDATE Entreprise
  						 SET nom_resp = '$nomresp',
                   code_APE = '$code',
                   site_web = '$site'
               WHERE id_user = '$id';";
        $req = $conn->Query($requet);
    }

}// class

?>
