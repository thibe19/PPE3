<?php
//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                                login                                     ////
////                                13/12/2018                                ////
////                                V0.0.2                                    ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////

session_start();
    if((isset($_SESSION['login']) && isset($_SESSION['mdp']))){
        header("Location: ./template");
    }
//Sinon il sera renvoyé vers la page de connection.
    else {
        header("Location: ./login_page");
    }

?>
