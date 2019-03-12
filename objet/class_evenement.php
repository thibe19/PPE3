<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               Envenment class                            ////
////                               13/12/2018                                 ////
////                               V0.0.1                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////


class Evenement
{

  Private $id_event;
  Private $date_event;
  Private $desc_event;
  Private $lib_type_event;


  function __construct($id_event='',$date_event='',$desc_event='',$lib_type_event='' )
  {
    $this -> id_event = $id_event;
    $this -> date_event = $date_event;
    $this -> desc_event = $desc_event;
    $this -> lib_type_event = $lib_type_event;

  }
  ///////////////////////////////////////// Get ///////////////////////////////////////////
  public function getid_event()
  {
    return $this-> id_event;
  }
  public function getdate_event()
  {
    return $this-> date_event;
  }
  public function getdesc_event()
  {
    return $this-> desc_event;
  }
  public function getlib_type_event()
  {
    return $this-> lib_type_event;
  }
  //////////////////////////////////////////// SET  /////////////////////////////////////////////
  public function setid_event($id_event)
  {
    $this-> id_event = $id_event;
  }
  public function setdate_event($date_event)
  {
    $this-> date_event = $date_event;
  }
  public function setdesc_event($desc_event)
  {
    $this-> desc_event = $desc_event;
  }
  public function setlib_type_event($lib_type_event)
  {
    $this-> lib_type_event = $lib_type_event;
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

    $SQL = "SELECT Evenement.*".$select." FROM Evenement"
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

  public function insert_event($date_event,$desc_event ,$lib_type_event ,$conn )
  {
    $date_event = $this-> date_event;
    $desc_event = $this-> desc_event;
    $lib_type_event = $this-> lib_type_event;

    $SQL = "INSERT INTO Evenement VALUES('','$date_event','$desc_event','$lib_type_event')";
    $res = $conn->Query($SQL);

  }

  //////////////////////////////////////////////////////////////////////////////////
  ////                                                                          ////
  ////                                                                          ////
  ////                                MODIFIER                                  ////
  ////                                                                          ////
  ////                                                                          ////
  //////////////////////////////////////////////////////////////////////////////////


  public function update_event($id_event ,$date_event ,$desc_event ,$lib_type_event ,$conn)
  {
    $id_event = $this-> id_event;
    $date_event = $this-> date_event;
    $desc_event = $this-> desc_event;
    $lib_type_event = $this-> lib_type_event;

    $SQL = "UPDATE Evenement SET date_event = '$date_event',
                                 desc_event = '$desc_eventsc',
                                 lib_type_event = '$lib_type_event'
                            WHERE id_event = $id_event";
    $res = $conn->Query($SQL);

  }




}


 ?>
