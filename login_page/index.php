
<?php
/*
 *  15/11/18
 *  Connection au site web
 *
 *  v0.0.4
 */
//Connection a la base de donnée
require('../ToolBox/bdd.inc.php');
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

    $SQL = "SELECT mdp_user FROM Utilisateur
                WHERE login_user='$login'";
    $req = $conn->Query($SQL) or die("L'utilisateur n'existe pas");
    $req = $req->fetchAll();

    if (password_verify($mdp, $req[0]['mdp_user'])) {
        $mdp = $req[0]['mdp_user'];
        $SQL = "SELECT * FROM Utilisateur
                WHERE login_user='$login' AND mdp_user='$mdp'";
        $req = $conn->Query($SQL) or die("L'utilisateur n'existe pas");
        $req = $req->fetchAll();

        //Test si l'identifiant et le mot de passe existe et corresponds
        if ($req) {
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
							Forgot
						</span>
                    <a class="txt2 button_reset_id" onclick="window.location='./?loginres=1'">Username</a><a style="color: rgb(230,230,230)"> / </a><a onclick="window.location='./?mdpres=1'" class="txt2 button_reset_id" href="#">Password</a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="./Register.php">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
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
