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
		<div>
		    Bonjour M. 
<?php
$servername="localhost";
$dbname="BDD";
$username="root";
$password="root";
$conn= new mysqli($servername,$username,$password,$dbname);
session_start();

if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

$id=$_POST['numero'];

$sql= "SELECT nom,prenom FROM Professeur where ID='$id';";

if ($result=$conn->query($sql)){
	if (($result->num_rows)==0){
		header('Location: Home_prof_fail.html');
}
	while ($row =$result->fetch_assoc()){
		$row_id=$row["nom"];
		$_POST['name']=$row_id;
		$_POST["prenom"]=$row["prenom"];
		$_SESSION['nom']=$row_id;
		echo $row_id;
	}
$result->free();
}
$conn->close();
?>
, veuillez préciser votre auditoire.</div></br></br>
			<label>Type d'appel : </label>

			<input type="radio" id ="TDSet" name="TDSetUp" value="TDSet" checked>
			TD
			<input type="radio" id="Boitier 1" name="TDSetUp" value="Boitier 1" checked>
			Boitier 1</br></br>
			 

 <label for="departement">Département :</label>
                           <input type="departement" name="departement"  size="20" maxlength="4" id="departement"/></br></br>
                        <label for="annee">Année :</label>
                        <input type="annee" name="annee" size="20" class="an" maxlength="1" id="annee "/></br></br>
                        <label for="TD">TD :</label>
                        <input type="TD" name="TD" value="NULL" size="20" maxlength="1" id="TD"/></br></br>
                        <label for="TP">TP :</label>
			<input type="TP" name="TP" value="NULL" size="20" maxlength="1" id="TP"/></br></br>
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

