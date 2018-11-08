<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['mdp'])){
  header("Location: ./template");
}
else {
  header("Location: ./login_page");
}
?>
