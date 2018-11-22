<?php
/**
 * Created by PhpStorm.
 * Date: 21/11/18
 * Time: 14H
 * v0.0.3
 */

//////////////////// class Eleve //////////////////////
class Eleve extends Utilisateur
{

    Private $prenom_eleve;
    Private $date;
    Private $choix_position;


    function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                         $ville = "", $photo = "", $desc_user = "", $prenom = "", $date = "", $choix = "")
    {
        Utilisateur::__construct($id, $nom, $login, $mdp, $email, $numt, $numa, $rue, $CP,
            $ville,$photo, $desc_user);
        $this->prenom_eleve = $prenom;
        $this->date = $date;
        $this->choix_position = $choix;
    }


    /////////////////// Update Eleve ////////////////////



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

    /*
     * Inscription eleve
     */
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
}//fin class
