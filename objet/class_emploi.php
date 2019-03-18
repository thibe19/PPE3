<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Emploi class                               ////
////                               20/12/2018                                 ////
////                               V0.0.4                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


class Emploi extends Offre
{

  private $salaire_emp;
  private $type_emp;

  function __construct($id_offre = '', $lib_offre = '', $niveau_req = '', $date_offre = '', $date_post = '',$desc_offre = '', $id_user = '', $id_cat = '', $id_ent = '',
   $id_user_eleve = "",$salaire_emp = '', $type_emp = '')
  {
    parent::__construct($id_offre, $lib_offre, $niveau_req, $date_offre, $date_post, $desc_offre, $id_user, $id_cat, $id_ent, $id_user_eleve);
    $this ->salaire_emp = $salaire_emp;
    $this ->type_emp = $type_emp;
  }

  /*
   * Getters
   */
  public function getAllEmploi(){
      $data = $this->getAllOffre().' ';
      $data = $data.$this->salaire_emp.' ';
      $data = $data.$this->type_emp.' ';

      return $data;
  }

  /**
   * @return string
   */
  public function getSalaireEmp()
  {
      return $this->salaire_emp;
  }

  /**
   * @return string
   */
  public function getTypeEmp()
  {
      return $this->type_emp;
  }


  /*
   * Setters
   */
  /**
   * @param string $salaire_emp
   */
  public function setSalaireEmp($salaire_emp)
  {
      $this->salaire_emp = $salaire_emp;
  }

  /**
   * @param string $type_emp
   */
  public function setTypeEmp($type_emp)
  {
      $this->type_emp = $type_emp;
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
    function getAll(array $param,$conn){
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

        $SQL = "SELECT Offre.*".$select." FROM Offre"
            ." ".$join." "
            ." ".$where." "
            ."ORDER BY date_post_offre DESC";
        $req = $conn->Query($SQL) or die('Erreur selection Stage');
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

  public function insert_emploi($conn){

      $this->insert_offre($conn);
      $id = $this->getid_offre();
      $id_ent = $this->getIdEnt();
      $salaire_emp = $this->salaire_emp;
      $type_emp = $this->type_emp;


      $sql_getido = "SELECT id_offre FROM Offre
                    WHERE id_offre=LAST_INSERT_ID()";
      $res_getido = $conn->Query($sql_getido)or die('Erreur dans le requete get id');
      $res_getido = $res_getido->fetchAll();

      $sql_getidus = "SELECT id_user FROM Offre
                    WHERE id_offre=LAST_INSERT_ID()";
      $res_getidus = $conn->Query($sql_getidus)or die('Erreur dans le requete get id');
      $res_getidus = $res_getidus->fetchAll();

      if($res_getido && $res_getidus){

        $id_user = $res_getidus[0]['id_user'];
        $id_offre = $res_getido[0]['id_offre'];
        $SQL = "INSERT INTO OEmploi
                VALUES('$id_offre','$salaire_emp','$type_emp','$id_user','')";
        $res = $conn->Query($SQL)or die($SQL);
      }


  }

    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Affichage                                 ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////
    ///
    ///
    function afficheemploi($lib_cat,$id_user,$photo_user,$nom_user,$id_offre,$id_ent,$date_post_offre,$lib_offre,$niveau_req,$date_debut_offre,$salaire_emp,$desc_offre,$type_emp,$conn){
    $offre = new Offre();
        $html = '<div class="post">
            <div class="post_content">
                <div class="post_img">
                    <img src="images/post/hide.png" alt="">
                    <span><i class="ion-android-radio-button-off"></i>'.$lib_cat.'</span>
                </div>
                <div class="row author_area">
                    <div class="col s4 author">
                        <a href="about.php?visit='.dec_enc('encrypt',$id_ent).'">
                            <div class="col s4 media_left"><img height="53px" width="53px" src="images/profil/'.$photo_user.'" alt="" class="circle"></div>
                        </a>
                        <div class="col s8 media_body" style="padding-left: 10px;">

                            <a href="#">'.$nom_user.'</a>
                            <span>'.$date_post_offre.'</span>

                        </div>
                    </div>
                    <div class="col s4 btn_floating">

                    </div>
                </div>
                <a class="post_heding">'.urldecode($lib_offre).'</a>
                <p><b>Niveau requis &nbsp:&nbsp </b>'.urldecode($niveau_req).'</p>
                <p><b>Salaire de départ &nbsp:&nbsp </b>'.urldecode($salaire_emp).' €</p>
                <p><b>Type de contrat &nbsp:&nbsp </b>'.urldecode($type_emp).'</p>
                <p><b>Date de début &nbsp:&nbsp </b>'.urldecode($date_debut_offre).'</p>
                <p><b>'."Description de l'offre &nbsp:&nbsp".' </b>'.urldecode($desc_offre).'</p>
            </div>';
            if (isset($_SESSION['Eleve'])) { $html = $html.$offre->postule($id_offre,$id_user,$id_ent,$conn); }
            $html = $html.'<br>
        </div>';

        return $html;
    }


    //////////////////////////////////////////////////////////////////////////////////
  ////                                                                          ////
  ////                                                                          ////
  ////                                MODIFIER                                  ////
  ////                                                                          ////
  ////                                                                          ////
  //////////////////////////////////////////////////////////////////////////////////

  public function modifier_emploi($conn){

    $this->modifier_offre($conn);
    $id = $this->getid_offre();
    $id_ent = $this->getIdEnt();
    $id_user = $this->getIdUser();
    $id_user_eleve=$this->getIdUserEleve();
    $salaire_emp = $this->salaire_emp;
    $type_emp = $this->type_emp;

    $SQL = "UPDATE OEmploi
    SET salaire_emp = '$salaire_emp', type_emp='$type_emp', id_user='$id_user',id_user_Eleve='$id_user_eleve'";



  }


  //////////////////////////////////////////////////////////////////////////////////
  ////                                                                          ////
  ////                                                                          ////
  ////                                Fonction                                  ////
  ////                                                                          ////
  ////                                                                          ////
  //////////////////////////////////////////////////////////////////////////////////


  public function delete_emploi($conn){
    $id_offre = $this->getid_offre();

    $SQL = "DELETE FROM OEmploi WHERE id_offre = $id_offre";
    $res = $conn->Query($SQL)or die(errorInfo());
  }


  public function selectOEmploibyid($id_offre,$conn){
    $sql = "SELECT id_offre FROM OEmploi WHERE id_offre='$id_offre'";
    $req = $conn->Query($sql)or die('Erreur selection OEmploi');
    $req = $req->fetchAll();

    return $req;
  }

  function modifiUserEleveEmp($id_user_eleve,$id_offre,$conn){
    $this->modifiOffreEleve($id_user_eleve,$id_offre,$conn);
    $sql="UPDATE OEmploi
          SET id_user_Eleve='$id_user_eleve'
          WHERE id_offre='$id_offre'";
    $res = $conn->Query($sql)or die('Erreur modification offre');
  }

}//fin class



 ?>
