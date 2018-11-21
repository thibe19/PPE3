<?php
// Register date modif : 15/11/2018 Version 0.0.4
require('../objet/class_utilisateur.php');
require_once ('../objet/classes.php');
session_start();
/*
 * FONCTION ENC DEC MAIL
 */

function dec_enc($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Inscription</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="css/style.css">
  <!--===============================================================================================-->


</head>
<body>

    <?php
       if (empty($_POST['E1']) && empty($_POST['E2']) && empty($_POST['E3']) && empty($_POST['E4']) && empty($_POST['E5']) && empty($_POST['E6']) && empty($_POST['C6'])
       && empty($_POST['C7']) && empty($_POST['C8'])) {
         ?>
         <div class="limiter">
           <div class="container-login100">
             <div class="wrap-login100">
               <div class="login100-pic js-tilt" data-tilt>
                 <img src="images/img-01.png" alt="IMG">
               </div>

               <form class="login100-form validate-form" method="POST">
                 <span class="login100-form-title">
                   Inscription
                 </span>

                 <div class="wrap-input100 validate-input" data-validate="Champ obligatoire : ex@abc.xyz">
                   <!-- Champ inscription mail  -->
                   <input class="input100" type="text" name="email" placeholder="Email" required>
                   <span class="focus-input100"></span>
                   <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                   </span>
                 </div>

                 <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                   <!-- Champ inscription Login  -->
                   <input class="input100" type="text" name="login" placeholder="Login" required>
                   <span class="focus-input100"></span>
                   <span class="symbol-input100">
                     <i class="fa fa-user" aria-hidden="true"></i>
                   </span>
                 </div>

                 <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                   <input class="input100" type="password" id="pass_n" name="pass" value="" placeholder="Mot de passe"
                   required>    <!-- Champ inscription Mot de passe  -->
                   <span class="focus-input100"></span>
                   <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                   </span>
                 </div>

                 <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                   <input class="input100" type="password" id="pass_v" name="pass_verification" value=""
                   placeholder="Vérification Mot de passe" required>
                   <!-- Champ inscription Vérification de mot passe  -->
                   <span class="focus-input100"></span>
                   <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                   </span>
                 </div>


                 <!-- <form action="#" method="post"> -->
                 <div class="container-login100-form-btn">
                   <!-- Bouton accer prochaine étape /////////// name="E1" value="1" -->
                   <button name="E1" value="1" class="login100-form-btn">
                     Prochaine étape
                   </button>
                 </div>
                 <!-- </form> -->
        <?php
       }


       /*
       * REQUETE DE TEST EXISTENCE DE L'USER
       */

       if (isset($_POST['login']) && isset($_POST['email'])) {

         $login = $_POST['login'];
         $email = $_POST['email'];

         $SQLtest = "SELECT login_user,email_user FROM Utilisateur
         WHERE login_user = '$login'
         AND email_user = '$email';";
         $req = $conn->Query($SQLtest) or die('Erreur dans la requete');
         $res_id_email = $req->fetchAll();

         $SQLtest = "SELECT login_user FROM Utilisateur
         WHERE login_user = '$login';";
         $req = $conn->Query($SQLtest) or die('Erreur dans la requete');
         $res_id = $req->fetchAll();

         $SQLtest = "SELECT email_user FROM Utilisateur
         WHERE  email_user = '$email';";
         $req = $conn->Query($SQLtest) or die('Erreur dans la requete');
         $res_email = $req->fetchAll();


         if ($res_id_email){
           ?>

           <script>
           if (confirm("L'adresse email et l'identifiant entré existe déjà vous avez peut etre déjà un compte. Voulez-vous vous connecter ?") == true) {
             window.location = "./";
           }
           else {
             window.location = "./Register.php";
           }
           </script>

           <?php
         }


         if ($res_email && $res_id){
           ?>

           <script>
           alert("L'adresse email et l'identifiant entré existe déjà !");
           window.location = "./Register.php";
           </script>

           <?php
         }
         else{
           if ($res_id){
             ?>

             <script>
             alert("L'identifiant entré existe déjà !");
             window.location = "./Register.php";
             </script>

             <?php
           }
           if ($res_email){
             ?>

             <script>
             alert("L'adresse email entré existe déjà !");
             window.location = "./Register.php";
             </script>

             <?php
           }
         }
       }
       /*
       * Fin test existance user
       */

       if (isset($_POST['pass']) && isset($_POST['pass_verification'])) {
         if ($_POST['pass'] != $_POST['pass_verification']) {
           ?>

           <script>
           alert('Mot de passe différent')
           window.location = "./Register.php";
           </script>

           <?php
         }
         else{
           if (isset($_POST['E1'])) {

             $_SESSION['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
             $_SESSION['mail'] = $_POST['email'];
             $_SESSION['login'] = $_POST['login'];
             ?>
             <!--  Ajout de l'adresse postale -->
             <div class="limiter">
               <div class="container-login100">
                 <div class="wrap-login100">
                   <div class="login100-pic js-tilt" data-tilt>
                     <img src="images/img-01.png" alt="IMG">
                   </div>

                   <form class="login100-form validate-form" method="POST">>
                     <span class="login100-form-title">
                       Inscription
                     </span>

                     <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                       <input class="input100" type="text" name="numa" placeholder="Numéro Adresse"
                       size="8">    <!-- Champ inscription Mot de passe  -->
                       <span class="focus-input100"></span>
                       <span class="symbol-input100">
                         <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                       </span>
                     </div>

                     <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                       <input class="input100" type="text" name="rue" placeholder="Rue" size="50">
                       <!-- Champ inscription Mot de passe  -->
                       <span class="focus-input100"></span>
                       <span class="symbol-input100">
                         <i class="fa fa-road" aria-hidden="true"></i>
                       </span>
                     </div>

                     <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                       <input class="input100" type="text" name="cp" placeholder="Code postal" size="5">
                       <!-- Champ inscription Mot de passe  -->
                       <span class="focus-input100"></span>
                       <span class="symbol-input100">
                         <i class="fa fa-map-marked" aria-hidden="true"></i>
                       </span>
                     </div>

                     <div class="wrap-input100 validate-input" data-validate="Champ obligatoire">
                       <input class="input100" type="text" name="ville" placeholder="Ville" size="50">
                       <!-- Champ inscription Mot de passe  -->
                       <span class="focus-input100"></span>
                       <span class="symbol-input100">
                         <i class="fa fa-city" aria-hidden="true"></i>
                       </span>
                     </div>


                     <!-- <form action="#" method="post"> -->
                     <div class="container-login100-form-btn">    <!-- Bouton accer prochaine étape  -->
                       <button name="E2" value="2" class="login100-form-btn">
                         Prochaine étape
                       </button>
                     </div>
                     <!-- </form> -->
             <?php
           }
         }
       }


       if (isset($_POST['E2'])) {

         $_SESSION['numa'] = $_POST['numa'] . '<br>';
         $_SESSION['rue'] = $_POST['rue'] . '<br>';
         $_SESSION['cp'] = $_POST['cp'] . '<br>';
         $_SESSION['ville'] = $_POST['ville'] . '<br>';

         ?>
         <!-- DIV nom, numéro de tel et photo de profil -->
         <div class="limiter">
           <div class="container-login100">
             <div class="wrap-login100">
               <div class="login100-pic js-tilt" data-tilt>
                 <img src="images/img-01.png" alt="IMG">
               </div>

               <form class="login100-form validate-form" method="POST">>
                 <span class="login100-form-title">
                   Inscription
                 </span>

                 <div class="wrap-input100 validate-input"
                 data-validate="Champ obligatoire">
                 <input class="input100" type="text" name="surname"
                 placeholder="Nom">
                 <!-- Champ inscription Mot de passe  -->
                 <span class="focus-input100"></span>
                 <span class="symbol-input100">
                   <i class="fa fa-user" aria-hidden="true"></i>
                 </span>
               </div>

               <div class="wrap-input100 validate-input"
               data-validate="Champ obligatoire">
               <input class="input100" type="tel"
               pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"
               name="numt" placeholder="Numéro XX XX XX XX XX">
               <!-- Champ inscription Mot de passe  -->
               <span class="focus-input100"></span>
               <span class="symbol-input100">
                 <i class="fa fa-phone" aria-hidden="true"></i>
               </span>
             </div>


             <input type="file" name="photo" placeholder="Photo de Profil">
             <!-- Champ inscription Mot de passe  -->

             <!-- TEST INPUT FILE  -->

             <!-- <form action="#" method="post"> -->
             <div class="container-login100-form-btn">
               <!-- Bouton accer prochaine étape  -->
               <button name="E3" value="3" class="login100-form-btn">
                 Prochaine étape
               </button>
             </div>
             <!-- </form> -->
             <?php
       }


       if (isset($_POST['E3'])) {
         ?>

         <!-- LES INPUTS POUR LE TRANSFERT -->

         <?php

         $_SESSION['surname'] = $_POST['surname'];
         $_SESSION['numt'] = $_POST['numt'];
         $_SESSION['photo'] = $_POST['photo'];


         ?>


         <!-- DIV choix eleve ou entreprise -->


         <div class="limiter">
           <div class="container-login100">
             <div class="wrap-login100">
               <div class="login100-pic js-tilt" data-tilt>
                 <img src="images/img-01.png" alt="IMG">
               </div>

               <form class="login100-form validate-form" method="POST">>
                 <span class="login100-form-title">
                   Inscription
                 </span>

                 <table>
                   <tr>
                     <td>
                       <label class="switch">
                         <input type="radio" value="eleve"
                         name="stay">
                         <span class="slider round"></span>
                       </label>
                     </td>
                     <td><p> &nbsp Compte élève </p></td>
                   </tr>
                 </table>

                 <table>
                   <tr>
                     <td>
                       <label class="switch">
                         <input type="radio" value="entreprise"
                         name="stay">
                         <span class="slider round"></span>
                       </label>
                     </td>
                     <td><p> &nbsp Compte entreprise </p></td>
                   </tr>
                 </table>


                 <!-- <form action="#" method="post"> -->
                 <div class="container-login100-form-btn">
                   <!-- Bouton accer prochaine étape  -->
                   <button name="E5" value="5"
                   class="login100-form-btn">
                   Prochaine étape
                 </button>
               </div>
               <!-- </form> -->
               <?php
       }



       if (isset($_POST['E5'])) {
           $_SESSION['stay'] = $_POST['stay'];

         if ($_SESSION['stay'] == "eleve") {
           ?>
           <!-- DIV de spécification Eleve ( Prenom et choix position ) -->
           <div class="limiter">
             <div class="container-login100">
               <div class="wrap-login100">
                 <div class="login100-pic js-tilt" data-tilt>
                   <img src="images/img-01.png" alt="IMG">
                 </div>

                 <form class="login100-form validate-form"
                 method="POST">>
                 <span class="login100-form-title">
                   Inscription
                 </span>

                 <div class="wrap-input100 validate-input"
                 data-validate="Champ obligatoire">
                 <input class="input100" type="text"
                 name="name"
                 placeholder="Prénom">
                 <span class="focus-input100"></span>
                 <span class="symbol-input100">
                   <i class="fa fa-user" aria-hidden="true"></i>
                 </span>
               </div>



               <!--choix position-->
               <table>
                 <tr>
                   <td>
                     <label class="switch">
                       <input type="radio"
                       value="0"
                       name="stayp">
                       <span class="slider round"></span>
                     </label>
                   </td>
                   <td><p> &nbsp Afficher position
                     GPS </p></td>
                   </tr>
                   <tr>
                     <td>
                       <label class="switch">
                         <input type="radio"
                         value="1"
                         name="stayp">
                         <span class="slider round"></span>
                       </label>
                     </td>
                     <td><p> &nbsp Ne pas afficher
                       position </p></td>
                     </tr>
                     <tr>
                       <td>
                         <label class="switch">
                           <input type="radio"
                           value="2"
                           name="stayp">
                           <span class="slider round"></span>
                         </label>
                       </td>
                       <td><p> &nbsp Afficher position
                         adresse </p></td>
                       </tr>
                     </table>

                     <!-- <form action="#" method="post"> -->
                     <div class="container-login100-form-btn">
                       <!-- Bouton accer prochaine étape  -->
                       <button name="E6" value="6"
                       class="login100-form-btn">
                       Choisir centres d'intérêts
                     </button>
                   </div>
                   <!-- </form> -->
                   <?php
         }










         //TEST SI ENTREPRISE EXISTE DEJA.
         if ($_SESSION['stay'] == "entreprise") {

             //TEST SI ENTREPRISE EXISTE DEJA.
                   $noment = $_SESSION['surname'];
            $SQL_testent = "SELECT E.id_user,nom_user FROM Utilisateur U, Entreprise E
                            WHERE U.id_user=E.id_user
                            AND nom_user='$noment'";
            $req = $conn->Query($SQL_testent)or die('Erreur dans la recherche des entreprises.');
            $req = $req->fetchAll(PDO::FETCH_OBJ);
            if($req){
                foreach ($req as $r){
                    $ent = $r->nom_user;
                    $_SESSION['id_ent'] = $r->id_user;
                }
            }
            else{
                $ent = "";
            }

           if ($_SESSION['surname'] == $ent) {
             ?>
             <div class="limiter">
               <div class="container-login100">
                 <div class="wrap-login100">
                   <div class="login100-pic js-tilt"
                   data-tilt>
                   <img src="images/img-01.png"
                   alt="IMG">
                 </div>

                 <form class="login100-form validate-form"
                 method="POST">>
                 <span class="login100-form-title">
                   Inscription
                 </span>

                 <center><p> Une
                   entreprise avec
                   ce nom existe
                   déjà. </p>
                 </center>
                 <center><p> Voulez-vous
                   modifier
                   l'entreprise
                   existante ? </p>
                 </center>
                 <!-- <form action="#" method="post"> -->
                 <div class="container-login100-form-btn">
                   <!-- Bouton accer prochaine étape  -->
                   <button name="C7"
                   value="1"
                   class="login100-form-btn">
                   Utiliser
                   "<?php print $ent; ?>
                   "
                 </button>
               </div>
               <!-- </form> -->


               <?php

           }
           else {
             ?>
             <div class="limiter">
               <div class="container-login100">
                 <div class="wrap-login100">
                   <div class="login100-pic js-tilt"
                   data-tilt>
                   <img src="images/img-01.png"
                   alt="IMG">
                 </div>

                 <form class="login100-form validate-form"
                 method="POST">
                 >
                 <span class="login100-form-title">
                   Inscription
                 </span>

                 <div class="wrap-input100 validate-input"
                 data-validate="Champ obligatoire">
                 <input class="input100"
                 type="text"
                 name="nameresp"
                 placeholder="Nom responsable">
                 <!-- Champ inscription Mot de passe  -->
                 <span class="focus-input100"></span>
                 <span class="symbol-input100">
                   <i class="fa fa-user" aria-hidden="true"></i>
                 </span>
               </div>

               <div class="wrap-input100 validate-input"
               data-validate="Champ obligatoire">
               <input class="input100"
               type="text"
               name="APE"
               placeholder="Code APE">
               <!-- Champ inscription Mot de passe  -->
               <span class="focus-input100"></span>
               <span class="symbol-input100">
                 <i class="fa fa-id-card-alt" aria-hidden="true"></i>
               </span>
             </div>

             <div class="wrap-input100 validate-input"
             data-validate="Champ obligatoire">
             <input class="input100"
             type="text"
             name="website"
             placeholder="Site internet">
             <!-- Champ inscription Mot de passe  -->
             <span class="focus-input100"></span>
             <span class="symbol-input100">
               <i class="fab fa-internet-explorer" aria-hidden="true"></i>
             </span>
           </div>

           <!-- <form action="#" method="post"> -->
           <div class="container-login100-form-btn">
             <!-- Bouton accer prochaine étape  -->
             <button name="C6"
             value="6"
             class="login100-form-btn">
             Finir
             inscription
           </button>
         </div>
         <!-- </form> -->
         <?php
           }
         }
       }


       if (isset($_POST['E6'])) {
         /////////// LES sessions
         $mail = $_SESSION['mail'];
         $mdp = $_SESSION['pass'];
         $login = $_SESSION['login'];
         $numa = $_SESSION['numa'];
         $rue = $_SESSION['rue'];
         $cp = $_SESSION['cp'];
         $ville = $_SESSION['ville'];
         $surname = $_SESSION['surname'];
         $numt = $_SESSION['numt'];
         $photo = $_SESSION['photo'];

         $prenom = $_POST['name'];
         $choixpos = $_POST['stayp'];


         $uneleve = new Eleve('', $surname, $login, $mdp, $mail, $numt, $numa, $rue, $cp, $ville, $photo,'',$prenom,$choixpos);
         $uneleve->inscriptioneleve($uneleve,$conn);

         ?>
         <div class="limiter">
           <div class="container-login100">
             <div class="wrap-login100">
               <div class="login100-pic js-tilt"
               data-tilt>
               <img src="images/img-01.png"
               alt="IMG">
             </div>

             <form class="login100-form validate-form"
             method="POST">
             >
             <span class="login100-form-title">
               Inscription
             </span>
            <?php
            $SQL = "SELECT * FROM Preferences";
            $req = $conn->Query($SQL)or die('Erreur selection preferences');
            $req = $req->fetchAll(PDO::FETCH_OBJ);
            if($req){
                foreach ($req as $r){
                    ?>
                    <label for="checkbox-nested-1"><?php print $r->lib_pref; ?>
                        <input type="checkbox" name="pref[]" value="<?php print $r->id_pref ?>">
                    </label>
                    <?php
                }
            }
            ?>


               <!-- <form action="#" method="post"> -->
               <div class="container-login100-form-btn">
                 <!-- Bouton accer prochaine étape  -->
                 <button name="C1"
                 value="1"
                 class="login100-form-btn">
                 Finaliser
               </button>
             </div>
             <!-- </form> -->
             <?php
       }


       if (isset($_POST['C6'])) {
          $mail = $_SESSION['mail'];
          $mdp = $_SESSION['pass'];
          $login = $_SESSION['login'];
          $numa = $_SESSION['numa'];
          $rue = $_SESSION['rue'];
          $cp = $_SESSION['cp'];
          $ville = $_SESSION['ville'];
          $surname = $_SESSION['surname'];
          $numt = $_SESSION['numt'];
          $photo = $_SESSION['photo'];

          $nomresp = $_POST['nameresp'];
          $ape = $_POST['APE'];
          $website = $_POST['website'];

         $uneentreprise = new Entreprise('',$surname,$login,$mdp,$mail,$numt,$numa,$rue,$cp,$ville,$photo,'',$nomresp,$ape,$website);
         $uneentreprise->inscriptionent($uneentreprise,$conn);
         ?>
         <div class="limiter">
           <div class="container-login100">
             <div class="wrap-login100">
               <div class="login100-pic js-tilt"
               data-tilt>
               <img src="images/img-01.png"
               alt="IMG">
             </div>

             <form class="login100-form validate-form"
             method="POST">
             >
             <span class="login100-form-title">
               Inscription
             </span>

             <p>
               L'INSCRIPTION EST TERMINÉ VOUS ALLEZ RECEVOIR UN MAIL DE VALIDATION
                A L'ADRESSE QUE VOUS AVEZ RENSEIGNÉ.</p>

               <!-- <form action="#" method="post"> -->
               <div class="container-login100-form-btn">
                 <!-- Bouton accer prochaine étape  -->
                 <button name="FINENT"
                 value="1"
                 class="login100-form-btn">
                 Finaliser
               </button>
             </div><?php
               $mail = "yannther99@gmail.com";
               $objet = "Activer votre compte : ViaBahuet.";
               $entete = "From: yannther99@gmail.com";






               $login_m = $login;
               $mdp_m = $mdp;

               $SQL="SELECT * FROM utilisateur
                     WHERE login_user='$login_m'
                     AND mdp_user='$mdp_m';";
               $Req=$conn->Query($SQL);
               $result=$Req->fetch();

               $id = $result['id_user'];


               $loginc = dec_enc('encrypt',"$login_m");
               $idc = dec_enc('encrypt',"$id");

               $text = "Bienvenue sur ViaBahuet,\n";
               $text = $text."Pour activer votre compte, veuillez cliquer sur le lien ci dessous.\n";
               $text = $text."http://localhost/PPE3/login_page/validation.php?log=".urlencode($loginc)."&id=".urlencode($idc)."\n\n\n>";
               $text = $text."Ceci est un mail automatique, merci de ne pas y répondre.";

               mail($mail, $objet, $text, $entete);

       }














       //cc
       if (isset($_POST['C7'])) {
         /////////////////// LES SESSIONS


         ?>
         <div class="limiter">
           <div class="container-login100">
             <div class="wrap-login100">
               <div class="login100-pic js-tilt"
               data-tilt>
               <img src="images/img-01.png"
               alt="IMG">
             </div>

             <form class="login100-form validate-form"
             method="POST">
             >
             <span class="login100-form-title">
               Inscription
             </span>

             <div class="wrap-input100 validate-input"
             data-validate="Champ obligatoire">
             <input class="input100"
             type="text"
             name="nameresp"
             placeholder="Nom responsable">
             <!-- Champ inscription Mot de passe  -->
             <span class="focus-input100"></span>
             <span class="symbol-input100">
               <i class="fa fa-user"
               aria-hidden="true"></i>
             </span>
           </div>

           <div class="wrap-input100 validate-input"
           data-validate="Champ obligatoire">
           <input class="input100"
           type="text"
           name="APE"
           placeholder="Code APE">
           <!-- Champ inscription Mot de passe  -->
           <span class="focus-input100"></span>
           <span class="symbol-input100">
             <i class="fa fa-id-card-alt"
             aria-hidden="true"></i>
           </span>
         </div>

         <div class="wrap-input100 validate-input"
         data-validate="Champ obligatoire">
         <input class="input100"
         type="text"
         name="website"
         placeholder="Site internet">
         <!-- Champ inscription Mot de passe  -->
         <span class="focus-input100"></span>
         <span class="symbol-input100">
           <i class="fab fa-internet-explorer"
           aria-hidden="true"></i>
         </span>
       </div>

       <!-- <form action="#" method="post"> -->
       <div class="container-login100-form-btn">
         <!-- Bouton accer prochaine étape  -->
         <button name="C8"
         value="1"
         class="login100-form-btn">
         Finaliser
       </button>
     </div>
     <!-- </form> -->
     <?php
       }


       if (isset($_POST['C8'])) {
           $id_user= $_SESSION['id_ent'];
           $mail = $_SESSION['mail'];
           $mdp = $_SESSION['pass'];
           $login = $_SESSION['login'];
           $numa = $_SESSION['numa'];
           $rue = $_SESSION['rue'];
           $cp = $_SESSION['cp'];
           $ville = $_SESSION['ville'];
           $surname = $_SESSION['surname'];
           $numt = $_SESSION['numt'];
           $photo = $_SESSION['photo'];

           $nomresp = $_POST['nameresp'];
           $ape = $_POST['APE'];
           $website = $_POST['website'];

           $uneentreprise = new Entreprise($id_user,$surname,$login,$mdp,$mail,$numt,$numa,$rue,$cp,$ville,$photo,'',$nomresp,$ape,$website);
           $uneentreprise->updateentreprise($uneentreprise,$conn);

           //VALIDATION PAR MAIL

           $mail = "yannther99@gmail.com";
           $objet = "Activer votre compte : ViaBahuet.";
           $entete = "From: yannther99@gmail.com";






           $login_m = $login;
           $mdp_m = $mdp;

           $SQL="SELECT * FROM Utilisateur
                     WHERE login_user='$login_m'
                     AND mdp_user='$mdp_m';";
           $Req=$conn->Query($SQL);
           $result=$Req->fetch();

           $id = $result['id_user'];


           $loginc = dec_enc('encrypt',"$login_m");
           $idc = dec_enc('encrypt',"$id");

           $text = "Bienvenue sur ViaBahuet,\n";
           $text = $text."Pour activer votre compte, veuillez cliquer sur le lien ci dessous.\n";
           $text = $text."http://localhost/PPE3/login_page/validation.php?log=".urlencode($loginc)."&id=".urlencode($idc)."\n\n\n>";
           $text = $text."Ceci est un mail automatique, merci de ne pas y répondre.";

           mail($mail, $objet, $text, $entete);

         ?>
           <div class="limiter">
               <div class="container-login100">
                   <center> <h2>Votre entreprise <?php $surname ?> a était créée <br> Un mail de confirmation a était encoyé.</h2>  </center>
               </div>
           </div>
         <?php
       }
     ?>
     <!-- FIN DE LA CASE BOUTON FOOTER -->
     <div class="text-center p-t-12">
       <!-- Bouton si mot de passe ou login utilisé -->
       <span class="txt1">
         Oublier
       </span>
       <a class="txt2"
       href="#">
       Login
       /
       Mot
       de
       Passe?
     </a>
   </div>


   <div class="text-center p-t-136">
     <!-- Page de connection -->
     <a class="txt2"
     href="#">
     Se
     connecter
     <i class="fa fa-long-arrow-right m-l-5"
     aria-hidden="true"></i>
   </a>
   </div>
   </form>
   </div>
   </div>
   </div>


   <!--===============================================================================================-->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/tilt/tilt.jquery.min.js"></script>
   <script>
   $('.js-tilt').tilt({
   scale: 1.1
   })
   </script>
   <!--===============================================================================================-->
   <script src="js/main.js"></script>

   </body>
   </html>
