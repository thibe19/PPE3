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
    Private $code_ape;
    Private $site_web;

    function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                         $ville = "", $photo = "", $nomresp = "", $code = "", $site = "")
    {
      Utilisateur::__construct($id, $nom, $login, $mdp, $email, $numt, $numa, $rue, $CP,
          $ville,$photo);
        $this->nom_resp = $nomresp;
        $this->code_ape = $code;
        $this->site_web = $site;
    }

    /*
     * GETTERS
     */

    function getAllEnt(){
        $data = $this->getAllUser();
        $data = $data.$this->nom_resp;
        $data = $data.$this->code_ape;
        $data = $data.$this->site_web;

        return $data;
    }

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
        return $this->code_ape;
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
     * @param string $code_ape
     */
    public function setCopeAPE($code_ape)
    {
        $this->code_ape = $code_ape;
    }

    /**
     * @param string $site_web
     */
    public function setSiteWeb($site_web)
    {
        $this->site_web = $site_web;
    }

    /*
     * AJOUTER UNE ENTREPRISE
     */

    public function inscriptionent($objet, $conn)
    {
        $objet->inscription($objet,$conn);
        $login =  $objet->getLoginUser();
        $pass = $objet->getMdpUser();
        $email = $objet->getEmailUser();
        $nomresp = $this->nom_resp;
        $ape = $this->code_ape;
        $siteweb = $this->site_web;

        // RECUPERATION DE L'ID
        $sql_getid = "SELECT id_user FROM Utilisateur
                            WHERE login_user='$login' AND mdp_user='$pass'
                            AND email_user='$email'";
        $res_getid = $conn->Query($sql_getid)or die('Erreur dans le requete get id');
        $res_getid = $res_getid->fetchAll();
        if($res_getid){
            $ideleve = $res_getid[0]['id_user'];
            $SQL = "INSERT INTO Entreprise
                    VALUES('$ideleve','$nomresp','$ape','$siteweb')";
            $res = $conn->Query($SQL)or die('Erreur insertion entreprise');
        }
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
