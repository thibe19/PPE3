<?php
/*
 * 14/11/18
 * v0.0.2
 */

session_start();
function destroycookie($cookiename){
    print $cookiename.'<br>';
    unset($_COOKIE[$cookiename]);
    setcookie($cookiename, '', 1);
}

//test de deconnexion
if(isset($_GET['logout'])){
      destroycookie('login');
      destroycookie('mdp');
      session_destroy();
      //header("Location: ./login_page");
}
else{
    if((isset($_SESSION['login']) && isset($_SESSION['mdp']))){
        header("Location: ./template");
    }
//Sinon il sera renvoyé vers la page de connection.
    else {
        header("Location: ./login_page");
    }
}

?>
