<?php
session_start();
//Test si l'identifiant est déjà connecté
//Si oui il le renvoie vers le dite
if(isset($_SESSION['email']) && isset($_SESSION['mdp'])){
  header("Location: ./template");
}
//Sinon il sera renvoyé vers la page de connection.
else {
  header("Location: ./login_page");
}
?>
