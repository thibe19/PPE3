<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Entreprise class                           ////
////                               19/12/2018                                 ////
////                               V0.0.4                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


class Entreprise extends Utilisateur
{

    Private $nom_resp; // déclaration des variables -- [  ENTREPRISE  ]
    Private $code_ape;
    Private $site_web;

    function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                         $ville = "", $photo = "", $desc_user="", $dom_acti="", $nomresp = "", $code = "", $site = "")
    {
      Utilisateur::__construct($id, $nom, $login, $mdp, $email, $numt, $numa, $rue, $CP,
          $ville,$photo,$desc_user,$dom_acti);
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
    public function getAll(array $param,$conn){

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

      $SQL = "SELECT Entreprise.*".$select." FROM Entreprise"
          ." ".$join." "
          ." ".$where." ";
      $req = $conn->Query($SQL) or die($SQL.'Erreur selection Post');
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


    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                MODIFIER                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    public function updateentreprise($objet,$conn){
        $objet->modifier_utilisateur($objet,$conn);
        $nomresp = $this->nom_resp;
        $ape = $this->code_ape;
        $siteweb = $this->site_web;
        $id_user = $objet->getIdUser();

        $SQL = "UPDATE Entreprise
               SET nom_resp = '$nomresp',
               code_APE = '$ape',
               site_web = '$siteweb'
               WHERE id_user='$id_user'";
        $res = $conn->Query($SQL)or die('Erreur insertion entreprise');

    }


    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Fonction                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////



    function selectAllEntreprise($id_user,$conn){
      $sqlEn="SELECT * FROM Entreprise WHERE id_user = '$id_user'";
      $resEn = $conn -> query($sqlEn)or die($conn -> errorInfo());
      return $resEn;
    }

    //Liste des entreprise
    function selectStageEnt($conn){

        $sqlEn="SELECT U.id_user,U.nom_user FROM Utilisateur U, Entreprise E WHERE U.id_user=E.id_user ";
        $resEn = $conn -> query($sqlEn)or die($conn -> errorInfo());

        return $resEn;
    }

    // Select toute les entreprises

    function selectEntreprise($conn){
      $SQL = "SELECT * FROM Entreprise";
      $resE = $conn -> query($SQL)or die($conn -> errorInfo());

      return $resE;
    }

}// class
