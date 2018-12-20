<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Emploi class                               ////
////                               13/12/2018                                 ////
////                               V0.0.2                                     ////
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
  ////                                MODIFIER                                  ////
  ////                                                                          ////
  ////                                                                          ////
  //////////////////////////////////////////////////////////////////////////////////

  public function modifier_emploi($conn){

    $this->modifier_offre($conn);




  }

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

}//fin class



 ?>
