
<?php
// OUBLIE LOGIN V0.0.0
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

          <form class="login100-form validate-form" method="post">


					<span class="login100-form-title">
						Changer le mot de passe
					</span>





          <?php
          include('../ToolBox/bdd.inc.php');
          include('../ToolBox/toolbox_inc.php');
          if (isset($_POST['pass_resetn'])) {
            if (isset($_POST['cpass']) == isset($_POST['cpassv'])) {
              $idrpass = dec_enc('decrypt',$_GET['id']);
              $passrncry = $_POST['cpass'];


///////////////////////////////// METTRE DANS UN CLASSE

              $passrcry = password_hash($passrncry, PASSWORD_DEFAULT);
              $requet = "UPDATE Utilisateur
        						     SET mdp_user = '$passrcry'
                        WHERE id_user = '$idrpass';";
              $req = $conn->Query($requet);

              ?> <center> <p>Mot de passe changé.</p> </center> <?php
            }
          }
          else {
            ?>
            <div class="wrap-input100 validate-input" data-validate="Vous devez entrer votre mot de passe">
                <input class="input100" type="password" name="cpass" placeholder="Mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Vous devez entrer votre mot de passe">
                <input class="input100" type="password" name="cpassv" placeholder="Vérification Mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" name="pass_resetn" value="" class="login100-form-btn">
                    Changer
                </button>
            </div>
            <?php
          }






           ?>





                <div class="text-center p-t-136">
                    <a class="txt2" href="index.php">
                        Se connecter
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
