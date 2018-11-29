<?php
/*
 * 14/11/18
 * v0.0.2
 */

session_start();
    if((isset($_SESSION['login']) && isset($_SESSION['mdp']))){
        header("Location: ./template");
    }
//Sinon il sera renvoyé vers la page de connection.
    else {
        header("Location: ./login_page");
    }

?>
