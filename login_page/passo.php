
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
						Mot de passe oublié
					</span>





          <?php
          include('../ToolBox/bdd.inc.php');
          if (isset($_POST['mailob'])) {

            $mail = $_POST['mailo'];
            $objet = "Mot de passe compte : ViaBahuet.";
            $entete = "From: yannther99@gmail.com";

            $SQL="SELECT * FROM utilisateur
                  WHERE email_user='$mail';";
            $Req=$conn->Query($SQL);
            $result=$Req->fetch();

            $text = "Bonjour ".$result['nom_user']."\n";
            $text = $text."Pour changer votre mot de passe utiliser le lien ci-dessous : \n";
            $text = $text."http://localhost/PPE3/login_page/pass_reset.php?id=".urlencode($result['id_user'])."\n\n\n";
            $text = $text."Ceci est un mail automatique, merci de ne pas y répondre.";

            mail($mail, $objet, $text, $entete);
            ?> <center> <p>Mail envoyé.</p> </center> <?php
          }
          else {
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
                <button type="submit" name="mailob" value="" class="login100-form-btn">
                    Envoyer
                </button>
            </div>
            <?php
          }





           ?>



                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
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
