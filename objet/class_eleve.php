<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Eleve class                                ////
////                               19/12/2018                                 ////
////                               V0.0.4                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


class Eleve extends Utilisateur
{

    Private $prenom_eleve;
    Private $date;
    Private $choix_position;


    function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                         $ville = "", $photo = "", $desc_user = "", $dom_acti = "", $prenom = "", $date = "", $choix = "")
    {
        Utilisateur::__construct($id, $nom, $login, $mdp, $email, $numt, $numa, $rue, $CP,
            $ville,$photo, $desc_user, $dom_acti);
        $this->prenom_eleve = $prenom;
        $this->date = $date;
        $this->choix_position = $choix;
    }

    /*
     * GETTERS
     */

    function getAllEleve(){
        $data = $this->getAllUser();
        $data = $data.$this->prenom_eleve;
        $data = $data.$this->date;
        $data = $data.$this->choix_position;

        return $data;
    }

    /**
     * @return string
     */
    public function getPrenomEleve()
    {
        return $this->prenom_eleve;
    }

    public function getdateEleve()
    {
        return $this->date;
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
     * @param string $date
     */
    public function setdateEleve($date)
    {
        $this->date = $date;
    }

    /**
     * @param string $choix_position
     */
    public function setChoixPosition($choix_position)
    {
        $this->choix_position = $choix_position;
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

      $SQL = "SELECT Eleve.*".$select." FROM Eleve"
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

    public function inscriptioneleve($objet, $conn)
    {
        $objet->inscription($objet,$conn);
        $login =  $objet->getLoginUser();
        $pass = $objet->getMdpUser();
        $email = $objet->getEmailUser();
        $prenom = $this->prenom_eleve;
        $choixpos = $this->choix_position;
        $date = $this->date;

        // RECUPERATION DE L'ID
        $sql_getid = "SELECT id_user FROM Utilisateur
                            WHERE login_user='$login' AND mdp_user='$pass'
                            AND email_user='$email'";
        $res_getid = $conn->Query($sql_getid)or die('Erreur dans le requete get id');
        $res_getid = $res_getid->fetchAll();
        if($res_getid){
            $ideleve = $res_getid[0]['id_user'];
            $SQL = "INSERT INTO Eleve
                    VALUES('$ideleve','$prenom','$date','$choixpos')";
            $res = $conn->Query($SQL)or die('Erreur inscription eleve');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                MODIFIER                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    public function modifier_eleve($objet,$conn){

        $objet->modifier_utilisateur($objet,$conn);
        $id = $objet->getIdUser();
        $prenom = $this->getPrenomEleve($objet);
        $date = $this->getdateEleve($objet);
        $choixpos = $this->getChoixPosition($objet);

        $sql="UPDATE Eleve
              SET prenom_eleve='$prenom', date_naiss ='$date', choix_position='$choixpos'
              WHERE id_user='$id' ";
        $res = $conn->Query($sql)or die('Erreur modification user');


    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Fonction                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////


function selectAllEleve($id_user,$conn){

  $sqlE="SELECT * FROM Eleve WHERE id_user = '$id_user'";
  $resE = $conn -> query($sqlE)or die($conn -> errorInfo());

  return $resE;
}

// Select tout les élèves

function selectEleve($conn){
  $sqlE="SELECT * FROM Eleve";
  $resE = $conn -> query($sqlE)or die($conn -> errorInfo());

  return $resE;
}


}//fin class
