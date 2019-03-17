<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Utilisateur class                          ////
////                               19/12/2018                                 ////
////                               V0.0.7                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


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
    Private $desc_user;
    private $dom_acti;

    Public function __construct($id = "", $nom = "", $login = "", $mdp = "", $email = "", $numt = "", $numa = "", $rue = "", $CP = "",
                                $ville = "", $photo = "", $desc_user="", $dom_acti="")
    {  //Constructeur

        $this->id_user = $id;
        $this->nom_user = $nom;
        $this->login_user = $login;
        $this->mdp_user = password_hash($mdp,PASSWORD_DEFAULT);
        $this->email_user = $email;
        $this->num_tel_user = $numt;
        $this->num_addr = $this->replacebr($numa);
        $this->rue_addr = $this->replacebr($rue);
        $this->CP_addr = $this->replacebr($CP);
        $this->ville_addr = $this->replacebr($ville);
        $this->photo_user = $photo;
        $this->desc_user = $desc_user;
        $this->dom_acti=$dom_acti;

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
        $data = $data.$this->desc_user;
        $data = $data.$this->dom_acti;
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

    public function getDescUser()
    {
      return $this->desc_user;
    }

    /**
     * @return string
     */
    public function getDomActi()
    {
        return $this->dom_acti;
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

    public function setDescUser($desc_user)
    {
      $this->desc_user = $desc_user;
    }

    /**
     * @param string $dom_acti
     */
    public function setDomActi($dom_acti)
    {
        $this->dom_acti = $dom_acti;
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

      $SQL = "SELECT Utilisateur.*".$select." FROM Utilisateur"
          ." ".$join." "
          ." ".$where." ";
      $req = $conn->Query($SQL) or die($SQL.'Erreur selection Post');
      $req = $req->fetchAll(PDO::FETCH_OBJ);
      return $req;
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                               DELETE                                     ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    function supprimerAmis($id_user_amis,$conn,$zone) {
      $SQL = "DELETE FROM ajoute_amis
              WHERE id_user_Eleve = $id_user_amis;";
      $res = $conn->Query($SQL)or die('');
      ?>
        <script type="text/javascript">
          window.location='requests.php?groupe=<?php print $zone ?>';
        </script>
      <?php
    }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Insert                                    ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////


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

        $SQLtest = "SELECT login_user,email_user FROM Utilisateur
        WHERE login_user = '$login'
        AND email_user = '$email';";
        $req = $conn->Query($SQLtest) or die('Erreur dans la requete');
        $res_id_email = $req->fetchAll();
        if (!empty($res_id_email[0]->login_user)) {
          return;
        }
        else{

        $requet = "INSERT INTO Utilisateur
               VALUES (NULL, '$nom', '$login', '$mdp', '$email', '$numt', '$numa', '$rue', '$cp', '$ville','$photo','','',0);";
        $sql = $conn->Query($requet)or die('Erreur dans la requete');
      }
    }

    function replacebr($var){
        $var = preg_replace("#\n|\t|\r|<br>#","",$var);
        return $var;
    }

    //// INSERT Amis

    function ajoutAmis($id_user_amis,$id_user,$conn,$zone) {
      $SQL = "INSERT INTO ajoute_amis
              VALUES('$id_user', '$id_user_amis');";
      $res = $conn->Query($SQL)or die('');
      ?>
        <script type="text/javascript">
          window.location='requests.php?groupe=<?php print $zone ?>';
        </script>
      <?php
    }


    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                MODIFIER                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////


Public function modifier_utilisateur( $objet,$conn){
  $id = $this->getIdUser($objet);
  $nom = $this->getNomUser($objet);
  $login = $this->getLoginUser($objet);
  $mdp = $this->getMdpUser($objet);
  $email = $this->getEmailUser($objet);
  $tel = $this->getNumTelUser($objet);
  $Nrue = $this->getNumAddr($objet);
  $rue = $this->getRueAddr($objet);
  $cp = $this->getCPAddr($objet);
  $ville = $this->getVilleAddr($objet);

  $photo = $this->getPhotoUser($objet);
  $desc = $this->getDescUser($objet);
  $domacti = $this->getDomActi($objet);

  $sql="UPDATE Utilisateur
        SET nom_user='$nom', login_user='$login', mdp_user='$mdp', email_user='$email', tel_user='$tel',num_addr_user='$Nrue' , rue_addr_user='$rue', CP_addr_user='$cp', ville_addr_user='$ville', photo_user='$photo', desc_user='$desc',dom_acti='$domacti'
        WHERE id_user='$id' ";
  $res = $conn->Query($sql)or die('Erreur modification user');

}

//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                                                          ////
////                               SELECT                                     ////
////                                                                          ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

function getAllUserDB($id,$conn)
{
    $SQL = "SELECT * FROM Utilisateur
        WHERE id_user='$id'";
    $req = $conn->Query($SQL) or die ('Erreur selection utilisateur');
    $req = $req->fetchAll(PDO::FETCH_OBJ);

    return $req;
}

function selectAllUtilisateur($id_user,$conn){
  $sqlU="SELECT * FROM Utilisateur WHERE id_user = '$id_user'";
  $resU = $conn -> query($sqlU)or die($conn -> errorInfo());

  return $resU;

}

// Select les amis du Compte
function selectAmisCompte($id_user, $conn) {
  $sql = "SELECT * FROM ajoute_amis
          WHERE id_user_Eleve != '$id_user'
          AND id_user = '$id_user'";
  $req = $conn->Query($sql)or die('Erreur dans le requete selectAmisCompte');

  return $req;
}

// Select tout les utilisateurs sauf sois même
function selectSpecielUser($id_user,$id_user2,$conn) {
  $SQL2 = "SELECT * FROM Utilisateur
           WHERE id_user = $id_user2
           AND id_user != $id_user";
  $req2 = $conn->Query($SQL2) or die("L'utilisateur n'existe pas");

  return $req2;
}

// Selection tout les user amis
function selectAllAmis($id_user,$id_user_amis,$conn) {
  $SQL3 = "SELECT * FROM ajoute_amis
           WHERE id_user_Eleve = $id_user_amis
           AND id_user = $id_user";
  $req3 = $conn->Query($SQL3) or die("L'utilisateur n'existe pas");

  return $req3;
}





}// fin class
?>
