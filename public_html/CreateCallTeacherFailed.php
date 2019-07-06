<html>
    <head>
        <title>Information</title>
	<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
	<link rel="stylesheet" href="style5.css" type="text/css" />
    </head>
    <body>
        <h1>
            Gestion de l'appel
        </h1>
        <form method='post' action='envoi.php' id="myform">
            <div id="formu">
                    <fieldset>
		     <legend>
			<fieldset style='background-color:#EEEEEE;width:300;'>
				Informations sur ce cours </fieldset></legend>
		    </br>
<div id="sale">
	Erreur lors de l'entrée des données : remplissez convenablement les champs
</div>
</br>
		<div>
		    Bonjour M. 
<?php
session_start();
$nom = $_SESSION['nom'];
echo $nom;
?>
, veuillez préciser votre auditoire.</div></br>

                          <label for="departement">Département :</label>
                           <input type="departement" name="departement"  size="20" maxlength="4" id="departement"style="border-color:red"/></br></br>
                        <label for="annee">Année :</label>
                        <input type="annee" name="annee" size="20" class="an" maxlength="1" id="annee" style="border-color:red"/></br></br>
                        <label for="TD">TD :</label>
                        <input type="TD" name="TD" value="NULL" size="20" maxlength="1" id="TD"style="border-color:red"/></br></br>
                        <label for="TP">TP :</label>
			<input type="TP" name="TP" value="NULL" size="20" maxlength="1" id="TP"style="border-color:red"/></br></br>
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

