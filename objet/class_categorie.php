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
    ////                                Fonction                                  ////
    ////                                                                          ////
    ////                                                                          ////
    //////////////////////////////////////////////////////////////////////////////////

    function selectAllCategorie($conn){

      $sqlC="SELECT * FROM Categorie ORDER BY lib_cat ";
      $resC = $conn -> query($sqlC)or die($conn -> errorInfo());

      return $resC;
    }



}
