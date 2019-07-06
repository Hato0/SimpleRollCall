<html>

	<head>
		<title>Identification</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="style.css" type="text/css" /> 
	</head>
	<body>
<?php 
//
//session_start();
//if (empty($_SESSION['Secure'])){header('Location: PageErreur.html');}

if (!(preg_match_all("#Windows NT (.*)[;|\)]#isU", $_SERVER["HTTP_USER_AGENT"], $version))){
	header ("Location: PageErreur.html");
}
else{
//	echo $_SERVER['REMOTE_ADDR'];

//	echo $_SERVER['HTTP_HOST'];
	$array = str_split($_SERVER['REMOTE_ADDR']);
	$array2 = str_split($_SERVER['HTTP_HOST']);
	$nok = 1;
	$nbpts = 0;
	$kk = 0;
	while ($nbpts < 3){
		if(!strcmp($array[k],$array2[k])){
			$nok=0; 
			break;
		}
		if($array[k]=="."){
			$nbpts = $nbpts +1;
		}

	}
}	

?>
		<h1>
			Vérification de présence
		</h1>
		<form method="post" action="esp-data.php">
			<div id="formu">
				<fieldset>
					<legend>
						<fieldset style='background-color:#EEEEEE;width:300px;'>
							Vos identifiants </fieldset> </legend>
					</br>
					<label for="numero">N° étudiant :</label>
					<input type="numero" name="numero" size="20" maxlength="4" id="numero" /></br></br>
					<input type="submit" name="nom" value=" Envoyer ">

				</fieldset>
			</div>
		</form>
		</br>
		</br>
		</br>
		<footer>&copy; Copyright 2019 Antoine Poupeney, Maxence Poisson, Francois Guilloux, Timothee Cao Van Tuat, Lompech Thibaut</footer>
	</body>            
</html>
