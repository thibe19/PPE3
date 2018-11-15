<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 15/11/18
 * Time: 16:19
 * v0.0.1
 */

///////////////////////// class Entreprise ////////////////////////
class Entreprise extends Utilisateur
{

    Private $nom_resp; // déclaration des variables -- [  ENTREPRISE  ]
    Private $cope_APE;
    Private $site_web;

    function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                         $ville = "", $photo = "", $nomresp = "", $code = "", $site = "")
    {
        Utilisateur::__construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
            $ville = "", $photo = "");
        $this->nom_resp = $nomresp;
        $this->cope_APE = $code;
        $this->site_web = $site;
    }

    /*
     * GETTERS
     */

    /**
     * @return string
     */
    public function getNomResp()
    {
        return $this->nom_resp;
    }

    /**
     * @return string
     */
    public function getCopeAPE()
    {
        return $this->cope_APE;
    }

    /**
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->site_web;
    }

    /*
     * SETTERS
     */

    /**
     * @param string $nom_resp
     */
    public function setNomResp($nom_resp)
    {
        $this->nom_resp = $nom_resp;
    }

    /**
     * @param string $cope_APE
     */
    public function setCopeAPE($cope_APE)
    {
        $this->cope_APE = $cope_APE;
    }

    /**
     * @param string $site_web
     */
    public function setSiteWeb($site_web)
    {
        $this->site_web = $site_web;
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