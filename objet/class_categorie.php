<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                Categorie                                 ////
////                                19/12/2018                                ////
////                                V0.0.1                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

class Categorie
{
    Private $id_cat;
    Private $lib_cat;

    public function __construct($id_cat = "" ,$lib_cat = "")
    {
        $this->id_cat = $id_cat;
        $this->lib_cat = $lib_cat;
    }

    /**
     * @return string
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @return string
     */
    public function getLibCat()
    {
        return $this->lib_cat;
    }

    /**
     * @param string $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }

    /**
     * @param string $lib_cat
     */
    public function setLibCat($lib_cat)
    {
        $this->lib_cat = $lib_cat;
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

      $SQL = "SELECT Categorie.*".$select." FROM Categorie"
          ." ".$join." "
          ." ".$where." ";
      $req = $conn->Query($SQL) or die($SQL.'Erreur selection Post');
      $req = $req->fetchAll(PDO::FETCH_OBJ);
      return $req;
    }



    //////////////////////////////////////////////////////////////////////////////////
    ////                                                                          ////
    ////                                                                          ////
    ////                                Fonction                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    function selectAllCategorie($conn){

      $sqlC="SELECT * FROM Categorie ORDER BY lib_cat DESC";
      $resC = $conn -> query($sqlC)or die($conn -> errorInfo());

      return $resC;
    }

    function selectCategorie($id_cat,$conn){
      $sqlC="SELECT * FROM Categorie WHERE id_cat = '$id_cat'";
      $resC = $conn -> query($sqlC)or die($conn -> errorInfo());
      return $resC;

    }



}
