
<?php
/*
 *  15/11/18
 *  Connection au site web
 *
 *  v0.0.4
 */
/*
 *
 *
 * TODO : PEnser a la vérification mail
 */
//Connection a la base de donnée
require('../ToolBox/bdd.inc.php');
require('../ToolBox/toolbox_inc.php');
require('../objet/classes.php');
session_start();
//
//print $_COOKIE['login'].'<br>'.$_COOKIE['mdp'];

if(isset($_COOKIE['login']) && isset($_COOKIE['mdp'])){
    $_SESSION['login'] = $_COOKIE['login'];
    $_SESSION['mdp'] = $_COOKIE['mdp'];
    header("Location: ../");
}
//test les identifiants et mot de passes
elseif (isset($_POST['login']) && isset($_POST['pass'])) {
    $login = $_POST['login'];
    $mdp = $_POST['pass'];

    $SQL = "SELECT id_user,mdp_user FROM Utilisateur
                WHERE login_user='$login'";
    $req = $conn->Query($SQL) or die("L'utilisateur n'existe pas");
    $req = $req->fetchAll();

    if (password_verify($mdp, $req[0]['mdp_user'])) {
        $mdp = $req[0]['mdp_user'];
        $SQL = "SELECT * FROM Utilisateur
                WHERE login_user='$login' AND mdp_user='$mdp'";
        $req = testsql($SQL,$conn);

        //Test si l'identifiant et le mot de passe existe et corresponds
        if ($req) {
            $_SESSION['id']=dec_enc('encrypt',$req[0]['id_user']);
            $id = $req[0]['id_user'];
            if (testsql("SELECT id_user FROM Eleve WHERE id_user='$id'",$conn)){
                $SQL = "SELECT * FROM Utilisateur
                    WHERE id_user='$id'";
                $req = $conn->Query($SQL)or die("Erreur selection de l'utilisateur");
                foreach (reqtoobj($req) as $r){
                    $nom = $r->nom_user;
                    $email = $r->email_user;
                    $tel = $r->tel_user;
                    $numadd = $r->num_addr_user;
                    $rue = $r->rue_addr_user;
                    $cp = $r->CP_addr_user;
                    $ville = $r->ville_addr_user;
                    $photo = $r->photo_user;
                    $desc = $r->desc_user;
                    $dom_acti = $r->dom_acti;
                }
                $SQL = "SELECT * FROM Eleve
                        WHERE id_user='$id'";
                $req = $conn->Query($SQL)or die("Erreur selection de l'utilisateur");
                foreach (reqtoobj($req) as $r){
                    $prenom = $r->prenom_eleve;
                    $date = $r->date_naiss;
                    $choix = $r->choix_position;
                }
                $uneleve = new Eleve('',$nom,'','',$email,$tel,$numadd,$rue,$cp,$ville,$photo,$desc,$dom_acti,$prenom,$date,$choix);
                $_SESSION['Eleve']= serialize($uneleve);
            }
            elseif(testsql("SELECT id_user FROM Entreprise WHERE id_user='$id'",$conn)){
                $SQL = "SELECT * FROM Utilisateur
                    WHERE id_user='$id'";
                $req = $conn->Query($SQL)or die("Erreur selection de l'utilisateur");
                foreach (reqtoobj($req) as $r){
                    $nom = $r->nom_user;
                    $email = $r->email_user;
                    $tel = $r->tel_user;
                    $numadd = $r->num_addr_user;
                    $rue = $r->rue_addr_user;
                    $cp = $r->CP_addr_user;
                    $ville = $r->ville_addr_user;
                    $photo = $r->photo_user;
                    $desc = $r->desc_user;
                    $dom_acti = $r->dom_acti;
                }
                $SQL = "SELECT * FROM Entreprise
                        WHERE id_user='$id'";
                $req = $conn->Query($SQL)or die("Erreur selection de l'utilisateur");
                foreach (reqtoobj($req) as $r){
                    $nomrep = $r->nom_resp;
                    $ape = $r->code_APE;
                    $site = $r->site_web;
                }
                $unent = new Entreprise('',$nom,'','',$email,$tel,$numadd,$rue,$cp,$ville,$photo,$desc,$dom_acti,$nomrep,$ape,$site);
                $_SESSION['Entreprise']=serialize($unent);
            }
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['mdp'] = $_POST['pass'];
            if (isset($_POST['stay'])) {
                setcookie('login', $_SESSION['login'], time()+60*60*24*30*365, '/');
                setcookie('mdp', $_SESSION['mdp'], time()+60*60*24*30*365, '/');
            }
            //TODO
            header("Location: ../");
        } else {
            ?>
            <script>
                alert("L'identifiant et le mot de passe ne correspondes pas.");
                window.location = "./";
            </script>
            <?php
        }
    }else {

        ?>
        <script>
            alert("L'identifiant et le mot de passe ne correspondes pas.");
            window.location = "./";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connexion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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



<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form method="post" action="./" class="login100-form validate-form" id="form">
					<span class="login100-form-title">
						Member Login
					</span>


                <?php



                //Test reset de mot de pass


                if (isset($_GET['mdpres'])) {
                  ?>
                        <center> <p>Entrer l'adresse mail du compte.</p> </center>
                        <br>
                        <div class="wrap-input100 validate-input" data-validate="Vous devez entrer votre mot de passe">
                            <input class="input100" type="mail" name="mailo" placeholder="Mail">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" name="mailobp" value="test" class="login100-form-btn">
                                Envoyer
                            </button>
                        </div>
                        <div class="text-center p-t-136">
                          <br><br><br>
                            <a class="txt2" href="./">
                                Retour
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div><?php
                }

                if (isset($_POST['mailobp'])){
                    mail_reset_mdp($_POST['mailo'], $conn);
                    ?> <center> <p>Mail envoyé.</p> </center>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="./">
                            Retour
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div><?php
                }




                if (isset($_GET['loginres'])){
                        ?>
                        <center><p>Entrer l'adresse mail du compte.</p></center>
                        <br>
                        <div class="wrap-input100 validate-input"
                             data-validate="Vous devez entrer votre mot de passe">
                            <input class="input100" type="mail" name="mailo" placeholder="Mail">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" name="mailobl" value="test" class="login100-form-btn">
                                Envoyer
                            </button>
                        </div>
                        <div class="text-center p-t-136">
                            <a class="txt2" href="./">
                                Retour
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div><?php
                    }

                if (isset($_POST['mailobl'])) {
                    mail_forgot_login($_POST['mailo'], $conn);
                    ?>
                    <center><p>Mail envoyé.</p></center>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="./">
                            Retour
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div><?php
                }





            if (empty($_GET['mdpres']) && empty($_GET['loginres']) && empty($_POST['mailobl']) && empty($_POST['mailobp'])) {
                ?>

                <div class="wrap-input100 validate-input"
                     data-validate="Vous devez entrer votre identifiant de connexion">
                    <input class="input100" type="text" name="login" placeholder="Identifiant">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Vous devez entrer votre mot de passe">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>


                <!-- Rounded switch -->

                <table>
                    <tr>
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="stay">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td><p> &nbsp Rester connecté </p></td>
                    </tr>
                </table>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Oublier
						</span>
                    <a class="txt2" href="./?loginres=1">Login</a><a style="color: rgb(230,230,230)"> / </a><a
                            href="./?mdpres='" class="txt2">Mot de passe</a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="./Register.php">
                        S'inscire
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
              <?php }  ?>

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
