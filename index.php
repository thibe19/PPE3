<?php
/*
 * 14/11/18
 * v0.0.2
 */

session_start();
//Test si l'identifiant est déjà connecté
//Si oui il le renvoie vers le dite
if((isset($_SESSION['login']) && isset($_SESSION['mdp']))){
  header("Location: ./template");
}
//Sinon il sera renvoyé vers la page de connection.
else {
  header("Location: ./login_page");
}
?>
