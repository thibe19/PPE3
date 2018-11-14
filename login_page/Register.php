<?php
// Register date modif : 14/11/2018 Version 0.0.3
require('../objet/class_utilisateur.php');
session_start();
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
<?php if (empty($_POST['E1']) && empty($_POST['E2']) && empty($_POST['E3']) && empty($_POST['E4']) && empty($_POST['C1']) && empty($_POST['E6'])) { ?>



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

					<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire : ex@abc.xyz"> <!-- Champ inscription mail  -->
						<input class="input100" type="text" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire"> <!-- Champ inscription Login  -->
						<input class="input100" type="text" name="login" placeholder="Login" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
						<input class="input100" type="password" id="pass_n" name="pass" value="" placeholder="Mot de passe" required>	<!-- Champ inscription Mot de passe  -->
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
						<input class="input100" type="password" id="pass_v" name="pass_verification" value="" placeholder="Vérification Mot de passe" required> <!-- Champ inscription Vérification de mot passe  -->
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>



					<!-- <form action="#" method="post"> -->
						<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape /////////// name="E1" value="1" -->
							<button name="E1" value="1" class="login100-form-btn">
								Prochaine étape
							</button>
						</div>
					<!-- </form> -->

<<<<<<< HEAD
					<script type="text/javascript">
						function checkPw() {
							var pass = document.getElementById("pass_n").value;
							var pass_v = document.getElementById("pass_v").value;
							if (pass != pass_v) {
								alert("pas égaux");
							}
							else {
								alert("égaux");
							}
						}
					</script>
=======

>>>>>>> 4242e0000f6ca3c1b0795d4bf0ac308fb43977c8


	<?php
  }

  //Test des mot de passes
  if (isset($_POST['pass']) && isset($_POST['pass_verification'])) {
    if ($_POST['pass'] != $_POST['pass_verification']) {
      ?>

      <script>
        if(confirm('Mot de passe différent'))
        {
          window.location = "./Register.php";
        }
      </script>

      <?php
    }
    else{

	if (isset($_POST['E1'])) {
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['mail'] = $_POST['email'];
    $_SESSION['login'] = $_POST['login'];
		?>
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

						<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
							<input class="input100" type="text" name="numa" placeholder="Numéro Adresse">	<!-- Champ inscription Mot de passe  -->
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-map-marker-alt" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
							<input class="input100" type="text" name="rue" placeholder="Rue">	<!-- Champ inscription Mot de passe  -->
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-road" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
							<input class="input100" type="text" name="cp" placeholder="Code postal">	<!-- Champ inscription Mot de passe  -->
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-map-marked" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
							<input class="input100" type="text" name="ville" placeholder="Ville">	<!-- Champ inscription Mot de passe  -->
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-city" aria-hidden="true"></i>
							</span>
						</div>


					<!-- <form action="#" method="post"> -->
						<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
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
    $_SESSION['numa'] = $_POST['numa'].'<br>';
    $_SESSION['rue'] = $_POST['rue'].'<br>';
    $_SESSION['cp'] = $_POST['cp'].'<br>';
    $_SESSION['ville'] = $_POST['ville'].'<br>';

		?>
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

						<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
							<input class="input100" type="text" name="surname" placeholder="Nom">	<!-- Champ inscription Mot de passe  -->
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
							<input class="input100" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="numt" placeholder="Numéro XX XX XX XX XX">	<!-- Champ inscription Mot de passe  -->
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</span>
						</div>


							<input type="file" name="photo" placeholder="Photo de Profil">	<!-- Champ inscription Mot de passe  -->

								<!-- TEST INPUT FILE  -->

					<!-- <form action="#" method="post"> -->
						<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
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
										<input type="radio" value="eleve" name="stay">
										<span class="slider round"></span>
									</label>
								</td>
								<td> <p> &nbsp Compte élève </p> </td>
							</tr>
						</table>

						<table>
							<tr>
								<td>
									<label class="switch">
										<input type="radio" value="entreprise" name="stay">
										<span class="slider round"></span>
									</label>
								</td>
								<td> <p> &nbsp Compte entreprise </p> </td>
							</tr>
						</table>



					<!-- <form action="#" method="post"> -->
						<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
							<button name="E4" value="4" class="login100-form-btn">
								Prochaine étape
							</button>
						</div>
					<!-- </form> -->
		<?php
		}
		if (isset($_POST['E4'])) {
      //////// LES SESSIONS
      $_SESSION['stay'] = $_POST['stay'];


			if ($_SESSION['stay'] == "eleve") {
				?>
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

								<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
									<input class="input100" type="text" name="name" placeholder="Prénom">	<!-- Champ inscription Mot de passe  -->
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<table>
									<tr>
										<td>
											<label class="switch">
												<input type="radio" value="eleve" name="stayp">
												<span class="slider round"></span>
											</label>
										</td>
										<td> <p> &nbsp Afficher position GPS </p> </td>
									</tr>
									<tr>
										<td>
											<label class="switch">
												<input type="radio" value="eleve" name="stayp">
												<span class="slider round"></span>
											</label>
										</td>
										<td> <p> &nbsp Ne pas afficher position </p> </td>
									</tr>
									<tr>
										<td>
											<label class="switch">
												<input type="radio" value="eleve" name="stayp">
												<span class="slider round"></span>
											</label>
										</td>
										<td> <p> &nbsp Afficher position adresse </p> </td>
									</tr>
								</table>

							<!-- <form action="#" method="post"> -->
								<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
									<button name="E6" value="6" class="login100-form-btn">
										Choisir centres d'intérêts
									</button>
								</div>
							<!-- </form> -->
				<?php
			}
			if ($_SESSION['stay'] == "entreprise") {
        //////////SESSION


				$ent = "test";
				////////////// FAIRE REQUETE SI NON EXISTE /////////////////////////////////////////////////////////////////////////////////// IMPORTANT !!!!!!!!!
				if ($_SESSION['surname'] == $ent) {               /////////////////////////////// SI IL EXISTE DEJA
					?>
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

						    <center> <p> Une entreprise avec ce nom existe déjà. </p> </center>
								<center> <p> Voulez-vous modifier l'entreprise existante ? </p> </center>
								<!-- <form action="#" method="post"> -->
									<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
										<button name="C1" value="1" class="login100-form-btn">
											Utiliser "<?php echo $ent; ?>"
										</button>
									</div>
								<!-- </form> -->



					<?php

				}
				else {                                      ///////////////////////////////////// SI IL EXISTE PAS
					?>
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

									<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
										<input class="input100" type="text" name="nameresp" placeholder="Nom responsable">	<!-- Champ inscription Mot de passe  -->
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fa fa-user" aria-hidden="true"></i>
										</span>
									</div>

									<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
										<input class="input100" type="text" name="APE" placeholder="Code APE">	<!-- Champ inscription Mot de passe  -->
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fa fa-id-card-alt" aria-hidden="true"></i>
										</span>
									</div>

									<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
										<input class="input100" type="text" name="web" placeholder="Site internet">	<!-- Champ inscription Mot de passe  -->
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fab fa-internet-explorer" aria-hidden="true"></i>
										</span>
									</div>

								<!-- <form action="#" method="post"> -->
									<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
										<button name="F" value="0" class="login100-form-btn">
											Finir inscription
										</button>
									</div>
								<!-- </form> -->
					<?php
				}
			}
		} ////////////////////////////////////// FIN DES PAGES JUSTE APRES LE CHOIX ELEVE OU ENTTREPRISE
		if (isset($_POST['C1'])) {         ////////////////////////// SUITE INSC ENTREPRISE SSI EXISTE
      /////////////////// LES SESSIONS


			?>
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

							<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
								<input class="input100" type="text" name="nameresp" placeholder="Nom responsable">	<!-- Champ inscription Mot de passe  -->
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
								<input class="input100" type="text" name="APE" placeholder="Code APE">	<!-- Champ inscription Mot de passe  -->
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-id-card-alt" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Champ obligatoire">
								<input class="input100" type="text" name="web" placeholder="Site internet">	<!-- Champ inscription Mot de passe  -->
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fab fa-internet-explorer" aria-hidden="true"></i>
								</span>
							</div>

						<!-- <form action="#" method="post"> -->
							<div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
								<button name="C1" value="1" class="login100-form-btn">
									Finaliser
								</button>
							</div>
						<!-- </form> -->
			<?php
		}

	 if (isset($_POST['E6'])) {        ////////////////// SUITE INSC ELEV
     /////////// LES sessions
     $mail = $_SESSION['mail'];
     $mdp = $_SESSION['pass'];
     $login = $_SESSION['login'];
     $numa = $_SESSION['numa'];
     $rue = $_SESSION['rue'];
     $CP = $_SESSION['CP'];
     $ville = $_SESSION['ville'];
     $surname = $_SESSION['surname'];
     $numt = $_SESSION['numt'];
     $photo = $_SESSION['photo'];
     $user = new Utilisateur('',$surname,$login,$mdp,$mail,$numt,$numa,$CP,$ville,$photo);
     $_SESSION['name'] = $_POST['name'];
     $_SESSION['stayp'] = $_POST['stayp'];


		 ?>
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

						 <p> LES PREFERENCES BESOIN DE LA PAGE QUI CORRESPOND </p>

					 <!-- <form action="#" method="post"> -->
						 <div class="container-login100-form-btn">	<!-- Bouton accer prochaine étape  -->
							 <button name="C1" value="1" class="login100-form-btn">
								 Finaliser
							 </button>
						 </div>
					 <!-- </form> -->
		 <?php
	 }
	?>




	 <!-- FIN DE LA CASE BOUTON FOOTER -->
	 <div class="text-center p-t-12">	<!-- Bouton si mot de passe ou login utilisé -->
			<span class="txt1">
				Oublier
			</span>
			<a class="txt2" href="#">
				Login / Mot de Passe?
			</a>
		</div>


		<div class="text-center p-t-136">	<!-- Page de connection -->
			<a class="txt2" href="#">
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
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
