<html>
	<head>
		<title>Identification</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="style2.css" type="text/css" /> 
	</head>
	<body>
		<?php session_start();
		if (empty($_SESSION['Secure'])){header('Location: PageErreur.html');}
		?>
		<h1>
			Vérification de présence
		</h1>
		<form method="post" action="esp-data.php">
			<div id="formu">
				<fieldset>
					<legend>
						<fieldset style='background-color=#EEEEEE;width:300px;'>
							Vos identifiants </fieldset></legend>
					</br>
					<label for="numero">N° étudiant :</label>
					<input type="numero" name="numero" size="20" maxlength="4" id="numero" style="border-color:red"/></br>
					<div id="erreur">
						Mauvais Identifiant
					</div>
					<input type="submit" name="nom" value=" Envoyer " >


				</fieldset>
			</div>
		</form>
		</br>
		</br>
		</br>
		<footer>&copy; Copyright 2019 Antoine Poupeney, Maxence Poisson, Francois Guilloux, Timothee Cao Van Tuat, Lompech Thibaut</footer>
	</body>            
</html>
