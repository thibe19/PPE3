<?php
/*
 * 14/11/18
 * v0.0.1
 */




session_start();
//Test si l'identifiant est déjà connecté

print $_COOKIE['login']."<br>";
print $_COOKIE['mdp'];
//Si oui il le renvoie vers le dite
/*if((isset($_SESSION['login']) && isset($_SESSION['mdp'])) || (isset($_COOKIE['login']) && isset($_COOKIE['mdp']))){
  header("Location: ./template");
}
//Sinon il sera renvoyé vers la page de connection.
else {
  header("Location: ./login_page");
}*/
?>
